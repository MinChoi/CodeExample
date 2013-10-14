<?
App::uses('FormHelper', 'View/Helper');

/**-----------------------------------------------------------------------------------------------------
 * # SURFACE DIGITAL CMS HELPER
 * Special helper class to provide rich form widgets in Surface Media's CMS backend.
 * Designed to allow the creation of form elements with just a single line of PHP code (no HTML required)
 * Also provides some nice base form styles
 *
 * Originally coded by Simon East, for Madgwicks Lawyers project, November 2011 - March 2012
 *
 * Note: to ensure these functions pickup the *value* of a field automatically
 *		 you need to set $this->request->data in your controller to contain the various field data values
 *		 e.g.  `$this->request->data = $this->Model->findById($id);`
 
 *------------------------------------------------------------------------------------------------------
 *
 * ## HOW DO I ADD A NEW TYPE?
 * 
 * Add a new function here if you need to create a new form widget (and think it belongs in core)
 * Then in the view, you can call this new widget by calling:
 * 		$this->CmsForm->input('fieldname', array('type' => 'myNewWidget'))
 * The input() function takes care of wrapping it in a DIV, adding a label, applying validation messages, etc.
 *
 * (Some of the widgets I built early on wrap themselves in a DIV manually, but that method is deprecated.)
 * 
 *------------------------------------------------------------------------------------------------------
 *
 * TODO:  
 * 		* Create a disabled-on-click submit button
 * 		* Insert JS to warn the user when they navigate away from a page without saving changes
 * 		* When two WYSIWYG fields are added to the same page *with the same fieldname* (such as in a jQuery cycler) crap happens
 * 		   this needs to be coded around by making the field IDs unique
 *		* Update this to conform better to FormHelper->input() <div> layout, rather than doing our own wrapWithDiv()
 *
 *------------------------------------------------------------------------------------------------------
 */
class CmsFormHelper extends FormHelper {
	
	public $helpers = array('TinyMce', 'Html', 'Minify');

	/**
	 * Store the list of wysiwyg fields so that we can include the TinyMce scripts 'afterRender'
	 * 
	 * 	$wysiwygFields['hidden'] = true				// used for KCFinder elements
	 * 	$wysiwygFields['simple'][] = 'domId1'		// simple WYSIWYG boxes
	 * 	$wysiwygFields['simple'][] = 'domId2'	
	 * 	$wysiwygFields['default'][] = 'domId3'		// default feature-filled WYSIWYG boxes
	 * 	$wysiwygFields['default'][] = 'domId4'
	 */ 
	protected $wysiwygFields = array();
	
	//---------------------- Functions -----------------------------------------------------------------
	
	/**
	 * Overriding create() function to automatically add "CmsForm" class to all <form> tags
	 * You can also pass other CSS classes to make use of default form layouts, eg:
	 * 
	 * 	create(null);		// creates form based on default model
	 * 	create(false);		// creates form *without* a model
	 * 	
	 * 	// Add some helpful classes to get a working layout quickly
	 * 	create(null, array('class' => 'labelsOnLeft errorsOnRight'));
	 * 
	 * To prevent inclusion of the default CSS file, use:
	 * 
	 * 	create(null, array('skipCss' => true))
	 */
	public function create($model = null, $options = array()) {
		@$options['class'] .= ' CmsForm';										// append custom class to <form> tag
		// add custom CSS to header
		if (!isset($options['skipCss']))
			$this->Html->css($this->Minify->path('/CORE/CmsFormHelper/CmsFormHelper_Base'), null, array('block' => 'css'));
		return parent::create($model, $options);
	}
	
	/**
	 * Extending Cake's super-powered input() function.
	 * Automatically applies validation parameters for the following validation types:
	 *  - notEmpty
	 *  - email
	 *  - fieldMatches
	 * 
	 * Also adds support for 'radios' type, which alters the default way that Cake outputs radio buttons
	 * (might need to refactor the radios func at some point, it's a little messy)
	 */ 
	public function input($fieldName, $options = array()) {
		// Intelligently guess if this is an email field
		if (strpos($fieldName, 'email') !== false && !isset($options['type'])) $options['type'] = 'email';
		// Is this a required field?
		if ($this->isRequiredField($fieldName)) $options[] = 'required';
		$valArray = $this->getValidateArray($fieldName);
		// debug($valArray);
		// if ($valArray && in_array('fieldMatches', $valArray->ruleSet))
			// $options['data-must-match'] = $this->domId($valArray['rule'][1]);
		$html = parent::input($fieldName, $options);
		if (@$options['type'] == 'radios') {
			// Replace <label>caption</label> with <div class="label">caption</div>
			// (the labels go on the actual radio buttons)
			$html = preg_replace('%radios"><label for="[^"]+">(.+?)</label>%', 'radios"><div class="label">\\1</div>', $html);
		}
		return $html;
	}
	
	/**
	 * Returns the Model->$validate array from the current model (set at beginning of form)
	 */ 
	public function getValidateArray($fieldName = null) {
		// debug($this->model());
		if (!$this->model() || !($model = $this->_getModel($this->model()))) return;
		if (!$fieldName) return $model->validate;
		$valArray = $model->validator();
		// debug($valArray);
		return $valArray->offsetExists($fieldName) ? $valArray[$fieldName] : null;
	}
	
	/**
	 * Returns true/false whether field is required
	 * (not to be confused with FormHelper's _isRequiredField() which takes an array param)
	 */ 
	public function isRequiredField($fieldName) {
		if (!$this->model() || !($model = $this->_getModel($this->model()))) return;
		// debug($this->_isRequiredField($this->getValidateArray($fieldName)));
		$valArray = $this->getValidateArray($fieldName);
		if ($valArray) 
			return $this->_isRequiredField($valArray);
		else
			return false;
	}
	
	/**
	 * Includes the JS for automatic client-side validation
	 * 
	 * Fields are validated mostly using HTML5 validation attributes such as `<input ... required="required">`
	 * 
	 * Currently supports required fields (text, select, radio, checkbox), email fields, confirm email/pass fields
	 */ 
	public function addJsValidation() {
		return $this->Minify->js('/CORE/CmsFormHelper/validation.js', false);		// false returns rather than echoes
	}
	
	/**
	 * ### DEPRECATED
	 * Every function also calls this to wrap itself in a div with a common class (and other optional classes as needed)
	 * 
	 * @deprecated
	 */ 
	function wrapWithDiv($fieldName, $cssClass, $html) {
		return "<div id=\"cmsField_$fieldName\" class=\"input $cssClass\">$html</div>";
	}
	
	/**
	 * Display a caption & file icon, clicking icon reveals a file manager (KCFinder) to upload and select files
	 * 
	 * TODO:
	 * 
	 *  * won't work with both images and files on the same form (two conflicting callbacks)
	 *  * get KCFinder to open to an appropriate folder
	 */ 
	public function kcFinderFile($caption, $fieldName, $filepath = null, $htmlAttribs = array()) {
		$domId = $this->domId($fieldName);			// domId() translates Model.field_name to modelFieldName
		$field = $this->hidden($fieldName);
		$fileUrl = $this->getFieldVal($fieldName);
		$this->wysiwygFields['hidden'] = true;
		if (!$fileUrl) $fileUrl = $filepath;
		
		// This field works through a hidden field (for saving to the database),
		// A link that triggers KCFinder for browsing images, and an embedded thumbnail
		$html = "<label for=\"$fieldName\">$caption</label>
					$field
					<a href=\"#\" title=\"Click to change the image\" onclick=\"cmsCurrentField='$domId'; openKCFinder('$domId', null, 'file', window, CmsFileCallback); return false;\">"
				. '<span class="uploadFileLink">Choose File...</span></a>'
				. " &nbsp; &nbsp; <a href=\"#\" title=\"Click to clear this field\" onclick=\"CmsFileCallback('$domId', ''); return false;\">"
				.	'<span class="uploadFileLink">Clear</span></a>';
				
		// Javascript to capture the returned filename from KCFinder
		// Added to view so that it is outputted only once per page
		$this->Html->scriptBlock('
				// JS function that is called when user chooses a file and closes KCFinder
				// Inserts icon (based on extension) and filename span tag
				function CmsFileCallback(domId, url) {
					var $ = jQuery;
					var iconsFolder = "/CORE/tiny_mce/plugins/kcfinder-2.51/themes/oxygen/img/files/big/";
					var icons = ["jpeg","jpg","js","mds","mdx","mid","midi","mkv","mov","mp3","mpeg","mpg","nfo","nrg","ogg","pdf","php","phps","pl","pm","png","ppt","pptx","psd","qt","rar","rpm","rtf","sh","srt","sub","swf","tgz","tif","tiff","torrent","ttf","txt","wav","wma","xls","xlsx","zip","avi","bat","bmp","bz2","ccd","cgi","com","csh","cue","deb","dll","doc","docx","exe","fla","flv","fon","gif","gz","htm","html","ini","iso","jar","java"];
					var div = $("#" + domId).closest(".cmsFile");
					div.find("img,.filename").remove();
					if (url) {
						url = url.replace("/files/file/", "");
						var extension = url.substr(url.lastIndexOf(".") + 1, 10);
						// If we dont have an icon for this extension, use "..png"
						if (icons.indexOf(extension) == -1) extension = ".";
						div.find("label")
							.after($("<span class=\"filename\">").html(decodeURI(url)))
							// Insert filetype icon into the form
							.after($("<img>").attr("src", iconsFolder + extension + ".png"));
					}
				};
				
				// Run callback for each field on initial pageload (setup caption and filetype icon)
				jQuery(function(){jQuery(".cmsFile input").each(function(){
					CmsFileCallback(this.id, this.value);
				})});
		', array('block' => 'script')); 
					
		return $this->wrapWithDiv($fieldName, 'cmsFile', $html);
	}
	
	/**
	 * Display a caption & image thumbnail, clicking thumbnail reveals a file manager to upload and select images
	 * 
	 * @ToDo won't work with both images and files on the same form (two conflicting callbacks)
	 * @ToDo get KCFinder to open to an appropriate folder
	 * 
	 * @param string $thumbnail Deprecated option, that allows for manually specifying the initial thumbnail shown on pageload
	 * @param array $htmlAttribs Not currently used. To be removed.
	 * @param string $thumb Provide automatic thumbnails by specifying a URL prefix, eg. `/thumb/460x200/fit`
	 */ 
	public function kcFinderImage($caption, $fieldName, $thumbnail = null, $htmlAttribs = array(), $thumb = '') {
		$domId = $this->domId($fieldName);			// domId() translates Model.field_name to modelFieldName
		$field = $this->hidden($fieldName);
		$thumbUrl = $this->getFieldVal($fieldName);
		$this->wysiwygFields['hidden'] = true;
		if (!$thumbUrl) $thumbUrl = $thumbnail;
		
		// This field works through a hidden field (for saving to the database),
		// A link that triggers KCFinder for browsing images, and an embedded thumbnail
		$html = "<label for=\"$fieldName\">$caption</label>
				$field
				<div class=\"imageWrapper\">
					<a href=\"#\" title=\"Click to change the image\" onclick=\"openKCFinder('$domId', null, 'image', window, imageCallback); return false;\"></a>
				</div>
				<a class=\"imageChange\" href=\"#\" title=\"Click to change the image\" onclick=\"openKCFinder('$domId', null, 'image', window, imageCallback); return false;\">Change Image</a> &nbsp;&nbsp;
				<a class=\"imageClear\" href=\"#\" title=\"Click to clear this field\" onclick=\"imageCallback('$domId', ''); return false;\">Clear</a>";
				
		// Javascript to capture the returned filename from KCFinder
		$this->Html->scriptBlock('
			// JS function that is called when user chooses an image and closes KCFinder
			// (had to hack KCFinder core code slightly to achieve this callback)
			function imageCallback(domId, url) {
				var $ = jQuery,
					cmsImage = $("#" + domId).closest(".cmsImage"),
					aTag = cmsImage.find(".imageWrapper a"),
					clearLink = cmsImage.find(".imageClear"),
					changeLink = cmsImage.find(".imageChange");
				if (url) {
					// Insert image thumbnail into the form
					aTag.html($("<img>").attr("src", "' . $thumb . '" + url));
					changeLink.html("Change image...");
					clearLink.show();
				} else {
					aTag.find("img").hide(1000, function(){ aTag.empty() });
					clearLink.hide();
					changeLink.html("Select an image...");
					cmsImage.find("input").val(null);
				}					
			};
			
			// Run callback for each field on initial pageload (setup links & thumbnail)
			jQuery(function(){jQuery(".cmsImage input").each(function(){
				imageCallback(this.id, this.value);
			})});
				
			', array('block' => 'script'));
					
		return $this->wrapWithDiv($fieldName, 'cmsImage', $html);
	}
	
	/**
	 * Gets the value of a field in the active model
	 * 
	 * Only works if:
	 * 
	 *	* Model data is available in `$this->request->data`
	 *	* `$CmsFormHelper->create()` was called with a model name passed
	 *	  or model name is passed in `$fieldName` eg.  model.field
	 */
	public function getFieldVal($fieldName) {
		// debug($this->_modelScope);
		if (strpos($fieldName, '.')) {			// if fieldname contains a dot, use that as the model
			$fieldName = explode('.', $fieldName);
			return @$this->request->data[$fieldName[0]][$fieldName[1]];
		} elseif ($this->_modelScope) {
			return @$this->request->data[$this->_modelScope][$fieldName];
		}
	}
	
	/**
	 * Display a standard text box
	 * DEPRECATED: use ->input() instead
	 */ 
	public function textbox($caption, $fieldName, $value = null, $htmlAttribs = array()) {
		$inputClass = @$htmlAttribs['inputClass'];
		unset($htmlAttribs['inputClass']);
		$field = $this->text($fieldName, array(
			// 'type' => 'text',
			'label' => $caption,
			'class' => $inputClass,
			'div' => $htmlAttribs,
			'value' => $value,
		));
		// 'div' => array('class' => "$this->commonCssClass cmsTextbox " . @$htmlAttribs['class']) + $htmlAttribs,
		return $this->wrapWithDiv($fieldName, 'cmsTextbox ' . @$htmlAttribs['class'], 
			"<label for=\"$fieldName\">$caption</label>$field");
	}
	
	/**
	 * Displays a simple textbox containing a date.  Upon click it displays a nice jQuery date picker widget
	 * 
	 * TODO:	- return date to textbox [done]
	 *			- hide upon off click [done]
	 *			- start on correct date [done]
	 *			- update when textbox is typed [not totally necessary]
	 *			- better CSS
	 */
	public function date($caption, $fieldName, $value = null, $htmlAttribs = array()) {
		// Get current date
		$date = strtotime($this->getFieldVal($fieldName));
		if ($date) $date = date('Y-m-d', $date);					
		// Initialise JS+CSS for date picker plugin
		$this->_initDatePicker();
		// The following HTML + JS is displayed for each datepicker on the form
		$html = $this->text($fieldName, array('value' => $date, 'onfocus' => "showDatePicker(this)"))
			  . $this->_createDatePicker($this->domId($fieldName), $date);
		return $this->wrapWithDiv($fieldName, "cmsDate", "<label for=\"$fieldName\">$caption</label>$html");
	}
	
	/**
	 * Displays a simple textbox containing a date.  Upon click it displays a nice jQuery date picker widget
	 * Does NOT wrap with div.  Call CmsForm->input('field', array('type' => 'date2')) to wrap in input div
	 * Can pass various options to the jQuery plugin using $opts (see http://jqueryui.com/demos/datepicker/ )
	 */ 
	public function date2($field, $opts = array()) {
		// Setup JQ plugin options
		// Other options that can be passed can be found on:
		// http://jqueryui.com/demos/datepicker/
		$opts = Set::normalize(Set::merge(array(
			'dateFormat' => 'yy-mm-dd',
			// 'minDate' => -2,		// 2 days in past
			// 'maxDate' => 30,		// 30 days in future
			'firstDay' => 1,		// Monday
			'showAnim' => 'fade',
		), $opts));
		// debug($opts);
		
		// Get current date
		$date = strtotime($this->getFieldVal($field));
		if ($date) {
			$date = date('Y-m-d', $date);
		} elseif (isset($opts['default'])) {
			$date = date('Y-m-d', strtotime($opts['default']));
		}
		unset($opts['default']);
		
		$this->Html->script('/CORE/jq/jquery.ui.datepicker.1.8.20.min.js', array('block' => 'script'));
		$this->Html->css($this->Minify->path('/CORE/jq/ui-themes/flick/jquery-ui-1.8.20.custom.css'), null, array('block' => 'script'));
		
		// Support for adding required="required"
		$textboxOptions = array('value' => $date);
		if (array_key_exists('required', $opts)) {
			$textboxOptions['required'] = 'required';
			unset($opts['required']);
		}
		$opts = json_encode($opts);
		
		return $this->text($field, $textboxOptions) . '
			<span>(yyyy-mm-dd)</span>
			<script type="text/javascript">
				jQuery(function($){
					$("#' . $this->domId($field) . '").datepicker(' . $opts . ');
				});
			</script>
		';
	}
	
	private function _initDatePicker() {
		
		// The scripts/CSS below are included in the page header *only once* regardless of how many calendar pickers are used on the site
		$this->Html->css('/CORE/jq/calendarPicker/jquery.calendarPicker.css', null, array('block' => 'script')) .
		$this->Html->script('/CORE/jq/calendarPicker/jquery.calendarPicker.js', array('block' => 'script')) .
		$this->Html->scriptBlock('
		
			//---- Calendar picker setup (in CmsFormHelper.php) -----
			// This calendar picker plugin has a nice UI, but unfortunately works only on a DIV, 
			// and does not automatically tie to a text/hidden field, so we will do some of that 
			// functionality below.
			
				calendarPickerDefaults = {
					days: 9,
					months: 3,
					
					// Function for when a new date is clicked
					// Create a date string in the format MySQL prefers, then set the field value to this
					callback: function(value) {
						var d = value.currentDate,
							months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
							formattedDate = d.getFullYear() + "-" + pad(d.getMonth()+1) + "-" + pad(d.getDate());
						jQuery("#" + this.fieldId).val(formattedDate);
					},
					callbackDelay: 10	// for some strange reason the plugin runs this callback on a delay... wtf?
				};
				
				// Called when text field is clicked on
				function showDatePicker(textfield) {
					var $ = jQuery,
						id = textfield.id
						pickerDiv = $("#" + id + "Picker")	// the pickerDiv bases its ID on the ID of the textfield
						$textfield = $(textfield);
						
					
					if (pickerDiv.is(":visible")) return;
					
					pickerDiv	// apply some CSS tweaks for our form
						// .css("margin-left", $(textfield).width() + 20)
						// .css("margin-top", "-30px")
						.slideDown(180);
					
					// Close picker when user clicks somewhere else on the screen
					$(document).on("mousedown.datePicker", function(event) {
						// if field or picker was clicked, do nothing
						if (event.target == textfield								// clicked on date field
							|| $(event.target).closest(".datepicker").length) {		// clicked somewhere on date picker
								return
						}
						
						// otherwise, hide datepicker and cancel event
						$(".datepicker").slideUp(300);
						$(document).off("mousedown.datePicker");
					})
				}
				
				function pad(string) {	// pad string with leading zeros
					string = string.toString();
					if (string.length == 1) return "0" + string;
					return string;
				}
					
		', array('block' => 'script'));

	}
	
	private function _createDatePicker($fieldDomId, $initialDate = null, $pickerStyle = '') {
		if (!$initialDate) $initialDate = date('Y-m-d');	// date picker defaults to today if missing or invalid		
		return '
			<div id="'.$fieldDomId.'Picker" class="datepicker" style="width: 550px; display: none; '.$pickerStyle.'"></div>
			<script type="text/javascript">					
					var options = jQuery.extend({}, calendarPickerDefaults);  // clone options object, leave original intact 
					jQuery.extend(options, {
						date: new Date("' . $initialDate . '"),
						fieldId: "' . $fieldDomId . '"
					});
					jQuery("#' . $fieldDomId . 'Picker").calendarPicker(options);
		   </script>
		';
	}
	
	/**
	 * dateRange function - Displays two date fields, side-by-side
	 * 
	 * Uses old-style Core v1 functions, needs updating
	 */ 
	public function dateRange($caption, $fieldStart, $fieldEnd, $value = null, $htmlAttribs = array()) {
		$this->_initDatePicker();
		$field1 = $this->text($fieldStart, array('value' => $value, 'onfocus' => "showDatePicker(this)"));
		$field2 = $this->text($fieldEnd, array('value' => $value, 'onfocus' => "showDatePicker(this)"));
		$script = $this->_createDatePicker($this->domId($fieldStart), $this->getFieldVal($fieldStart)) 
				. $this->_createDatePicker($this->domId($fieldEnd),   $this->getFieldVal($fieldEnd));
		return $this->wrapWithDiv($fieldStart, "cmsDateRange", 
			"<label for=\"$fieldStart\">$caption</label> $field1 to $field2 $script");
	}
	
	/**
	 * timeRange function - Displays two textfields, side-by-side
	 * 
	 * Uses old-style Core v1 functions, needs updating.
	 * Also could use a nice time-selector widget instead of plain text boxes
	 */ 
	public function timeRange($caption, $fieldStart, $fieldEnd, $value = null, $htmlAttribs = array()) {
		$field1 = $this->text($fieldStart, array('value' => $value));
		$field2 = $this->text($fieldEnd, array('value' => $value));
		return $this->wrapWithDiv($fieldStart, "cmsTimeRange", 
			"<label for=\"$fieldStart\">$caption</label> $field1 to $field2");
	}
	
	/**
	 * Display a standard textarea
	 * 
	 * DEPRECATED: use `->input('fieldname', array('type' => 'textarea'))` instead
	 * 
	 * Renamed to old so that it does not clash with input() function
	 */ 
	public function textareaOld($caption, $fieldName, $value = null, $htmlAttribs = array()) {
		$field = parent::textarea($fieldName, array('value' => $value));
		return $this->wrapWithDiv($fieldName, "cmsTextarea", "<label for=\"$fieldName\">$caption</label>$field");
	}
	
	/**
	 * Display a text field, with rich editing provided by TinyMCE WYSIWYG editor
	 */ 
	public function wysiwyg($caption, $fieldName, $value = null, $htmlAttribs = array(), $tinyMceConfig = 'default') {
		// Store the ID of the field so we can attach the TinyMce code at the end
		$domId = $this->domId($fieldName);		// domId() translates Model.field_name to modelFieldName
		$this->wysiwygFields[$tinyMceConfig][] = $domId;
		
		$field = parent::textarea($fieldName, array('value' => $value, 'rows' => 8));
		$html = "<label for=\"$fieldName\">$caption</label>$field";
		if ($tinyMceConfig == 'default')
			$html .= "<a href=\"#\" class=\"wysiwygSwitch\" onclick=\"toggleEditor('$domId', $(this));return false\">Switch to HTML</a>";
		return $this->wrapWithDiv($fieldName, 'cmsTextarea', $html);
	}
	
	/**
	 * Display a text field, with rich editing provided by TinyMCE WYSIWYG editor
	 * 
	 * Nearly identical to wysiwyg() function except that this supports validation messages
	 * As such, should be called using `CmsFormHelper->input('fieldname', array('type' => 'wysiwyg2'))`
	 */ 
	public function wysiwyg2($fieldName, $options) {
		// Store the ID of the field so we can attach the TinyMce code at the end
		$domId = $this->domId($fieldName);		// domId() translates Model.field_name to modelFieldName
		$tinyMceConfig = isset($options['tinyMceConfig']) ? $options['tinyMceConfig'] : 'default';
		$this->wysiwygFields[$tinyMceConfig][] = $domId;
		
		$html = parent::textarea($fieldName, array('rows' => 8));
		
		// Add a "Switch to HTML" link for default config only
		if ($tinyMceConfig == 'default')
			$html .= "<a href=\"#\" class=\"wysiwygSwitch\" onclick=\"toggleEditor('$domId', $(this));return false\">Switch to HTML</a>";
		return $html;
	}
	
	/**
	 * Alters the display of radio buttons to be easier to apply CSS
	 * (Works exactly like `type => radio`, but with a different tag structure) 
	 * 
	 * Use with `CmsForm->input('fieldname', array('type' => 'radios'))`
	 *
	 * Note that `CmsForm->input()` also has a few customisations for the `radios` type (adjusting the label)
	 */ 
	public function radios($fieldname, $options) {
		$html = $this->input($fieldname, array(
				'type' => 'radio', 
				'div' => false, 
				'legend' => false,
				'options' => @$options['options']
		));
		// Shift the label tags so that they wrap around the <input> tag and label text
		// (easier to style that way, so that radio buttons can be aligned vertically if needed)
		$html = preg_replace('%(<input type="radio".+?/>)(<label[^>]+>)%', '\\2\\1', $html);
		return $html;
	}
	
	/**
	 * DEPRECATED, just use ->input(fieldname, array('type' => 'select')) instead as this does more magic :-)
	 */
	public function selectBox($caption, $fieldName, $options, $selectedOption = null, $otherOptions = array()) {
		trigger_error('This CmsForm function is deprecated.  Use input(\'x\', array(\'type\' => \'select\')) instead.');
		$field = $this->select($fieldName, $options, array('value' => $selectedOption) + $otherOptions);
		$domId = $this->domId($fieldName);
		return $this->wrapWithDiv($domId, 'cmsSelect', "<label for=\"$domId\">$caption</label> $field");
	}
	
	/**
	 * Displays two <select> boxes side-by-side, with the same values in each
	 * 
	 * Useful for filtering based on a price-range, for example
	 */ 
	public function selectRange($fieldname, $options = array()) {
		if (isset($options['options'])) {
			$optionList = $options['options'];
			unset($options['options']);
		} else {
			// Get list of <option> tags from view var (just like input() function does)
			$varName = Inflector::variable(
				Inflector::pluralize(preg_replace('/_id$/', '', $fieldname))
			);
			$optionList = $this->_View->getVar($varName);
		}
		return 
			$this->select($fieldname.'_low', $optionList, $options) 
			. ' <span class="to">to</span> ' 
			. $this->select($fieldname.'_high', $optionList, $options);
	}
	
	/**
	 * Display a textarea, limit the number of characters and display number of characters remaining
	 * 
	 * Usage: `$this->CmsForm->input('fieldname', array('type' => 'textareaMaxLength', 'maxlength' => 300, 'height' => 5)`
	 * 
	 * Note: does NOT work if you specify "rows" or "cols" in $options (due to Cake's FormHelper code)
	 * Instead, use "height"
	 */ 
	public function textareaMaxLength($fieldName, $options) {
		if (isset($options['height'])) {
			$options['rows'] = $options['height']; 
			unset($options['height']);
		}
		
		$html = $this->textarea($fieldName, $options);
	
		if (!isset($this->textareaMaxLength_scriptIncluded))
			$this->Html->scriptBlock('
		
			jQuery(function($) {
				// Get all textareas that have a "maxlength" property.
				$("textarea[maxlength]").each(function() {
					// Store the jQuery object to be more efficient...
					var $textarea = $(this);

					// Store the maxlength and value of the field
					var maxlength = $textarea.attr("maxlength");

					// Add a DIV to display remaining characters to user
					$textarea.after($("<div>").addClass("charsRemaining"));
					
					// Bind the trimming behavior to the "keyup" & "blur" events (to handle mouse-based paste)
					$textarea.on("keyup blur", function(event) {
						// Replace line returns to get an accurate count
						var val = $textarea.val().replace(/\r|\n/g, "\r\n").slice(0, maxlength);
						$textarea.val(val);
						$textarea.next(".charsRemaining").html(maxlength - val.length + " characters remaining");
					}).trigger("blur");

				});
			});
		
		', array('block' => 'script'));
		$this->textareaMaxLength_scriptIncluded = true;
		return $html;
	}
	
	/**
	 * Displays two select boxes, the first one filters/updates the second
	 * @param $field1 - 
	 * @param $field2 - 
	 * @param $findArray - array returned from find() query where one model contains another in a hierarchy
	 * @param $paths - array of xmlpaths to retrieve data from
	 * 					[0][value]
	 * 					[0][text]
	 * 					[1][value]
	 * 					[1][text]
	 * @param $input1Opts - options array to send to FormHelper->input() function
	 * @param $input2Opts - options array to send to FormHelper->input() function
	 */ 
	public function doubleSelect($field1, $field2, $findArray, $paths, $input1Opts = null, $input2Opts = null) {

		//...this was begun but not completed...
		// can probably use code from EzyAviation project which implemented
		// this quite well

		// create arrays for <option> tags
		// debug(Set::extract($findArray, $paths[1]['value']));
		
		// $output = $this->input($field1, array('options' => '') + $input1Opts);
		// $output .= $this->input($field1, array('options' => '') + $input2Opts);
	}
	
	/**
	 * Display a <select> box with a "manage" link that pops up a modal dialog allowing the user
	 * to add/edit the options.
	 * 
	 * For the "manage" dialog to work, it requires that you set up a controller for the 
	 * content type ($modelToManage) that extends AdminAjaxController (an empty class body is fine)
	 * 
	 * ### Controller Example:	
	 * 
	 *	App::import('Controller', 'AdminAjax');
	 *	class TeamsController extends AdminAjaxController {}
	 * .
	 * 
	 */
	public function selectAndManage($caption, $fieldName, $options, $modelToManage, $controller = null, $htmlAttribs = array()) {
		if (!$controller) 
			$controller = Inflector::pluralize($modelToManage);
		$domId = $this->domId($fieldName);		// domId() translates Model.field_name to modelFieldName
		$field = $this->select($fieldName, $options, Hash::merge(array('class' => 'wysiwyg'), $htmlAttribs));
		return $this->wrapWithDiv($fieldName, 'cmsSelect', 
				"<label for=\"$fieldName\">$caption</label> $field"
				. $this->_View->element('cmsForm/select_and_manage', array(
					'model' => $modelToManage,
					'controllerPath' => $this->Html->url(array('controller' => $controller)),
					'selectBoxId' => $domId,
				)));
	}
	
	/**
	 * MULTI-CHOOSER
	 * 
	 * Useful for many-to-many relationships
	 * 
	 * Display a dynamic list with a drop-down (with an optional pre-filter drop-down) that adds multiple items
	 * to the list.  The GUI updates a hidden field which is submitted to the backend.
	 * 
	 * {{{
	 * $exampleSettings = array(
	 *	'filterBy' => null,
	 *	'primaryField' => 'name',
	 *	'secondaryField' => null
	 * );
	 * }}}
	 *
	 * @param string $caption
	 * @param array $modelList A typical Cake find('all') array of items to be shown in the list
	 * @param array $selectedItems
	 * @param array $settings
	 * @return HTML code (including script) to make the widget function
	 */	
	public function multiChooser($caption, $modelList, $selectedItems = null, $settings = array()) {
		
		// debug($modelList);
		if (!is_array($modelList)) {
			trigger_error('The CmsForm->multiChooser() function requires an array for $modelList');
			return;
		}

		list($model) = array_keys($modelList[0]);
		
		// Settings defaults
		$settings += array(
			'filterBy' => null,
			'primaryField' => 'name',
			'secondaryField' => null
		);
		
		// Create DIV & caption
		$html = "
				<label>$caption</label>"
				// . "<h4>$caption</h4>"
				. '<div class="cmsMultiChooser">
					<div class="selectArea">';
		
		if (is_null($selectedItems)) {
			// Try to discover selected items automagically from request->data
			if (@is_array($this->request->data[$model]))
				$selectedItems = $this->request->data[$model];
			else 
				$selectedItems = array();
		}
		
		// debug($selectedItems);
		
		// Filter drop-down
		// $this->select('', [opt], array('empty' => true, 'class' => 'filterDropdown');
		
		// debug($model);
		// debug($modelList);
		// debug("{n}.$model.$settings[primaryField]");
		// debug(Set::combine($modelList, "{n}.$model.id", "{n}.$model.$settings[primaryField]")); 
		
		// Selection drop-down
		// - The model ID goes in the option value
		// - The primary field is shown in the list box
		// - The secondary field is stored in data-secondary attribute for referencing later
		$html .= '<select class="selector"><option class="empty"></option>';
		foreach ($modelList as $m) {
			$m = $m[$model];
			// debug($m);
			@$html .= "<option value=\"$m[id]\" data-secondary=\"{$m[$settings['secondaryField']]}\">{$m[$settings['primaryField']]}</option>";
		}
		$html .= '</select>';
		
		// Add Button
		$html .= '<input type="button" class="addButton" value="Add to List"/></div>';
		
		// Table headings
		$html .= "<table>
			<tr>
				<th>" . ucwords($settings['primaryField']) . "</th>";
		if($settings['secondaryField']!==null)		
			$html .= "<th>" . Inflector::humanize(Inflector::underscore($settings['secondaryField'])) . "</th>";
		$html .= "
				<th></th>
			</tr>";
		// Table rows with remove button
		foreach ($selectedItems as $m) {
			// $m = $m[$model];
			@$html .= "
				<tr rel=\"$m[id]\">
					<td>{$m[$settings['primaryField']]}</td>";
			if($settings['secondaryField']!==null)		
				@$html .="<td>{$m[$settings['secondaryField']]}</td>";
			@$html .="<td><input type=\"button\" class=\"removeButton\" value=\"remove\"/></td>
				</tr>";
		}
		
		$html .= '
			</table>
		</div>';
		
		// Include javascript in header (giving it a name prevents duplication)
		// TODO: This will NOT support multiple multi-choosers in a single form currently, as $model is embedded in script
		//		 (should instead be passed as function parameters to JS)
		$this->Html->scriptBlock("		
				jQuery(document).ready(function($) {
				
					// when 'add' button is clicked
					$('.cmsMultiChooser .addButton').click(function() {
						
						var chooser = $(this).closest('.cmsMultiChooser');
						
						// get ID of selected item (ignore if nothing is selected)
						var id = chooser.find('.selector').val();
						if (!id) return;
						
						var selectedOption = chooser.find('.selector option:selected'),
							primary = selectedOption.html(),
							secondary = selectedOption.attr('data-secondary'),
							button = '<input type=\"button\" class=\"removeButton\" value=\"remove\"/>';
							
						// create new table row with appropriate data
						var table = chooser.find('table')
						
						if (table.find('[rel=\"'+id+'\"]').length == 0)
							table.append(
								'<tr rel=\"' + id + '\">' +
								'	<td>' + primary + '</td>' +".
						(($settings['secondaryField']!==null)?		
								"'	<td>' + secondary +'</td>'":"").
								"'	<td>' + button +'</td>' +
								'</tr>');
							
						// update hidden field(s)
						updateHiddenFields()
					})
					
					// when remove button is clicked
					$('.cmsMultiChooser table').on('click', '.removeButton', function() {
						$(this).closest('tr').remove();
						updateHiddenFields()
					})
					
					// Checks which table rows are present, and adds these items as hidden fields
					// so that Cake can save them to the database
					function updateHiddenFields() {
						$('.cmsMultiChooser').each(function() {
							var chooser = $(this),
								rows = chooser.find('tr[rel]');
							chooser.find('input[type=hidden]').remove();
							if (rows.length) {
								// Loop thru each table row and add it as a hidden field
								rows.each(function() {
									$('<input>')
										.attr('type', 'hidden')
										.attr('name', 'data[$model][$model][]')
										.val($(this).attr('rel'))
										.appendTo(chooser)
								});
							} else {
								// If there are no rows, create an empty hidden field so Cake knows to 
								// delete the rows from the DB
								$('<input>')
									.attr('type', 'hidden')
									.attr('name', 'data[$model][$model]')
									.val('')
									.appendTo(chooser)
							}
						});
					}
					updateHiddenFields();		// run function on pageload so hidden fields are correctly initialised					
					
				});
		", array('block' => 'script'));
		
		return $this->wrapWithDiv(Inflector::camelize($caption), 'cmsMultiChooserWrapper', $html);
	}
	
	/**
	 * MULTI-CHOOSER #2 (tweaks/improvements for SBMS)
	 * 
	 * (works like the original multi-chooser, but has "add all", "clear all" and a remove icon instead of button)
	 * 
	 * Useful for many-to-many relationships
	 * 
	 * Display a dynamic list with a drop-down (with an optional pre-filter drop-down) that adds multiple items
	 * to the list.  The GUI updates a hidden field which is submitted to the backend.
	 * 
	 * @param $caption
	 * @param $modelList - a typical Cake find('all') array of items to be shown in the list
	 * @param $selectedItems - array of items to show initially as selected
	 * @param $settings = array(
			'filterBy' => null,
			'primaryField' => 'name',
			'secondaryField' => null
		);
	 * @return HTML code (including script) to make the widget function
	 */	
	public function multiChooser2($caption, $modelList, $selectedItems = null, $settings = array()) {
		
		// debug($modelList);
		list($model) = array_keys($modelList[0]);
		
		// Settings defaults
		$settings += array(
			'filterBy' => null,
			'primaryField' => 'name',
			'secondaryField' => null
		);
		
		// Create DIV & caption
		$html = "
				<label>$caption</label>"
				// . "<h4>$caption</h4>"
				. '<div class="cmsMultiChooser">
					<div class="selectArea">';
		
		if (is_null($selectedItems)) {
			// Try to discover selected items automagically from request->data
			if (@is_array($this->request->data[$model]))
				$selectedItems = $this->request->data[$model];
			else 
				$selectedItems = array();
		}
		
		// debug($selectedItems);
		
		// Filter drop-down
		// $this->select('', [opt], array('empty' => true, 'class' => 'filterDropdown');
		
		// debug($model);
		// debug($modelList);
		// debug("{n}.$model.$settings[primaryField]");
		// debug(Set::combine($modelList, "{n}.$model.id", "{n}.$model.$settings[primaryField]")); 
		
		// Selection drop-down
		// - The model ID goes in the option value
		// - The primary field is shown in the list box
		// - The secondary field is stored in data-secondary attribute for referencing later
		$html .= '<select class="selector"><option class="empty"></option>';
		foreach ($modelList as $m) {
			$m = $m[$model];
			// debug($m);
			@$html .= "<option value=\"$m[id]\" data-secondary=\"{$m[$settings['secondaryField']]}\">{$m[$settings['primaryField']]}</option>";
		}
		$html .= '</select>';
		
		// Add Button
		$html .= '
			<input type="button" class="addButton" value="Add to List"/>
			<input type="button" class="addAllButton" value="Add All"/>
			<input type="button" class="clearButton" value="Clear All"/>
			</div>		
		';
		
		// Table headings
		$html .= "<div class=\"items\">";
		
		// Table rows with remove button
		foreach ($selectedItems as $m) {
			// $m = $m[$model];
			@$html .= "
				<div class=\"item\" rel=\"$m[id]\">
					{$m[$settings['primaryField']]}
					<img src=\"/img/cross.png\" class=\"removeButton\" />
				</div>";
		}
		
		$html .= '
			</div>
		</div>';
		
		// Include javascript in header (giving it a name prevents duplication)
		// TODO: This will NOT support multiple multi-choosers in a single form currently, as $model is embedded in script
		//		 (should instead be passed as function parameters to JS)
		$this->Html->scriptBlock("		
				jQuery(document).ready(function($) {				
					
					// when 'add' button is clicked
					$('.cmsMultiChooser .addButton').click(function() {						
						var chooser = $(this).closest('.cmsMultiChooser');
						
						// get ID of selected item (ignore if nothing is selected)
						var id = chooser.find('.selector').val();
						if (!id) return;
						
						// create new table row with appropriate data
						var selectedOption = chooser.find('.selector option:selected');
						addOptionToList(selectedOption, chooser);						
						
						// update hidden field(s)
						updateHiddenFields();
					});
					
					// when 'add all' button is clicked
					$('.cmsMultiChooser .addAllButton').click(function() {						
						if (!confirm('Are you sure you want to add ALL the mentors to the list?')) return;
						var chooser = $(this).closest('.cmsMultiChooser');
						
						// clear list
						chooser.find('.item').remove();
						
						// create new table row with appropriate data
						var opts = chooser.find('.selector option[value]');
						for (var i = opts.length - 1; i >= 0; i--) {
							addOptionToList(opts.eq(i), chooser);
						}
						
						// update hidden field(s)
						updateHiddenFields()
					});
					
					$('.cmsMultiChooser .clearButton').click(function() {
						if (!confirm('Are you sure you want to REMOVE ALL mentors from the list?')) return;
						var table = $(this).closest('.cmsMultiChooser').find('.item').remove();
						updateHiddenFields();
					});			
					
					function addOptionToList(option, chooser) {
						var	primary = option.html(),
							secondary = option.attr('data-secondary'),
							button = '<img src=\"/img/cross.png\" class=\"removeButton\" />';
						
						// If item isn't already in list...
						if (chooser.find('.item[rel=\"' + option.val() + '\"]').length == 0)
							chooser.find('.items').prepend(
								'<div class=\"item\" rel=\"' + option.val() + '\">'
								 + primary
								 + button
								 + '</div>');
					}
					
					// when remove button is clicked
					$('.cmsMultiChooser .items').on('click', '.removeButton', function() {
						$(this).closest('.item').remove();
						updateHiddenFields();
					})
					
					// Checks which table rows are present, and adds these items as hidden fields
					// so that Cake can save them to the database
					// (also disables select <options> if they are present in table)
					function updateHiddenFields() {
						$('.cmsMultiChooser').each(function() {
							var chooser = $(this),
								items = chooser.find('.item');
							chooser.find('input[type=hidden]').remove();
							chooser.find('.selector option[disabled]').removeAttr('disabled');
							if (items.length) {
								// Loop thru each table row and add it as a hidden field
								items.each(function() {
									$('<input>')
										.attr('type', 'hidden')
										.attr('name', 'data[$model][$model][]')
										.val($(this).attr('rel'))
										.appendTo(chooser);
									// Also disable option in selector
									chooser.find('.selector option[value=' + $(this).attr('rel') + ']')
										.attr('disabled', 'disabled');
								});
							} else {
								// If there are no rows, create an empty hidden field so Cake knows to 
								// delete the rows from the DB
								$('<input>')
									.attr('type', 'hidden')
									.attr('name', 'data[$model][$model]')
									.val('')
									.appendTo(chooser)
							}
						});
					}
					
					updateHiddenFields();		// run function on pageload so hidden fields are correctly initialised					
					
				});
				
		", array('block' => 'script'));
		
		return $this->wrapWithDiv(Inflector::camelize($caption), 'cmsMultiChooserWrapper', $html);
	}
	
	/**
	 * Displays the UI for uploading a file
	 * As this could be used on a public form, no uploads should be trusted (could be malicious)
	 * 
	 * EXAMPLE HANDLING OF IMAGE IN CONTROLLER:
	  
		$this->Advertiser->create($this->request->data);
		if ($this->request->isPost() && $this->Advertiser->validates()) {
		
			// Logo has already been uploaded through the PublicUploadController
			// We simply need to move the file out of the temp folder into the permanent one
			// Correctly handle logo upload... (field contains filename only, no folder)
			// Keep in mind: all paths in Cake are always relative to /app/webroot
			// This should be called BEFORE saving, as it will probably update the filename and/or path
			$this->_handleUpload($this->request->data['Advertiser']['logo']);

			if ($this->Advertiser->save()) {
				... do other stuff here ...
			}
		}
	 * 
	 * @param $label - <label> or caption to be used on the form (displayed to user)
	 * @param $field - DB field name
	 * @param $uploadUrl - path to controller that will handle the upload
	 * 		(by default this should be /public_upload or /public_upload/index/folder-name-here )
	 * @param $helpText - Other instructive text about the upload, such as file size/type limitations 	 
	 */
	// On POST, filename + URL path is sent to server using a hidden field
	// TODO: Display upload complete status when form is prepopulated with data
	function upload($label, $field, $uploadUrl = '', $helpText = '') {
		return $this->_View->element('cmsForm/file_upload', compact('label', 'field', 'uploadUrl', 'helpText'));
	}
	
	/**
	 * Displays the UI for uploading a file
	 * As this could be used on a public form, no uploads should be trusted (could be malicious)
	 * On POST, filename + URL path is sent to server using a hidden field
	 * (See example above for usage)
	 * 
	 * @param $label - <label> or caption to be used on the form (displayed to user)
	 * @param $field - DB field name
	 * @param $uploadUrl - path to controller that will handle the upload
	 * 		(by default this should be /public_upload/image/folder-name-here )
	 * @param $previewPath - path under webroot to load the image from after uploading
	 * 		(by default this should be /uploads/temp/folder-name-here/ )
	 * 		this is usually also the path prepended to the filename when returned via AJAX
	 * @param $helpText - Other instructive text about the upload, such as file size/type limitations
	 */
	function uploadImage($label, $field, $uploadUrl = '', $previewPath = '', $helpText = '') {
		$type = 'image';
		return $this->_View->element('cmsForm/file_upload', compact('label', 'field', 'uploadUrl', 'helpText', 'type'));
	}
	
	/**
	 * Just displays a value (no form field used)
	 * But helpful to wrap value in same tag structure as the rest of the form for layout purposes
	 */	 
	public function textValue($fieldname, $options = array()) {
		$options = $this->_initInputField($fieldname, Hash::merge($options, array('secure' => false)));
		// debug($options);
		return $this->Html->div(
			null, 																// class
			$options['value'], 													// text
			Hash::merge(array('id' => $options['id']), @$options['innerDiv'])	// other options
		);
	}
	
	/**
	 * Displays the UI for uploading documents and viewing its revisions
	 * 
	 * ### Default options:  
	 * 
	 * 	'ModelNameDoc'           => 'Document',
	 * 	'ModelNameUploader'      => 'Uploader',        // alias of the model in the foreign key relationship
	 * 	'ColumnVersionNotes'     => 'version_notes',   // in doc table
	 * 	'ColumnFilename'         => 'filename',        // in doc table
	 * 	'ColumnUploaderUsername' => 'username',        // in users table
	 * 	'ColumnUploadDate'       => 'upload_date',     // in doc table
	 * 	'UrlUpload'              => $this->Html->url(array('action' => 'upload')),
	 * 	'UrlSave'                => $this->Html->url(array('action' => 'saveRevision')),
	 * 	'CurrentRevisions'       => @$this->request->data['DocumentRevision']
	 * 
	 * These are set `Elements/cmsForm/file_revisions.ctp`
	 */
	function fileRevisions($label, $optionsArray = array()) {
		return $this->wrapWithDiv('file_revisions', '',
					"<label>$label</label>" 
					. $this->_View->element('cmsForm/file_revisions', $optionsArray));
	}
	
	/**
	 * AfterRender callback (run after view has rendered, but before layout)
	 * 
	 * Attaches WYSIWYG initialisation code to the end of the view, if required
	 */ 
	public function afterRender($viewFile) {
		$fields = $this->wysiwygFields;
		
		// If [hidden] is the only item in the array, we need to create a hidden textarea so that all 
		// the TinyMCE libraries are correctly loaded (to allow KCFinder to run).  If there are other
		// textareas, this is not necessary.
		if (count($fields) == 1 && @$fields['hidden']) {
			$this->_View->output .= '<textarea id="hiddenTinyMceTextarea" style="display:none"></textarea>'
								 .  $this->TinyMce->init('hiddenTinyMceTextarea', 'simple');
			
		} elseif (count($fields)) {
			unset($fields['hidden']);
			foreach ($fields as $configName => $fieldList) {
				$this->_View->output .= $this->TinyMce->init(implode(',', $fieldList), $configName);
			}
		}
	}
}




