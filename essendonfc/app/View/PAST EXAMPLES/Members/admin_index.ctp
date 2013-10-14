<?
$this->StyleBox->ConfirmMessageStart('ConfirmBox','');
$this->StyleBox->ConfirmMessageEnd("",'Yes','Cancel');
// $this->Paginator->options(array('url' => '../../../admin-individuals'));
echo $this->element('admin/list_filter_bar');
?>

<?= $this->Session->flash() ?>

<div id="index-block" style="clear:both">
	<div id="indexrows">
		<? 
		foreach ($items as $item): 			
			$hasPaid = (bool) $item['Advertiser']['corporate_paid_date'];
			$hasExpired = strtotime($item['Advertiser']['corporate_expiry_date']) < time();
			?>
			<div id="rowid_<?= $item['Advertiser']['id'] ?>" class="row">
				<div class="rowitem" style="width:29%">
					<div class="memtitle">
						<div style="font-weight:normal"><?= $item['Advertiser']['first_name'] ?> <?= $item['Advertiser']['last_name'] ?></div>
						<a href="mailto:<?= $item['Advertiser']['email'] ?>"><?= $item['Advertiser']['email'] ?></a>
					</div>
				</div>
				
				<div class="rowitem" style="width:15%">
					<div class="rowcell">
						<?= $item['Advertiser']['company_name'] ?>
					</div>
				</div>
				
				<div class="rowitem" style="width:9%">
					<div class="rowcell">
						<?= $item['Advertiser']['account_type'] == 2 ? 'Corporate' : 'Standard' ?>
					</div>
				</div>
				
				<div class="rowitem" style="width:9%">
					<div class="rowcell">
						<?= $item['jobCount'] ?> jobs
					</div>
				</div>
				
				<? if ($item['Advertiser']['account_type'] == 2) { // corporate users only ?>
				
					<div class="rowitem" style="width:15%">
						<div class="rowcell">
							<div class="<?=
								$hasPaid
								? 'published">Paid ' . human_date($item['Advertiser']['corporate_paid_date'])
								: 'unpublished">Unpaid'
							?>
							</div>
						</div>
					</div>
					
					<div class="rowitem" style="width:15%">
						<div class="rowcell">
							<? if ($hasPaid) { ?>
								<div class="<?= ($hasExpired
												? 'unpublished">Expired '
												: 'published">Expires ' )
												. human_date($item['Advertiser']['corporate_expiry_date']) ?>
								</div>
							<? } ?>
						</div>
					</div>
					
					<div class="rowitem" style="width:15%"><div class="rowcell">
						<span>Last edited
						<br/>
						<span title="dd/mm/yy"><?= $item['Advertiser']['modified'] ?></span>
					</div></div>
					
				<? } ?>
				
			</div>
		<? endforeach ?>
	</div>

	<?= $this->element('admin/modules/paging') ?>
	<?= $this->element('admin/bottom_button_bar') ?>	
	<?= $this->element('admin/list_actions') ?>
	
</div>
