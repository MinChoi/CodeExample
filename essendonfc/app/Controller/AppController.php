<?php
/**
 * This controller is the base class for all other controllers in the website
 * It extends CmsCore controller which provides helpful 'automagic' methods and most of the admin-area functionality
 * If the functionality you require differs from what is in CmsCore, you can
 * create the functions here and they will be used instead.  You can also call
 */
App::uses('Controller', 'Controller');
class AppController extends Controller {

	// Place any helpers here that are needed in layouts, or across ALL views
	// (remembering that error pages use only the helpers here, not those in a controller)
	public $helpers = array('Session');
	var $components = array('Gzip');
	
	/*
	// If the current URL begins with any of these strings, user will be redirected to HTTPS
	protected $secureUrls = array(
		'/admin',
		'/clientArea',
		'/staff',
		'/frontend_login',
	);
	*/
	
	/**
	 * Cake callback that runs before all controller actions (although NOT on Cake Error pages)
	 */ 	 
	public function beforeFilter() {
		// For AFL sites we display the membership count in the layout, split into two span tags for nicer styling
		$count = Setting()->read('MemberCount');
		if ($count)
			parent::set('memberCount', array(substr($count, 0, -3), substr($count, -3)));
			
		// See if an alternate view exists
		if (file_exists('themes/' . Configure::read('Core.Theme') . '/views/' . $this->viewPath . '/' . $this->action . '.ctp'))  
			$this->viewPath = '../webroot/themes/' . Configure::read('Label.theme') . '/views/' . $this->viewPath; 
		
		
			
	}
	
	/**
	 * Callback that runs *after* all controller actions but *before* views
	 * 
	 * Note: try to avoid doing DB calls in this func as the Cake error handler actually
	 * 		 calls this when rendering errors, and if there's a DB issue you get an infinite loop.
	 * 		 (Use beforeFilter() instead, which does NOT get called by error handler)
	 */ 
	public function beforeRender() {
	}

}
