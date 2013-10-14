<?php

// Apply default settings from core (override any of these below)
require dirname(__FILE__) . '/../../CmsCore/core.php';

/**
 * This is the UBER CORE CONFIGURATION FILE.
 * Use it to configure core behavior of Cake.
 * and also define site-wide settings for different Surface CORE features.
 * 
 * Most Cake settings using sensible defaults are set inside /CmsCore/core.php
 * Anything in that file can be overridden by placing statements *after* the require() statement
 * 
 * Settings should be defined using Configure::write() and used using Configure::read()
 * These functions provide nice array handling features using dot-syntax,
 * and also prevent warnings when an item is not defined.
 */

// Default <title> for pages/actions that have not specified one
Configure::write('Core.DefaultPageTitle', 'Membership | %TITLE%');


// title used in Admin Area
Configure::write('Core.AdminAreaTitle', 'Essendon FC | SurfCMS Admin Area');

// ?
Configure::write('Core.SiteTitle', 'Essendon Football Club ');

// Default admin/staff email address to send contact form details and notifications to 
Configure::write('Core.ClientEmail', 'membership@essendonfc.com.au');

// footer placed at the bottom of all outgoing emails
Configure::write('Core.EmailFooter', '<p></p>');

// Fatal PHP errors, PDO exceptions and email errors will get sent to the address below
Configure::write('Core.ErrorNotifications', 'core@surfacedigital.com.au');

Configure::write('Ticketmaster.forget_password', 'https://oss.ticketmaster.com/html/home.htmI?team=essendon');

// The theme folder
Configure::write('Core.Theme', 'essendon2013');

// Send ALL emails to a specific address, for development/testing/debugging
// done via /app/lib/Network/Email/CmsCoreMailTransport.php
if (isLocalDev())	// if we are NOT on production
	Configure::write('Core.AllEmailsTo', 'simon@surfacedigital.com.au');

// You can enable auto-redirection to HTTPS on localhost by setting to true, or specifying your computername here
// Note that it requires additional configuration in httpd.conf
// See steps here:  http://stackoverflow.com/questions/4221874/how-do-i-create-https-for-localhost-apache/7184031#7184031
// Configure::write('Enable Localhost SSL', env('COMPUTERNAME') == 'SIMON-SURF-PC');

// List of modules available from admin-page (right-hand side)
// Key = file location of module, Value = default expand or not (true or false)
Configure::write('Core.EnabledAdminWidgets', array(
	'/admin/modules/page_visibility'=> array('default_visibility'=>true, 'available_in_link'=>true),	
	//'/admin/modules/page_access' => array('default_visibility'=>true, 'available_in_link'=>false),
	//'/admin/modules/tags' => array('default_visibility'=>false, 'available_in_link'=>false),
	'/admin/modules/seo' => array('default_visibility'=>true, 'available_in_link'=>false),
	'/admin/modules/widgets' => array('default_visibility'=>false, 'available_in_link'=>false)
));

//---- Menu Structure for Admin Area -------------------------------
Configure::write('Core.AdminMenuTabs', array(
	'admin-dashboard' => array(
		'url' => '/admin/sitemaps/draw',
		'label' => 'Content',
		'class' => 'first',
		'sub_menu' => array(
			'Site Map' => array(
				'url' => '/admin/sitemaps/draw',
				'sub_menu' => array(
					'Main Menu' => array('url' => '/admin-mainmenu'),
					'Utility Menu' => array('url' => '/admin-utilitymenu'),
					'Footer Menu' => array('url' => '/admin-footermenu'),
				)
			),
			'Homepage' => array('url' => '/admin/homepage'),
			'Pages' => array('url' => '/admin/pages'),
			// 'FAQs' => array('url' => '/admin/faqs'),
			'Package Categories' => array('url' => '/admin/package_categories'),
			'Packages' => array('url' => '/admin/packages'),
			// 'Practice Areas' => array('url' => '/admin/practiceAreas'),
			// 'People' => array('url' => '/admin/people'),
			// 'News' => array('url' => '/admin/news'),
			//'Events' => array('url' => '/admin/events'),
		)
	),
	/*'memberHQ' => array(
		'url' => '/admin/clients',
		'label' => 'Member HQ',
		'class' => '',
		'sub_menu' => array(
			'Clients' => array('url' => '/admin/clients'),
			'Client Users' => array('url' => '/admin/clientUsers'),
			'Documents' => array('url' => '/admin/documents'),
			// 'Friends of Madgwicks' => array('url' => '/admin/friends'),
		)
	), */
	/*'admin-reports' => array(
		'url' => '/admin/reports',
		'label' => 'Reports',
		'class' => '',
		'sub_menu' => array(
			'Reports' => array(
				'url' => '/admin/reports')
		)
	),*/
	'admin-settings' => array(
		'url' => '/admin/sitemaps/settings',
		'label' => 'Global Settings',
		'class' => 'main-nav',
		'sub_menu' => array(
			// 'Notifications' => array('url' => '/admin/setting_types/notifications'),
			'Membership Count' => array('url' => '/admin/setting_types/member_count'),
			//'Extra Content' => array('url' => '/admin/setting_types/extra_content'),
			'SEO' => array('url' => '/admin/setting_types/seo'),
			//'Facebook' => array('url' => '/admin/setting_types/facebook'),
			'Site Map' => array('url' => '/admin/sitemaps/settings'),
			'Admin Users' => array('url' => '/admin/users'),
			/*'Payment' => array('url' => '/admin-payments-settings')		
			/*'General' => array('url' => '/admin-general-settings'),*/
			/*'Members' => array('url' => '/admin-members-settings'),*/
			/* 'Templates' => array('url' => '/admin-templates-settings'), */
			/* 'Media' => array('url' => '/admin-media-settings'), */
			/*'Widgets' => array('url' => '/admin-widgets-settings'),*/
			/*	,'Reset' => array('urls' => array('admin-reset-acl'),	'url' => '/admin-acl')*/
		 )
	)
));

// Routing prefixes specific to this site (defaults to just admin)
Configure::write('Routing.prefixes', array('admin', 'staff', 'friends', 'clientArea'));
	
// Uncomment the line below to override debugging defaults
// (normally debug is 0 unless domain ends with .local, or URL ends with ?CakeDebugOn which sets debug to 2)
// Configure::write('debug', 0);


//---------- You can place global site-wide functions below here.... ---------------------


// Global function to generate a public SEO-friendly URL based on a provided Cake-ORM array
// We can define specific formats for various content types, and then a default format
// If the model name is *not* the first key of the array, it should be provided as the second parameter
function url($itemArray, $model = null) {
	// Find model name (from first key of array)
	if (!$model) {
		list($model) = array_keys($itemArray);
		$itemArray = $itemArray[$model];
	}
	// Specific URL formats based on the type of model
	if ($model == 'Page') {
		return $itemArray['link'];
	} elseif ($model == 'News') {
		return '/news/' . $itemArray['id'] . '/' . Inflector::slug($itemArray['title']);
	} elseif ($model == 'Event') {
		return '/events/' . $itemArray['id'] . '/' . Inflector::slug($itemArray['title']);
	} elseif ($model == 'PracticeArea') {
		return '/practice_areas/view/' . $itemArray['id'] . '/' . Inflector::slug($itemArray['name']);
	} elseif ($model == 'PackageCategory') {
		return '/package_categories/view/' . $itemArray['id'] . '/' . Inflector::slug($itemArray['title']);
	} elseif ($model == 'Package') {
		return '/packages/view/' . $itemArray['id'] . '/' . Inflector::slug($itemArray['title']);
	} else {
		return '/' . Inflector::tableize($model) . '/view/' . $itemArray['id'];
	}
}

// Converts any date or timestamp into "6 Jun 2012" format, customise this on a site-by-site basis
function human_date($date_or_string) {
	$time = strtotime($date_or_string);
	return date('j M Y', $time);
}
