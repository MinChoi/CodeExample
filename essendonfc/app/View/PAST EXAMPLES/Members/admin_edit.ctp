<div class="members form">
<?= $this->Form->create('Member');?>
	<fieldset>
 		<legend><?= __('Edit Member');?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('last_login');
		echo $this->Form->input('email_active');
		echo $this->Form->input('member_group_id');
		echo $this->Form->input('organisation_id');
		echo $this->Form->input('renewal_date');
		echo $this->Form->input('targeted');
		echo $this->Form->input('voting_rights');
		echo $this->Form->input('active');
		echo $this->Form->input('member_account_type_id');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Member.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Member.id'))); ?></li>
		<li><?= $html->link(__('List Members'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Member Groups'), array('controller' => 'member_groups', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member Group'), array('controller' => 'member_groups', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Organisations'), array('controller' => 'organisations', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Organisation'), array('controller' => 'organisations', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Member Account Types'), array('controller' => 'member_account_types', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member Account Type'), array('controller' => 'member_account_types', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Administrator Nodes'), array('controller' => 'administrator_nodes', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Administrator Node'), array('controller' => 'administrator_nodes', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Member Activities'), array('controller' => 'member_activities', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member Activity'), array('controller' => 'member_activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
