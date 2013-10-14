<?
if(isset($last_update)){
    /*$this->Paginator->options(
            array('update'=>'MB_content', 
                    'url'=>'/admin/categories/index/letter:'.$alpha=1,
					'indicator' => 'catUpdator'
					));
					*/
?>
<div id="catitems_lastupdate" style="display:none;"><?=$last_update;?></div>
<ul id="catitems" class="items">
<?
foreach ($categories as $category):
?>
	<li>
		<a id="cat_ipeditor_<?= $category['Category']['id']; ?>" href="#" onclick="return false;"><?= $category['Category']['name']; ?></a>
	</li>
<? endforeach; ?>
</ul>
<?
/*
<div class="wpaging">
	<?= $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
	<?= $this->Paginator->numbers(array('separator'=>''));?>
	<?= $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
	<div id="catUpdator" class="fr" style="display:none;">
		<img src="/js/modalbox/spinner.gif" alt="Spinner" height="20px" />
	</div>
</div>
*/
}
?>