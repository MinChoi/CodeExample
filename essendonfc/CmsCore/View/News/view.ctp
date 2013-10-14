<div class="content">
	<h1><?= $newsItem['News']['title'] ?></h1>
	
	<div class="newsItemFull">
		<div class="title"></div>
		<div class="date"><?= human_date($newsItem['News']['publish_date']) ?></div>
		<div class="articleBody">
			<?= html_entity_decode($newsItem['News']['content']) ?>
		</div>
	</div>
</div>
