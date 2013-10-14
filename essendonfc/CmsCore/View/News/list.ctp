<div class="sidebarLeft">
	<?= $this->element('frontend/sidebar_news_types') ?>
</div>

<div class="content">
	<?//<h1><?= $category_title ? > </h1>?>

	<?//---- Filters ------- ?>
	<form method="POST" class="listFilters">
		<?= $this->Form->input('Filter.PracticeAreas', array('empty' => true, 'label' => 'View by Legal Area')) ?>
		<script type="text/javascript">
			$(function(){
				$('.listFilters select').on('change', function(){ this.form.submit() })
			})
		</script>
	</form>

	<div class="list">

		<?
		foreach ($items as $item) { // Loop through the news 
			echo $this->element('frontend/news_item_summary', array('item' => $item['News']));
		}
		
		if (count($items) == 0) { // If no news items are found (perhaps an invalid category?) ?>
			<p>We currently do not have any articles in this category.  Check back soon!</p>
		<? } ?>
                <br class="clear">
	</div>
</div>