<?

// Check to see whether any of these variables have been set
$objects = array('page', 'event', 'news', 'poll');
$widgets = array();
foreach($objects as $o) {
	// Does the variable exist, and does it contain an associated list of widgets?
	if(isset($$o) && isset($$o['Widget'])) {
		foreach($$o['Widget'] as $w) {
			// Add each widget ID to an array
			$widgets[] = $w['id'];
		}
		break;		
	}
}

// The URLs below show ALL widgets
$common_links = array(
	'/Events',
	'/News_and_Publications',
	'/site-search'
);

// The sections below check to see if a specific widget ID is set to show on this page/item
// Widget IDs should match the widgets table in the database
?>

<? /* Search Box */ if(in_array(6, $widgets) || in_array($this->here, $common_links)) { ?>
	<?= $this->Form->create('User', array('url' => '/site-search','class'=>'search','onsubmit'=>"if($('TagName').value.trim().length>2){return true;}else{return false;}")); ?>
		<div id="search">
			<?//= $ajax->autoComplete('Tag.name', '/tags/autoComplete',array('default'=>'Search','minChars' => 2,'indicator'=>'acspinner'));?>
			<a href="#"><img src="/themes/default/images/btn_search.jpg"/></a>
			<br clear="all">
		</div>
	</form>
<? } ?>


<? /* Support Us */ if(in_array(1, $widgets) || in_array($this->here, $common_links)) { ?>
	<div id="support_us"><!-- start support_us -->
		<h2>Support Us</h2>
		<p>Women's Legal Service Victoria is supported by individual giving, private grants, and volunteers. Please visit the Support Us page for more information.</p>
		<a href="/support-us/volunteering.html">Volunteering</a>
		<a href="/support-us/giving.html">Giving</a>
	</div>
<? } ?>


<? /* News */ if(in_array(3, $widgets) || in_array($this->here, $common_links)) { ?>
	<?= $this->element('frontend/home/sidebar_news');?>	
<? } ?>
					