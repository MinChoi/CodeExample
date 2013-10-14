<div class="reportDetails index">
<h2><?= __('ReportDetails');?></h2>
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
	<th><?= $this->Paginator->sort('fields');?></th>
	<th><?= $this->Paginator->sort('tables');?></th>
	<th><?= $this->Paginator->sort('conditions');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($reportDetails as $reportDetail):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $reportDetail['ReportDetail']['id']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['report_id']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['fields']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['tables']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['conditions']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['created']; ?>
		</td>
		<td>
			<?= $reportDetail['ReportDetail']['modified']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $reportDetail['ReportDetail']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $reportDetail['ReportDetail']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $reportDetail['ReportDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reportDetail['ReportDetail']['id'])); ?>
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
		<li><?= $html->link(__('New ReportDetail'), array('action' => 'add')); ?></li>
	</ul>
</div>
