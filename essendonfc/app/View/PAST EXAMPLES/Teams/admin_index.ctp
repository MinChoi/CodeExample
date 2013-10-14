<div id="catitems_lastupdate" style="display:none;"><? //=$last_update ?></div>
<ul id="catitems" class="items">
<? foreach ($items as $item): ?>
	<li>
		<a id="cat_ipeditor_<?= $item[$model]['id']; ?>" href="#" onclick="return false;"><?= $item[$model]['name']; ?></a>
	</li>
<? endforeach ?>
</ul>
