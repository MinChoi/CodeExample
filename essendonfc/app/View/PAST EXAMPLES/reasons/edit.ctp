<div class="reasons form">
<?= $this->Form->create('Reason');?>
	<fieldset>
 		<legend><?= __('Edit Reason');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Reason.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Reason.id'))); ?></li>
		<li><?= $html->link(__('List Reasons'), array('action' => 'index'));?></li>
	</ul>
</div>
