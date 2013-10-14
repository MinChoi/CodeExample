<?php

class File extends AppModel {
	public $actsAs = array('Containable');

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Please insert name.'
			)
		)
	);

	public $belongsTo = array(
		'Project',
		'FileType',
		'CreatedBy' => array(
			'className' => 'User',
			'foreignKey' => 'created_by'
		)
	);

	public function beforeFind($queryData) {
		// Grab only un-deleted files
		$queryData['conditions']['File.deleted'] = 0;
		return $queryData;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['File']['file'])) {
				$project = $this->Project->find('first', array('recursive' => 0, 'fields' => 'Client.*', 'conditions' => array('Project.id' => $val['File']['project_id'])));
				$dirname = 'assets/'.sha1($project['Client']['id'] . $project['Client']['created']);
				$results[$key]['File']['file_path'] = $dirname . '/' . sha1($val['File']['id'] . $val['File']['file']) . '.' . $val['File']['extension'];
			}
		}
		return $results;
	}

	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$this->bindModel(array(
			'hasOne' => array(
				'Client' => array(
					'foreignKey' => false,
					'conditions' => array('Client.id = Project.client_id')
					)
				)
			)
		);
		return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group'));
	}

	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$this->bindModel(array(
			'hasOne' => array(
				'Client' => array(
					'foreignKey' => false,
					'conditions' => array('Client.id = Project.client_id')
					)
				)
			)
		);
		return count($this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group')));
	}
}
