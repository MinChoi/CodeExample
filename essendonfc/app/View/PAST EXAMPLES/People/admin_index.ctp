<?
$this->StyleBox->ConfirmMessageStart('inidimsg','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<div id="index-block" style="clear:both;">
	<? //debug($people) ?>
	<div id="indexrows">
		<?
		// $i = 0;
		foreach ($items as $person):
			// $class = ($i++ % 2 == 0) ? ' class="altrow"' : null;
		?>
			<div id="rowid_<?= $person['Person']['id'] ?>" class="row">
				<div class="rowitem" style="width:38%">
					<div class="memtitle">
						<?= $person['Person']['firstName'] ?>
						<?= $person['Person']['lastName'] ?>
						<br/>
						<span><?= $person['Person']['email'] ?></span>						
					</div>
				</div>
				
				<div class="rowitem" style="width:20%">
					<div class="rowcell">
						<?= $person['Team']['name'] ?>
					</div>
				</div>
				
				<div class="rowitem" style="width:13%">
					<div class="rowcell">
						<?= $person['Person']['positionType'] ?>
					</div>
				</div>
				
				<div class="rowitem" style="width:13%">
					<div class="rowcell">
						<span>Last edited by </span><?= $person['Editor']['username'] ?>
						<br/>
						<span title="dd/mm/yy"><?= $person['Person']['modified'] ?></span>
					</div>
				</div>
				
				<div class="rowitem" style="width:13%">
					<div class="rowcell">
						<div id="pub_<?= $person['Person']['id'] ?>" class="<?=
							$person['Person']['published']
							? 'published">Published'
							: 'unpublished">Unpublished'
						?></div>
					</div>
				</div>
				
			</div>
		<? endforeach ?>
	</div>

	<?= $this->element('admin/modules/sp_paging', array(
			'limit'=>$this->Session->read('INDIVIDUAL_LIMIT'),
			'view_url'=>'/admin/mentors/setpaging'
	));?>
	
	<div class="paging">
		Display <?= $this->Paginator->counter(); ?>
		<?= html_entity_decode($this->Paginator->prev('&laquo;', array(), null, array('class'=>'disabled')));?>
		<?= $this->Paginator->numbers(array('separator'=>''));?>
		<?= html_entity_decode($this->Paginator->next('&raquo;', array(), null, array('class' => 'disabled')));?>
	</div>

	<?= $this->element('admin/bottom_button_bar') ?>	
	<?= $this->element('admin/list_actions') ?>
	
</div>
