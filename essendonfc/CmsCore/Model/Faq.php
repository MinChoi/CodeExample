<?php
class Faq extends CmsCoreModel {
	// var $name = 'Faq';
	var $order = array('Faq.displaying_order', 'Faq.id');
	var $validate = array(
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid question',
			),
		),
		'answer' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid answer',
			),
		),
		'faq_section_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please select a category',
			),
		)
	);
	
	var $actsAs = array('Containable', 'HideUnpublishedFromPublic');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'FaqSection' /*=> array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
	var $package_category = array(
		1 => 'Storm Facts',
		2 => 'Donations',
		3 => 'Join the team',
		4 => 'Rewards',
		5 => 'Membership',
		6 => 'Game day',
		7 => 'Packages',
		8 => 'Juniors',
		9 => 'Benefits',
	);
	
		
	//----- Setup the admin area list options -----
	public $adminFilters = array('faq_section_id');		// filter_pastOrFuture defined below
	public $adminSortOptions = array(
		'Faq.question' => 'Question (A-Z)',
		'faq_section_id' => 'FAQ Section', 
		'modified DESC' => 'Last Modified',
		'displaying_order' => 'Displaying Order',
	);
	// public $adminKeywordSearchFields = array('title', 'venue', 'address', 'content', 'short_desc');
	//---------------------------------------------
	
}
