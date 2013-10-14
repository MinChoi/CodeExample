<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	
	Router::redirect('/promo', '/advantage-promotion.html', array('status' => 302));
	
	// Send anything ending in .html to Pages::Display
	Router::connect('/:shortname.html', array('controller' => 'pages', 'action' => 'display'), array('pass' => array('shortname')));
	
	//Router::connect('/:section/:subsection', array('controller' => 'pages', 'action' => 'subdisplay',array('pass' => array('section','subsection'))));
	Router::connect('/people/view/:id', array('controller' => 'people', 'action' => 'view'), array('pass' => array('id')));
	Router::connect('/people/:category/*', array('controller' => 'people', 'action' => 'listView'), array('pass' => array('category')));
	Router::connect('/staff/people/view/:id', array('controller' => 'people', 'action' => 'view', 'prefix' => 'staff'), array('pass' => array('id')));
	Router::connect('/staff/people/:category/*', array('controller' => 'people', 'action' => 'category', 'prefix' => 'staff'), array('pass' => array('category')));
	
	/* Event Router */
	Router::connect('/events-details/:category/:title/:eventid', array('controller' => 'events', 'action' => 'view'),array('pass' => array('title','category','eventid')));
	Router::connect('/member-event-register', array('controller' => 'event_registrations','action' =>'member_event_register'));
	Router::connect('/non-member-event-register', array('controller' => 'event_registrations','action' =>'non_member_event_register'));	
	Router::connect('/login-rsvp', array('controller' => 'event_registrations','action' =>'login_rsvp'));
	Router::connect('/rsvp-forgotpassword', array('controller' => 'event_registrations','action' =>'rsvp_forgotpassword'));

	//Router::connect('/Upcoming_Events/*', array('controller' => 'events', 'action' => 'index'));
	Router::connect('/EventsCat/*', array('controller' => 'events', 'action' => 'bycategory'));
	Router::connect('/news/:id/:slug', array('controller' => 'news', 'action' => 'view'), array('id' => '[0-9]+', 'pass' => array('id')));
	Router::connect('/events/:id/:slug', array('controller' => 'events', 'action' => 'view'), array('id' => '[0-9]+', 'pass' => array('id')));
	// Router::connect('/NewsCat/*', array('controller' => 'news', 'action' => 'bycategory'));
	// Router::connect('/News/:category/:title/:newsid', array('controller' => 'news', 'action' => 'view'),array('pass' => array('title','category','newsid')));
	// Router::connect('/Upcoming_News/*', array('controller' => 'news', 'action' => 'index'));
	// Router::connect('/site-search/*', array('controller' => 'tags', 'action' => 'search'));
 	
 	////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////// AFL spcific
	////////////////////////////////////////////////////////////////////////////////////
	Router::connect('/2013-packages', array('controller' => 'package_categories', 'action' => 'index'));
	Router::connect('/help-me-choose', array('controller' => 'packages', 'action' => 'help_me_choose'));
	Router::connect('/compare-packages', array('controller' => 'packages', 'action' => 'comparison'));
	Router::connect('/membership-renew', array('controller' => 'packages', 'action' => 'membership_renew'));
	////////////////////////////////////////////////////////////////////////////////////
	
 
 	// Frontend Member Area
	Router::connect('/member-login', array('controller' => 'members', 'action' => 'login'));
	Router::connect('/member-logout', array('controller' => 'members', 'action' => 'logout'));
	Router::connect('/member-area', array('controller' => 'members', 'action' => 'logout'));
	Router::connect('/memberarea-news', array('controller' => 'news', 'action' => 'mnews'));
	Router::connect('/MemberNewsDetails/:title/:newsid', array('controller' => 'news', 'action' => 'mnews_view'),array('pass' => array('title','newsid')));
	Router::connect('/memberarea-editacc', array('controller' => 'members', 'action' => 'edit'));	
	Router::connect('/memberarea-mod', array('controller' => 'organisations', 'action' => 'edit'));	
	Router::connect('/memberarea-polls', array('controller' => 'polls', 'action' => 'cpoll'));
	Router::connect('/memberarea-av', array('controller' => 'media', 'action' => 'audiovideo'));
	Router::connect('/keycontact-save', array('controller' => 'members', 'action' => 'set_key_contact'));
	Router::connect('/memberarea-moa', array('controller' => 'members', 'action' => 'memberlist'));
	Router::connect('/memberdel/*', array('controller' => 'members', 'action' => 'member_delete'));
	Router::connect('/memberarea-regevents', array('controller' => 'event_registrations', 'action' => 'regevents'));
	Router::connect('/memberarea-changepwd', array('controller' => 'members', 'action' => 'change_password'));
	
	Router::connect('/memberarea-renewal', array('controller' => 'members', 'action' => 'renewal'));	
	Router::connect('/memberarea-reactivate', array('controller' => 'members', 'action' => 'reactivate'));


 
 
	/********* Admin Menus *********/

	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
    Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	//Router::connect('/admin', array('controller' => 'pages', 'action' => 'index','admin'=>true));
    Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
	Router::connect('/admin-login', array('controller' => 'users', 'action' => 'login','admin'=>true)); 
	// Router::connect('/admin-pages/*', array('controller' => 'pages', 'action' => 'index','admin'=>true));
	Router::connect('/admin/homepage', array('controller' => 'pages', 'action' => 'homepage','admin'=>true));
	// Router::connect('/admin-groups', array('controller' => 'groups', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-acl', array('controller' => 'groups', 'action' => 'aclreset','admin'=>true));
	
	/********* Audio Video *********/
	// Router::connect('/admin-video-audio/*', array('controller' => 'media', 'action' => 'index','admin'=>true));
	
	/********* Report *********/
	// Router::connect('/admin-memeventreport/*', array('controller' => 'reports', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-reports/*', array('controller' => 'reports', 'action' => 'index','admin'=>true));
	
	/********* Media *********/
	// Router::connect('/admin-media/*', array('controller' => 'pages', 'action' => 'filemanager','admin'=>true));
	// Router::connect('/admin-managefile/*', array('controller' => 'pages', 'action' => 'filemanager','admin'=>true));
	// Router::connect('/admin-users/*', array('controller' => 'users', 'action' => 'index','admin'=>true));
	
	/********* Mentors / Clients *********/
	//Router::connect('/admin-organisations/*', array('controller' => 'organisations', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-people/*', array('controller' => 'mentors', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-mentors/*', array('controller' => 'mentors', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-clients/*', array('controller' => 'clients', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-bookings/*', array('controller' => 'bookings', 'action' => 'index','admin'=>true));
	
	// Router::connect('/admin-member-tiers', array('controller' => 'member_tiers', 'action' => 'index','admin'=>true));
	
	
	/********* Main Admin Menus *********/
	Router::connect('/admin-sitemap/*', array('controller' => 'sitemaps', 'action' => 'draw', 'admin'=>true));
	// Router::connect('/admin-dashboard', array('controller' => 'pages', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-reports', array('controller' => 'dashboards', 'action' => 'index','admin'=>true));
	Router::connect('/admin-logout', array('controller' => 'users', 'action' => 'logout','admin'=>true));
	
	/***** SETTING MENU START*****/
	
	// Router::connect('/admin-settings', array('controller' => 'setting_types', 'action' => 'general','admin'=>true));
	// Router::connect('/admin-sitemap-settings', array('controller' => 'sitemaps', 'action' => 'settings', 'admin' => true));
	// Router::connect('/admin-general-settings', array('controller' => 'setting_types', 'action' => 'general','admin'=>true));
	// Router::connect('/admin-members-settings', array('controller' => 'dashboards', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-templates-settings', array('controller' => 'setting_types', 'action' => 'templates','admin'=>true));
	// Router::connect('/admin-payments-settings', array('controller' => 'setting_types', 'action' => 'payments','admin'=>true));
	// Router::connect('/admin-notifications-settings', array('controller' => 'setting_types', 'action' => 'notifications','admin'=>true));
	// Router::connect('/admin-media-settings', array('controller' => 'setting_types', 'action' => 'media','admin'=>true));
	// Router::connect('/admin-seo-settings', array('controller' => 'setting_types', 'action' => 'seo','admin'=>true));
	// Router::connect('/admin-widgets-settings', array('controller' => 'dashboards', 'action' => 'index','admin'=>true));
	// Router::connect('/admin-administrators-settings', array('controller' => 'users', 'action' => 'index', 'admin'=>true));
	// Router::connect('/admin-contmem', array('controller' => 'dashboards', 'action' => 'index','admin'=>true));
	/***** SETTING MENU END*****/
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

   // Make sure CakePHP parses CSV file requests correctly
   Router::parseExtensions('csv'); 

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
