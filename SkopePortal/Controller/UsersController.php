<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'forgot_password', 'reset_password', 'register');
	}

	public function index() {
		// login page
		$this->render();
	}

	public function login() {		
		if ($this->request->isPost()) {
			$user = $this->User->find('first', array(
				'recursive' => 0,
				'contain' => array('Client' => array('fields' => array('id'))),
				'conditions' => array(
					'User.email' => $this->request->data['User']['email'],
					'User.password' => $this->Auth->password($this->request->data['User']['password'])
				)
			));

			// If no record found
			if (!count($user)) {
				$this->Session->setFlash('The username or password that you entered was incorrect.');
			} else if ($user['User']['status']==0) {
				$this->Session->setFlash('The user is not active.');
			} else if ($user['User']['type'] == self::USER_USER && !$user['Client']) {
				$this->Session->setFlash('No valid client assigned.');
			} else {
				
				if (@$this->request->query['redirect'])
					$redirect = $this->request->query['redirect'];
				else
					$redirect = '/clients/';
				$this->Auth->login($user['User']['id']);
				$this->redirect($redirect);
			}
		}

		// Redirect to homepage if already loged in
		if (!empty($this->_USER)) {
			if ($this->request->query['redirect']) {
				if ($this->_USER['email']!=$this->request->query['uname']) {
					$this->Session->setFlash('Please login again');
					$this->Auth->logout();
					$this->redirect('/?redirect='.urlencode($this->request->query['redirect']).'&uname='
						.urlencode($this->request->query['uname']));
				} 
				$this->redirect($this->request->query['redirect']);
			}
			else
				$this->redirect('/clients/');
		}
	}

	public function logout() {
		$this->Session->setFlash('Goodbye');
		$this->Auth->logout();
		$this->redirect('/');
	}

	public function forgot_password() {
		if ($this->request->isPost()) {
			$user = $this->User->findByEmail($this->request->data['User']['email']);

			// If no record found
			if (!count($user)) {
				$this->Session->setFlash('No user is found');
			} elseif (!$user['User']['status']) {
				$this->Session->setFlash('Inactive member. Please finalise your registration.');
			} else {
				$email = new CakeEmail('default');
				if ($email->from(array(Company::EMAIL => Company::NAME))
					->to($user['User']['email'])
					->viewVars(array('email'=>$user['User']['email'],'key'=>sha1($user['User']['id'] . $user['User']['email'])))
					->subject('Forgot Password')
					->template('forgotPassword')
					->emailFormat('html')
					->send()) {
						$this->Session->setFlash('Please check your email and reset your password.');
						$this->redirect('/');
					}
				else
					$this->Session->setFlash('Please try again');
			}
		}
	}

	public function reset_password($email, $key) {
		// When + is used for testing, + sign is removed. So simple add + for testing purpose
		$email = str_replace(' ', '+', $email);
		$user = $this->User->findByEmail($email);
		$correct_key = sha1(@$user['User']['id'] . @$user['User']['email']);

		// validation if the key is valid one
		if (!$user || $key!=$correct_key)
			$this->redirect('/');

		if ($this->request->isPost()) {
			$this->request->data['User']['id'] =  $user['User']['id'];
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('You password changed');
				$this->redirect('/');
			}
		}
	}

	// TODO: might need registration for admin
	public function register($email = '', $key = '') {
		// When + is used for testing, + sign is removed. So simple add + for testing purpose
		$email = str_replace(' ', '+', $email);
		$user = $this->User->findByEmail($email);

		// Redirect to homepage if already loged in
		if (!empty($this->_USER)) {
			if ($user['User']['id'] == $this->_USER['id']) {
				$this->Session->setFlash('You are already registered to the system.', 'default', array('class' => 'message message-warning'));
			} else {
				$this->Session->setFlash('The link is wrong. Please logout and try again', 'default', array('class' => 'message message-warning'));
			}

			if ($this->_USER['type'] == self::USER_ADMIN // if user is admin
				|| $this->_USER['type'] == self::USER_MODERATOR // if user is moderator
				)
				$this->redirect('/clients/');
			else
				// Check if the client is available
				$this->redirect('/clients/view/'.$this->_USER_CLIENTS[0]);
		}

		$correct_key = sha1(@$user['User']['id'] . @$user['User']['email']);

		// validation if the key is valid one
		if (!$user || $key!=$correct_key)
			$this->redirect('/');

		if ($this->request->isPost()) {
			//$this->request->data['User']['id'] =  $user['User']['id'];
			if ($this->User->saveAll($this->request->data)) {
				$this->User->updateAll(
					array(
						'User.status' => 1 // active status
					),
					array('User.id' => $user['User']['id'])
				);

				$this->Session->setFlash('Password saved. Please login to use the system.');
				$this->redirect('/');
			}
		}
		$this->request->data = $user;
	}

	public function edit() {

		if ($this->request->isPost()) {
			$this->request->data['User']['current_password'] = $this->_USER['password'];
			
			// As the form asks opposit question (for user convenient), make values opposite before save
			$this->request->data['UserDetail']['no_project_notify'] = !$this->request->data['UserDetail']['project_notify'];
			$this->request->data['UserDetail']['no_file_notify'] = !$this->request->data['UserDetail']['file_notify'];

			if ($this->User->saveAll($this->request->data)) {
				if (isset($this->request->data['User']['change_pwd']))
					$this->Session->setFlash('Your password has been changed');
				else
					$this->Session->setFlash('Your details have been changed');
			} else
				$form_submit = true;
		}

		if (isset($this->_USER_CLIENTS[0])) {
			$this->set('client', $this->User->Client->find('first', array(
				'conditions' => array('Client.id'  => $this->_USER_CLIENTS[0]),
				'recursive' => -1
			)));
		}

		$user_access = $this->User->find('first', array(
			'conditions' => array('User.id' => $this->Session->read('Auth.User')),
			'contain' => array('UserDetail'),
		));

		$this->_USER = $user_access['User'];

		if (!@$form_submit || isset($_POST['data']['User']['change_pwd'])) {
			$this->request->data['User'] = $this->_USER;
			$this->request->data['UserDetail'] = $user_access['UserDetail'];

			if (isset($_POST['data']['User']['change_pwd'])) {

				$this->request->data['User']['old_password'] = $_POST['data']['User']['old_password'];
				$this->request->data['User']['password'] = $_POST['data']['User']['password'];
				$this->request->data['User']['password_confirm'] = $_POST['data']['User']['password_confirm'];
			} else {
				$this->request->data['User']['password'] = '';
			}
		}
	}

	public function delete($id = null) {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/view/'.$this->_USER_CLIENTS[0]);

		if ($this->request->isPost()) {
			$user = $this->User->findById($this->request->data['User']['id']);

			$this->User->updateAll(
				array('User.deleted' => 1 ),
				array('User.id' => $user['User']['id'])
			);
			$this->Session->setFlash($user['User']['firstname'] . ' has been deleted.');
		}
		$this->redirect('/users/management');
		exit;		
	}

	public function people() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/view/'.$this->_USER_CLIENTS[0]);
	}

	public function add_moderator() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/index');

		if ($this->request->isPost()) {

			// From client page, only MODERATOR can be invited
			$this->request->data['User']['type'] = self::USER_MODERATOR;
			$this->request->data['User']['status'] = 0;

			if ($this->User->save($this->request->data)) {

				// Email example
				$email = new CakeEmail('default');
				$email->from(array(Company::EMAIL => Company::NAME))
					->to($this->request->data['User']['email'])
					->viewVars(array(
						'email' => $this->request->data['User']['email'],
						'key' => sha1($this->User->getInsertID() . $this->request->data['User']['email']))
					)
					->subject('New Moderator on '.Company::NAME.' Client Portal')
					->template('add_moderator')
					->emailFormat('html')
					->send();

				$this->Session->setFlash($this->request->data['User']['firstname'] . ' has been added.');
				$this->redirect('/users/people/');
			}
		}
	}

	public function add_user() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/index');

		$this->set('clients', $this->User->Client->find('all', 
			array(
				'fields' => array('id', 'name'),
				'order' => 'name',
				'contain' => array('Project' => array('fields' => array('id', 'name')))
			)
		));
		if ($this->request->isPost()) {
			$this->request->data['User']['type'] = self::USER_USER;
	
			$this->User->validate['Client'] = array(
				'min' => array(
					'rule' => 'notEmpty',
					'message' => 'Please select client.'
				)
			);

			// Set appropriate form data
			$this->request->data['Client'] = array_filter($this->request->data['Client']);
			$this->request->data['Project'] = array_filter($this->request->data['Project']);

			if ($this->User->save($this->request->data)) {
				$tmp_id = $this->User->getInsertID();
				$user_detail = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $tmp_id
					),
					'contain' => array('Client' => array('Project' => 
						array('conditions' => array('Project.id IN 
							(SELECT project_id FROM projects_users 
							WHERE user_id='.$tmp_id.')')
						)
					))
				));

				// Email example
				$email = new CakeEmail('default');
				$email->from(array(Company::EMAIL => Company::NAME))
					->to($this->request->data['User']['email'])
					->viewVars(array(
						'user_detail' => $user_detail,
						'key' => sha1($this->User->getInsertID() . $this->request->data['User']['email']))
					)
					->subject('New User on '.Company::NAME.' Client Portal')
					->template('add_user')
					->emailFormat('html')
					->send();

				$this->Session->setFlash($this->request->data['User']['firstname'] . ' has been added.');
				$this->redirect('/users/people/');
			} else {
				if (!empty($this->request->data['User']['Client'])) {
					$this->set('projects', $this->Project->find('list', array(
						'conditions' => array(
							'client_id' => $this->request->data['User']['Client']
						)
					)));
				}
			}
		}
	}

	public function management() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/view/'.$this->_USER_CLIENTS[0]);

		if (@$this->request->query['orderby']) {
			$order = $this->request->query['orderby'];
	
			if (isset($this->request->query['desc']))
				$order .= ' DESC';
		}

		$this->paginate = array(
			//'fields' => array('User.*'),
			'contain' => array('Client'),
			'conditions' => array(
				'User.type' => self::USER_USER,
				'( SELECT COUNT(*) 
				FROM clients_users cu 
				LEFT JOIN clients c ON (c.id = cu.client_id)
				WHERE user_id=`User`.`id`
				AND c.deleted = 0 ) > 0'
				),// This is to pick up only users belong to existing clients
			'limit' => 10,
			'order' => @$order			
		);
		
		$users = $this->paginate();
		$this->set('users', $users);
	}

	public function get_user_projects() {
		$projects = $this->User->find('first', array(
			'fields' => array('User.id'),
			'contain' => array('Client' => array('id'), 'Project' => array('id')),
			'conditions' => array('User.id' => $this->request->data['user_id'])
		));
		
		// Set array with ids
		$arr_client_result = array();
		foreach ($projects['Client'] as $c) {
			$arr_client_result[] = $c['id'];
		}

		$arr_project_result = array();
		foreach ($projects['Project'] as $p) {
			$arr_project_result[] = $p['id'];
		}

		$projects['Client'] = $arr_client_result;
		$projects['Project'] = $arr_project_result;
		
		$this->set('user_projects', $projects);


		$all_clients = $this->Project->Client->find('all', array(
			'order' => 'name',
			'contain' => array('Project' => array('id', 'name')),
			'fields' => array('id', 'name')
			//'conditions' => array(
			//	'client_id' => $projects['Client'][0]['id']
			//)
		));
		//pr($all_clients);
		$this->set('all_clients', $all_clients);


		$this->layout = 'ajax';
	}

	public function update_user_projects() {
		if ($this->request->isPost()) {
			$this->User->id = $this->request->data['user_id'];
			$this->request->data['User']['id'] = $this->request->data['user_id'];
			$this->request->data['Client'] = json_decode($this->request->data['client_ids']);
			$this->request->data['Project'] = json_decode($this->request->data['project_ids']);

			// Set appropriate form data
			//$this->request->data['Client'] = array_filter($this->request->data['Client']);
			//$this->request->data['Project'] = array_filter($this->request->data['Project']);
			$this->User->save($this->request->data);
			
			// Delete all associated fields if no projects are selected
			if (empty($this->request->data['Project'])) {
				$project_user = ClassRegistry::init('ProjectsUser');
				$project_user->deleteAll(array('user_id' => $this->request->data['User']['id']));
			}

			echo '<td colspan="5"><p>Project details are updated.</p>';

			// Send email to user 
			$user_detail = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->request->data['user_id']
				)
			));

			if (!@$user_detail['UserDetail']['no_project_notify']) {
				// Email example
				$email = new CakeEmail('default');
				$email->from(array(Company::EMAIL => Company::NAME))
					->to($user_detail['User']['email'])
					->viewVars(array(
						'user_detail' => $user_detail,
						//'key' => sha1($this->request->data['user_id'] . $this->request->data['User']['email'])
						))
					->subject('Your access to projects has been changed.')
					->template('update_project')
					->emailFormat('html')
					->send();
			}			
		}		
		exit;
	}
/*
	public function change_password() {
		if ($this->request->isPost()) {

			//$user = $this->User->findById($this->Session->read('Auth.User.User.id'));
			$this->request->data['User']['id'] =  $this->_USER['id'];

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Password changed successfully.');
				//$this->Auth->login($this->User->findById($this->Session->read('Auth.User.User.id')));
			}
		}
		$this->request->data = array();

		if(isset($this->_USER_CLIENTS[0])) {
			$this->set('client', $this->User->Client->find('first', array(
				'conditions' => array('Client.id'  => $this->_USER_CLIENTS[0]),
				'recursive' => -1
			)));
		}
	}
*/
}
