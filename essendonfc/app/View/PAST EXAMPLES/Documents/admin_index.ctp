<?
$this->StyleBox->ConfirmMessageStart('inidimsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<?//---------------- LIST OF CLIENTS ----------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<? foreach ($items as $doc) : //debug($doc) ?>
			<div id="rowid_<?= $doc['Document']['id']; ?>" class="row">
				<div class="rowitem" style="width:20%">
					<div class="memtitle">
						<?= $doc['Document']['title']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:20%; padding-left: 20px">
					<div class="rowcell"><?= $doc['Client']['name']; ?></div>
				</div>
				<div class="rowitem" style="width:20%">
					<div class="rowcell"><?= $doc['DocumentCategory']['name']; ?></div>
				</div>
				<div class="rowitem" style="width:20%">
					<div class="rowcell">
						<span>Last updated</span><br/>
						<?= $doc['Document']['modified'] ?><br/>
						<span>by</span> 
						<?= $doc['Document']['latest_upload_by_username'] ?>
						(<?= $doc['Document']['latest_upload_by_usertype'] ?>)
					</div>					
				</div>
			</div>
		<? endforeach ?>
	</div>

	<?= $this->element('admin/modules/paging') ?>	
	<?= $this->element('admin/bottom_button_bar') ?>
	<?= $this->element('admin/list_actions', array('minimal' => true)) ?>
	
</div>