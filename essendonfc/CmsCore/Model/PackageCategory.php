<?php
class PackageCategory extends AppModel {

	public $actsAs = array('HideUnpublishedFromPublic');

	public $validate = array(
		'title' => array('notempty')
	);
	var $adminFilters = array('user');		// filter_pastOrFuture defined below

    public $hasMany = array('Package');
	
	public $belongsTo = array(
		'CUser' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MUser' => array(
			'className' => 'User',
			'foreignKey' => 'modified_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Meta' => array(
			'className' => 'Meta',
			'foreignKey' => 'meta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $adminSortOptions = array(
		'PackageCategory.title ASC' => 'Title (A-Z)',
		'PackageCategory.title DESC' => 'Title (Z-A)',
		'PackageCategory.modified DESC' => 'Last Modified Date (latest first)',
		'PackageCategory.created DESC' => 'Created Date (latest first)',
		'PackageCategory.displaying_order' => 'Display Order'		
	);
	
	function getpcategories() {
		return $this->find('list');
	}	
}
