<? 
// Cake Helper for providing combined/compressed/minified Javascript and CSS
//
// Minify core code is in /CORE/min/
// From http://code.google.com/p/minify/ or 
//
// Note Minify does add some random newlines which looks weird, but explanation is here:
// http://code.google.com/p/minify/wiki/FAQ#Why_do_the_CSS_&_HTML_minifiers_add_so_many_line_breaks?
class MinifyHelper extends AppHelper {
	
	var $helpers = array('Html'); 	// used for seamless degradation when MinifyAsset is set to false;
	
	// Simon added 'echo' variable 30/May/2012, defaulting to true to not break existing code
	
	function enabled() {
		return Configure::read('MinifyAsset') && Configure::read('debug') == 0;
	}
	
	// Creates JS <script> tag with all JS $assets combined + compressed into one
	function js($assets, $echo = true) {
		if (!$assets) return null;
		if ($this->enabled()) {
			$out = sprintf("<script type='text/javascript' src='%s'></script>", $this->_path($assets, 'js'));
		} else {
			$out = $this->Html->script($assets);
		}
		if ($echo) echo $out;
		else return $out;
	}        
	
	// Creates CSS <link> tag with all CSS $assets combined + compressed into one
	function css($assets, $echo = true) {
		if (!$assets) return null;
		if ($this->enabled()) {
			$out = sprintf("<link type='text/css' rel='stylesheet' href='%s' />", $this->_path($assets, 'css'));
		} else {
			$out = $this->Html->css($assets);
		}
		if ($echo) echo $out;
		else return $out;
	}
	
	// Wrapper for _path which only returns min version when enabled
	function path($asset) {
		if ($this->enabled())
			return $this->_path($asset);
		else
			return $asset;
	}
	
	// Generates a URL for Minify script with filenames appended
	// $assets can be a string URL or an array of string URLs, no file extension should be in strings
	// $ext - either 'js' or 'css'
	function _path($assets, $ext = '') {
		$path = $this->webroot . "CORE/min/f=";
		if (is_string($assets)) $assets = array($assets);
		foreach($assets as $asset) {
			// Append extension, only if it is not already present (like HtmlHelper does)
			if ($ext && substr($asset, -strlen($ext)-1) != ".$ext") $asset .= ".$ext";
			$path .= $asset . ',';
		} 
		return substr($path, 0, -1);	// remove trailing comma
	}
}
