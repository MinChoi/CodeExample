<div class="members view">
<h2><?= __('Member');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Username'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['username']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Password'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['password']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Last Login'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['last_login']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Email Active'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['email_active']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Member Group'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($member['MemberGroup']['name'], array('controller' => 'member_groups', 'action' => 'view', $member['MemberGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Organisation'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($member['Organisation']['name'], array('controller' => 'organisations', 'action' => 'view', $member['Organisation']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Renewal Date'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['renewal_date']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Targeted'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['targeted']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Voting Rights'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['voting_rights']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Active'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $member['Member']['active']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Member Account Type'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($member['MemberAccountType']['name'], array('controller' => 'member_account_types', 'action' => 'view', $member['MemberAccountType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $member['Member']['id'])); ?> </li>
		<li><?= $html->link(__('List Members'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?= __('Related Administrator Nodes');?></h3>
	<? if (!empty($member['AdministratorNode'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Member Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Date'); ?></th>
		<th><?= __('Description'); ?></th>
		<th><?= __('Int Date'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($member['AdministratorNode'] as $administratorNode):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $administratorNode['id'];?></td>
			<td><?= $administratorNode['member_id'];?></td>
			<td><?= $administratorNode['created'];?></td>
			<td><?= $administratorNode['modified'];?></td>
			<td><?= $administratorNode['date'];?></td>
			<td><?= $administratorNode['description'];?></td>
			<td><?= $administratorNode['int_date'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'administrator_nodes', 'action' => 'view', $administratorNode['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'administrator_nodes', 'action' => 'edit', $administratorNode['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'administrator_nodes', 'action' => 'delete', $administratorNode['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $administratorNode['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Administrator Node'), array('controller' => 'administrator_nodes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?= __('Related Member Activities');?></h3>
	<? if (!empty($member['MemberActivity'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Member Id'); ?></th>
		<th><?= __('Date'); ?></th>
		<th><?= __('Title'); ?></th>
		<th><?= __('Description'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Int Date'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($member['MemberActivity'] as $memberActivity):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $memberActivity['id'];?></td>
			<td><?= $memberActivity['member_id'];?></td>
			<td><?= $memberActivity['date'];?></td>
			<td><?= $memberActivity['title'];?></td>
			<td><?= $memberActivity['description'];?></td>
			<td><?= $memberActivity['created'];?></td>
			<td><?= $memberActivity['modified'];?></td>
			<td><?= $memberActivity['int_date'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'member_activities', 'action' => 'view', $memberActivity['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'member_activities', 'action' => 'edit', $memberActivity['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'member_activities', 'action' => 'delete', $memberActivity['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $memberActivity['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Member Activity'), array('controller' => 'member_activities', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
