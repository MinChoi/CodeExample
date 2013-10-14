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
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
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
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'users', 'action' => 'login'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	// Client controller
	Router::connect('/clients/view/:client_id', array('controller' => 'clients', 'action' => 'view'));
	Router::connect('/clients/view/:client_id/:project_status/:project_states/*', array('controller' => 'clients', 'action' => 'view'));
	Router::connect('/clients/add', array('controller' => 'clients', 'action' => 'edit'));
	Router::connect('/clients/edit/:client_id', array('controller' => 'clients', 'action' => 'edit'));
	Router::connect('/clients/delete/:client_id', array('controller' => 'clients', 'action' => 'delete'));
	Router::connect('/clients/invite/:client_id', array('controller' => 'clients', 'action' => 'invite'));
	Router::connect('/clients/filter/:client_id', array('controller' => 'clients', 'action' => 'filter'));

	// Project controller
	Router::connect('/clients/:client_id/projects/view/:project_id', array('controller' => 'projects', 'action' => 'view'));
	Router::connect('/clients/:client_id/projects/view/:project_id/:file_type_id', array('controller' => 'projects', 'action' => 'view'));
	Router::connect('/projects/view/:client_id/:project_id/*', array('controller' => 'projects', 'action' => 'view'));

	Router::connect('/clients/:client_id/projects/add', array('controller' => 'projects', 'action' => 'edit'));
	Router::connect('/clients/:client_id/projects/edit/:project_id', array('controller' => 'projects', 'action' => 'edit'));
	Router::connect('/clients/:client_id/projects/delete/:project_id', array('controller' => 'projects', 'action' => 'delete'));
	Router::connect('/clients/:client_id/projects/invite-users/:project_id', array('controller' => 'projects', 'action' => 'invite_users'));

	// File controller
	Router::connect('/clients/:client_id/projects/:project_id/files/add', array('controller' => 'files', 'action' => 'add'));
	Router::connect('/clients/:client_id/projects/:project_id/files/add/:file_type_id', array('controller' => 'files', 'action' => 'add'));
	Router::connect('/clients/:client_id/projects/:project_id/files/view/:file_id', array('controller' => 'files', 'action' => 'view'));
	Router::connect('/clients/:client_id/projects/:project_id/files/delete/:file_id', array('controller' => 'files', 'action' => 'delete'));
	Router::connect('/clients/:client_id/projects/:project_id/files/delete/:file_id/:file_type_id', array('controller' => 'files', 'action' => 'delete'));

	// Notification controller
	Router::connect('/_system-send-email/', array('controller' => 'notifications', 'action' => 'system_send_email'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
