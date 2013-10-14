<div class="reportResults index">
<h2><?= __('ReportResults');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('report_id');?></th>
	<th><?= $this->Paginator->sort('result');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('created_by');?></th>
	<th><?= $this->Paginator->sort('modified_by');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($reportResults as $reportResult):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $reportResult['ReportResult']['id']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['report_id']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['result']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['created']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['modified']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['created_by']; ?>
		</td>
		<td>
			<?= $reportResult['ReportResult']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $reportResult['ReportResult']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $reportResult['ReportResult']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $reportResult['ReportResult']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reportResult['ReportResult']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
</div>
<div class="paging">
	<?= $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
 | 	<?= $this->Paginator->numbers();?>
	<?= $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New ReportResult'), array('action' => 'add')); ?></li>
	</ul>
</div>
