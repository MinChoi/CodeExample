<?php
$this->StyleBox->ConfirmMessageStart('faqmsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<? //----------------- AFL Membership Package Categories ------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?php
		$i = 0;
		foreach ($items as $pcategories_item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<div id="displaying_<?php echo $pcategories_item['PackageCategory']['displaying_order']; ?>">
			<div id="rowid_<?php echo $pcategories_item['PackageCategory']['id']; ?>" class="row">
				<div class="rowitem" style="width:50%">
					<?=$this->Form->input('urls', array('id'=>'page_url_'.$pcategories_item['PackageCategory']['id'], 'type'=>'hidden', 'value'=>'http://'.$_SERVER['HTTP_HOST'].url($pcategories_item['PackageCategory'], 'PackageCategory')));?>
					<div class="title" id="row_title_<?= $pcategories_item['PackageCategory']['id']; ?>">
					<?php echo $pcategories_item['PackageCategory']['title']; ?>
					</div>
					<?php /* Delete once confirm this is not used
					<div style="display:none;" id="menu_label_<?php echo $pcategories_item['PackageCategory']['id']; ?>">
						http://<?=$_SERVER['HTTP_HOST'];?>/Pcategories/<?php echo urlencode(str_replace(array('&','/',' '),array('and','or','-'),$pcategories_item['PackageCategory']['title'])); ?>/<?php echo $pcategories_item['PackageCategory']['id']; ?>
					</div>*/ ?>
				</div>
				<div class="rowitem" style="width:20%;padding-left:20px;"><div class="rowcell">
					<span><?php echo date('d/m/Y',strtotime($pcategories_item['PackageCategory']['modified'])); ?></span><br />
					<?php 
					if(intval($pcategories_item['PackageCategory']['modified_by'])>0)
						echo $pcategories_item['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
					else
						echo $pcategories_item['CUser']['username'] .'<br /><span><i>created this item</i></span>';
					?>
				</div></div>
				<div class="rowitem" style="width:15%"><div class="rowcell">
					<?php 
						echo (intval($pcategories_item['PackageCategory']['published'])==1)?'<div id="pub_'.$pcategories_item['PackageCategory']['id'].'" class="published">Published</div>':'<div id="pub_'.$pcategories_item['PackageCategory']['id'].'" class="unpublished">Unpublished</div>';
						echo (intval($pcategories_item['PackageCategory']['showatmenu'])==0)?'<div id="sam_'.$pcategories_item['PackageCategory']['id'].'" class="hidden">Hidden</div>':'<div id="sam_'.$pcategories_item['PackageCategory']['id'].'" class=""></div>';
					?>
				</div></div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	
	<?= $this->element('admin/modules/paging') ?>
    <?= $this->element('admin/bottom_button_bar') ?>
<?php
		if(@$package_category_session['sort']=='PackageCategory.displaying_order' && empty($this->data['search']) && 
		$package_category_session['filters']===''){
			$extraFunction = <<<EXTRA
<li><a class="" href="javascript:void(0)" onclick="moveElement(\'prev\',\''+rowID+'\')" title="Up" >Up</a><li><a class="" href="javascript:void(0)" onclick="moveElement(\'next\',\''+rowID+'\')" title="Down" >Down</a></li>
EXTRA;
		}
    	echo $this->element('admin/list_actions', array('extraFunction'=> @$extraFunction));
?>
	<script>
	var move_ready = true;
	function moveElement(direction,$id) {
		if(move_ready == false) return;
		move_ready = false;
		new Ajax.Request('/admin/package_categories/positioning',
		{
			method:'post',
			parameters: { 'id': $id, 'direction':direction },
			onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			arrResponse = response.split('_');

			if(arrResponse[0]!='error') {
				tempHTML = ($('displaying_'+arrResponse[1])).innerHTML;
				($('displaying_'+arrResponse[1])).innerHTML = ($('displaying_'+arrResponse[0])).innerHTML;
				($('displaying_'+arrResponse[0])).innerHTML = tempHTML;
				processRows(arrResponse[2]);
				processRows(arrResponse[3]);
				move_ready = true;
			}},
			onFailure: function(){ alert('Something went wrong...'); move_ready = true;}
		});
	}
	</script>
</div>

