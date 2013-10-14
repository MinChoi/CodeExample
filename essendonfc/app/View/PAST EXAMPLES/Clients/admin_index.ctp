<?
$this->StyleBox->ConfirmMessageStart('inidimsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
$this->Paginator->options(array('url' => '../../../admin-individuals'));
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<?//---------------- LIST OF CLIENTS ----------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<? foreach ($items as $client) : //debug($client) ?>
			<div id="rowid_<?= $client['Client']['id']; ?>" class="row">
				<div class="rowitem" style="width:60%">
					<div class="memtitle">
						<?= $client['Client']['name']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:35%;padding-left:20px;">
					<div class="rowcell">
						<?= count($client['ClientUser']) ?> <?= __n('User', 'Users', count($client['ClientUser'])) ?>
					</div>
				</div>				
			</div>
		<? endforeach ?>
	</div>

	<?=$this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),'view_url'=>'/admin/mentor/setpaging'));?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	
	<?= $this->element('admin/bottom_button_bar') ?>
	<?= $this->element('admin/list_actions', array('minimal' => true)) ?>
	
</div>