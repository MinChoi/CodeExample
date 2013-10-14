<?php
App::uses('HtmlHelper', 'Helper');
class WidgetHelper extends HtmlHelper {
	
    public $helpers = array('Html');
	
	/**
	 * Returns the HTML code for one or more widgets
	 * 
	 * Takes either a single widget array or an array of widget arrays
	 * (as returned from a find() query)
	 * 
	 * @return HTML for 1 or more widgets, each wrapped in relevant DIVs
	 */
	public function display($widget) {
		
		// If we don't have an array or we have an empty array, drop out
		if (!is_array($widget) || empty($widget)) return false;
		
		// If an indexed array
		if (array_keys($widget) === range(0, count($widget) - 1)) {
			
			// Build a string of rendered widgets
			$widgets = '';
			
			foreach ($widget as $w) {
				$widgets .= $this->_widgetFromModelArray($w);
			}
			
			return $widgets;
		}
		
		return $this->_widgetFromModelArray($widget);
	}
	
	/**
	 * Pass a widget array (from a Widget->find() query) and map it to $this->make() method
	 * 
	 * The array should appear like:
	 *		'path' 		=> 'element_filename',
	 *		'content' 	=> '{json: 'vars can go here'}',
	 *		'name' 		=> 'My Element',					// used to construct a CSS class
	 */ 
	private function _widgetFromModelArray($widget) {
		return $this->make($widget['path'], array(
			// Add the current name, camelized as a class for the div.
			'class' => array(Inflector::camelize($widget['name'])),
			// Return an assoc array of any content 
			'vars' => @json_decode($widget['content'], true),
		));
	}

	/**
	 * Returns the output of an element, wrapped in a DIV
	 * The DIV is given the class "widget"
	 * 
	 * Useful only for when hand-coding widgets quickly.
	 * The display() function should be used for displaying database-driven widgets.
	 *
	 * @param $path Path to Element file, as given to the Element function
	 * @param $options:
	 * 
	 *		$options['class']: 
	 *			An array of class names, imploded and given to the HtmlHelper 
	 *			DIV function as the first parameter.
	 *
	 *		$options['div']:
	 *			An HTML Options array, as third parameter for DIV function
	 *
	 *		$options['vars']:
	 *			Array of variables to be passed into Element function
	 *
	 * @return Built HTML string, ready for output.
	 */
    public function make($path, $options = array()) {
		
		// default DIV array
		if (!isset($options['div'])) $options['div'] = array(); 
		
		// default Element vars
		if (!isset($options['vars'])) $options['vars'] = array();
		
		// default Class array
		if (!isset($options['class'])) $options['class'] = array();
		
		// Make sure to push "widget" class in, if it's missing
		if (!in_array('widget', $options['class'])) $options['class'][] = 'widget'; 
		
		return $this->Html->div(
			implode(' ', $options['class']), 
			$this->_View->element('widgets/' . $path, $options['vars']),
			$options['div']
		);
    }
	
}
