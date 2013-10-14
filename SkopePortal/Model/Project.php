<?php

class Project extends AppModel {
	public $belongsTo = array('Client');
	public $hasMany = array(
			'File' => array(
				'conditions' => array(
					'File.deleted' => 0
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
				'message' => 'Please insert project name.'
			)
		)
	);

	public function beforeFind($queryData) {
		// Grab only un-deleted project
		$queryData['conditions']['Project.deleted'] = 0;

		return $queryData;
	}

	public static function getStates() {
		return array(
			'NSW' => 'NSW',
			'VIC' => 'VIC',
			'ACT' => 'ACT',
			'NT' => 'NT',
			'QLD' => 'QLD',
			'SA' => 'SA',
			'TAS' => 'TAS',
			'WA' => 'WA',
		);
	}
}
