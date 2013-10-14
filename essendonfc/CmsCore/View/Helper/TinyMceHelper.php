<?
/**
 * Quick TinyMCE Helper for CakePHP
 */
class TinyMceHelper extends HtmlHelper {
	
    public $helpers = array('Js', 'Html');

    public $defaults = array(
        'theme' => 'advanced',
        'mode' => 'textareas',
		'file_browser_callback' => '\'openKCFinder\'',
        'convert_urls' => false,
    );

	/**
	 * Hacked this function a bit for SBMS project to allow different WYSIWYG profiles:
	 * 	default & simple
	 * @param domId can either be a single ID, or comma-separated string of IDs
	 *  			(comma list is probably more efficient than multiple calls)
	 */
	 
    public function init($domId, $config = 'default') {
        if (file_exists('css/editor.css'))
            $css = '/css/editor.css';
        else
            $css = '/CORE/css/editor.css';
			
		$configs['default'] = '
			plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,media,spellchecker,jwplayer",//,embed
			elements:"' . $domId . '",
			theme:"advanced",
			height:"300",
			theme_advanced_toolbar_location:"top",
			theme_advanced_buttons1 : "bold,|,italic,|,underline,|,strikethrough,|,|,justifyleft,|,justifycenter,|,justifyright,|,justifyfull,|,|,formatselect,|,styleselect,spellchecker",
			theme_advanced_buttons2 : "bullist,|,numlist,|,|,outdent,|,indent,|,|,undo,|,redo,|,|,link,|,unlink,|,anchor,|,image,|,jwplayer,|,cleanup,|,fullscreen",//|,media,|,embed,
			theme_advanced_buttons3 : "tablecontrols",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom", 
			theme_advanced_path: false, 
			theme_advanced_resizing : true, 
			theme_advanced_resize_horizontal : false, 
			theme_advanced_resize_vertical : true, 
			theme_advanced_resizing_use_cookie : true,
			
			// These are the HTML elements that TinyMCE allows in the editor, in addition to those at the URL below:
			// http://www.tinymce.com/wiki.php/Configuration:valid_elements
			// If an element/parameter is typed into the HTML view and is not valid, it is NOT filtered out on save, 
			// only when the editor is next activated (such as when the user comes back to the form later)
			extended_valid_elements : "img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|obj|param|embed|style],input[id|name|placeholder|type|value|class],textarea[id|name|placeholder|type|value|class]",
			
			flash_wmode : "transparent",
			flash_quality : "high",
			flash_menu : "false",
			content_css: "'.$css.'",
			mode: "exact",
			skin: "o2k7",
			skin_variant: "silver",
			width: "100%",
			file_browser_callback: openKCFinder,
		';

		$configs['simple'] = '
			plugins: "spellchecker,inlinepopups",	// inlinepopups needed for KCFinder functionality (even though KCFinder is not usually used on public side, we use this in admin area)
			elements:"'.$domId.'",
			theme:"advanced",
			height:"300",
			theme_advanced_toolbar_location:"top",
			theme_advanced_buttons1 : "bold,italic,|,bullist,numlist,outdent,indent,|,undo,redo,|,link,unlink,|,spellchecker",
			theme_advanced_buttons2 : null,
			theme_advanced_buttons3 : null,
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom", 
			theme_advanced_path : false, 
			theme_advanced_resizing : true, 
			theme_advanced_resize_horizontal : false, 
			theme_advanced_resize_vertical : true, 
			theme_advanced_resizing_use_cookie : true,
			extended_valid_elements : "img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|obj|param|embed|style]",
			flash_wmode : "transparent",
			flash_quality : "high",
			flash_menu : "false",
			content_css: "'.$css.'",
			mode: "exact",
			skin: "o2k7",
			skin_variant: "silver",
			width: "100%",
		';		
		
		$code = '
			// TinyMCE WYSIWYG Editor Init Code (for each WYSIWYG field)
			tinyMCE.init({
				' . $configs[$config] . '
				convert_urls: false,
				
				// Filter tags from pasted text
				// 2nd parameter is list of tag allowed for pasting
				paste_preprocess: function(pl, o) {
					o.content = strip_tags( o.content,"<b><u><li><ul><ol><i><p><br><br />" );
					return false;
				}
			});';
		

		// Place the following scripts in the header (must appear *before* any init() calls)
		// Cake is smart enough to only include these once per page
		$this->script('/CORE/tiny_mce/tiny_mce', array('block' => 'script')); 	// Loads script from /js/tiny_mce/tiny_mce.js
		$this->scriptBlock('
		
			//------ KCFinder Initialisation Code (only needed once per page) -------		
			// Function opens a KCFinder modal dialog box
			// Called from within TinyMce *AND* for standalone fields used to select a file
			function openKCFinder(field_name, url, type, win, callbackFunc) {
				// (url parameter doesnt seem to be used at the moment)
				// TinyMCE calls this func with ("src", "", "image", current window object)
				
				// console.log("opening KC with...", arguments);
				if (!type) type = "file";
				
				if (typeof callbackFunc == "function") 
					// KCFinder calls window.KCFinder.callBack(url) when a file is chosen 
					// We extend this a little to provide the field domId also
					window.KCFinder = {callBack: function(url){
						// console.log(field_name, url);
						callbackFunc(field_name, url);
						window.KCFinder = null;	// remove callback
					}};
				
				if (!win) win = this.window;
				tinyMCE.activeEditor.windowManager.open({
					file: \'/CORE/tiny_mce/plugins/kcfinder-2.51/browse.php?opener=tinymce&type=\' + type,
					title: \'File Manager\',
					width: 700,
					height: 500,
					resizable: "yes",
					inline: true,
					close_previous: "no",
					popup_css: false
					// , callBack: function() {console.log("hello1")}
				}, {
					window: win,
					input: field_name
					// , callBack: function() {console.log("hello")}
				});
				return false;
			}
			
			function toggleEditor(id,txt) {
				if (txt.innerHTML == \'Switch To Html\') {
					txt.update(\'Switch To Editor\');
				} else {
					txt.update(\'Switch To Html\');
				}
				if (!tinyMCE.getInstanceById(id))
					tinyMCE.execCommand(\'mceAddControl\', false, id);
				else
					tinyMCE.execCommand(\'mceRemoveControl\', false, id);
			}

			// Strips HTML and PHP tags from a string 
			// returns 1: "Kevin <b>van</b> <i>Zonneveld</i>"
			// example 2: strip_tags("<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>", "<p>");
			// returns 2: "<p>Kevin van Zonneveld</p>"
			// example 3: strip_tags("<a href="http://kevin.vanzonneveld.net">Kevin van Zonneveld</a>", "<a>");
			// returns 3: "<a href="http://kevin.vanzonneveld.net">Kevin van Zonneveld</a>"
			// example 4: strip_tags("1 < 5 5 > 1");
			// returns 4: "1 < 5 5 > 1"
			function strip_tags (str, allowed_tags) {
			
				var key = "", allowed = false;
				var matches = [];    
				var allowed_array = [];
				var allowed_tag = "";
				var i = 0;
				var k = "";
				var html = ""; 
				var replacer = function (search, replace, str) {
					return str.split(search).join(replace);
				};
				// Build allowes tags associative array
				if (allowed_tags) {
					allowed_array = allowed_tags.match(/([a-zA-Z0-9]+)/gi);
				}
				str += "";
			
				// Match tags
				matches = str.match(/(<\/?[\S][^>]*>)/gi);
				// Go through all HTML tags
				for (key in matches) {
					if (isNaN(key)) {
							// IE7 Hack
						continue;
					}
			
					// Save HTML tag
					html = matches[key].toString();
					// Is tag not in allowed list? Remove from str!
					allowed = false;
			
					// Go through all allowed tags
					for (k in allowed_array) {            // Init
						allowed_tag = allowed_array[k];
						i = -1;
			
						if (i != 0) { i = html.toLowerCase().indexOf("<"+allowed_tag+">");}
						if (i != 0) { i = html.toLowerCase().indexOf("<"+allowed_tag+" ");}
						if (i != 0) { i = html.toLowerCase().indexOf("</"+allowed_tag)   ;}
			
						// Determine
						if (i == 0) {                allowed = true;
							break;
						}
					}
					if (!allowed) {
						str = replacer(html, "", str); // Custom replace. No regexing
					}
				}
				return str;
			}		
		', array('block' => 'script'));
		
		return $this->scriptBlock($code);
    }
	
	/****** KCFinder always needs TinyMCE at the moment, disabling this until a better solution is found ******
	// Use this function if you want to be able to use KCFinder outside of a TinyMCE WYSIWYG box
	// This inserts the javascript necessary to open it (except doesn't seem to load external JS file...?)
	// then just call openKCFinder(dom_id_of_my_field) on click
    function initKCFinder() {
		$code = "
		function openKCFinder(field) {
			tinyMCE.activeEditor.windowManager.open({
				file: '/CORE/tiny_mce/plugins/kcfinder-2.51/browse.php?opener=tinymce&type=files&dir=files/public',
				title: 'KCFinder',
				width: 700,
				height: 500,
				resizable: 'yes',
				inline: true,
				close_previous: 'no',
				popup_css: false
			}, {
				window: this.window,
				input: field
			});
			return false;
		}
		";
		return $this->scriptBlock($code);
    }
	********/

} 
