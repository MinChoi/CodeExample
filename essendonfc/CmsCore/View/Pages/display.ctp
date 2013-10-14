<?//--------------------------- LEFT SIDEBAR -----------------------------------------------?>
<div class="sidebarLeft">
	<?
	//----- Display second level menu -----
	echo $this->element('frontend/sidebar_page_submenu');	
	?>
	
	<?//----- Show related topics (tags) -----?>
	<?= $this->element('frontend/sidebar_tags') ?>	
</div>

<?//-------------------------------- RIGHT SIDEBAR ----------------------------------------------------?>
<div class="sidebarRight">
	<?
	$widgetsToDisplay = Set::extract('/Widget/id', $page);
	
	//---- Example Display of a Widget ------------------------
	/*if (in_array(1, $widgetsToDisplay))
		echo $this->element('sidebar_items/meet_our_people');
		...or... echo $this->requestAction('sidebar_items/meet_our_people', array('return'));
	*/
	?>
	<?//= $this->element('frontend/home/sidebar_right') ?>
</div>

<?//--------------------------- CONTENT (MIDDLE COLUMN) -----------------------------------------------?>
<div class="content">
	<h1><?= $page['Page']['name'] ?></h1>
	<?= $page['Page']['content'] ?>
</div>