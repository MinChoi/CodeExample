<?
/*
<h2>Latest News</h2>
<?
	$news = $this->requestAction('/news/getlatest/5');
?>
<ul class="links">
	<?
	if(is_array($news) && isset($news[0])){
		foreach($news as $news_item){
	?>
		<li>
			<span class="date"><?=date('d/m/Y',strtotime($news_item['News']['publish_date']));?></span>
			<a href="/News/<?=urlencode(str_replace(' ','-',$news_item['News']['menu_label']));?>::<?=$news_item['News']['id'];?>"> 
				<?=$news_item['News']['menu_label'];?>
			</a>
		</li>
	<?
		}
	}
	?>
	<!--<li><a href="#">04/09/09 News article headline</a></li>-->
</ul>
<a href="/NewsCat/News" class="text-view-all-news">view all news</a>
<?
	$events = $this->requestAction('/events/getlatest/5');
?>
<h2>Upcoming Events</h2>
<ul class="links">
	<?
	if(is_array($events) && isset($events[0])){
		foreach($events as $event){
	?>
		<li>
			<span class="date"><?=date('d/m/Y',strtotime($event['Event']['publish_date']));?></span>
			<a href="/EventsDetails/<?=urlencode(str_replace(' ','-',$event['Event']['menu_label']));?>::<?=$event['Event']['id'];?>">
				<?=$event['Event']['menu_label'];?>
			</a>
		</li>
	<?
		}
	}
	?>
	<!--<li><a href="#">04/09/09 Event title</a></li>-->
</ul>
<a href="/Events" class="text-viwe-all-events">viwe all events</a> 
*/?>
<?
	
	//echo $this->element('frontend/widgets/events');
?>