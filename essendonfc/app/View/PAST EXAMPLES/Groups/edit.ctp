<div class="groups form">
<?= $this->Form->create('Group');?>
	<fieldset>
 		<legend><?= __('Edit Group');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Group.id'))); ?></li>
		<li><?= $html->link(__('List Groups'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
