<?php

App::uses('AppController', 'Controller');

class ProjectsController extends AppController {
	public $components = array('Paginator');
	public $helper = array('Thumbnail', 'Thumb');

	public function index() {
		exit;
		//$projects = $this->Client->find('all');
		//$this->set('projects', $projects);
	}

	public function edit() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/index');

		if ($this->request->isPost()) {
			$this->request->data['Project']['client_id'] = $this->request->params['client_id'];

			if ($this->Project->save($this->request->data)) {

				if ($this->request->data['Project']['is_archived'] == '1') {
					$this->Session->setFlash(
						$this->request->data['Project']['name'] .
						($this->request->data['Project']['archived'] ?
						' has been archived' :
						' has been restored to current projects'));

				} elseif ($this->request->data['Project']['id'] > 0)
					$this->Session->setFlash($this->request->data['Project']['name'] . ' has been updated');
				else
					$this->Session->setFlash($this->request->data['Project']['name'] . ' has been created');

				// If we use ajax or redirect, this might not needed
				$this->redirect('/clients/' . $this->request->params['client_id']
					 . '/projects/view/' .
					(empty($this->request->data['Project']['id']) ?
						$this->Project->getInsertID() :
						$this->request->data['Project']['id'])
				);
			}
		}
		$this->set('client', $this->Project->Client->find('first', array(
			'conditions' => array('Client.id' => $this->request->params['client_id']),
			'recursive' => -1
		)));
		$this->request->data = $this->Project->findById(@$this->request->params['project_id']);
	}

	public function view() {
		$file_types = $this->Project->File->FileType->find('list');
		$this->set('file_types', $file_types);
		$project = $this->Project->find('first', array(
			'conditions' => array('Project.id' => $this->request->params['project_id']),
			'recursive' => 0
		));
		$this->set('project',$project);

		$conditions = array();
		if (isset($this->request->params['file_type_id'])) {
			$conditions['File.file_type_id'] = $this->request->params['file_type_id'];
			$this->set('file_type_id', $this->request->params['file_type_id']);
		} else {
			// Set default file type
			$conditions['File.file_type_id'] = 1;
			$this->set('file_type_id', 1);
		}

		$this->paginate = array(
			'conditions' => $conditions + array('File.project_id' => $this->request->params['project_id']),
			'order' => 'File.id DESC',
			'limit' => 10
		);
		$data = $this->paginate($this->Project->File);
		$this->set('files', $data);

		$this->set('thumbnail_format', array(
			//Save path - (Required) - The path to save the thumbnail to if its not already cached 
			'save_path' => $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/assets/thumbs', 
			//Display path - (Required) - The path to show in the image tag output 
			'display_path' => '/assets/thumbs', // or 'display_path' => 'http://images.domain.com', 
			//Error image path - (Required) - The image to show if something goes wrong with rendering a thumbnail 
			'error_image_path' => '/assets/thumbs/error.png', 
			// From here on out, you can pass any standard phpThumb parameters 
			// Note: for phpThumb at least the src property is required. 
			'w' => 150,  
			'h' => 100, 
			'q' => 100, 
			'zc' => 1 
		));


	}

	public function delete() {
		if ($this->_USER['type'] == self::USER_ADMIN ||
			$this->_USER['type'] == self::USER_MODERATOR) {
			$project = $this->Project->findById($this->request->params['project_id']);
			if ($this->Project->updateAll(array('Project.deleted' => 1), array('Project.id' => $this->request->params['project_id'])))
				$this->Session->setFlash($project['Project']['name'] . ' has been deleted');
		}
		$this->redirect('/clients/view/' . $this->request->params['client_id']);
	}

	public function get_project_list() {
		if ($this->_USER['type'] == self::USER_USER)
			$this->redirect('/clients/index');
		$this->layout = 'ajax';

		$projects = $this->Project->find('list', array('conditions' => array(
			'Project.client_id' => $this->request->data['client_id']
		)));
		$this->set('projects', $projects);
		$this->set('client_id', $this->request->data['client_id']);
	}
}
