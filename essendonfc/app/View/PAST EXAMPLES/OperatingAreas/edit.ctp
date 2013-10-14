<div class="operatingAreas form">
<?= $this->Form->create('OperatingArea');?>
	<fieldset>
 		<legend><?= __('Edit OperatingArea');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('Organisation');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('OperatingArea.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('OperatingArea.id'))); ?></li>
		<li><?= $html->link(__('List OperatingAreas'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Organisations'), array('controller' => 'organisations', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Organisation'), array('controller' => 'organisations', 'action' => 'add')); ?> </li>
	</ul>
</div>
