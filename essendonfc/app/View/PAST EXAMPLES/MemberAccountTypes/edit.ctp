<div class="memberAccountTypes form">
<?= $this->Form->create('MemberAccountType');?>
	<fieldset>
 		<legend><?= __('Edit MemberAccountType');?></legend>
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
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('MemberAccountType.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MemberAccountType.id'))); ?></li>
		<li><?= $html->link(__('List MemberAccountTypes'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
