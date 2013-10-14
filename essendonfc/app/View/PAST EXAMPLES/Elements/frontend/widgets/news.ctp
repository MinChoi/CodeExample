<h2>Whats News</h2>
<?
	$newsclass = ClassRegistry::init('News');
	$news = $newsclass->getlatest(3); //$this->requestAction('/news/getlatest/5');
?>

	<?
	if(is_array($news) && isset($news[0])){
		foreach($news as $news_item){
	?>
		
			<h3 class="date"><?=date('d/m/Y',strtotime($news_item['News']['publish_date']));?></h3>
			<p><?= $news_item['News']['menu_label'];?></p>
			<a href="/News/<?=urlencode(str_replace(array('&','/',' ','?'),array('and','or','-',''),$news_item['Category']['name']));?>/<?=urlencode(str_replace(array('&','/',' '),array('and','or','-'),$news_item['News']['menu_label']));?>/<?=$news_item['News']['id'];?>">
				Read more
			</a>
			<br clear="all">
		
	<?
		}
	}
	?>
	<!--<li><a href="#">04/09/09 News article headline</a></li>-->
