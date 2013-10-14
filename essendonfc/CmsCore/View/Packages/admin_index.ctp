<?php
$this->StyleBox->ConfirmMessageStart('faqmsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
echo $this->element('admin/list_filter_bar');
?>
<?= $this->Session->flash() ?>
<? //----------------- AFL Membership Packages ------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<?php
		$i = 0;
		foreach ($items as $packages_item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<div id="displaying_<?= $packages_item['Package']['displaying_order']; ?>">
			<div id="rowid_<?= $packages_item['Package']['id']; ?>" class="row">
				<div class="rowitem" style="width:40%">
					<?=$this->Form->input('urls', array('id'=>'page_url_'.$packages_item['Package']['id'], 'type'=>'hidden', 'value'=>'http://'.$_SERVER['HTTP_HOST'].url($packages_item['Package'], 'Package')));?>
					<div class="title" id="row_title_<?= $packages_item['Package']['id']; ?>">
					<?= $packages_item['Package']['title']; ?>
					</div>
					<?php /*	Delete once confirmed it's not used 
					<div style="display:none;" id="menu_label_<?= $packages_item['Package']['id']; ?>">
						http://<?=$_SERVER['HTTP_HOST'];?>/Packages/<?= urlencode(str_replace(array('&','/',' '),array('and','or','-'),$packages_item['Package']['title'])); ?>/<?= $packages_item['Package']['id']; ?>
					</div>*/?>
				</div>
				<div class="rowitem" style="width:20%;padding-left:40px;"><div class="rowcell">
					<?php 
						echo $packages_item['PackageCategory']['title'];
					?>
				</div></div>
				<div class="rowitem" style="width:15%;padding-left:30px;"><div class="rowcell">
					<span><?= date('d/m/Y',strtotime($packages_item['Package']['modified'])); ?></span><br />
					<?php 
					if(intval($packages_item['Package']['modified_by'])>0)
						echo $packages_item['MUser']['username'] .'<br /><span><i>edited this item</i></span>';
					else
						echo $packages_item['CUser']['username'] .'<br /><span><i>created this item</i></span>';
					?>
				</div></div>
				<div class="rowitem" style="width:15%"><div class="rowcell">
					<?php 
						echo (intval($packages_item['Package']['published'])==1)?'<div id="pub_'.$packages_item['Package']['id'].'" class="published">Published</div>':'<div id="pub_'.$packages_item['Package']['id'].'" class="unpublished">Unpublished</div>';
						echo (intval($packages_item['Package']['showatmenu'])==0)?'<div id="sam_'.$packages_item['Package']['id'].'" class="hidden">Hidden</div>':'<div id="sam_'.$packages_item['Package']['id'].'" class=""></div>';
					?>
				</div></div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	
	<?= $this->element('admin/modules/paging') ?>
    <?= $this->element('admin/bottom_button_bar') ?>
<?php
		if(@$package_session['sort']=='displaying_order' && empty($this->data['search']) && 
		((count($package_session['filters'])===1 && isset($package_session['filters']['package_category_id'])) ||
		$package_session['filters']==='')){
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
		new Ajax.Request('/admin/packages/positioning',
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

