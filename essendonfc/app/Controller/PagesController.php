<?php
/**
 * This controller displays all the standard content pages that are managed in the CMS (under "Pages" tab)
 * Each page usually consists of a heading, menu label, block of HTML content (entered by admin users),
 * some META data (description, keywords), a list of selected widgets to be displayed on that page,
 * and in some cases a list of tags that relate to that page (as a way of categorising them).
 */
// App::import('Sanitize');
App::uses('CorePagesController', 'Controller');
class PagesController extends CorePagesController {



	// Display the homepage
	function home() {
		
		parent::home();

		$this->set('video_id', $this->Setting->read('Homepage.video_id'));

		$this->setSafe('member_news', $this->Setting->read('Homepage.MemberNews')); 

		//$this->cacheAction = '1 hour';
		
		// Used a reduced list of helpers on the homepage
		// $this->helpers = array('Html', 'Session', 'Form');

		// $homepageData = $this->KeyValue->get('homepage', true);
		// $this->set('home', $homepageData);		// all homepage content is stored in key_value table/model (see admin_homepage())
		// $this->set('title_for_layout', $homepageData['page_title']);
		// $this->set('MetaK', $homepageData['meta_key']);
		// $this->set('MetaD', $homepageData['meta_desc']);
		
		// Get latest news/events entries for the content boxes
		// $news = ClassRegistry::init('News');
		// $events = ClassRegistry::init('Event');
		// $news->recursive = -1;
		// $events->recursive = -1;
		// $this->set('news', $news->find('all', array('conditions' => array('news_category_id' => 1), 'limit' => 3)));
		// $this->set('alerts', $news->find('all', array('conditions' => array('news_category_id' => 3), 'limit' => 3)));
		// $this->set('events', $events->find('all', array('conditions' => array('start_date >' => mysql_date()), 'limit' => 5)));
		
		
			
		
	}
	
	function admin_homepage() {
		
		if ($this->request->is('post')) {
		
			// Grab the video ID
			preg_match('/\?.*v=(.*)&?/', $this->request->data['Homepage']['video_url'], $matches);
			
			// save the video id
			if (isset($matches[1])) {
				$this->request->data['Homepage']['video_id'] = $matches[1];
			} else {
				$this->Session->setFlash('Invalid Youtube ID.');
			}
			
		}
		
		parent::admin_homepage();
	}
	
}
