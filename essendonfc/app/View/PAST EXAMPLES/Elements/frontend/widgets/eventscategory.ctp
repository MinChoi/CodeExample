<?
	$eventcatclass = ClassRegistry::init('Category');
	$eventscats = $eventcatclass->getCatlist(1); //$this->requestAction('/events/getlatest/5');
?>
<h2 style="margin-top:30px;clear:both;">Event Categories</h2>
<ul class="links">
	<?
	if(is_array($eventscats) && count($eventscats)>0){
		foreach($eventscats as $eventscat){
	?>
		<li>
			<a href="/EventsCat/<?=urlencode(str_replace(' ','-',$eventscat));?>">
				<?=$eventscat;?>
			</a>
		</li>
	<?
		}
	}
	?>
</ul>
<a href="/Events" class="text-viwe-all-events">viwe all events</a> 