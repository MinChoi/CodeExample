<?php
App::uses('CmsCoreController', 'Controller');
class CorePackagesController extends CmsCoreController {

	var $name = 'CorePackages';
	var $helpers = array('Html', 'Form');//, 'Cache'
	
	function beforeFilter() {
		parent::beforeFilter();
		/*$this->Auth->allowedActions = array('getlatest','index','get_packages_page_detials','view','search','bycategory','mpackages','mpackages_view',
										'comparison', 'packagelist', 'helpchoose');
		 */
		$this->set('clubName', $this->Setting->read('ClubName')); 
		$this->set('fb_admin', $this->Setting->read('Facebook.admin_id')); 
	}
	
	/**
	 * Displays and saves the Package edit form (and the list of pricing options)
	 * Most of the saving functionality is handled by CmsCoreController
	 */
	public function admin_edit($id) {
		// Set a flag here so that model will delete all pricings before saving new ones (on beforeSave())
		$this->Package->deletePricingsBeforeSave = true;
		parent::admin_edit($id);
		$this->set('packageCategories', $this->Package->PackageCategory->find('list'));
	}
	
	public function admin_index() {
		parent::admin_index();
		$this->set('packageCategories', $this->Package->PackageCategory->find('list'));
		$this->set('package_session', $this->Session->read('AdminList.Package'));
	}

	/**
	 * Reorder packages   (either within a category or overall)
	 * Called via AJAX with POST vars 'id' and 'direction' (either 'next' or 'prev', from buttons up/down)
	 * 
	 * Basically swaps the values of display_order between the item selected and the item immediately before/after it
	 * 
	 * TODO: If re-ordering function with current way (using button up and down) will be in core,
	 * 		 need to put this function in somewhare in core function (so is javascript function)	
	 * 
	 */ 
	function admin_positioning() {
		$this->autoRender = false;
		$session = $this->Session->read('AdminList.Package');
		if ($session['sort'] != 'displaying_order') return;
		
		// If list has been filtered by category
		if (count($session['filters']) === 1 && isset($session['filters']['package_category_id']))
			$condition = array('Package.package_category_id' => $session['filters']['package_category_id']);		
		// Else if list is not filtered at all
		elseif(count($session['filters'])===0)
			$condition = array();			
		// Otherwise quit???
		else 
			return;

		$id = @$this->request->data['id'];
		$action = @$this->request->data['direction'];
		if ($id == '' || $action == '')	return;

		// Load the package
		$itself = $this->Package->find('first', array('conditions' => $condition + array('Package.id' => $id)));
		$itself = $itself['Package'];
		// Find the packages immediately before/after this one
		$target = $this->Package->find('neighbors', array(
			'field' => 'Package.displaying_order', 
			'conditions' => $condition, 
			'value' => $itself['displaying_order'], 
			'order'=>'Package.displaying_order'));
		// We now have the package that we will be swapping display_order numbers with
		$target = @$target[$action]['Package'];

		// Configure::write('debug',0);
		
		if ($target == null) // perhaps they clicked down when already at end of list
			echo 'error';	
		else {
			$tempOrder = $itself['displaying_order'];
			$itself['displaying_order'] = $target['displaying_order'];
			$target['displaying_order'] = $tempOrder;
			
			$this->Package->id = $target['id'];
			$this->Package->saveField('displaying_order', $target['displaying_order']);
			
			$this->Package->id = $itself['id'];
			$this->Package->saveField('displaying_order', $itself['displaying_order']);
			
			echo $itself['displaying_order'] . '_' . $target['displaying_order'] . '_' . $target['id'] . '_';
		}
	}

	/**
	 * TODO: Package records have displaying_order which needs to be identical for each records
	 * 		If displaying_order becomes part of core function, this changes needs to be applied to core. 
	 */ 
	function admin_copy($id) {
		$this->autoRender = false;
		$modelName = $this->modelClass;
		$model = $this->$modelName;
		$model->id = $id;
		$model->recursive = -1;
		$record = $model->read();
		
		// add 'copy' at the title/name of the record
		// TODO: Now, only available when the record has NAME or TITLE in the table
		if(isset($record[$modelName]['name']))
			$record[$modelName]['name'] = $record[$modelName]['name'].' - copy';
		else if(isset($record[$modelName]['title']))
			$record[$modelName]['title'] = $record[$modelName]['title'].' - copy';
		
		if(isset($record[$modelName]['menu_name']))
			$record[$modelName]['menu_name'] = '';
		
		if(isset($record[$modelName]['published']))
			$record[$modelName]['published'] = 0;
		
		///////////////////////////////////////////////////////////////////////////////////
		// Modification for displaying_order
		if(isset($record[$modelName]['displaying_order'])){
			// Set new copying record displaying_order +1, and make all others +1
			$model->updateAll(array($modelName.'.displaying_order' => $modelName.'.displaying_order+1'),
							array($modelName.'.displaying_order > ' => $record[$modelName]['displaying_order']));
			$record[$modelName]['displaying_order'] = $record[$modelName]['displaying_order'] + 1;
		}
		///////////////////////////////////////////////////////////////////////////////////			
				
		unset($record[$modelName]['id']);
		$model->create();
		// skip callbacks and validation to prevent Page model from auto-generating a link (and clashing with existing link)
		if (isset($record[$modelName]['link'])) $record[$modelName]['link'] = '';
		$model->save($record, array('callbacks' => false, 'validate' => false));
		return $model->getInsertID();
	}
	
	public function view($id) {
		$package = $this->Package->findById($id);
		$package['PackagePricing'] = Set::sort($package['PackagePricing'], '{n}.id', 'asc');
		// Find other packages in the same category
		$related_packages = $this->Package->find('all', array(
			'conditions' => array(
				'Package.package_category_id' => $package['PackageCategory']['id'],
				'Package.id !=' => $id, // Do not show the currently selected category
			),
			'contain' => array(
				'PackageCategory',
			),
			'order' => 'Package.displaying_order ASC'
		));
		
		
		
		// Set the title (use Meta, if available, then Package name)
		$this->set('title_for_layout', 
			$package['Meta']['page_title'] 
			? $package['Meta']['page_title'] 
			: $package['title']
		);
		
		
		$this->setSafe('package', $package);
		$this->set('widgets', $package['Widget']);
		$this->set('related_packages', $related_packages);
		
	}
	
	
	
	function admin_preview() {
		
		
		
		$this->setSafe('package', $this->data); 
		$this->layout = 'default'; 
		$this->render('view'); 
	
	}
	
	
	function help_me_choose(){
		$package = $this->Package->find('all', array(
										'recursive' => 2,
										'contain' => array('PackagePricing', 'PackageCategory'),
										'conditions' => array('Package.published'=>1),
										'order'=>'Package.displaying_order'
										));
		$this->setSafe('package',$package);
	}

	function comparison() {
	}
	
	function membership_renew(){
	}
	
	/**
	 * Lists all packages with their respective IDs
	 * Helpful as a reference when putting together the Help-Me-Choose or Compare screens
	 */
	function listIDs() {
		$this->layout = null;
		$this->loadModel('PackageCategory');
		$this->set('packages', $this->Package->find('all', ['order' => 'Package.title']));
	}
}
