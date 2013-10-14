<?//--------------------------- LEFT SIDEBAR -----------------------------------------------?>
<div class="sidebarLeft">
	<?
	//----- Certain CMS pages need to have dynamic sidebars ------
	if ($this->here == '/areas_of_practice.html')
		echo $this->element('frontend/sidebar_model_list', array('title' => 'Areas of Practice', 'model' => 'PracticeArea'));
	elseif ($this->here == '/our_people.html')
		echo $this->element('frontend/sidebar_people_types');

	//----- Display second level menu -----
	// Build list of child or sibling pages...
	// If page is top-level or has children, show its children
	else
		echo $this->element('frontend/sidebar_page_submenu');
	
	?>
	
	<?//----- Show related topics (tags) -----?>
	<?= $this->element('frontend/sidebar_tags') ?>
	
	<?//----- Subscribe to Campaign Monitor Newsletter Database -----?>
	<?= $this->element('frontend/sidebar_subscribe') ?>
	
</div>

<?//-------------------------------- RIGHT SIDEBAR ----------------------------------------------------?>
<div class="sidebarRight">
	<?
	$widgetsToDisplay = Set::extract('/Widget/id', $page);
	
	//---- Meet our people box ------------------------
	if (in_array(1, $widgetsToDisplay))
		echo $this->requestAction('sidebar_items/meet_our_people', array('return'));
		
	//---- Meritas box ------------------------
	if (in_array(2, $widgetsToDisplay)) {
	?>
		<div class="sidebarBox meritas">
			<a href="/meritas.html"><img src="/themes/default/images/box_local_expertise.png" alt="Meritas: Local expertise, no matter where you are." width="170" height="210"/></a>
		</div>
	<? } 
	if (in_array(3, $widgetsToDisplay) && @$presentationForWidget) { ?>
		<div class="sidebarBox presentation">
			<h4><?= $presentationForWidget['News']['title'] ?></h4>
			<a href="<?= url($presentationForWidget) ?>" class="readMoreLink"><img src="<?= $presentationForWidget['News']['image'] ?>" alt=""/></a>
			<div class="description">
				<?= $presentationForWidget['News']['short_desc'] ?>
			</div>
			<a href="<?= url($presentationForWidget) ?>" class="readMoreLink">Read more...</a>
		</div>
	<? } ?>

	<?//= $this->element('frontend/home/sidebar_right') ?>
</div>

<?//--------------------------- CONTENT (MIDDLE COLUMN) -----------------------------------------------?>
<div class="content">
	<h1><?= $page['Page']['name'] ?></h1>
	<?= $page['Page']['content'] ?>
</div>