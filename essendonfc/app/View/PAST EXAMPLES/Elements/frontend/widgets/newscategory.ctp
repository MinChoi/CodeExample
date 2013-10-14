<h2 style="margin-top:30px;clear:both;">News Categories</h2>
<?
	$newscatclass = ClassRegistry::init('Category');
	$newscats = $newscatclass->getCatlist(2); //$this->requestAction('/news/getlatest/5');
?>
<ul class="links">
	<?
	if(is_array($newscats) && count($newscats)){
		foreach($newscats as $newscat){
	?>
		<li>
			<a href="/NewsCat/<?=urlencode(str_replace(' ','-',$newscat));?>">
				<?=$newscat;?>
			</a>
		</li>
	<?
		}
	}
	?>
</ul>
<a href="/Upcoming_News" class="text-view-all-news">view all category news</a>