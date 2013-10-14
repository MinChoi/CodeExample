<?php
App::uses('CmsCoreController', 'Controller');
class CorePackageCategoriesController extends CmsCoreController {

	public function admin_index() {
		parent::admin_index();
		$this->set('package_category_session', $this->Session->read('AdminList.PackageCategory'));
	}

	/**
	 * TODO: PackageCategory records have displaying_order which needs to be identical for each records
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

	// TODO: If re-ordering function with current way (using button up and down) will be in core,
	// need to put this function in somewhare in core function (so is javascript function)	
	function admin_positioning() 
	{
		$this->autoRender = false;
		$session = $this->Session->read('AdminList.PackageCategory');
		if($session['sort']!='PackageCategory.displaying_order')	return;
		if(count($session['filters'])!==0)
			return;

		$id = @$this->request->data['id'];
		$action = @$this->request->data['direction'];
		if($id=='' || $action=='')	return;

		$itself = $this->PackageCategory->find('first', array('conditions'=> array('PackageCategory.id'=>$id)));
		$itself = $itself['PackageCategory'];
		$target = $this->PackageCategory->find('neighbors', array('field'=>'PackageCategory.displaying_order', 'value'=>$itself['displaying_order'], 'order'=>'PackageCategory.displaying_order'));
		$target = $target[$action]['PackageCategory'];

		Configure::write('debug',0);
		if($target==null)
			echo 'error';	
		else {
			$tempOrder = $itself['displaying_order'];
			$itself['displaying_order'] = $target['displaying_order'];
			$target['displaying_order'] = $tempOrder;
			
			$this->PackageCategory->id=$target['id'];
			$this->PackageCategory->saveField('displaying_order',$target['displaying_order']);
			$this->PackageCategory->id=$itself['id'];
			$this->PackageCategory->saveField('displaying_order',$itself['displaying_order']);
			echo $itself['displaying_order'].'_'.$target['displaying_order'].'_'.$target['id'].'_';
		}
	}

	function index() {
		$package_categories = $this->PackageCategory->find('all', array(
			'order'=>'PackageCategory.displaying_order ASC',
			'contain' => array(
				'Package'=>array('order'=>'displaying_order ASC'),
			),
		));
		
		$this->set(compact('package_categories'));
	}
	
	function view($id) {
		$category = $this->PackageCategory->find('first', array('conditions'=> array('PackageCategory.id'=>$id), 'recursive' => -1));
		$packages = $this->PackageCategory->Package->find('all', array(
			'conditions' => array('package_category_id'=>$id),
			'contain' => array('PackagePricing' => array('order'=>'id ASC')),
			'order'=> 'displaying_order ASC'
		));
		$this->setSafe('category', $category);
		$this->setSafe('packages', $packages);
	}
}
