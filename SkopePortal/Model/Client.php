<?php

class Client extends AppModel {
	public $hasMany = array(
			'Project' => array(
				'conditions' => array(
					'Project.deleted' => 0
				)
			)
		);
	public $hasAndBelongsToMany = array(
			'User' => array(
				'conditions' => array(
					'User.deleted' => 0
				)
			)
		);
	public $actsAs = array('Containable');

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Please insert client name.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'The name already exists.'
			)
		),
	);

	public function addFileValidation() {
		$this->validate = $this->validate + array(
			'logo' => array(
				'fileSize' => array(
					'rule' => array('fileSize', '<=', '2M'),
					'message' => 'Image must be less than 2MB'
				),
				'extension' => array(
					'rule' => array('extension', array('gif', 'jpeg', 'jpg', 'png')),
					'message' => 'Available file type is either GIF, JPEG, JPG or PNG'
				)
			)
		);
	}

	public function beforeFind($queryData) {
		// Grab only un-deleted client
		$queryData['conditions']['Client.deleted'] = 0;
		return $queryData;
	}

	public function beforeSave($option = array()) {
		$this->data['Client']['logo_detail'] = $this->data['Client']['logo'];
		//pr($this->data);
		// When logo is saved at first time,
		unset($this->data['Client']['logo']);
	}

	public function afterSave($created) {

		// If no file submitted, finish function
		if ($this->data['Client']['logo_detail']['error'] == 4)
			return;

		if ($created) {
			// Create folder
			$dirname = 'assets/'.sha1($this->id . $this->data['Client']['created']).'/logos';
			mkdir($dirname, 0777, true);
		} else {
			$dirname = 'assets/'.sha1($this->id . $this->data['Client']['create_time']).'/logos';
		}

		$file_extension = pathinfo($this->data['Client']['logo_detail']['name'], PATHINFO_EXTENSION);
		move_uploaded_file($this->data['Client']['logo_detail']['tmp_name'], $dirname.'/'.sha1($this->id . $this->data['Client']['logo_detail']['name']).'.'.$file_extension);

		$this->updateAll(
			array(
				'Client.logo' => "'".$this->data['Client']['logo_detail']['name']."'",
				'Client.extension' => "'".$file_extension."'"
			),
			array('Client.id' => $this->id)
		);
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Client']['logo'])) {
				$results[$key]['Client']['logo_file'] = '/assets/' . sha1($val['Client']['id'] . $val['Client']['created']) . '/logos/' . sha1($val['Client']['id'] . $val['Client']['logo']) . '.' . $val['Client']['extension'];
			}
		}
		return $results;
	}
}
