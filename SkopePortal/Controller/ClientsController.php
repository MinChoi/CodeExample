<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ClientsController extends AppController {

	public function index() {
		
		if ($this->_USER['type'] == self::USER_USER) {
			if (count($this->_USER_CLIENTS) == 1)
				$this->user_redirect();
			$condition = array('Client.id IN ' => $this->_USER_CLIENTS);
		}

		$this->paginate = array(
			'limit' => 11,
			'conditions' => @$condition,
			'contain' => array(
				'Project',
				'User' => array(
					'conditions' => array(
						'User.status' => 1,
						'User.deleted' => 0
					)
				)
			)
		);
		$data = $this->paginate($this->Client);
		$this->set('clients', $data);
	}

	public function edit() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/index');

		if ($this->request->isPost()) {
			// Do file validation when it's NEW or new file is added when edit
			if (empty($this->request->data['Client']['id'])
				|| ($this->request->data['Client']['id'] > 0
				&& $this->request->data['Client']['logo']['error'] != 4))
				$this->Client->addFileValidation();

			if ($this->Client->save($this->request->data)) {
				if ($this->request->data['Client']['id'] > 0)
					$this->Session->setFlash($this->request->data['Client']['name'] . ' has been updated');
				else
					$this->Session->setFlash($this->request->data['Client']['name'] . ' has been created');

				if (empty($this->request->data['Client']['id']))
					$this->redirect('/clients/view/'.$this->Client->getLastInsertID());
				else
					$this->redirect('/clients/view/'.$this->request->data['Client']['id']);
			}
		}
		if (isset($this->request->params['client_id']))
			$this->request->data = $this->Client->findById($this->request->params['client_id']);
	}

	public function view() {
		if ($client_id = $this->request->params['client_id']) {

			$client = $this->Client->find('first', array(
				'conditions' => array('Client.id' => $client_id),
				'recursive' => 0
			));

			if ($client) {
				$this->set('client', $client);
				$this->set('clients', $this->Client->find('list'));

				$conditions = array('Project.deleted' => 0);

				// Default is select unarchived project
				if (!isset($this->request->params['project_status']))
					$this->request->params['project_status'] = '0';

				if ($this->request->params['project_status'] === '0' || $this->request->params['project_status'] === '1')
					$conditions = $conditions + array('Project.archived' => $this->request->params['project_status']);

				// If no project_states selected, select all
				if (isset($this->request->params['project_states']))
					$conditions = $conditions + array('Project.state' => json_decode($this->request->params['project_states']));
				else
					$this->request->params['project_states'] = '["1","NSW","VIC","ACT","NT","QLD","SA","TAS","WA"]';

				if ($this->_USER['type'] == self::USER_USER)
					$conditions = $conditions + array('Project.id' => $this->_USER_PROJECTS);

				$this->paginate = array(
					'conditions' => $conditions + array('Project.client_id' => $this->request->params['client_id']),
					'limit' => 12,
					'contain' => array(
						'File' => array(
							'conditions' => array(
								'File.file_type_id > 0',
								'File.deleted' => 0,
							),
							'order' => 'id DESC',
							'limit' => 2
						)
					)
				);
				$data = $this->paginate($this->Project);
				$this->set('projects', $data);

			} else {
				$this->Session->setFlash('Invalid client id');
				$this->redirect('/clients');
			}

		}
		else
			$this->redirect('/clients');
	}

	public function delete() {
		if ($this->_USER['type'] != self::USER_USER) {
			$client = $this->Client->findById($this->request->params['client_id']);
			if ($this->Client->updateAll(array('Client.deleted' => 1), array('Client.id' => $this->request->params['client_id'])))
				$this->Session->setFlash($client['Client']['name'] . ' has been deleted');
		}
		$this->redirect('/clients/index');
	}

	public function filter() {
		$client = $this->Client->find('first', array(
			'conditions' => array('Client.id' => $this->request->data['client_id']),
			'recursive' => 0
		));

		$this->set('client', $client);

		$states = json_decode($this->request->data['states']);
		$conditions = array(
			'Project.deleted' => 0,
			'Project.state' => @$states
		);

		if (isset($this->request->data['project_status'])) {
			if ($this->request->data['project_status'] == 1)
				$conditions = $conditions + array('Project.archived' => $this->request->data['project_status']);
			elseif ($this->request->data['project_status'] != 2)
				$conditions = $conditions + array('Project.archived' => 0);
		}

		if ($this->_USER['type'] == self::USER_USER)
			$conditions = $conditions + array('Project.id' => $this->_USER_PROJECTS);

		$this->paginate = array(
			'conditions' => $conditions + array('Project.client_id' => $this->request->params['client_id']),
			'limit' => 12,
			'contain' => array(
				'File' => array(
					'order' => 'id DESC',
					'limit' => 2
				)
			)
		);
		$data = $this->paginate($this->Project);
		$this->set('projects', $data);

		$this->layout = 'ajax';
	}
}
