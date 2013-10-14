<?
$this->StyleBox->ConfirmMessageStart('inidimsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
$this->Paginator->options(array('url' => '../../../admin-individuals'));
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<?//---------------- LIST OF CLIENT USERS ----------------------------?>
<div id="index-block" style="clear:both;">
	<div id="indexrows">
		<? foreach ($items as $user) : //debug($client) ?>
			<div id="rowid_<?= $user['ClientUser']['id']; ?>" class="row">
				<div class="rowitem" style="width:40%">
					<div class="memtitle">
						<?= $user['ClientUser']['name']; ?>
					</div>
				</div>
				<div class="rowitem" style="width:17%;padding-left:20px;">
					<div class="rowcell">
						<?= $user['Client']['name'] ?>
					</div>
				</div>				
				<div class="rowitem" style="width:17%;padding-left:20px;">
					<div class="rowcell">
						Level <?= $user['ClientUser']['user_level'] ?> Access
					</div>
				</div>
				<div class="rowitem" style="width:17%;padding-left:20px;">
					<div class="rowcell">
						<span>Last logged in</span><br/>
						<?= $user['ClientUser']['last_login'] ?>
					</div>
				</div>				
			</div>
		<? endforeach ?>
	</div>

	<?= $this->element('admin/modules/sp_paging',array('limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),'view_url'=>'/admin/mentor/setpaging')) ?>
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>
	
	<?= $this->element('admin/bottom_button_bar') ?>
	<?= $this->element('admin/list_actions', array('minimal' => true)) ?>
	
</div>