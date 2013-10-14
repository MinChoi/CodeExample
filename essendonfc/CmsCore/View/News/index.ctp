<div class="content">
	<h1>News</h1>
	<?php
	foreach ($news as $item) { // Display each news item (controller returns a max of 2)
		echo $this->element('frontend/news_item_summary', array('item' => $item['News']));
	} 
	if (count($news) == 0) { 
	?>
		<div class="newsItem">
			There are currently no published articles in this category.  Check back soon!
		</div>
	<? } ?>
</div>