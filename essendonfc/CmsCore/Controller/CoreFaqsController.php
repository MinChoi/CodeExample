<?php
App::uses('CmsCoreController', 'Controller');
class CoreFaqsController extends CmsCoreController {

	// var $name = 'Faqs';
	public $uses = array('Faq', 'FaqSection');
	var $helpers = array('Html', 'Form');//, 'Cache'
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('getlatest','index','get_faq_page_detials','view','search','bycategory','mfaq','mfaq_view');
	}
	
	function admin_edit($id) {
		parent::admin_edit($id);
		$this->set('sections', $this->FaqSection->find('list'));
	}
	
	// function view() {
	function index() {

		$faqs = $this->Faq->find('all', array(
			'conditions' => array('Faq.published' => 1),
			'order' => array(
				'FaqSection.weight',
				'FaqSection.sortorder',
				'FaqSection.id',
				'Faq.weight',
				'Faq.displaying_order',
				'Faq.id',
			),
		));
		
		// debug($faqs);
		// $faqs = Set::sort($faqs, '{n}.Category.id', 'ASC');
		// $faqs = Set::sort($faqs, '{n}.Category.sortorder', 'ASC');
		// debug($faqs);
		$this->set('faqs', $faqs);									
	}

	function admin_positioning($action) {
	
		Configure::write('debug',0);
		$this->layout = 'ajax';
		$id = trim($this->params['form']['id']);
		$output = '';
		if (strlen($id)>0){
			$itself = $this->Faq->find('first', array('conditions'=> array('Faq.id'=>$id)));
			$itself = $itself['Faq'];
			$target = $this->Faq->find('neighbors', array('conditions'=> array('Faq.category_id'=>$itself['category_id']), 'field'=>'Faq.displaying_order', 'value'=>$itself['displaying_order'], 'order'=>'Faq.displaying_order'));
			$target = $target[$action]['Faq'];
			if(!isset($target) || $target==null)
				$this->set('output', 'error_');	
			else {
				$tempOrder = $itself['displaying_order'];
				$itself['displaying_order'] = $target['displaying_order'];
				$target['displaying_order'] = $tempOrder;
				
				$this->Faq->id=$target['id'];
				$this->Faq->saveField('displaying_order',$target['displaying_order']);
				$this->Faq->id=$itself['id'];
				$this->Faq->saveField('displaying_order',$itself['displaying_order']);
				$this->set('output',$itself['displaying_order'].'_'.$target['displaying_order'].'_'.$target['id'].'_');

			}
		}
	}

}


