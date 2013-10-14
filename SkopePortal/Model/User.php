<?php

class User extends AppModel {
	public $actsAs = array('Containable');

	public $virtualFields = array(
		'name' => 'CONCAT(firstname, " ", lastname, " (", email, ")")'
	);

	public $hasOne = array('UserDetail');
	public $hasAndBelongsToMany = array('Client', 'Project');

	public $validate = array(
		'firstname' => array(
			'min' => array(
				'rule' => 'notEmpty',
				'message' => 'Please insert firstname.'
			),
		),
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'message' => 'Please insert correct email.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'The email already exists.'
			)
		),
		'old_password' => array(
			'indentical' => array(
				'rule' => 'validConfirmCurrent',
				'message' => 'Password is not correct.'
			),
		),
		'password' => array(
			'min' => array(
				'rule' => array('minLength', 6),
				'message' => 'Usernames must be at least 6 characters.'
			),
			'notIdentical' => array(
				'rule' => array('validNewConfirm', 'old_password'),
				'message' => 'New password is same as old one'
			)
		),
		'password_confirm' => array(
			'identical' => array(
				'rule' => array('validConfirm', 'password'),
				'message' => 'Confirm password is different'
			),
		)
	);

	public function beforeFind($queryData) {
		// Grab only un-deleted user
		$queryData['conditions']['User.deleted'] = 0;
		return $queryData;
	}
	
	public function validConfirm($data) {
		return ($this->data['User']['password']==$this->data['User']['password_confirm']);
	}

	public function validConfirmCurrent($data) {
		App::uses('AuthComponent', 'Controller/Component');
		return AuthComponent::password(@$this->data['User']['old_password']) == $this->data['User']['current_password'];
	}

	public function validNewConfirm($data) {
		return (@$this->data['User']['old_password']!=$this->data['User']['password']);
	}

	public function beforeSave($option = array()) {
		if (isset($this->data['User']['password'])) {
			App::uses('AuthComponent', 'Controller/Component');
			$this->data['User']['password'] = AuthComponent::password(@$this->data['User']['password']);
		}
	}
}
