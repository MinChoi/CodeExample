<div class="reportResults form">
<?= $this->Form->create('ReportResult');?>
	<fieldset>
 		<legend><?= __('Edit ReportResult');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('result');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ReportResult.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ReportResult.id'))); ?></li>
		<li><?= $html->link(__('List ReportResults'), array('action' => 'index'));?></li>
	</ul>
</div>
