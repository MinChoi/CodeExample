<div class="memberActivities form">
<?= $this->Form->create('MemberActivity');?>
	<fieldset>
 		<legend><?= __('Add MemberActivity');?></legend>
	<?
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
		<li><?= $html->link(__('List MemberActivities'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
