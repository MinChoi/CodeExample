<div class="reportDetails form">
<?= $this->Form->create('ReportDetail');?>
	<fieldset>
 		<legend><?= __('Add ReportDetail');?></legend>
	<?
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
		<li><?= $html->link(__('List ReportDetails'), array('action' => 'index'));?></li>
	</ul>
</div>
