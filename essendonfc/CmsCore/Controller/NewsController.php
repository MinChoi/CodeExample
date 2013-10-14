<?php
App::uses('CmsCoreController', 'Controller');
class NewsController extends CmsCoreController {

	// var $components = array('Paginator');
	// var $_mergeParent = 'CmsCoreController';
    
	// default pagination options
	var $paginate = array(
        'limit' => 30,
        'order' => array('News.publish_date' => 'desc')
    );
	
	// var $FRIENDS_CATEGORY_ID = 4;							// this category is hidden from public view (altho friends has since been removed from scope)
	
	// GLOBAL NEWS VARIABLES.
	var $news_content_types = array(
		'content' => 'Text content',						// the 3 values here match the names of the 3 fields in the model (& admin_edit)
		'file_attach' => 'An uploaded file (eg. a PDF)',
		'url' => 'A link to another web page (URL)'
	);
	
	// News summary screen, showing 2 articles, 2 publications and 2 presentations
	/* index function in CORE 2.2
	function index() {
		$this->News->NewsCategory->hasMany['News']['limit'] = 2;
		$this->News->NewsCategory->hasMany['News']['order'] = 'publish_date DESC';
        $this->set('categories', $this->News->NewsCategory->find('all', array(
                'conditions' => array('id !=' => $this->FRIENDS_CATEGORY_ID)
			)
		));
	}*/
	
	function index() {
        $this->set('news', $this->News->find('all', array(
                'order' => 'News.publish_date DESC'
			)
		));
	}
	
	// List all news items in a particular category
	function category($id) {
		$this->view = 'list';
		$items = $this->paginate('News', array('news_category_id' => $id));

		// Provide filter options
		$this->setSafe('practiceAreas', $this->News->PracticeArea->find('list'));
		
		// Apply filters if necessary
		$pa = @$this->request->data['Filter']['PracticeAreas'];
        if ($pa)
            $this->_filter($items, "/PracticeArea[id=$pa]");

		$this->set('items', $items);
		$this->set('category_title', $this->News->NewsCategory->field('name', array('id' => $id)));
	}
	
	// Display a news article
	function view($id) {
		// News articles can be: HTML content, file upload, external URL.  Need to detect which.
		$article = $this->News->findById($id);
		if (!$article) throw new NotFoundException('The news article is no longer available.');
		if ($article['News']['content_type'] == 'file_attach') {
			$this->redirect($article['News']['file_attach']);
		} elseif ($article['News']['content_type'] == 'url') {
			$this->redirect($article['News']['url']);
		} else {
			// content_type == 'content'
			$this->set('newsItem', $article);
		}
		$this->set('banner_title', 'News & Publications');
	}
	
	function search($tagid = '', $search_ele = '', $limit = 5) {
		$this->set('search_ele', $search_ele);
		$search_ele = base64_decode($search_ele);
		
		$this->News->bindModel(array('hasOne' => array('NewsMemberGroup')));
		
		$this->paginate = array(
			'order' => 'News.publish_date DESC',
			'limit' => $limit,
			'fields' => array('id', 'publish_date', 'title', 'short_desc'),
			'contain' => array(
				'CUser' => array('fields' => array('id', 'fullname')),
				'NewsMemberGroup' => array('fields' => array('news_id'))
			)
		);

		$cond = array();
		$cond['News.published'] = 1;
		//$cond['NewsTag.tag_id']=$tagid;
		$cond['OR'] = array(
						//'NewsTag.tag_id' => $tagid,
						'News.title LIKE' => '%'.$search_ele.'%',
						'News.content LIKE' => '%'.$search_ele.'%'
					);
		$this->News->recursive = 0;
		$this->set('tagid', $tagid);
		$this->set('news', $this->paginate($cond));
	}
	
	// admin_add() is in AppController.php, and calls admin_edit() for most functionality
	
	function admin_edit($id = null /*, $redirect='admin/Persons'*/) {
		// $this->set('teams', $this->Person->Team->find('list'));
		// $this->set('practiceAreas', $this->News->PracticeArea->find('all'));	
		$this->request->data['Meta']['item_type_id'] = 2;
		parent::admin_edit($id);
		$this->set('news_content_types', $this->news_content_types);
		$this->set('news_categories', $this->News->NewsCategory->find('list'));
	}
		
    function admin_gaction($action) {
		// Configure::write('debug',0);
		$this->layout = 'ajax';
		$ids = trim($this->request->data['ids']);
		if (strlen($ids) > 0) {
			switch($action) {
				case 'publish':
					$this->News->updateAll(array('News.published' => 1), array('News.id IN ('.$ids.')'));
					break;
				case 'unpublish':
					$this->News->updateAll(array('News.published' => 0), array('News.id IN ('.$ids.')'));
					break;
				case 'show':
					$this->News->updateAll(array('News.showatmenu' => 1), array('News.id IN ('.$ids.')'));
					break;
				case 'hide':
					$this->News->updateAll(array('News.showatmenu' => 0), array('News.id IN ('.$ids.')'));
					break;
			}
		}
	}	
	
	function admin_preview($id) {
		parent::admin_preview($id, 'newsItem');
	}
	
	/*
	function admin_preview($savetosession=0) {
		$this->layout = 'default';
		if ($savetosession == 1) {
			$this->Session->write('newspreviewdata', $this->request->data);
		} else {
			$news = $this->Session->read('newspreviewdata');
			$this->Session->delete('newspreviewdata');
			if ($news['News']['category_id']>0) {
				$this->News->Category->recursive = -1;
				$category = $this->News->Category->read(null, $news['News']['category_id']);
				$news['Category'] = $category['Category'];
			}
			
			$Widgets = array();
			if (isset($news['Widget']['Widget']) && is_array($news['Widget']['Widget']))
				foreach($news['Widget']['Widget'] as $key=>$widget) {
					$Widgets[$key]['id'] = $widget;
				}
			$news['Widget'] = $Widgets;
			
			$this->pageTitle = 'News';
			$this->set('MetaK', 'DCA News');
			$this->set('MetaD', 'DCA News List');
			$this->set('page', $this->get_news_page_detials());

			if (trim($news['Category']['name'])!='All') {
				$this->here = '/NewsCat/'.str_replace(array('&', '/', ' '), array('and', 'or', '-'), $news['Category']['name']);
			} else {
				$this->here = '/Upcoming_News';
			}
			
			
			$this->set('news', $news);
		}
	}
	*/
	
	
}	