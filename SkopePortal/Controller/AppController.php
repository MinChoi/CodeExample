<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Auth', 'Session');
	public $uses = array('Project');

	const USER_ADMIN = 1;
	const USER_MODERATOR = 2;
	const USER_USER = 3;

	public $_USER = array();
	public $_USER_CLIENTS = array();
	public $_USER_PROJECTS = array();

	public $client_ignore = array(
				'files' => array('search')
			);

	public function beforeFilter() {
		$this->set('USER_ADMIN', self::USER_ADMIN);
		$this->set('USER_MODERATOR', self::USER_MODERATOR);
		$this->set('USER_USER', self::USER_USER);

		$c_ignore = $this->client_ignore;

		if ($this->Session->read('Auth.User')) {
			$user_access = $this->Project->User->find('first', array(
				'conditions' => array('User.id' => $this->Session->read('Auth.User')),
				'contain' => array(
					'Client' => array(
						'fields' => array('id'),
						'conditions' => array('deleted' => 0)
					),
					'Project' => array(
						'fields' => array('id'),
						'conditions' => array('deleted' => 0)
					)
				)
			));

			// Either session finished or user is deleted
			if (empty($user_access)) {
				$this->Session->setFlash('Please login again.');
				$this->Auth->logout();
				$this->redirect('/');
			}
			
			$this->_USER = $user_access['User'];
			$this->_USER_CLIENTS = Set::classicExtract($user_access['Client'], '{n}.id');
			$this->_USER_PROJECTS = Set::classicExtract($user_access['Project'], '{n}.id');

			$this->set('_USER', $this->_USER);
			$this->set('_USER_CLIENTS', $this->_USER_CLIENTS);
			$this->set('_USER_PROJECTS', $this->_USER_PROJECTS);
		}

		// If user controller page, set client_id and execute the rest process
		if ($this->request->params['controller'] == 'users' ||
			$this->request->params['controller'] == 'notifications') {
			return;
		}

		// If either admin or moderator is loged in, do next
		if ($this->_USER['type'] == false 	// if no login information in session
			|| $this->_USER['type'] == self::USER_ADMIN // if user is admin
			|| $this->_USER['type'] == self::USER_MODERATOR // if user is moderator
			|| @in_array($this->request->params['action'], $c_ignore[$this->request->params['controller']]) // in ignore list
			)
			return;

		// If user is loged in and not available client is left, back to login page
		if ($this->_USER_CLIENTS == null) {
			$this->Session->setFlash('No valid client assigned.');
			$this->redirect('/');
		}

		// Check if the project is given and available
		if (isset($this->request->params['project_id'])
		&& !in_array($this->request->params['project_id'], $this->_USER_PROJECTS)) {
			$this->user_redirect();
		}

		// Check if the client is available
		if (!empty($this->request->params['client_id']) &&
		!in_array($this->request->params['client_id'], $this->_USER_CLIENTS)) {
			$this->user_redirect();
		}
	}

	public function user_redirect() {
		if (count($this->_USER_CLIENTS) > 1)
			$this->redirect('/clients');
		else
			$this->redirect('/clients/view/'.$this->_USER_CLIENTS[0]);
	}
}
