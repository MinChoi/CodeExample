<div class="sidebarBox latestNews">
	<h4><?= $title ?></h4>
	<? foreach ($news as $n) { ?>
		<div class="newsShort">
			<a href="<?= url($n, 'News') ?>" title="<?= $n['title'] ?>"><?= $n['title'] ?></a>
			<br/><?= human_date($n['publish_date']) ?>
		</div>
	<? } ?>
</div>
