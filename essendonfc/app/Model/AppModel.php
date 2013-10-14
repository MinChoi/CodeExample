<?php
/**
 * Application model for this Cake site.
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 * Add your application-wide methods to the class, your models will inherit them.
 */
App::uses('Model', 'Model');
class AppModel extends Model {
	
	public $actsAs = array('AdminFilters', 'SaveModifiedBy', 'Containable');

	// Providing a way of easily applying UI filters to lists of data
	// The fields are specified in the individual models
	// Most logic is achieved in the AdminFiltersBehavior
	var $adminFilters = array();
	
	// Provide support for updating model fields with PHP's DateTime object
	// Overrides default function in lib/Cake/Model/Model.php
	// Note: this is applied to fields *before* the beforeSave() handler
	function deconstruct($field, $data) {
		if (is_object($data) && get_class($data) == 'DateTime') {
			return $data->format('Y-m-d H:i:s');
		}
		$data = parent::deconstruct($field, $data);		// handles timestamps, dates, times, etc.
		if (($field === 'permissions' || strpos($field, '_array'))
			&& is_array($data)) {
			return serialize($data);
		}
		return $data;
	}
	
	// Default query() function groups results by table (annoyingly)
	// This function is a workaround
	function flatQuery($sql) {
		// debug($sql);
		try {
			// Using the model's PDO connection to the DB, we just send a raw query and fetch all the results
			$result = $this->getDataSource()->getConnection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (Exception $e) {
			debug($e);
		}
	}
	
	/* Don't think this function is still in use...
	public function optimize() {
		if (!empty($this->useTable)) {
			$db =& ConnectionManager::getDataSource($this->useDbConfig);
			$db->query('OPTIMIZE TABLE '.$db->fullTableName($this).';');
		}
	}
	*/
	
	// Function for easily getting the logged-in user's information within a model (every field from the model)
	public function getUserData($key = null) {
		// App::import('Component', 'Session');
		// $session = new SessionComponent(new ComponentCollection);
		// return $session->read('Auth.User');
		if ($key)
			return $_SESSION['Auth']['User'][$key];
		return $_SESSION['Auth']['User'];
	}
	
	// Function for easily getting the logged-in user's database ID within a model
	public function getUserId() {
		// App::import('Component', 'Session');
		// $session = new SessionComponent(new ComponentCollection);
		// return $session->read('Auth.User.id');
		return $this->getUserData('id');
	}
	

	
	/* Caching Pagination Start */
	/*
	function paginate ($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		$args = func_get_args();
		$uniqueCacheId = '';
		foreach ($args as $arg) {
			$uniqueCacheId .= serialize($arg);
		}
		if (!empty($extra['contain'])) {
			$contain = $extra['contain'];
		}
		$uniqueCacheId = md5($uniqueCacheId);
		$pagination = Cache::read('pagination-'.$this->alias.'-'.$uniqueCacheId, 'paginate_cache');
		if (empty($pagination)) {
			$pagination = $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page', 'recursive', 'group', 'contain'));
			Cache::write('pagination-'.$this->alias.'-'.$uniqueCacheId, $pagination, 'paginate_cache');
		}
		return $pagination;
	}

	function paginateCount ($conditions = null, $recursive = 0, $extra = array()) {
		$args = func_get_args();
		$uniqueCacheId = '';
		foreach ($args as $arg) {
			$uniqueCacheId .= serialize($arg);
		}
		$uniqueCacheId = md5($uniqueCacheId);
		if (!empty($extra['contain'])) {
			$contain = $extra['contain'];
		}

		$paginationcount = Cache::read('paginationcount-'.$this->alias.'-'.$uniqueCacheId, 'paginate_cache');
		if (empty($paginationcount)) {
			$paginationcount = $this->find('count', compact('conditions', 'contain', 'recursive'));
			Cache::write('paginationcount-'.$this->alias.'-'.$uniqueCacheId, $paginationcount, 'paginate_cache');
		}
		return $paginationcount;
	}*/
	/* Caching Pagination End */
}
