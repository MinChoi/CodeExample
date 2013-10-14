<div class="members index">
<h2><?= __('Members');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('username');?></th>
	<th><?= $this->Paginator->sort('password');?></th>
	<th><?= $this->Paginator->sort('last_login');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('email_active');?></th>
	<th><?= $this->Paginator->sort('member_group_id');?></th>
	<th><?= $this->Paginator->sort('organisation_id');?></th>
	<th><?= $this->Paginator->sort('renewal_date');?></th>
	<th><?= $this->Paginator->sort('targeted');?></th>
	<th><?= $this->Paginator->sort('voting_rights');?></th>
	<th><?= $this->Paginator->sort('active');?></th>
	<th><?= $this->Paginator->sort('member_account_type_id');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($members as $member):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $member['Member']['id']; ?>
		</td>
		<td>
			<?= $member['Member']['username']; ?>
		</td>
		<td>
			<?= $member['Member']['password']; ?>
		</td>
		<td>
			<?= $member['Member']['last_login']; ?>
		</td>
		<td>
			<?= $member['Member']['created']; ?>
		</td>
		<td>
			<?= $member['Member']['modified']; ?>
		</td>
		<td>
			<?= $member['Member']['email_active']; ?>
		</td>
		<td>
			<?= $html->link($member['MemberGroup']['name'], array('controller' => 'member_groups', 'action' => 'view', $member['MemberGroup']['id'])); ?>
		</td>
		<td>
			<?= $html->link($member['Organisation']['name'], array('controller' => 'organisations', 'action' => 'view', $member['Organisation']['id'])); ?>
		</td>
		<td>
			<?= $member['Member']['renewal_date']; ?>
		</td>
		<td>
			<?= $member['Member']['targeted']; ?>
		</td>
		<td>
			<?= $member['Member']['voting_rights']; ?>
		</td>
		<td>
			<?= $member['Member']['active']; ?>
		</td>
		<td>
			<?= $html->link($member['MemberAccountType']['name'], array('controller' => 'member_account_types', 'action' => 'view', $member['MemberAccountType']['id'])); ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $member['Member']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $member['Member']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
</div>
<div class="paging">
	<?= $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
 | 	<?= $this->Paginator->numbers();?>
	<?= $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New Member'), array('action' => 'add')); ?></li>
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
