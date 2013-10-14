<h1><?= $category_title ?></h1>

<p>[filters to go here]</p>

<div class="list">

	<?
	foreach ($items as $item) { // Loop through the news 
		echo $this->element('frontend/news_item_summary', array('item' => $item['News']));
	}
	
	if (count($items) == 0) { // If no news items are found (perhaps an invalid category?) ?>
		<p>We currently do not have any articles in this category.  Check back soon!</p>
	<? } ?>

</div>