<?php
App::uses('CmsCoreModel', 'Model');
class News extends CmsCoreModel {
	
	// var $name = 'News';
	public $actsAs = array('HasTags', 'HideUnpublishedFromPublic', 'Containable');
	
	var $validate = array(
		'title' => array('notempty'),
		'publish_date' => 'notempty',
		// 'content' => array('notempty')
	);
	
	var $order = 'publish_date DESC';

	//----- Setup the admin area list options -----
	var $adminFilters = array('news_category_id', 'published', 'content_type');		// filter_pastOrFuture defined below
	var $adminSortOptions = array(
		'publish_date' => 'Publish Date',
		'title' => 'Title (A-Z)',
		'title DESC' => 'Title (Z-A)',
		'modified' => 'Last modified (latest first)'		
	);
	var $adminKeywordSearchFields = array('title', 'image', 'content', 'short_desc', 'menu_label');
	//---------------------------------------------	
	
	
	public $hasOne = array(
		'Meta' => array(
			'foreignKey' => 'item_id', 
			'conditions' => array('item_type_id' => 2),
			'dependent' => true,
	));
	
	var $belongsTo = array(
		// 'Category' => array(
			// 'className' => 'Category',
			// 'foreignKey' => 'category_id',
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => ''
		// ),
		'NewsCategory' => array(),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Editor' => array(
			'className' => 'User',
			'foreignKey' => 'modified_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		// 'Template' => array(
			// 'className' => 'Template',
			// 'foreignKey' => 'template_id',
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => ''
		// ),
		// 'Meta' => array(
			// 'className' => 'Meta',
			// 'foreignKey' => 'meta_id',
			// 'conditions' => array('item_type_id' => 2),
			// 'fields' => '',
			// 'order' => ''
		// )
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		// 'PracticeArea',
		// 'MemberGroup' => array(
			// 'className' => 'MemberGroup',
			// 'joinTable' => 'news_member_groups',
			// 'foreignKey' => 'news_id',
			// 'associationForeignKey' => 'member_group_id',
			// 'unique' => true,
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => '',
			// 'limit' => '',
			// 'offset' => '',
			// 'finderQuery' => '',
			// 'deleteQuery' => '',
			// 'insertQuery' => ''
		// ),
		// 'Tag' => array(
			// 'className' => 'Tag',
			// 'joinTable' => 'news_tags',
			// 'foreignKey' => 'news_id',
			// 'associationForeignKey' => 'tag_id',
			// 'unique' => true,
			// 'conditions' => '',
			// 'fields' => '',
			// 'order' => '',
			// 'limit' => '',
			// 'offset' => '',
			// 'finderQuery' => '',
			// 'deleteQuery' => '',
			// 'insertQuery' => ''
		// ),
		/* 'Widget' => array(
			'className' => 'Widget',
			'joinTable' => 'news_widgets',
			'foreignKey' => 'news_id',
			'associationForeignKey' => 'widget_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		) */
	);

	function getlatest($limit = 5) {
		$news = $this->find('all', array(
			'conditions' => array('News.published' => '1', 'News.category_id' => '38', 'News.showatmenu' => '1'),//'News.showatmenu' => '1',
			'order' => 'News.publish_date DESC', //Replaced 'News.created DESC, News.modified DESC',
			'limit' => '0,' . $limit,
			'recursive' => 0,
			'fields' => array('News.id', 'News.menu_label', 'News.publish_date', 'News.title', 'News.category_id'),
			'contain' => array('Category' => array('fields' => array('id', 'name')))
			)
		);
		return $news;
	}
	function get_new_news($limit=5) {
		$news = $this->find('all', array(
											'order' => 'News.publish_date DESC', 
                                            'limit' => '0,'.$limit,
                                            'recursive' => 0,
						                    )
                                        );
		return $news;
	}
}