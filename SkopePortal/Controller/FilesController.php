<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class FilesController extends AppController {

	public function add() {
		if ($this->request->isPost()) {

			// Set array files uploaded
			$files = array();
			foreach ($this->request->data as $key=>$data) {
				if (!is_array($data)) {
					$keys = explode('_', $key);
					if (!empty($keys[2]))
						$files[$keys[0]][$keys[1]][$keys[2]] = $data;
				}
			}
			if (empty($files)) {
				$this->Session->setFlash('You cannot add file record without any file.', 'default', array('class' => 'message message-warning'));
				$this->set('project', $this->File->Project->findById($this->request->params['project_id']));
				$this->set('file_types', $this->File->FileType->find('list'));
				return;			
			}

			$project = $this->Project->find('first', array('recursive' => 0, 'fields' => 'Project.name, Client.*','conditions' => array('Project.id' => $this->data['File']['project_id'])));
			$dirname = 'assets/'.sha1($project['Client']['id'] . $project['Client']['created']);

			if (!file_exists($dirname)) mkdir($dirname, 0777, true);
			$original_name = $this->request->data['File']['name'];

			// Loop through all files uploaded
			foreach ($files['uploader'] as $k => $file) {
				$filename = $_SERVER['DOCUMENT_ROOT'].'/app/tmp/tmp_files/'.$file['tmpname'];
				$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

				// Add index if there are more than one file
				if (count($files['uploader']) > 1)
					$this->request->data['File']['name'] = $original_name.' #'.($k + 1);
				else 
					$this->request->data['File']['name'] = $original_name;

				// Save new file record
				$this->File->create();
				$this->File->save(array('File' => (array(
					'file' => $file['name'],
					'extension' => pathinfo($file['tmpname'], PATHINFO_EXTENSION),
					'created_by' => CakeSession::read('Auth.User')
				) + $this->request->data['File'])));

				$new_filename = $dirname.'/'.sha1($this->File->id . $file['name']).'.'.$file_extension;
				rename($filename, $new_filename);
			}

			// Grap all users (admin, moderator, user) who are eligible to receive notification
			$users = $this->Project->User->find('all', array(
				'conditions' => array(
					'User.status' => 1,
					'User.id <> ' => $this->Session->read('Auth.User'),
					array('OR' => array(
						array('UserDetail.no_file_notify' => 0),
						array('UserDetail.no_file_notify' => null)
					)),
					array('OR' => array(
						array('User.type' => self::USER_ADMIN),
						array('User.type' => self::USER_MODERATOR),
						array(
							'User.type' => self::USER_USER,
							'User.id IN (SELECT user_id FROM projects_users WHERE project_id='.$this->request->params['project_id'].')'
						)
					))
				),
				'contain' => array('UserDetail')
			));
			
			// Set emails on the queue
			foreach ($users as $user) {
				ClassRegistry::init('EmailQueue.EmailQueue')->enqueue(
					$user['User']['email'],
					array(
						'file_detail' => array(
							'project_name' => $project['Project']['name'],
							'file_name' => $this->request->data['File']['name'],
							'file_count' => count($files['uploader'])
						),
						'user_email' => $user['User']['email']
					), 
					array(
						'config' => 'default',
						'subject' => 'New file has been uploaded',
						'template' => 'new_file_upload',
						'format' =>'html'
					)					
				);
			}

			$this->Session->setFlash($original_name . '(s) have been uploaded');
			$this->redirect('/clients/' . $this->request->params['client_id']. '/projects/view/' . $this->request->params['project_id'] . '/' . $this->request->data['File']['file_type_id']);
		}
		$this->set('project', $this->File->Project->findById($this->request->params['project_id']));
		$this->set('file_types', $this->File->FileType->find('list'));
	}

	public function view() {
		$this->layout = 'ajax';
		$file = $this->File->find('first', array(
			'conditions' => array(
				'File.id' => $this->request->params['file_id'],
				'File.deleted' => 0
			)
		));

		if (empty($file)) {
			$this->Session->setFlash('File does not exist');
			$this->redirect('/clients/' . $this->request->params['client_id']. '/projects/view/' . $this->request->params['project_id'] . '/' . $this->request->data['File']['file_type_id']);
		}
		$this->set('file', $file);
	}

	public function delete() {
		$this->autoRender = false;

		if ($this->request->params['file_id'] > 0) {
			$file = $this->File->findById($this->request->params['file_id']);
			if ($this->File->updateAll(array('File.deleted' => 1), array('File.id' => $this->request->params['file_id'])))
				$this->Session->setFlash($file['File']['name'] . ' has been deleted');

			$this->redirect('/clients/' . $this->request->params['client_id']. '/projects/view/' . $this->request->params['project_id'] .
				(isset($this->request->params['file_type_id']) ? '/' . $this->request->params['file_type_id'] : ''));
		}
	}

	public function search() {
		$query = $this->request->query['q'];
		$limit = isset($this->request->query['count']) ? $this->request->query['count'] : 20;
		$this->set('count', $limit);

		$arr_client = array(
			'Client.deleted' => 0,
			'Project.deleted' => 0,
			'File.deleted' => 0,
		);

		if ($this->_USER['type'] == self::USER_USER) {
			$arr_client = $arr_client + array('Project.id' => $this->_USER_PROJECTS);
		}
/*
		// This algorithm is using MATCH fulltext index
		$this->paginate = array(
			'limit' => $limit,
			'contain' => array('Project', 'Client', 'FileType', 'CreatedBy'),
			'fields' => array('*', "MATCH(File.name, File.file) AGAINST ('".$query."') AS rating"),
			'conditions' => $arr_client + array( "MATCH(File.name, File.file) AGAINST('".$query."' IN BOOLEAN MODE)"),
			'order' => array(
			'rating' => 'desc',
			)
		);
*/
		$this->paginate = array(
			'limit' => $limit,
			'contain' => array('Project', 'Client', 'FileType', 'CreatedBy'),
			'conditions' => $arr_client + array(
				'OR' => array(
					'File.file LIKE "%'.$query.'%"',
					'File.name LIKE "%'.$query.'%"'
				)
			),
			'order' => array(
				'File.id' => 'desc',
			)
		);

		$data = $this->paginate($this->File);
		$this->set('files', $data);

		$this->set('client', $this->Project->Client->find('first', array(
			'conditions' => array('Client.id' => $this->_USER_CLIENTS[0]),
			'recursive' => -1
		)));
	}

	public function upload_function() {
		$this->layout = "ajax";
	}
}
