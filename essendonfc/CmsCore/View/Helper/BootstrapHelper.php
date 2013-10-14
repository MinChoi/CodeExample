<? 
/**
 * Various helpful functions for interacting with Twitter Bootstrap framework
 * 
 * By Simon East for Surface Digital
 * First version August 2012
 */ 
class BootstrapHelper extends AppHelper {
	
	/**
	 * Other helpers required by this one
	 */ 
	var $helpers = array('Html');
	
	/**
	 * Number of CSS columns in use
	 */ 
	public $totalColumns = 12;
	
	/**
	 * Using the Bootstrap 12-column grid, this function allows for one column to auto-expand
	 * to fill the full width
	 * 
	 * Also provides some support for hiding all sidebars by setting $hideSidebars to true
	 * 		$this->set('hideSidebars', true);			// works in controller and views
	 * 		$this->viewVars['hideSidebars'] = true;		// works in this layout
	 * 
	 * Auto-expanding columns are a common requirement but difficult to achieve using CSS
	 * without moving the sidebars *above* the content in the HTML which isn't really desirable
	 * for mobiles and SEO
	 * 
	 * Pass it an array of columns like this, the keys are used to generate DIV IDs.
	 * 		[
	 *			'sidebarLeft' => ['span' => 3, $this->element('frontend/sidebar_left')],
	 *			'content' => [$this->fetch('content')], 	// the HTML from the view goes here
	 *			'sidebarRight' => ['span' => 3, $this->element('frontend/sidebar_left')],
	 * 		]
	 * 
	 * The sidebars can be labelled in any way, but content should be named "content"
	 * 
	 * Content column should have no span.  It will expand to fill the remaining columns (up to 12, Bootstrap's default)
	 */ 	
	function autoWidthContent($columnArray) {
		
		// If $hideSidebars is true, only return the content DIV
		if (array_key_exists('hideSidebars', $this->_View->viewVars) && $this->_View->viewVars['hideSidebars']) {
			return $this->Html->div('span12', $columnArray['content'][0], ['id' => 'content']);
		}
		
		// debug($columnArray);
		
		// Otherwise loop through each sidebar, generate HTML, and calculate columns remaining
		$columnsUsed = 0;
		foreach ($columnArray as $id => &$col) {
			if ($id == 'content') {
				continue;
				
			// If column is empty, remove it from set
			} elseif ($col[0] == '') {
				unset($columnArray[$id]);	// remove this column
				
			} else {
				$columnsUsed += $col['span'];
				// Convert array to a DIV tag
				$col = $this->Html->div(
					'span' . $col['span'], 	// class
					$col[0], 				// content
					['id' => $id]);			// extra attributes
			}
		}
		
		// debug($columnArray);
		
		$columnArray['content'] = $this->Html->div(
			'span' . ($this->totalColumns - $columnsUsed), 
			$columnArray['content'][0],
			['id' => 'content']);
		
		return implode("\r\n", $columnArray);
	}
}
