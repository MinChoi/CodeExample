<div class="reportDetails form">
<?= $this->Form->create('ReportDetail');?>
	<fieldset>
 		<legend><?= __('Edit ReportDetail');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('report_id');
		echo $this->Form->input('fields');
		echo $this->Form->input('tables');
		echo $this->Form->input('conditions');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ReportDetail.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('ReportDetail.id'))); ?></li>
		<li><?= $html->link(__('List ReportDetails'), array('action' => 'index'));?></li>
	</ul>
</div>
