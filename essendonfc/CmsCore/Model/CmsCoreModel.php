<?
/**
 * CMS Core Model
 * Provides some generic helpful functions that other models can make use of
 */
class CmsCoreModel extends AppModel {

	// Useful Validation Function: ensure a particular field matches another one
	function fieldMatches($fieldAndValue = array(), $compareField) { 
        foreach ($fieldAndValue as $key => $value)
            return $value === $this->data[$this->name][$compareField];
    }
	
	// Provide support for updating model fields with PHP's DateTime object
	// Overrides default function in lib/Cake/Model/Model.php
	// Note: this is applied to fields *before* the beforeSave() handler
	function deconstruct($field, $data) {
		// Support for PHP date objects
		if (is_object($data) && get_class($data) == 'DateTime') {
			return $data->format('Y-m-d H:i:s');
		}
		$data = parent::deconstruct($field, $data);		// handles timestamps, dates, times, etc.
		if (is_array($data)
			&& ($field === 'permissions' || strpos($field, '_array'))
		) {
			return serialize($data);
		}
		// debug($data);
		return $data;
	}
	
	
	// Default query() function groups results by table (annoyingly)
	// This function is a workaround for those occasions when it gets in the way
	function flatQuery($sql) {
		try {
			$result = $this->getDataSource()->getConnection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (Exception $e) {
			debug($e);
		}
	}
	
	/*
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
	
	
	// Returns a simple (single-dimensional) array of the distinct items in the given field in the current model
	public function distinct($fieldName) {
		$items = $this->find('all', array('fields' => "DISTINCT $fieldName", 'recursive' => -1));
		$items = Set::classicExtract($items, "{n}.{$this->name}.$fieldName");	// convert to single-dimension array
		$items = Set::filter($items);	// remove null/empty items
		sort($items);					// sort alphabetically
		return $items;
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
