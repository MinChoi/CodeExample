<?
if(isset($pages[0])){
?>
<div class="page-title">Pages</div>
<?
	$this->Paginator->options(
		array('update'=>'pages_search', 
				'url'=>'/'.$tagid.'/'.$search_ele,
				'indicator' => 'loadingPages'
				));
?>
<div id="page-list">
<?
$i = 0;
foreach ($pages as $page):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<h2>
	<? 
	if(empty($page['PagesMemberGroup']['member_group_id']) || $this->Session->check('Member'))
	{
	?>
		<a href="/<?= urlencode($page['Page']['menu_name']); ?>.html"><?= $page['Page']['name']; ?></a>	
	<?
	}
/* 	else if($this->Session->read('Member.member_group_id') == $page['PagesMemberGroup']['member_group_id'])
	{
	?>
		<a href="/<?= urlencode($page['Page']['menu_name']); ?>.html"><?= $page['Page']['name']; ?></a>
	<?
	} */
	else
	{
	?>
		<a href="#" onclick="searchShowLogin();return false;"><?= $page['Page']['name']; ?></a> 
	<?	
	}
	?>
	</h2>
<? endforeach; ?>
</div>

<div class="paging">
	<div id="loadingPages" class="fr" style="display:none;float:right">
		<img src="/js/modalbox/spinner.gif" alt="Spinner" height="20px" />
	</div>
	<?= html_entity_decode($this->Paginator->prev('&laquo; Previous', array(), null, array('class'=>'disabled')));?>
  	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= html_entity_decode($this->Paginator->next('Next &raquo;', array(), null, array('class' => 'disabled')));?>
</div>
<?
}
?>