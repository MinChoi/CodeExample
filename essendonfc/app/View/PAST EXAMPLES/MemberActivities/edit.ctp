<div class="memberActivities form">
<?= $this->Form->create('MemberActivity');?>
	<fieldset>
 		<legend><?= __('Edit MemberActivity');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('member_id');
		echo $this->Form->input('date');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('int_date');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('MemberActivity.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('MemberActivity.id'))); ?></li>
		<li><?= $html->link(__('List MemberActivities'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
