<?php
/**
 * CmsCoreController
 * This file is the base controller for most of the other controllers.
 * Functions should be placed here if they are relevant to 80%+ of controllers
 * across most of our client websites.
 */ 
class CmsCoreController extends AppController {

	public $theme_admin = '/CORE/admin_theme/';
	public $paginate;
	
	/**
	 * Constructor
	 * We add our list of components (and helpers if needed) in the constructor, rather than as 
	 * class variables so that they are MERGED with (rather than overwrite) those in 
	 * AppController + the child controller
	 */ 
	public function __construct($request = NULL, $response = NULL) {
		
		$this->components = Set::merge(
			array(
				'Session',
				'Auth', 
				// 'MemberContext',
				'Security',
				// 'Acl',
				'RequestHandler',
				'DebugKit.Toolbar'
			),
			$this->components
		);
	
		parent::__construct($request, $response);
	}
	
	/**
	 * Function to encode ALL HTML entities of ALL vars sent to a template.  This has 3 benefits:
	 * 	- This improves security (prevents XSS and HTML injection) 
	 *	- Reduces bugs when CMS users input strange characters (<corner brackets> and other special entities)
	 *	- Allows strings to easily be inserted into HTML attributes (links, images) without extra encoding (devs often forget this)
	 *
	 * Use setSafe() to bypass this function
	 * By Simon East, for Surface CMS
	 * 
	 * @param $variableName - name of view variable 
	 * @param $value - any kind of PHP var to send to template. Strings & arrays will be HTML encoded.
	 */ 
	function set($variableName, $value = null) {
		if (!is_object($value))
			parent::set(h($variableName), h($value));		// h() is Cake's version of htmlspecialchars() that works on arrays
			// the reason we encode the variablename also is to cover the situation when multiple vars are passed in as an array
		else
			parent::set($variableName, $value);
	}
	
	/** Provide access to normal $this->set function inside controllers */
	function setSafe($variableName, $value) {
		parent::set($variableName, $value);
	}	
	
	function pageTitle($title) {
		$this->set('title_for_layout', str_replace('%TITLE%', $title, Configure::read('Core.DefaultPageTitle')));
	}
	
	/** Called BEFORE every controller action */
    function beforeFilter() {
		parent::beforeFilter();
		$this->checkPermissions();
		$this->setPageTitleAndMetaTags();
		// debug($this->Session->read());
		//$this->set('styleBox',  $this->StyleBox);
    	$this->set('theme_admin' , $this->theme_admin);
		$this->set('browser_class', $this->get_browser_class());
		
		// Provide <body id=""> to the layout based on controller & action (for CSS styling)
		$this->set('bodyId', $this->params->params['controller'] . '_' . $this->params->params['action']);
		
		$this->Security->blackHoleCallback = '__securityError';
		$this->_mergeUses(array('uses' => array('Setting')));		// add 'Setting' model to $uses array
		
		// Add model name into variable
		$this->set('model', $this->modelClass);
		if ($this->params['prefix'] == 'admin') $this->helpers[] = 'StyleBox';
        // if ($this->RequestHandler->isAjax())
            // $this->layout = 'ajax';			
			
		// If debugging is enabled (and we're not using some other non-standard view class), 
		// wrap elements in HTML comments to make them easier for devs to identify
		// See /CmsCore/View/WrapWithCommentsView.php
		if (Configure::read('debug') > 0 && $this->viewClass == 'View')
			$this->viewClass = 'WrapWithComments';
	}
		
	/** -------- AUTHENTICATION & SECURITY ----------------------------------------------------------------------
	 * 
	 *  This basically works by:
	 *		- for various Cake controllers, checking whether they have the correct user-type based on the 
	 *		  routing prefix being accessed (see code below)
	 *		- for pages, by checking the permissions set for that page
	 *
	 *  Admin login code is in `UsersController->admin_login();`
	 *
	 *  Frontend user login code is in `FrontendLoginController->login();`
	 * 
	 * ----------------------------------------------------------------------------------------------------------
	 */ 
	function checkPermissions() {
		//---- Main Security Check: do they have permissions based on the prefix they are accessing ----
		// Set the user types that are available under "Permissions" in the back-end
		$GLOBALS['CMS_USER_TYPES'] = array('staff', 'everyone', 'client');
		$userType = $this->Auth->user('Type');
		$prefix = @$this->params['prefix'];				// determine the routing prefix for the current request
		$this->setSafe('routing_prefix', $prefix);		// provide var for views to use when/if needed
		
		// Anyone is allowed to /admin URL, all other URLs beginning in /admin are blocked unless user type matches
		if ($prefix == 'admin' 		&& $this->here != '/admin' && $userType != 'admin') $this->redirectToLogin(true);
		if ($prefix == 'staff' 		&& $userType != 'staff'    && $userType != 'admin') $this->redirectToLogin();
		if ($prefix == 'clientArea' && $userType != 'client'   && $userType != 'admin') $this->redirectToLogin();
		
		$this->Auth->allow('*');		// allow any page to be accessible without logging in (because we've coded our own security)
		if ($prefix == 'admin') {
			$this->layout = 'admin';
			$this->Auth->autoRedirect = false;
			$this->Auth->loginAction = '/admin';
			$this->Auth->logoutRedirect = '/admin';
			$this->Auth->loginRedirect = '/admin/sitemaps/draw';
		}
    }
	
	function redirectToLogin($adminArea = false) {
		$this->Session->write('post-login-url', $this->here);
		if ($adminArea)
			$this->redirect('/admin');
		else
			$this->redirect('/');
	}

	//--------- end of auth code --------------------------------------------------------------------------------------
	
	
	/**
	 * Sets various variables used in the page layout:
	 * title_for_layout, banner_title, MetaK, MetaD
	 */ 
	function setPageTitleAndMetaTags() {
		$currentUrl = $this->here;
		$urlParts = explode('/', $currentUrl);
		$this->loadModel('Page');
		$this->Page->contain('Meta', 'ParentPage', 'Widget');
		$page = $this->Page->findByLink($currentUrl, array(
			'id', 					// load as few fields as possible to improve performance of this function
			'name', 
			'Meta.page_title', 
			'Meta.meta_key',
			'Meta.meta_desc',
			'ParentPage.name', 
			'ParentPage.link',
			// 'Widget.path',
		));
		// debug($page);

		// For <title> tag, use Meta-data title or page name
		$this->set('title_for_layout', 
			$page['Meta']['page_title'] 
			? $page['Meta']['page_title'] 
			: (
				$page['Page']['name']
				? str_replace('%TITLE%', $page['Page']['name'], Configure::read('Core.DefaultPageTitle'))
				// If we can't find any page name in DB, use the URL params
				: str_replace('%TITLE%', Inflector::humanize(@array_pop($urlParts)), Configure::read('Core.DefaultPageTitle'))
			)
		);
		// For Page <h1> use parent page name (or page name if top-level & no parent exists)
		$this->set('banner_title', $page['ParentPage']['name'] ? $page['ParentPage']['name'] : $page['Page']['name']);
		$this->set('banner_link',  $page['ParentPage']['link'] ? $page['ParentPage']['link'] : '');
		$this->set('MetaK', $page['Meta']['meta_key']);
		$this->set('MetaD', $page['Meta']['meta_desc']);
		$this->setSafe('widgets', $page['Widget']);
	}	

	//---------------------------------------------------------------------------------------------------------------
	//---------------------- Standard ADMIN Actions that apply to most CMS objects/controllers ----------------------
	// These can all be overridden (completely or partially) in the specific controllers by redefining the function
	
	/**
	 * Display an admin-area-style list of items with support for:
	 * filtering, sorting, searching and paging
	 */ 
	function admin_index() {
		$model = $this->modelClass;
		$conditions = array();
		
		//------------- DROP-DOWN FILTERS -----------------------------------
		// sends list of filters to view
		$this->setSafe('filterBar', $this->$model->getAdminFilters());
		
		// sends currently selected filters (from session) to view
		$filters = $this->Session->read("AdminList.$model.filters");
		$this->request->data['filters'] = $filters;				// allows formhelper to find currently selected values
		
		// Convert filters array to properly structured array
		if ($filters)
			$conditions = $this->$model->filtersToConditions($filters);
		// debug($conditions);
		
		//------------- KEYWORD SEARCH -----------------------------------
		// runs search (once only, if found in request->data, not stored in session)
		// The fields that the search looks through are set in MODEL->adminKeywordSearchFields
		$searchTerm = @$_GET['search'];
		if ($searchTerm) {
			// Question: should we ignore filters if search is present? Currently YES
			$conditions = array();
			foreach ($this->$model->adminKeywordSearchFields as $field) 
				$conditions['OR'][$field . ' LIKE'] = "%$searchTerm%";
			$this->request->data['search'] = $searchTerm;
			// disable pagination on search for now (cos it's more difficult to do), default to 200
			$this->paginate['limit'] = 200;	
		
		//------------- PAGINATION ---------------------------------------
		// (we don't do pagination for keyword searches, cos it's not working at the moment)
		} else {	
			// Set pagination limit from session var (or 100 by default)
			$this->paginate['limit'] = $this->Session->read("AdminList.limit")
									 ? $this->Session->read("AdminList.limit")
									 : 100;
									 // if changing default, also change default in Elements/admin/modules/paging.ctp
		}
		
		//------------- SORTING ---------------------------------------
		// To reduce ugly PdoExceptions, we append the model name to each sort field (if it isn't already)
		$sort = $this->Session->read("AdminList.$model.sort");
		$this->request->data['sort'] = $sort;	// send to view
		if ($sort) {
			$sort = preg_split('/\\s*,\\s*/', $sort);
			foreach ($sort as &$s)
				if (strpos($s, '.') === false) 
					$s = "$model.$s";
			$this->paginate['order'] = implode(',', $sort);
		}
		
		// Run query to generate our list
		try {
			$this->set('items', $this->paginate($conditions));
			
		// Occasionally our complicated filters produce SQL errors, lets handle this gently
		} catch (PdoException $e) {
			debug('Form Data = ');
			debug($this->data);
			debug('Conditions = ');
			debug($conditions);
			debug('Exception Data = ');
			debug($e);
			$this->helpers[] = 'Paginator';
			$this->set('items', array());
			$this->Session->setFlash("<span title=\"{$e->errorInfo[2]}\">Oops, there was a problem with the 
				filter/sort you selected and we couldn't retrieve the results.  
				Change your options or click \"Clear Filters\" above.</span>");
		}
	}
	
	/**
	 * To help with debugging
	 * http://madg.local/admin/pages/clear_list_vars
	 */ 
	function admin_clear_list_vars() {
		$this->autoRender = false;
		$this->Session->delete('AdminList');
		return 'Done';
	}
	
	/**
	 * Receives data from filter <selects> via POST, stores filter data in session, redirects back to index
	 */ 
	public function admin_filter() {
		$model = $this->modelClass;
		$filters = Set::filter($this->request->data);		// set::filter gets rid of empty array elements
		// debug($filters);
		
		// Save pagination limit to session
		if (@$filters['AdminListLimit'])
			$this->Session->write("AdminList.limit", @$filters['AdminListLimit']);
		$this->Session->write("AdminList.$model.filters", @$filters['filters']);
		$this->Session->write("AdminList.$model.sort", @$filters['sort']);
		
		// Send user back to index, which will pass these filters to the find() function
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * AJAX Function
	 * 
	 * Updates multiple records for a controller's default model
	 * 
	 * All the AJAX functions (see below) can be passed one or more comma-separated IDs
	 * (either in the URL, or via POST variable 'text' - should standardise this at some point!)
	 * 
	 * eg. `$this->_multiupdate($IDs, array('published' => 1));`
	 *
	 * @param $IDs - comma separated string of row IDs to update (or `null` to use 'text' POST variable)
	 * @param $arrayOfFields - associative array with fields to update
	 * @return null
	 */ 
	private function _multiupdate($IDs, $arrayOfFields) {
		$this->autoRender = false;		// no view
		if (!$IDs) $IDs = @$this->request->data['text']; 
		if (!$IDs) return;
		$model = $this->modelClass;		// find the model to use (will vary from controller to controller)
		$this->$model->updateAll($arrayOfFields, array($model . '.id' => explode(',', $IDs)));
	}		
	function admin_publish($IDs = null) 	{ $this->_multiupdate($IDs, array('published' => 1));	}
	function admin_unpublish($IDs = null) 	{ $this->_multiupdate($IDs, array('published' => 0));	}
	function admin_show($IDs = null) 		{ $this->_multiupdate($IDs, array('showatmenu' => 1));	}
	function admin_hide($IDs = null) 		{ $this->_multiupdate($IDs, array('showatmenu' => 0));	}
	
	/**
	 * Ajax function, returns nothing
	 * IDs POST'ed in a comma separated list (`$this->request->data['ids']`)
	 */ 
	function admin_deleteMany() {		
		$this->autoRender = false;		// no view
		$ids = $this->request->data['ids'];
		if (!$ids) return false;
		$model = $this->modelClass;		// find the model to use (will vary from controller to controller)
		$this->$model->recursive = -1;
		$this->$model->deleteAll(array("$model.id" => explode(',', $ids)), false);	// false = do not cascade deletions
	}	
	
	/**
	 * Displays the form for adding a new item, also handles form submission
	 * 
	 * As 95% of the logic is shared with `admin_edit()` it calls that function and passes `null`.
	 * It also defaults to using the `admin_edit` template.
	 * 
	 * Can be easily overridden/extended in a child controller
	 */
	function admin_add() {
		// Exactly the same logic & view as the "edit" form
		$this->view = 'admin_edit';
		$this->admin_edit(null);		
		$model = $this->modelClass;
		if (!$this->request->data) $this->request->data = $this->$model->create();	
	}
	
	/**
	 * Copies/Duplicates the database row specified by $id
	 * 
	 * Specific rules for how item duplications should be handled can be tweaked here
	 *  (perhaps by overriding this function within controllers)
	 * 
	 * @return integer - the inserted ID (designed for AJAX)
	 */ 
	function admin_copy($id) {
		$this->autoRender = false;
		$modelName = $this->modelClass;
		$model = $this->$modelName;
		$model->id = $id;
		$model->recursive = -1;
		$record = $model->read();
		
		// add 'copy' at the title/name of the record
		// TODO: Now, only available when the record has NAME or TITLE in the table
		if(isset($record[$modelName]['name']))
			$record[$modelName]['name'] = $record[$modelName]['name'].' - copy';
		else if(isset($record[$modelName]['title']))
			$record[$modelName]['title'] = $record[$modelName]['title'].' - copy';
		
		if(isset($record[$modelName]['menu_name']))
			$record[$modelName]['menu_name'] = '';
		
		if(isset($record[$modelName]['published']))
			$record[$modelName]['published'] = 0;
					
		unset($record[$modelName]['id']);
		$model->create();
		// skip callbacks and validation to prevent Page model from auto-generating a link (and clashing with existing link)
		if (isset($record[$modelName]['link'])) $record[$modelName]['link'] = '';
		$model->save($record, array('callbacks' => false, 'validate' => false));
		return $model->getInsertID();
	}
	
	/**
	 * Clears any filters from session, send user back to index
	 * 
	 * @param $isAjax boolean - if true, returns nothing; if false, redirects user back to index() 
	 */ 
	function admin_clearfilters($isAjax = false) {
		$this->Session->delete('AdminList.' . $this->modelClass . '.filters');
		$this->Session->delete('AdminList.' . $this->modelClass . '.sort');
		$this->Session->delete($this->modelClass . '.filter');	// for old controllers still setting this manually
		if ($isAjax)
			$this->autoRender = false;
		else
			$this->redirect(array('action' => 'index'));
	}	

	// Save num-per-page value to session and send user back to index
	// This is now done through admin_filter() function
	/* function admin_setpaging() {
		$this->Session->write('AdminList.limit', $this->request->data['AdminListLimit']);
		if (@$_GET['url'])
			$this->redirect($_GET['url']);
		else	
			$this->redirect(array('action' => 'index'));
	} */
	
	/**
	 * Displays the edit form for a model. Also handles form validation and saving to DB.
	 * 
	 * Sends user back to index() if save was successful, otherwise user stays on form
	 * so that validation messages can be displayed.
	 * 
	 * To add additional functionality in a specific controller, you should override this method
	 * but still call it.  Example:
	 * 
	 * 		    function admin_edit($id = null) {
	 *				$this->set('attendees', $this->Event->EventRegistration->findAllByEventId($id));
	 *				parent::admin_edit($id);
	 *			}
	 *
	 * @param $id - ID of the row to edit
	 */ 
	function admin_edit($id) {		
		$model = $this->modelClass;
		$this->helpers[] = 'CmsForm';
		$this->layout = 'admin_form';
		if (!$this->request->isGet()) {
			// if we're doing an add or update: save/update the db
			if ($this->$model->saveAssociated($this->request->data)) {
				// Validation completed successfully.  User is returned to the form.
				$this->Session->setFlash("The $model has been updated");	
				// $this->Person->id = $this->request->data['Person']['id'];
				// $this->request->data = $this->Person->read();
				// $redirect = '/admin/person/edit/' . $this->Person->id;
				$this->redirect(array('action' => 'index'));
			} else {					
				// Validation failed
				$this->Session->setFlash('The information could not be saved. Please, try again.');
				$this->set('errors', $this->$model->invalidFields());
			}
		}
		// Load the model and send it to the template
		if ($id) $this->request->data = Set::merge($this->$model->findById($id), $this->request->data);
	}
	
	/**
	 * Displays a preview of an item (without saving to the DB) using the data
	 * POSTed from an add/edit form.
	 * 
	 * Can be overridden in child controllers to add additional functionality.
	 * The most common need for doing this is to send additional related models
	 * to the template.  A helper function is available for this.  Example:
	 * 
	 * 		$this->_sendAdditionalModelToTemplate('person', 'PracticeArea');
	 * 
	 * Usually opened in a new window so that form is kept intact.
	 * 
	 * Data from POST is sent into the "view" template 
	 * (or another template if specified)
	 * 
	 * Also does a `$this->set('isAdminPreview', true)` so that templates can handle
	 * special cases when previewing.
	 * 
	 * @param int $id ID of the item (if being edited), 0 if an unsaved item
	 * @param string $viewVarName the name of the variable sent to the view (defaults to the model name, lowercase)
	 * @param string $view name of the view template to use (defaults to 'view')
	 * @param string $layout name of the layout to use (defaults to 'default')
	 */ 
	function admin_preview($id = 0, $viewVarName = '', $view = 'view', $layout = 'default') {
		// Use frontend layout and view
		$this->layout = $layout;
		$this->view = $view;
		
		// debug($this->modelClass);
		
		// If no view var is given, attempt to use lowercase model name by convention
		if (!$viewVarName) {
			$viewVarName = $this->modelClass;
			$viewVarName{0} = strtolower($viewVarName{0});	// change first character to lowercase
		}

		// Load page from DB if an existing item
		$model = $this->modelClass;
		if ($id) {
			$page = $this->{$model}->recursive = 2;
			$page = $this->{$model}->findById($id);
		} else {
			$page = $this->{$model}->create();
		}
		// debug($page);		
		// debug($this->request->data);
		
		// Overwrite with latest data from POST
		$page = Set::merge($page, $this->request->data);
		unset($page['Tag']['Tag']);		// fixes warning in tags helper		
		
		$this->set($viewVarName, $page);
		// $this->set('preview_url', $page['Page']['link']);
		// $this->set('parentids', $this->Page->getParents($page['Page']['id']));

		// For <title> tag, use Meta-data title or page name
		$this->set('title_for_layout', 
			$page['Meta']['page_title'] 
			? $page['Meta']['page_title'] 
			: str_replace('%TITLE%', $page['Page']['name'], Configure::read('Core.DefaultPageTitle'))
		);
		
		// For Page <h1> use parent page name (or page name if top-level & no parent exists)
		$this->set('banner_title', Inflector::humanize(Inflector::underscore($this->name)));
		$this->set('isAdminPreview', true);
		// $this->set('MetaK', $page['Meta']['meta_key']);
		// $this->set('MetaD', $page['Meta']['meta_desc']);
		
	}
	
	/**
	 * Called in admin_preview() function(s) in various controllers
	 * Used when this->request->data contains a single model, but related model data also needs retrieving
	 *
	 * 		e.g.  $this->_sendAdditionalModelToTemplate('person', 'PracticeArea');
	 * 
	 * Will set $person['PracticeArea'] in template just as if it had been returned from Person->find()
	 * 
	 * @param $viewVar - main variable containing the preview POST data sent to the view
	 * @param $modelToGet - the name of the model to query
	 * 
	 * After calling, $viewVar[Model] will be correctly populated with associated records
	 */ 
	protected function _sendAdditionalModelToTemplate($viewVar, $modelToGet) {
		$this->loadModel($modelToGet);
		$list = $this->{$modelToGet}->find('all', array(
			'conditions' => array("$modelToGet.id" => $this->request->data[$modelToGet][$modelToGet]),
			'contain' => array(),
		));
		// flip array from n.model to model.n
		$this->viewVars[$viewVar][$modelToGet] = Set::extract("{n}.$modelToGet", $list);	
	}
	
	//--------------------- end of common admin functions -----------------------------
	
	
	/**
	 * Check URL for whether it requires SSL, and redirect to it if so.
	 * 
	 * CONFIGURATION:
	 * 
	 * 		List the URL prefixes that require SSL, here in AppController.php:
	 * 			protected $secureUrls = array(
	 *				'/admin',
	 *				'/bookings/newbooking',
	 *			);
	 *
	 * 		In core.php, set the secure URL:
	 * 			Configure::write('SecureURL', 'http://www.sbms.org.au');
	 * 
	 * Yes, the security component can do this, but I (Simon) like this way better as you
	 * can set it for entire routing prefixes, controllers, or single URLs.
	 * It also disables redirection on localhost & staging to assist with testing
	 * 
	 * WARNING: Redirects will lose POST data. We could possibly check for that here.
	 */ 
	protected function _sslCheck() {
		
		if ( // Skip redirection on certain conditions:
			$this->request->is('ssl')										// user already on SSL, yay, do nothing
			|| isStaging()													// disable on staging
			|| isLocalDev() && !Configure::read('Enable Localhost SSL')		// disable on dev unless specifically enabled
		) return;
		
		// Loop through each secure URL in array. If current URL starts with the string, force redirect.
		foreach ($this->secureUrls as $urlPrefix) {
			if (strpos($this->here, $urlPrefix) === 0) {
				$domainToUse = Configure::read('SecureURL');
				if (!$domainToUse || env('SERVER_ADDR') == '127.0.0.1')
					$domainToUse = 'https://' . env('SERVER_NAME');
				header('X-redirecting-from-function: _sslCheck()');
				$this->redirect($domainToUse . $this->here);
				return;
			}
		}
	}	
	
	
	/**
	 * Function to make the handling of file-uploads from CmsFormHelper a one-liner within the "save" action.
	 * Before this function is called, the file should have been AJAX-uploaded into /uploads/temp/
	 * 
	 * This function should be called before Model->save() and does 4 basic things:
	 * 		- checks that the URL is a valid file
	 * 		- moves file out of "temp" folder		/uploads/temp/logos/x.doc --> /uploads/logos/x.doc
	 * 		- renames file to have a unique filename (preventing overwriting of existing files)
	 * 		- sets the passed var (passed by reference) to the new filename (eg. /uploads/something/my_new_name.doc )
	 * 
	 * @param $uploadUrl - /path/under/webroot/filename.doc (starting with a slash, based on webroot)
	 * @param $newFilename - can be a string with the new name (do not include the path), true to create a unique name (default), false to prevent rename
	 * @return - null - instead sets the $uploadUrl to the new value (passed by reference)
	 */
	protected function _handleUpload(&$uploadUrl, $newFilename = true) {
		if (empty($uploadUrl) 
			|| strpos($uploadUrl, '/uploads/') !== 0	// do some security checks to ensure hackers can't rename random stuff
			|| strpos($uploadUrl, '/..') !== false
			|| !is_file(substr($uploadUrl, 1))
		) {
			// Invalid file
			CakeLog::write('debug', "Upload URL $uploadUrl is invalid");
			$uploadUrl = null;
			return;
		}
		$oldPath = substr($uploadUrl, 1);						// remove leading slash
		$newPath = str_replace('/temp/', '/', $oldPath);		// we'll move it out of temp folder
		
		// Create a unique filename based on microtime()
		if ($newFilename === true)
			$newFilename = microtime(true) . '.' . strtolower(pathinfo($oldPath, PATHINFO_EXTENSION));
		
		// If we're renaming the file, create the new full path
		if ($newFilename)
			$newPath = pathinfo($newPath, PATHINFO_DIRNAME) . '/' . $newFilename;
			
		rename($oldPath, $newPath);
		$uploadUrl = '/' . $newPath;
	}
	
	/**
	 * Filters a result array to only those items containing the xPath statement
	 * eg.  
	 * 		$this->_filter($articles, '/Article[id=2]')
	 * 
	 * See here for examples:  http://book.cakephp.org/2.0/en/core-utility-libraries/set.html#Set::matches
	 */ 
	public function _filter(&$modelArray, $xPathToMatch) {
		foreach ($modelArray as $key => $item) {
			if (!Set::matches($xPathToMatch, $item))
				unset($modelArray[$key]);
		}
		return $modelArray;
	}
	
	/** 
	 * Simple function that generates a class name to be added to <body> based on the user's browser 
	 */
	function get_browser_class() {
		$b_string = strtolower($_SERVER['HTTP_USER_AGENT']);
		$check['firefox'] = 'firefox';
		$check['chrome'] = 'chrome';
		$check['msie 7.0'] = 'ie7';
		$check['msie 8.0'] = 'ie8';
		$check['msie 9.0'] = 'ie9';
		foreach ($check as $k => $v) {
			if (strstr($b_string, $k))
				return $v;
		}
	}
	
	/**
	 * Used to return JSON to the browser (usually via AJAX calls).  Simply pass an associative array.
	 * Can be called from any child controller as `$this->returnJson(array(x,y,z))`
	 * 
	 * Sets $this->autoRender to false so that no view is required
	 * 
	 * @param $array - associative array that should be converted to JSON
	 */
	function returnJson($array) {
		$this->RequestHandler->respondAs('json');			// not working on staging server at the moment (prob cos no output buffering?)
		header('Content-Type: application/json');			// using this as a workaround
		$this->autoRender = false;            
		echo json_encode($array);
	}

	/**
	 * Simple helper function for performing very rough unit tests *within* controllers
	 * Prints out whether two values are equal or not
	 * Used as a simple stand-in replacement for phpUnit testing
	 */ 
	private function _assertEquals($val1, $val2) {
		if ($val1 === $val2) {	// perform a *strict* comparison
			echo "<span style=\"color:darkgreen\">Val is CORRECT: $val1 = $val2</span>";
		} else {
			echo "<span style=\"color:red\">*** Val is INCORRECT: $val1 != $val2</span>";
			$bt = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
			echo " - on line " . $bt[1]['line'];
		}
		echo '<br>';
	}	
	
}

