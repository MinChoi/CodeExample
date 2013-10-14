<?php
/**
 * Model that implements the basic 'Page' object
 * Usually WYSIWYG pages of the CMS.  URLs end in .html
 * 
 * This code has been imported from old projects into CORE but could use a lot of 
 * tidying up.  Feel free to do so if you have time.  - Simon
 */  
App::uses('CmsCoreModel', 'Model');
class Page extends CmsCoreModel {

	public $actsAs = array('HasAdminNotes', 'HasMetaTags', 'HasTags', 'HasWidgets', 'HideUnpublishedFromPublic');
	
	//----- Setup the admin area list options -----
	public $adminFilters = array('published', 'user');
	public $adminSortOptions = array(
		'Page.name' => 'Page Title (A-Z)',
		'Page.page_id' => 'Section', 
		'Page.modified DESC' => 'Last Modified Date (latest first)',
		'Page.created DESC' => 'Created Date (latest first)',
	);
	public $adminKeywordSearchFields = array('Page.name', 'Page.content', 'Page.menu_name', 'Page.link', 'Page.page_subheading');
	//---------------------------------------------
	
	// Override default getAdminFilters() to include 2 new drop-down fields
	function getAdminFilters() {
		$f['Section'] = $this->find('list', array('conditions' => array('id' => $this->distinct('page_id'))));
		$f['Page_or_Link'] = array(0 => 'Page', 1 => 'Link');
		$filters = $this->Behaviors->AdminFilters->getAdminFilters($this);
		$filters['filters'] = $f + $filters['filters'];
		return $filters;
	}
	
	function filter_Page_or_Link($value) { return array('Page.islink' => $value); }
	function filter_Section($value)		 { return array('Page.page_id' => $value); }
	
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter page title.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
			)
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter content.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
			)
		)
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'ParentPage' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Sitemap' => array(
			'className' => 'Sitemap',
			'foreignKey' => 'sitemap_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public $hasMany = array(
		'ChildPage' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'porder',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	// beforeSave hook
	// Automatically generate page URLs based on "Menu Label"	/menu-label-here.html
	// If we're saving a page (as opposed to a link), we will update the 'link' field to a slug based on menu_name
	function beforeSave($options = array()) {
		if (@$this->data['Page']['islink'] == 0) {
			$this->data['Page']['link'] = 
				'/' 
				. str_replace('_', '-', Inflector::slug(strtolower(@$this->data['Page']['menu_name'])))
				. '.html';
		}
		// debug($this->data);
		return parent::beforeSave($options);
	}

/*
	function deleteAllChildPages() {
		$id_array = array();
		$watcher = $item_count = 0;
		while(1) {
			$result = $this->find('all', array('conditions' => array('page_id' => $id),'fields' => array('id')));
			if (isset($result[0]['Page']['id'])) {
				foreach($result as $item_id) {
					$id_array[$item_count++] = $item_id['Page']['id']; 
				}
			}
			if ($watcher<$item_count) {
				$this->delete($id);
				$id = $id_array[$watcher++];
			} else
				break;
		}
	}
*/
	function updateChildPages($id, $page_id) {
		$this->query("UPDATE `pages` SET `page_id`='$page_id' WHERE `page_id`='$id'");
	}
	
	function updateMemberGroup($id, $targetid) {
		$this->bindModel(array('hasOne' => array('PagesMemberGroup')));
		$is_secure_page = $this->find('first', array(
								'contain' => array('PagesMemberGroup' => array('page_id', 'member_group_id')),
								'conditions' => array(
									'Page.id' => $id,
									'PagesMemberGroup.member_group_id IS NOT NULL'
								)
							));
		if (isset($is_secure_page['Page']['id'])) {
			$this->query("INSERT INTO `pages_member_groups` VALUES (".$targetid.",".$is_secure_page['PagesMemberGroup']['member_group_id'].")");
			return true;
		}
		return false;
	}

	function isSubPage($pageid) {
		$count = $this->find('count', array('conditions' => array('page_id' => $pageid)));
		if ($count>0)
			return true;
		else
			return false;
	}
	
	function updateOrder($id, $page_id, $order) {
		$this->id = $id;
		$this->saveField('page_id', $page_id);
		$this->saveField('porder', $order);
	}
	
	function deleteMultiple($id = null, $multiple=false) {
		if ($id) {
			if (!$multiple) {
				$this->itemDelete($id);
			} else {
				if (strlen(trim($id))>0) {
					$nids = array();
					$ids_array = explode(',', $id);
					foreach($ids_array as $id_item) {
						if (intval($id_item)>0) {
							$this->itemDelete($id_item);
						}
					}
				}
			}
		}
	}
	
	function itemDelete($id = null) {
		if ($id) {
			$page = $this->read(null, $id);
			// if (intval($page['Page']['page_id'])!=0) {
				// $this->query("UPDATE `pages` SET `subpages`=`subpages`-1 WHERE id='".$page['Page']['page_id']."'");
			// }
			if ($this->delete($id)) {
				// $this->updateChildPages($id, $page['Page']['page_id']);
			}
		}
	}
	
	function getAllSubSections($page_id) {
		$subpages = array();
		$subpages = $this->getChildPages($page_id);
		$i = 0;
		while(isset($subpages[$i])) {
			if ($this->isSubPage($subpages[$i])) {
				$subpages_tmp = array_merge($subpages, $this->getChildPages($subpages[$i]));
				$subpages = $subpages_tmp;
			}
			$i++;
		}
		$subpages[] = $page_id;
		return $subpages;
	}
	
	function getChildPages($id) {
		$this->recursive = -1;
		$pages = $this->find('all', array('conditions' => array('Page.page_id' => $id),'fields' => 'Page.id'));
		$page_ids = array();
		if (isset($pages[0])) {
			foreach($pages as $key=>$pages_id) {
				$page_ids[] = $pages_id['Page']['id'];
			}
		}
		return $page_ids;
	}
	
	function getsitemap($sitemap, $page_id) {
		$this->recursive = -1;
		$pages = $this->find('all', array('conditions' => array('page_id' => $page_id,'sitemap_id' => $sitemap),'order' => array('porder')));
		$result_pages = array();
		foreach($pages as $key => $page) {
			$result_pages[$key] = $page;
			// $result_pages[$key]['Page']['secure'] = $this->isSecure($page['Page']['id']);
		}
		return $result_pages;
	}
	
	/*********
	function isSecure($page_id=0) {
		$this->bindModel(array('hasOne' => array('PagesMemberGroup')));
		$is_secure_page = $this->find('first', array(
								'contain' => array('PagesMemberGroup' => array('page_id', 'member_group_id')),
								'conditions' => array(
									'Page.id' => $page_id,
									'PagesMemberGroup.member_group_id IS NULL'
								)
							));
		if (isset($is_secure_page['Page']['id'])) {
			return false;
		} else {
			return true;
		}
	}*******/
	
	function listsection() {
		$this->recursive = -1;
		return $this->find('list', array('conditions' => array('OR' => array('page_id'=>1)),'order' => array('name')));
	}
	
/*	function listsubsection() {
		$this->recursive = -1;
		$sub_pages = $this->find('list', array('conditions' => array(
																	'page_id' => $this->getAllSubSections($this->request->data['Page']['section'])
																	)));
		$rsub_pages = array();
		foreach($sub_pages as $sub_page_key=>$sub_page_name) {
			if ($this->isSubPage($sub_page_key)) {
				$rsub_pages[$sub_page_key] = $sub_page_name;
			}
		}
		$this->set('pages', $rsub_pages);
	}
*/
	
	function sub($page_id) {
		$this->recursive = -1;
		$sub_pages = $this->find('list', array('conditions' => array('page_id' => $this->getAllSubSections($page_id)),'order' => array('name')));
		
		$rsub_pages = array();
		foreach($sub_pages as $sub_page_key=>$sub_page_name) {
			if ($this->isSubPage($sub_page_key)) {
				$rsub_pages[$sub_page_key] = $sub_page_name;
			}
		}
		return $rsub_pages;
	}
	
	function getnav($sitemap=1, $page_id=0) {
		$this->bindModel(array('hasOne' => array('PagesMemberGroup')));
		$cond = 'PagesMemberGroup.member_group_id IS null';
		if (isset($_SESSION['Member']) && isset($_SESSION['Member']['member_group_id'])) {
			$cond = '(`PagesMemberGroup`.`member_group_id` IS NULL OR `PagesMemberGroup`.`member_group_id`=\''.$_SESSION['Member']['member_group_id'].'\')';
		}
		$this->recursive = 0;
		return $this->find('all', array(
										'fields' => array('Page.id', 'Page.menu_name', 'Page.porder', 'Page.islink', 'Page.link', 'Page.linktype', 'Page.page_subheading'),
										'contain' => array('PagesMemberGroup' => array('page_id', 'member_group_id')),
										'conditions' => array(
													'Page.page_id' => $page_id,
													'Page.showatmenu'=>1,
													'Page.published'=>1,
													'Page.sitemap_id' => $sitemap,
													$cond
													),
										'order' => array('porder')
									));
	}
	
	function getParents($id) {
		$parent_ids = array();
		$parent_ids[] = $id;
		$i=0;
		while($i<3) {
			$i++;
			$page = $this->getParent($id);
			if (isset($page['page_id'])) {
				$id = $page['page_id'];
				$parent_ids[] = $page['page_id'];
			} else {
				break;
			}
		}
		
		$parent_ids_str = strrev(implode(',', $parent_ids));
		$parent_ids_arr = explode(',', $parent_ids_str);
		
		
		$sortedpids = array();
		foreach($parent_ids_arr as $parent_id) {
			$sortedpids[] = strrev($parent_id);
		}
		return $sortedpids;
	}
	
	function getParent($id) {
		$this->recursive = -1;
		$page = $this->find('first', array('conditions' => array('Page.id' => $id),'fields' => array('Page.page_id', 'Page.name')));
		if (isset($page['Page']))
			return $page['Page'];
		else
			return 0;
	}
}
