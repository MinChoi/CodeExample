<?
$eventclass = ClassRegistry::init('Event');
$events = $eventclass->getlatest(3); //$this->requestAction('/events/getlatest/5');
?>
<h2 style="margin-top:30px;clear:both;">Upcoming Events</h2>
<ul class="links">
	<?
	if(is_array($events) && isset($events[0])){
		foreach($events as $event){
	?>
		<li>
			<span class="date"><?=date('d/m/Y',strtotime($event['Event']['start_date']));?></span>
			<!--<a href="/EventsDetails/<? //=urlencode(str_replace(' ','-',$event['Event']['menu_label']));?>::<?=$event['Event']['id'];?>">
				<? //=$event['Event']['menu_label'];?>
			</a>-->
			<a href="/events-details/Upcoming-DCA-events/<?= urlencode(str_replace(array('&','/',' ','?'),array('and','or','-',''),strtolower($event['Event']['title']))); ?>/<?= $event['Event']['id']; ?>"><?=$event['Event']['menu_label'];?></a>			
		</li>
	<?
		}
	}
	?>
	<!--<li><a href="#">04/09/09 Event title</a></li>-->
</ul>
<a href="/EventsCat/Upcoming-DCA-events" class="text-viwe-all-events">viwe all events</a> 