<?
$i = 0;
foreach ($pages as $page):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<input type="hidden" id="page_url_<?= $page['Page']['id']; ?>" value="/<?= urlencode($page['Page']['name']); ?>.html" />
	<input type="hidden" id="sitemap_id_<?= $page['Page']['id']; ?>" value="<?= $page['Page']['sitemap_id']; ?>" />
	<div id="rowid_<?= $page['Page']['id']; ?>" class="row">
		<div class="rowitem" style="width:40%">
			<div class="title">
			<?= $page['Page']['name']; ?>
			</div>
		</div>
		<div class="rowitem" style="width:21%;padding-left:20px;"><div class="rowcell">
			<? 
			if(intval($page['Page']['page_id'])==0){
				echo $page['Sitemap']['start_menu'];
			}else{
				
				if(isset($page['TParentPage']['name']) && strlen(trim($page['TParentPage']['name']))>0){
				?>
				<?=$text->truncate($page['TParentPage']['name'],28);?>
				<?
				}else{
				echo $page['Sitemap']['start_menu'];
				}
				echo '<br /><span>('.$text->truncate($page['ParentPage']['name'],28).')</span>';
			}
			?>
		</div></div>
		<div class="rowitem" style="width:14%;padding-left:20px;"><div class="rowcell">
			<span><?= date('d/m/Y',strtotime($page['Page']['modified'])); ?></span><br />
			<? 
			if(intval($page['Page']['modified_by'])>0)
				echo $page['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
			else
				echo $page['CUser']['username'] .'<br /><span><i>created this item</i></span>';
			?>
		</div></div>
		<div class="rowitem" style="width:16%"><div class="rowcell">
			<? 
				echo (intval($page['Page']['published'])==1)?'<div id="pub_'.$page['Page']['id'].'" class="published">Published</div>':'<div id="pub_'.$page['Page']['id'].'" class="unpublished">Unpublished</div>';
				echo (intval($page['Page']['showatmenu'])==0)?'<div id="sam_'.$page['Page']['id'].'" class="hidden">Hidden</div>':'<div id="sam_'.$page['Page']['id'].'" class="">&nbsp;</div>';
			?>
		</div></div>
	</div>
<? endforeach; ?>