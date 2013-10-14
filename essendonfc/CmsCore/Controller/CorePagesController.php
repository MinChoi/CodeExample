<?php
/**
 * This controller displays all the standard content pages that are managed in the CMS (under "Pages" tab)
 * Each page usually consists of a heading, menu label, block of HTML content (entered by admin users),
 * some META data (description, keywords), a list of selected widgets to be displayed on that page,
 * and in some cases a list of tags that relate to that page (as a way of categorising them).
 */
App::import('Sanitize');
App::uses('CmsCoreController', 'Controller');
class CorePagesController extends CmsCoreController {

	var $uses = array('Page', 'KeyValue');//, 'Cache'
	var $helpers = array('Html', 'Form', 'CmsForm', 'Text');//, 'Cache'
	// var $_mergeParent = 'CmsCoreController';

	/*function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('home', 'display', 'getnav', 'search');
	}*/

	
	// Display the homepage
	/***
	function home() {
		//$this->cacheAction = '1 hour';
		
		// Used a reduced list of helpers on the homepage
		$this->helpers = array('Html', 'Session', 'Form');

		$homepageData = $this->KeyValue->get('homepage', true);
		$this->set('home', $homepageData);		// all homepage content is stored in key_value table/model (see admin_homepage())
		$this->set('title_for_layout', $homepageData['page_title']);
		$this->set('MetaK', $homepageData['meta_key']);
		$this->set('MetaD', $homepageData['meta_desc']);
		
		// Get latest news/events entries for the content boxes
		$news = ClassRegistry::init('News');
		$events = ClassRegistry::init('Event');
		$news->recursive = -1;
		$events->recursive = -1;
		$this->set('news', $news->find('all', array('conditions' => array('news_category_id' => 1), 'limit' => 3)));
		$this->set('alerts', $news->find('all', array('conditions' => array('news_category_id' => 3), 'limit' => 3)));
		$this->set('events', $events->find('all', array('conditions' => array('start_date >' => mysql_date()), 'limit' => 5)));
	}
	****/

	// Any URL ending in .html gets sent to this action
	function display($slug, $sub_menu_name = null) {
		
		$this->Page->recursive = 1;
			
		// Which other models should we load with the page?
		$contain = array(
			'ParentPage' => array('fields' => array('id', 'menu_name', 'name', 'link')),
			'Meta',
			// 'Template',
			'Widget',
			'Tag',
			'ChildPage',
			'ParentPage.ChildPage',
			// 'PagesMemberGroup' => array('page_id', 'member_group_id')
		);
		$page = $this->Page->find('first', array(
			'contain' => $contain,
			// 'recursive' => 2,
			'conditions' => array(
				'Page.link' => $this->here,
				'Page.islink' => 0,
				'Page.published' => 1,
			)
		));		

		// debug($page);
		
		if (empty($page)) throw new NotFoundException();
		// $this->MemberContext->checkSession($this);
		
		// Check whether user is allowed to view this page
		$permissions = unserialize($page['Page']['permissions']);
		// debug($permissions);
		// debug($this->Auth->User('Type'));
		if ($permissions != null
			&& $this->Auth->User('Type') != 'admin'
			&& !in_array('everyone', $permissions)
			&& !in_array($this->Auth->User('Type'), $permissions)) {
			$this->set('masthead_content', null);
			$this->view = 'permission-denied';
			return;
		}
		
		$this->setSafe('page', $page);
		$this->set('parentids', $this->Page->getParents($page['Page']['id']));
		
		//--- Title & keywords setting now occurs within AppController ----
		// For <title> tag, use Meta-data title or page name
		// $this->set('title_for_layout', $page['Meta']['page_title'] ? $page['Meta']['page_title'] : $page['Page']['name']);
		// For Page <h1> use parent page name (or page name if top-level & no parent exists)
		// $this->set('banner_title', $page['ParentPage']['name'] ? $page['ParentPage']['name'] : $page['Page']['name']);
		// $this->set('MetaK', $page['Meta']['meta_key']);
		// $this->set('MetaD', $page['Meta']['meta_desc']);
		//----		

	}
	
	function admin_preprocessor($action) {
		$ids = explode(',',str_replace('node_', '', $this->request->data['text']));
		$fids_arr = array();
		$dofma = false;
		$ids_arr = array();
		foreach($ids as $id) {
			if (strstr($id,'fixed_')) {
				$fids_arr[] = str_replace('fixed_', '', $id);
				$dofma = true;
			} else {
				$ids_arr[] = $id;
			}
		}
		if (count($ids_arr)>0)
			$this->request->data['text'] = implode(',', $ids_arr);
		else
			$this->request->data['text'] = '';

		if ($dofma) {
			$fids = implode(',', $fids_arr);
			ClassRegistry::init('FixedMenu');
			$fixedmenu = new FixedMenu();
			switch($action) {
				case 'pub'  :$fixedmenu->updateAll(array('FixedMenu.published'  => 1), array('FixedMenu.id IN ('.$fids.')'));break;
				case 'unpub':$fixedmenu->updateAll(array('FixedMenu.published'  => 0), array('FixedMenu.id IN ('.$fids.')'));break;
				case 'show' :$fixedmenu->updateAll(array('FixedMenu.showatmenu' => 1), array('FixedMenu.id IN ('.$fids.')'));break;
				case 'hide' :$fixedmenu->updateAll(array('FixedMenu.showatmenu' => 0), array('FixedMenu.id IN ('.$fids.')'));break;
			}
		}
	}
	
	/*******
	function admin_publishall($id=null) {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		$this->admin_preprocessor('pub');
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {
			$this->Page->updateAll(
				array('Page.published' => 1),
				array('Page.id IN ('.$ids.')'));
		}
	}
	
	function admin_unpublishall($id=null) {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		$this->admin_preprocessor('unpub');
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {
			$this->Page->updateAll(
				array('Page.published' => 0),
				array('Page.id IN ('.$ids.')')
			);
		}
	}
	
	function admin_showall($id=null) {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		$this->admin_preprocessor('show');
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {
			$this->Page->updateAll(
				array('Page.showatmenu' => 1),
				array('Page.id IN ('.$ids.')')
			);
		}
	}
	
	function admin_hideall($id=null) {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		$this->admin_preprocessor('hide');
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {
			$this->Page->updateAll(
				array('Page.showatmenu' => 0),
				array('Page.id IN ('.$ids.')')
			);
		}
	}
	
	
	/*****function admin_publish($id=null) {
		// Configure::write('debug',0);
		if ($id) {
			$this->Page->id = $id;
			$this->Page->saveField('published',1);
		}
	}
	
	function admin_unpublish($id=null) {
		// Configure::write('debug',0);
		if ($id) {
			$this->Page->id = $id;
			$this->Page->saveField('published',0);
		}
	}
	
	
	function admin_show($id=null) {
		// Configure::write('debug',0);
		if ($id) {
			$this->Page->id = $id;
			$this->Page->saveField('showatmenu',1);
		}
	}
	
	function admin_hide($id=null) {
		// Configure::write('debug',0);
		if ($id) {
			$this->Page->id = $id;
			$this->Page->saveField('showatmenu',0);
		}
	}****/

	/****** not sure this does anything? ********
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Page'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('page', $this->Page->read(null, $id));
	}
	/*******************************************/
	
	function admin_listsection() {
		$this->Page->recursive = -1;
		return $this->Page->find('list', array('conditions' => array('OR' => array('page_id'=>0))));
	}
	
	function admin_listsubsection() {
		// Configure::write('debug',0);
		/*$this->Page->recursive = -1;
		$sub_pages = $this->Page->find('list', array('conditions' => array(
																	'page_id' => $this->Page->getAllSubSections($this->request->data['Page']['section'])
																	)));
		$rsub_pages = array();
		foreach($sub_pages as $sub_page_key=>$sub_page_name) {
			if ($this->Page->isSubPage($sub_page_key)) {
				$rsub_pages[$sub_page_key] = $sub_page_name;
			}
		}*/
		$this->set('pages', $this->Page->sub($this->request->data['Page']['section']));
	}
	
	/*
	function admin_sub($page_id) {
		Configure::write('debug',0);
		$this->Page->recursive = -1;
		$sub_pages = $this->Page->find('list', array('conditions' => array('page_id' => $this->Page->getAllSubSections($page_id))));
		
		$rsub_pages = array();
		foreach($sub_pages as $sub_page_key=>$sub_page_name) {
			if ($this->Page->isSubPage($sub_page_key)) {
				$rsub_pages[$sub_page_key] = $sub_page_name;
			}
		}
		return $rsub_pages;
	}
	*/
	
	/*
	function admin_index() {
		//$this->cacheAction = '1 hour';
		//$this->layout = 'admin';
		$cond = array();
		if ($this->Session->check('Page.section') && strstr($this->Session->read('Page.section'),':0')) {
			$cond['Page.id'] = $this->Page->getAllSubSections($this->Session->read('Page.page_id'));
		} elseif($this->Session->check('Page.page_id')) {
			$cond['Page.page_id'] = $this->Session->read('Page.page_id');
		}

		if ($this->Session->check('Page.created_by')) {
			$cond['OR'] = array(
								'Page.created_by' => $this->Session->read('Page.created_by'),
								'Page.modified_by' => $this->Session->read('Page.created_by')
							);
		}
		
		if ($this->Session->check('Page.publish')) {
			$cond['Page.published'] = $this->Session->read('Page.publish');
		}
		
		if ($this->Session->check('Page.hidden')) {
			$cond['Page.showatmenu'] = $this->Session->read('Page.hidden');
		}

		$paging_array = array();
		$paging_array['order'] ='';
		if ($this->Session->check('Page.sortby')) {
			if ($this->Session->read('Page.sortby') == 'created' || $this->Session->read('Page.sortby') == 'modified')
				$paging_array['order']='Page.'.$this->Session->read('Page.sortby').' DESC';
			else
				$paging_array['order']='Page.'.$this->Session->read('Page.sortby');
		} else {
			$paging_array['order'] = $paging_array['order'] .'Page.modified DESC';
		}

		if ($this->Session->check('Page.search')) {
			$cond['Page.name LIKE'] = '%'.$this->Session->read('Page.search').'%';
		}
		
		if ($this->Session->check('Page_Pag.limit')) {
			$paging_array['limit'] = $this->Session->read('Page_Pag.limit');
		}
		
		$paging_array['fields'] =array(
			'Page.id',
			'Page.name',
			'Page.page_id',
			'Page.published',
			'Page.created',
			'Page.modified',
			'Page.menu_name',
			'Page.showatmenu',
			'Page.created_by',
			'Page.modified_by',
			'Page.sitemap_id',
			'Page.subpages',
			'Page.porder',
			'Page.islink',
			'Page.link',
			'Page.linktype',
			'ParentPage.id',
			'ParentPage.name',
			'CUser.id',
			'CUser.username',
			'MUser.id',
			'MUser.username',
			'Sitemap.id',
			'Sitemap.start_menu'
		);
		
		$paging_array['contain'] = array(
									'ParentPage' => array('fields' => array('id', 'menu_name')),
									'CUser' => array('fields' => array('id', 'username')),
									'MUser' => array('fields' => array('id', 'username')),
									'Sitemap'
								);
		if (count($paging_array)>0)
			$this->paginate = $paging_array;
		$result = $this->paginate($cond);
		foreach($result as $key=>$record) {
			$result[$key]['Page']['secure'] = $this->Page->isSecure($record['Page']['id']);
			if (intval($record['ParentPage']['id'])>0) {
				$prow = $this->Page->find('first', array('conditions' => array('Page.id' => $record['ParentPage']['id']),'fields' => array('id', 'name'),'contain' => array('ParentPage' => array('fields' => array('id', 'name'))))); 
				$result[$key]['TParentPage']['id'] =  $prow['ParentPage']['id'];
				$result[$key]['TParentPage']['menu_name'] =  $prow['ParentPage']['name'];
			} else {
				$result[$key]['TParentPage']['id'] =  '';
				$result[$key]['TParentPage']['menu_name'] =  '';
			}
		}
		$this->set('pages', $result);
	}
	*/
	
	// Backend form for updating various elements on the site homepage
	function admin_homepage() {
		$this->helpers[] = 'CmsForm';
		$this->layout = 'admin_form';
		
		// If form is being posted
		if ($this->request->is('post')) {
			
			// Set video ID
			$this->request->data['Homepage']['video_id'] = $this->_getYoutubeId($this->request->data['Homepage']['video_url']);
			
			$fields = $this->request->data['Homepage'];
			$fields['Meta'] = $this->request->data['Meta'];		// add meta tag fields to homepage array
			$this->Setting->write('Homepage', $fields);
			$this->Setting->write('Homepage.Widget', $this->request->data['Widget']);
			$this->Session->setFlash('The homepage has been successfully updated.');
		}
		
		// Get all rows from homepage table, send to view
		// We're not using a normally-structured model, so some slight faking things here
		// debug(array('homepage' => $this->KeyValue->get('homepage')));

		// debug($data);
		// debug(array('homepage' => $this->KeyValue->get('homepage',true)));
		// $this->request->data = $this->Setting->read('Homepage');
		$this->request->data['Homepage'] = $this->Setting->read('Homepage');
		$this->request->data['Widget'] = $this->Setting->read('Homepage.Widget');
		// $this->request->data['Meta'] = $homepageData;		// ensure the SEO widget gets populated correctly
	}
	
	function admin_spindex($page_num, $limit) {
				
		$cond = array();
		if ($this->Session->check('Page.section') && strstr($this->Session->read('Page.section'),':0')) {
			$cond['OR'] = array(
							'Page.id' => $this->Session->read('Page.page_id'),
							'Page.page_id' => $this->Session->read('Page.page_id')
							);
		} elseif($this->Session->check('Page.page_id')) {
			$cond['Page.page_id'] = $this->Session->read('Page.page_id');
		}

		if ($this->Session->check('Page.created_by')) {
			$cond['OR'] = array(
								'Page.created_by' => $this->Session->read('Page.created_by'),
								'Page.modified_by' => $this->Session->read('Page.created_by')
							);
		}
		
		if ($this->Session->check('Page.publish')) {
			$cond['Page.published'] = $this->Session->read('Page.publish');
		}
		
		if ($this->Session->check('Page.hidden')) {
			$cond['Page.showatmenu'] = $this->Session->read('Page.hidden');
		}

		$paging_array = array();
		if (is_numeric($page_num)) {
			$paging_array['page'] = $page_num+1;
		}
		$paging_array['order'] ='';
		if ($this->Session->check('Page.sortby')) {
			if ($this->Session->read('Page.sortby') == 'created' || $this->Session->read('Page.sortby') == 'modified')
				$paging_array['order']='Page.'.$this->Session->read('Page.sortby').' DESC';
			else
				$paging_array['order']='Page.'.$this->Session->read('Page.sortby');
		} else {
			$paging_array['order'] = $paging_array['order'] .'Page.modified DESC';
		}

		if ($this->Session->check('Page.search')) {
			$cond['Page.name LIKE'] = '%'.$this->Session->read('Page.search').'%';
		}
		
		if ($this->Session->check('Page_Pag.limit')) {
			$paging_array['limit']=$this->Session->read('Page_Pag.limit');
		}
		
		$paging_array['contain'] = array(
									'ParentPage' => array('fields' => array('id', 'name')),
									'CUser' => array('fields' => array('id', 'username')),
									'MUser' => array('fields' => array('id', 'username')),
									'Sitemap'
								);
		if (count($paging_array)>0)
			$this->paginate = $paging_array;
		$result = $this->paginate($cond);

		foreach($result as $key=>$record) {
			if ($key<$limit) {
				if (intval($record['ParentPage']['id'])>0) {
					$prow = $this->Page->find('first', array('conditions' => array('Page.id' => $record['ParentPage']['id']),'fields' => array('id', 'name'),'contain' => array('ParentPage' => array('fields' => array('id', 'name'))))); 
					$result[$key]['TParentPage']['id'] =  $prow['ParentPage']['id'];
					$result[$key]['TParentPage']['name'] =  $prow['ParentPage']['name'];
				} else {
					$result[$key]['TParentPage']['id'] =  '';
					$result[$key]['TParentPage']['name'] =  '';
				}
			} else {
				unset($result[$key]);
			}
		}
		
		$this->set('pages', $result);
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Page');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('page', $this->Page->read(null, $id));
	}

	// Note: we should really reuse code in admin_edit() as most of it is very similar
	// Duplicated code == more bugs!
	function admin_add($page_id=null, $sitemap_id=null) {
		$this->layout = 'admin_form';
		if (!empty($this->request->data)) {
			$this->Page->create();
			if ($this->request->data['Page']['menu_name'] == 'Same as page title' || $this->request->data['Page']['menu_name'] == '') {$this->request->data['Page']['menu_name'] = $this->request->data['Page']['name'];}
			
			$this->request->data['Page']['menu_name'] = Sanitize::paranoid($this->request->data['Page']['menu_name'], array('/', '&', ' '));
			
			$this->request->data['Page']['created_by'] = $this->Session->read('Auth.User.id');
			if ($this->Page->save($this->request->data)) {
			
				$this->Page->id = $this->Page->getLastInsertId();
				$this->request->data['Meta']['page_title'] = str_replace('[PageName]', $this->request->data['Page']['name'], $this->request->data['Meta']['page_title']);
				$this->Page->saveField('meta_id', $this->Page->Meta->metaSave($this->request->data['Meta'],1, $this->Page->id));

				if (intval($this->Page->id)!=0) {
					$this->Page->query("UPDATE `pages` SET `subpages`=`subpages`+1 WHERE id='".$this->Page->id."'");
				}
				$this->Session->setFlash('The Page has been saved');
			    $this->redirect('/admin-sitemap/'.$this->request->data['Page']['sitemap_id']);
			} else {
				$this->Session->setFlash('The Page could not be saved. Please, try again.');
			}
		}
		
		if ($sitemap_id!=null) {
			$this->request->data['Page']['sitemap_id'] = $sitemap_id;
			$this->request->data['Page']['page_id']    = $page_id;
		} else {
			$this->redirect('/admin-sitemap');
		}
		if (isset($this->request->data['Page']['page_id'])) {
			if (intval($this->request->data['Page']['page_id'])!=0) {	
				$this->Page->recursive = -1;
				$ipage = $this->Page->read('name', $this->request->data['Page']['page_id']);
				$this->set('parent_name', $ipage['Page']['name']);
			} else {
				$this->Page->Sitemap->recursive = -1;
				$smap = $this->Page->Sitemap->read('start_menu', $this->request->data['Page']['sitemap_id']);
				$this->set('parent_name', $smap['Sitemap']['start_menu']);
			}
		}
	}
	
	function admin_test() {
		$this->autoRender = false;
		$result = $this->Page->save(array(
			'Page' => array('title' => 'Test XXX'),
			'Widget' => array('Widget' => array(3))
		), false);
		debug($result);
		debug($this->Page);
	}

	// Editing a page (or link) in admin area
	// Handles initial GET, and POST data
	function admin_edit($id = null, $redirect = 'admin/pages') {
		$this->layout = 'admin_form';
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash('Invalid Page');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			//------- Save data to DB..... --------
			// debug($this->request->data);
			if ($this->request->data['Page']['menu_name'] == 'Same as page title'||$this->request->data['Page']['menu_name'] == '') {$this->request->data['Page']['menu_name'] = $this->request->data['Page']['name'];}
			//$this->request->data['Page']['menu_name'] = Sanitize::paranoid($this->request->data['Page']['menu_name'], array('/', '&', ' '));
			//echo filter_var($this->request->data['Page']['menu_name'], FILTER_SANITIZE_URL);
			
			$this->request->data['Page']['modified_by'] = $this->Session->read('Auth.User.id');
			// if (isset($this->request->data['Meta']))
			$this->request->data['Meta']['page_title'] = str_replace('[PageName]', $this->request->data['Page']['name'], $this->request->data['Meta']['page_title']);
			$this->request->data['Meta']['item_type_id'] = 1;
			if ($this->Page->saveAssociated($this->request->data)) { 	// if validation succeeded (page is saved)
				// $this->Page->id = $this->request->data['Page']['id'];
				// if ($this->request->data['Page']['islink'] == false) {  // is a page, not a link
					// $this->request->data['Meta']['page_title'] = str_replace('[PageName]', $this->request->data['Page']['name'], $this->request->data['Meta']['page_title']);
					// $this->Page->Meta->metaSave($this->request->data['Meta'],1, $this->Page->id, $this->request->data['Page']['meta_id']);
				// }
				/*if (isset($this->request->data['Widget'])) {
					$applydata = $this->request->data['Widget'];
					$applyother = $this->request->data['Extra']['applyto'];
				}*/

				/*if (isset($applyother) && $applyother!='') {
					if (in_array('sub', $applyother))
						$tempResult = $this->Page->Widget->applySubpages($this->Page->id, $applydata['Widget']);
				}*/
				
				// Read full lot of data from database to populate form again
				$this->request->data = $this->Page->read(null, $this->Page->id);
				$this->Session->setFlash('The Page has been saved');
			} else { // validation failed
				$this->Session->setFlash('The Page could not be saved. Please, try again.');
				$this->set('errors', $this->Page->invalidFields());
			}
		} else { /* if empty($this->request->data) */
			$this->request->data = $this->Page->read(null, $id);
		}
		
		if (isset($this->request->data['Page']['page_id'])) {
			if (intval($this->request->data['Page']['page_id'])!=0) {	
				$this->Page->recursive = -1;
				$ipage = $this->Page->read('name', $this->request->data['Page']['page_id']);
				$this->set('parent_name', $ipage['Page']['name']);
			} else {
				$this->Page->Sitemap->recursive = -1;
				$smap = $this->Page->Sitemap->read('start_menu', $this->request->data['Page']['sitemap_id']);
				$this->set('parent_name', $smap['Sitemap']['start_menu']);
			}
		}
		
		if (!isset($this->request->data['Redirect']['redirect'])) {
			$this->request->data['Redirect']['redirect'] = $redirect;
		}
	}
	
	/****
	function admin_copy($id = null, $redirect='admin/pages') {
		//pr($this->Page->schema());
		//pr($this->Page->_schema);
		$this->layout = 'admin_form';
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash('Invalid Page');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->request->data['Page']['menu_name'] == 'Same as page title') {$this->request->data['Page']['menu_name'] = $this->request->data['Page']['name'];}
			//$this->request->data['Page']['menu_name'] = Sanitize::paranoid($this->request->data['Page']['menu_name'], array('/', '&', ' '));
			$this->request->data['Page']['created_by'] = $this->Session->read('Auth.User.id');
			if ($this->Page->save($this->request->data)) {
				$page_id = $this->Page->getLastInsertId();
				if ($this->request->data['Page']['islink'] == false) {
					$this->Page->id = $page_id;
					$this->Page->saveField('meta_id', $this->Page->Meta->metaSave($this->request->data['Meta'],1, $this->Page->id));
				}
				$this->Session->setFlash(__('The Page has been saved'));
			//	if ($this->request->data['Redirect']['redirect']!='admin-sitemap') {
			//		$this->redirect('/'.$this->request->data['Redirect']['redirect']);
			//	} elseif($this->request->data['Redirect']['redirect'] == '') {
			//		$this->redirect('/admin/pages/');
			//	} else {
			//		$this->redirect('/admin-sitemap/'.$this->request->data['Page']['sitemap_id'].'/'.$page_id);
			//	}	
				$this->redirect('/admin/pages/edit/'.$page_id);
			} else {
				$this->Session->setFlash(__('The Page could not be saved. Please, try again.'));
				$this->set('errors', $this->Page->invalidFields());
			}
		}
		if ($id) {
			$this->request->data = $this->Page->read(null, $id);
		}
		
		if (isset($this->request->data['Page']['page_id'])) {
			if (intval($this->request->data['Page']['page_id'])!=0) {	
				$this->Page->recursive = -1;
				$ipage = $this->Page->read('name', $this->request->data['Page']['page_id']);
				$this->set('parent_name', $ipage['Page']['name']);
			} else {
				$this->Page->Sitemap->recursive = -1;
				$smap = $this->Page->Sitemap->read('start_menu', $this->request->data['Page']['sitemap_id']);
				$this->set('parent_name', $smap['Sitemap']['start_menu']);
			}
		}
		if (!isset($this->request->data['Redirect']['redirect'])) {
			$this->request->data['Redirect']['redirect'] = $redirect;
		}
	}
	*****/

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Page');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Page->deleteMultiple($id);
		}
		
		if (!$this->RequestHandler->isAjax()) {
			$this->Session->setFlash('The Page could not be deleted. Please, try again.');
			$this->redirect('/admin/pages');
		}
	}
	
	function admin_deleteall() {
		$this->layout = 'ajax';
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {
			$this->Page->deleteMultiple($ids,true);
		}
	}
	
	
	function admin_listdeleteall($page_num) {
		$this->layout = 'ajax';
		$ids = str_replace('node_', '', $this->request->data['text']);
		if (strlen(trim($ids))>0) {		
			$ids_array = explode(',', $ids);
			if (count($ids_array)>0)
				$this->admin_spindex($page_num,count($ids_array));
			$this->Page->deleteMultiple($ids,true);
		}
	}
	
	
	
	/*function admin_search() {
		$search = trim($this->request->data['Page']['search']);
		if (strlen($search)>0) {
			$this->Session->write('Page.search', $search);
		} else {
			$this->Session->delete('Page.search');
		}
		$this->redirect(array('action' => 'index'));
	}*/
	
	/*
	function admin_filter() {
		//clearCache('controller_action/');
		if (intval($this->request->data['Page']['section'])>0) {
			if (isset($this->request->data['Page']['sub_section']) && intval($this->request->data['Page']['sub_section'])>0) {
				$this->Session->write('Page.page_id', $this->request->data['Page']['sub_section']);
				$this->Session->write('Page.section', $this->request->data['Page']['section'].':'.$this->request->data['Page']['sub_section']);
			} else {
				$this->Session->write('Page.page_id', $this->request->data['Page']['section']);
				$this->Session->write('Page.section', $this->request->data['Page']['section'].':0');
			}
		} else {
			$this->Session->delete('Page.page_id');
			$this->Session->delete('Page.section');
		}
		
		if (intval($this->request->data['Page']['created_by'])>0) {
			$this->Session->write('Page.created_by', $this->request->data['Page']['created_by']);
		} else {
			$this->Session->delete('Page.created_by');
		}
		
		if (intval($this->request->data['Page']['status'])>-1) {
			if (intval($this->request->data['Page']['status']) == 2) {
				$this->Session->write('Page.hidden',0);
			} else {
				$this->Session->write('Page.publish', $this->request->data['Page']['status']);
			}
		} else {
			$this->Session->delete('Page.publish');
			$this->Session->delete('Page.hidden');
		}
		
		if ($this->request->data['Page']['sortby']!='') {
			$this->Session->write('Page.sortby', $this->request->data['Page']['sortby']);
		} else {
			$this->Session->delete('Page.sortby');
		}
	//	$this->admin_csearch();
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_clrfilter() {
		$this->Session->delete('Page.page_id');
		$this->Session->delete('Page.section');
		$this->Session->delete('Page.created_by');
		$this->Session->delete('Page.publish');
		$this->Session->delete('Page.hidden');
		$this->Session->delete('Page.sortby');
		$this->redirect('/admin/pages');
		exit;
	}
	
	function admin_clrsearch() {
		$this->Session->delete('Page.search');
		$this->redirect('/admin/pages');
		exit;
	}
	*/

	function admin_getsitemap($sitemap, $page_id) {
		$this->Page->recursive = -1;
		return $this->Page->find('all', array('conditions' => array('page_id' => $page_id,'sitemap_id' => $sitemap),'order' => array('porder')));
	}
	
	function admin_orderchange($id, $page_id, $order) {
		$this->Page->id = $id;
		$this->Page->saveField('page_id', $page_id);
		$this->Page->saveField('porder', $order);
	}
	
	function admin_orderchangeall() {
		$this->layout = 'ajax';
		ClassRegistry::init('FixedMenu');
		$fixedmenu = new FixedMenu();
		// debug($this->params->data['pages']);
		$pages = json_decode($this->params->data['pages']);
		if (isset($pages[0])) {
			foreach($pages as $key=>$page) {
				if (is_numeric($page[0])) {
					$this->Page->updateOrder($page[0], $page[1], $key);
				} else {
					$fixedmenu->updateOrder(str_replace('fixed_', '', $page[0]),str_replace('fixed_', '', $page[1]), $key);
				}
			}
		}
	}
	
	function admin_getporder($page_id) {
		$page_count = $this->Page->find('count', array('condition' => array('page_id' => $page_id)));
		$fixedmenu = ClassRegistry::init('FixedMenu');
		$fm_count = $fixedmenu->find('count', array('condition' => array('page_id' => $page_id)));
		return $page_count + $fm_count + 1;
	}
	
	// Add a new page from the Site Map screen
	function admin_ajaxadd($page_id=null, $sitemap_id=null, $islink='') {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		// Set some default values for new page
		if ($islink) {
			$this->request->data['Page']['islink'] = 1;
			// $this->request->data['Page']['menu_name'] = 'Same as page title';
			$this->request->data['Page']['name'] = 'New Link';
		} else {
			$this->request->data['Page']['islink'] = 0;
			// $this->request->data['Page']['menu_name'] = 'Same as page title';
			$this->request->data['Page']['name'] = 'New Page';
		}
		$this->request->data['Widget']['Widget']= array('1', '2', '3', '5', '6');
		$this->request->data['Page']['content'] = '';
		$this->request->data['Page']['sitemap_id'] = $sitemap_id;
		$this->request->data['Page']['page_id'] = $page_id;
		$this->request->data['Page']['id'] = null;
		$this->request->data['Page']['porder'] = $this->admin_getporder($page_id);
		$this->request->data['Page']['showatmenu'] = 1;
		$this->request->data['Page']['template_id'] = 0;
		$this->request->data['Page']['published'] = 0;
		$this->Page->save($this->request->data,false);
		$page_id = $this->Page->getLastInsertId();
		$this->request->data['Page']['id'] = $page_id;
		if ($islink == false) {
			$meta['Meta'] = array('meta_key' => ' ', 'meta_desc' => ' ', 'item_type_id'=>1,'item_id' => $page_id);
			$this->Page->Meta->save($meta);
			$meta_id = $this->Page->Meta->getLastInsertId();
			$this->Page->id = $page_id;
			$this->Page->saveField('meta_id', $meta_id);
		}
		if ($islink == true) {
			$this->request->data['Page']['menu_name'] = 'New Link';
		} else {
			$this->request->data['Page']['menu_name'] = 'New Page';
		}
		// Found 'subpages' is not used in our CMS.
		//if (intval($this->request->data['Page']['page_id'])!=0) {
		//	$this->Page->updateAll(array('Page.subpages'=>'Page.subpages +1'), array('Page.id'=>$this->request->data['Page']['page_id']));
		//}
		$this->set('node', $this->request->data['Page']);
	}
	
	function admin_ajaxcopy($page_id=null, $sitemap_id=null, $islink='') {
		// Configure::write('debug',0);
		$this->layout = 'ajax';

		$existingPage = $this->Page->find('first', array('recursive'=>0,'conditions' => array('Page.id' => $page_id)));
		
		
		$this->request->data['Page'] = $existingPage['Page'];
		$this->request->data['Widget']['Widget']= array('1', '2', '3', '5', '6');
		$this->request->data['Page']['name'] = $existingPage['Page']['name'].' - copy';
		$this->request->data['Page']['menu_name'] = '';
		$this->request->data['Page']['sitemap_id'] = $sitemap_id;
		$this->request->data['Page']['id'] = null;
		$this->request->data['Page']['modified'] = null;
		$this->request->data['Page']['created'] = null;
		$this->request->data['Page']['published'] = 0;
		
		$tempPages = $this->Page->find('all', array('order' => 'Page.porder', 'conditions' => array('Page.page_id' => $existingPage['Page']['page_id']))); 
		
		// arrange all porder (index for the sitemap)
		$addone = false;
		foreach($tempPages as $tempP) {
			if ($addone)
				$this->Page->updateAll(array('Page.porder'=>'Page.porder+1'), array('Page.id'=>$tempP['Page']['id']));
			elseif($existingPage['Page']['id'] == $tempP['Page']['id']) {
				$addone = true;
				$newpageporder = $tempP['Page']['porder']+1;
			}
		}
		$this->request->data['Page']['porder'] = $newpageporder;
		
		$this->Page->save($this->request->data,false);

		$page_id = $this->Page->getLastInsertId();
		// Function which applies member group permission for the page copying
		//$pagememberDetail = $this->Page->updateMemberGroup($existingPage['Page']['id'], $page_id);
		
		$this->request->data['Page']['id'] = $page_id;
		if ($this->request->data['Page']['islink'] == 0) {
			$existingPage['Meta']['id']	= null;
			$existingPage['Meta']['item_id'] = $page_id;
			$arrMetaValue['Meta'] = $existingPage['Meta']; 
			$this->Page->Meta->save($arrMetaValue);		
			$meta_id = $this->Page->Meta->getLastInsertId();
			$this->Page->id = $page_id;
			$this->Page->saveField('meta_id', $meta_id);
		}
		// Found 'subpages' is not used in our CMS.
		//if (intval($this->request->data['Page']['page_id'])!=0) {
		//	$this->Page->updateAll(array('Page.subpages'=>'Page.subpages +1'), array('Page.id'=>$this->request->data['Page']['page_id']));
		//}
		$this->set('node', $this->request->data['Page']);
		//$this->set('secure', $pagememberDetail);
//		$this->redirect('/admin-sitemap');
		
	}
	
	function admin_preview($pageId = 0, $viewVarName = '', $view = 'view', $layout = 'default') {
		// Use frontend layout and view
		$this->layout = 'default';
		$this->view = 'display';

		// Load page from DB
		$page = $this->Page->recursive = 2;
		$page = $this->Page->findById($pageId);
		// debug($page);		
		// debug($this->request->data);
		
		// Overwrite with latest data from POST
		$page = array_merge_recursive_simple($page, $this->request->data);
		unset($page['Tag']['Tag']);		// fixes warning in tags helper		
		
		
		$this->setSafe('page', $page);
		$this->set('preview_url', $page['Page']['link']);
		$this->set('parentids', $this->Page->getParents($page['Page']['id']));


		// For <title> tag, use Meta-data title or page name
		$this->set('title_for_layout', 
			$page['Meta']['page_title'] 
			? $page['Meta']['page_title'] 
			: str_replace('%TITLE%', $page['Page']['name'], $this->DEFAULT_PAGE_TITLE)
		);
		// For Page <h1> use parent page name (or page name if top-level & no parent exists)
		$this->set('banner_title', $page['ParentPage']['name'] ? $page['ParentPage']['name'] : $page['Page']['name']);
		$this->set('MetaK', $page['Meta']['meta_key']);
		$this->set('MetaD', $page['Meta']['meta_desc']);

		
		
		
		
		
		/**** old overly complicated code ***
		if ($savetosession == 1) {
			$this->Session->write('pagepreviewdata', $this->request->data);
		} else {
			$page = $this->Session->read('pagepreviewdata');
			$this->Session->delete('pagepreviewdata');
			if ($page['Page']['islink'] == 0) {
				if ($page['Page']['menu_name'] == 'Same as page title') {
					$this->here = '/'.$page['Page']['name'].'.html';
				} else {
					$this->here = '/'.$page['Page']['menu_name'].'.html';
				}
			} elseif($page['Page']['islink'] == 1) {
				header('location:http://'.urlencode(str_replace('http://', '', $page['Page']['link'])));
			}
			//pr($page);
			
			$Widgets = array();
			if (isset($page['Widget']['Widget']) && is_array($page['Widget']['Widget']))
				foreach($page['Widget']['Widget'] as $key=>$widget) {
					$Widgets[$key]['id'] = $widget;
				}
			$page['Widget'] = $Widgets;
			
			
			$parent_page = $this->Page->read(null, $page['Page']['page_id']);
			
			if (isset($parent_page['Page']['id'])) {
				$page['ParentPage'] = $parent_page['Page'];
			}
			
			if (isset($parent_page['Page']['id']) == 0) {
				$parent_page['Page']['menu_name']='Home';
				$page['ParentPage'] = $parent_page['Page'];
			}
			
			
			if (isset($page['Page']['name'])) {
				$this->pageTitle = $page['Meta']['page_title'];
				$this->set('MetaK', $page['Meta']['meta_key']);
				$this->set('MetaD', $page['Meta']['meta_desc']);	
				$this->set('parentids', $this->Page->getParents($page['Page']['id']));
			} else {
				$this->pageTitle = 'Page Not Published';
				$this->set('MetaK', 'Page Not Published');
				$this->set('MetaD', 'Page Not Published');
				$page = array();
				$page['Page']['name'] = 'Page Not Published';
				$page['Page']['content'] = '';
			}
			$this->set('page', $page);
		}
		****/
		
	}

	/*** WTF is this function for? ***
	function admin_filemanager() {
		$i = 0;
	}
	***/
	
	public function home() {
		$this->set('video_id', $this->Setting->read('Homepage.video_id'));
		//$this->setSafe('widgets', $this->_getHomepageWidgets());
	}
	
	public function _getHomepageWidgets() {
		// TODO: Figure out how we're going to treat the Homepage as a 'Page' or datatype, instead of saving it to the Settings table. It's too stringy like this.
		
		$this->loadModel('Widget');
		
		// Find the widgets saved to the Homepage setting]
		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Widget.id' => $this->Setting->read('Homepage.Widget.Widget'), // read Homepage Setting
			),
		));
	
		// Array is in format 0.Widget.Array() instead of 0.Array() -- pull them out
		foreach ($widgets as $key => $widget) {
			$widgets[$key] = $widget['Widget'];
		}
		
		return $widgets;
	}
	
	/**
	 * Script to regenerate all page links (using slugs)
	 * Makes use of existing beforeSave hook in Page model which generates links on save
	 * This is used for old page records that need a link generated
	 */ 
	public function regenerateAllLinks($go) {
		$this->autoRender = false;
		if (!$go) return 'Oops, not going...';
		
		$this->Page->recursive = -1;
		$pages = $this->Page->find('all');
		foreach ($pages as $page)
			$this->Page->save($page);
		echo count($pages) . ' page links regenerated.';
	}
	
	private function _getYoutubeId($url = '') {
		preg_match('/\?.*v=(.*)&?/', $url, $matches); 
		
		return isset($matches[1]) ? $matches[1] : false;
	}
}
