<? 
/**
 * Various helpful functions for interacting with jQuery's QUnit Testing Framework
 * 
 * Makes it easy to implement javascript unit tests on any page, simply by:
 * 
 * 	<?= $this->QUnit->init() ?>
 *  <script type="text/javascript">
 * 		test('MyTest', function() {
 * 			ok(1 == '1', 'Passed...');
 * 		});
 *  </script>
 * 
 * 
 * By Simon East for Surface Digital
 * First version September 2012
 */ 
class QUnitHelper extends AppHelper {
	
	/**
	 * Which version of QUnit should we load from the CDN?
	 */	 
	public $qUnitVersion = '1.10.0';
	
	/**
	 * Other helpers required by this one
	 */ 
	public $helpers = array('Html');
	
	/**
	 * Initialises the QUnit framework
	 * 
	 * Places an empty DIV at the point it is called, which is populated with the QUnit results.
	 * Then loads the QUnit JS+CSS from the jQuery CDN
	 * 
	 * EXAMPLE:
	 * 
	 * 	<?= $this->QUnit->init() ?>
	 *  <script type="text/javascript">
	 * 		test('MyTest', function() {
	 * 			ok(1 == '1', 'Passed...');
	 * 		});
	 *  </script>
	 */
	public function init() {
		return '<div id="qunit"></div>'
			. $this->Html->script('http://code.jquery.com/qunit/qunit-' . $this->qUnitVersion . '.js', array('once' => true))
			. $this->Html->css('http://code.jquery.com/qunit/qunit-' . $this->qUnitVersion . '.css', null, array('once' => true));
	}
}
