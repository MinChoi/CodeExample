<?
$this->StyleBox->ConfirmMessageStart('ConfirmBox','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
// $this->Paginator->options(array('url' => '../../../admin-individuals'));
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<div id="index-block" style="clear:both;">
	<? //debug($areas) ?>
	<div id="indexrows">
		<?
		// $i = 0;
		foreach ($items as $area):
			// $class = ($i++ % 2 == 0) ? ' class="altrow"' : null;
		?>
			<div id="rowid_<?= $area['PracticeArea']['id']; ?>" class="row">
				<div class="rowitem" style="width:50%">
					<div class="memtitle">
						<?= $area['PracticeArea']['name']; ?>
					</div>
				</div>
				
				<div class="rowitem" style="width:20%"><div class="rowcell">
					<span>Last edited by </span><?= $area['Editor']['username'] ?>
					<br/>
					<span title="dd/mm/yy"><?= $area['PracticeArea']['modified'] ?></span>
				</div></div>
				
				<div class="rowitem" style="width:20%">
					<div class="rowcell">
						<div id="pub_<?= $area['PracticeArea']['id'] ?>" class="<?=
							$area['PracticeArea']['published']
							? 'published">Published'
							: 'unpublished">Unpublished'
						?></div>
					</div>
				</div>
				
			</div>
		<? endforeach ?>
	</div>

	<?= $this->element('admin/modules/paging') ?>
	<?= $this->element('admin/bottom_button_bar') ?>	
	<?= $this->element('admin/list_actions') ?>
	
</div>
