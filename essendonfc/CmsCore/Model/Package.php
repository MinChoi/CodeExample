<?php
class Package extends CmsCoreModel {

	public $actsAs = array('HasTags', 'HideUnpublishedFromPublic','HasWidgets');
	
	public $order = 'publish_date DESC';

	//----- Setup the admin area list options -----
	public $adminFilters = array('package_category_id', 'user', 'published');		// filter_pastOrFuture defined below
	public $adminSortOptions = array(
		'title' => 'Title (A-Z)',
		'title DESC' => 'Title (Z-A)',
		'modified' => 'Last modified (latest first)',
		'displaying_order' => 'Display Order'		
	);
	public $adminKeywordSearchFields = array('Package.title');
	//---------------------------------------------
	
	public $validate = array(
		'title' => array('notempty')
	);

	public $hasMany = array(
		'PackagePricing' => array(
			'order' => 'PackagePricing.id',
			'dependent' => true			// also delete pricings when package is deleted
		),
		'PackageCorekit' => array(
			'className' => 'PackagesCorekit',
			'foreignKey' => 'package_id',
			'dependent' => true,						// also delete corekits when package is deleted
	));	

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
		'PackageCategory' => array(
			'className' => 'PackageCategory',
			'foreignKey' => 'package_category_id',
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
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasAndBelongsToMany = array(
	); 

	/**
	 * The package controller sets a flag when all previous pricings should be removed
	 */ 
	public function beforeSave($options) {
		if (isset($this->deletePricingsBeforeSave)) {
			$this->PackagePricing->deleteAll(array('PackagePricing.package_id' => $this->id));
			unset($this->deletePricingsBeforeSave);
	}
		return parent::beforeSave($options);
	} 

	public function afterSave($options){
		parent::afterSave($options);
		// If there is no displaying_order is saved, save to biggest number + 1
		if ($this->data['Package']['displaying_order'] === '0') {
			$max_do = $this->find('first', array('fields'=>array('MAX(Package.displaying_order) AS MAX_ORDER')));
			$max_do = $max_do[0]['MAX_ORDER'] + 1;
			$this->saveField('displaying_order', $max_do);
		}
		return true;
	}	
	
	public $corekits = array(
		1  => '2 Games Entry',
		2  => '4 Games Engry',
		3  => '1 Game Entry',
		4  => 'Member Cap',
		5  => 'Exclusive Merchandise Item',
		6  => 'Exclusive Member Event',
		7  => 'Reserved Seating Corporate',
		8  => 'Suzuki POY Voting Rights',
		9  => 'Guaranteed Grand Final Access',
		10 => 'Priority Grand Final Access',
		11 => '10% Discount at Rugby Fever'
			);

	public function getlatest($limit=5){
		$news = $this->find('all', array(
											'conditions'=>array('News.published'=>'1','News.category_id'=>'38','News.showatmenu'=>'1'),//'News.showatmenu'=>'1',
                                            'order' => 'News.publish_date DESC', //Replaced 'News.created DESC, News.modified DESC',
                                            'limit' => '0,'.$limit,
                                            'recursive' => 0,
											'fields'=>array('News.id','News.menu_label','News.publish_date','News.title','News.category_id'),
											'contain'=>array('Category'=>array('fields'=>array('id','name')))
                                            )
                                        );
		return $news;
	}
}
