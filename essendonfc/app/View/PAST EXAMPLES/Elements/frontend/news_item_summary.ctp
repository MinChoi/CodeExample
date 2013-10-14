<? $url = url($item, 'News'); ?>

<div class="newsItem">
	<? if($item['image']) { ?>
		<div class="image"><img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>"/></div>
	<? } else { ?>
       	<div class="image"><img src="/themes/default/images/placeholder.jpg" alt=""/></div>
	<? } ?>
	<div class="text">
		<div class="title"><a href="<?= $url ?>"><?= $item['title'] ?></a></div>
		<div class="date"><?= human_date($item['publish_date']) ?></div>
		<div class="shortDesc"><?= nl2br($item['short_desc']) ?></div>
		<a href="<?= $url ?>" class="blueButton arrow"><span>More</span></a>
	</div>
    <br clear="all">
</div>
