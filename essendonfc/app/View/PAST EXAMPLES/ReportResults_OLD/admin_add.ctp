<div class="reportResults form">
<?= $this->Form->create('ReportResult');?>
	<fieldset>
 		<legend><?= __('Add ReportResult');?></legend>
	<?
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
		<li><?= $html->link(__('List ReportResults'), array('action' => 'index'));?></li>
	</ul>
</div>
