<? if ($events) { ?>
	<div class="sidebarBox events">
		<h4>Events</h4>
		<? foreach ($events as $e) { ?>
			<div class="eventShort"><a href="<?= url($e) ?>" title="<?= $e['Event']['title'] ?>"><?= $e['Event']['title'] ?></a><br/><?= human_date($e['Event']['start_date']) ?></div>
		<? } ?>
        <?/*<div class="pagination">
        	<a href="#"><</a>
        	<a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">></a>
        </div>*/?>
	</div>
<? } ?>
