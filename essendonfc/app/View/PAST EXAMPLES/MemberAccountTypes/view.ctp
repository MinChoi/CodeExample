<div class="memberAccountTypes view">
<h2><?= __('MemberAccountType');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberAccountType['MemberAccountType']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit MemberAccountType'), array('action' => 'edit', $memberAccountType['MemberAccountType']['id'])); ?> </li>
		<li><?= $html->link(__('Delete MemberAccountType'), array('action' => 'delete', $memberAccountType['MemberAccountType']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $memberAccountType['MemberAccountType']['id'])); ?> </li>
		<li><?= $html->link(__('List MemberAccountTypes'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New MemberAccountType'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Members');?></h3>
	<? if (!empty($memberAccountType['Member'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Username'); ?></th>
		<th><?= __('Password'); ?></th>
		<th><?= __('Last Login'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Email Active'); ?></th>
		<th><?= __('Member Group Id'); ?></th>
		<th><?= __('Organisation Id'); ?></th>
		<th><?= __('Renewal Date'); ?></th>
		<th><?= __('Targeted'); ?></th>
		<th><?= __('Voting Rights'); ?></th>
		<th><?= __('Active'); ?></th>
		<th><?= __('Member Account Type Id'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($memberAccountType['Member'] as $member):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $member['id'];?></td>
			<td><?= $member['username'];?></td>
			<td><?= $member['password'];?></td>
			<td><?= $member['last_login'];?></td>
			<td><?= $member['created'];?></td>
			<td><?= $member['modified'];?></td>
			<td><?= $member['email_active'];?></td>
			<td><?= $member['member_group_id'];?></td>
			<td><?= $member['organisation_id'];?></td>
			<td><?= $member['renewal_date'];?></td>
			<td><?= $member['targeted'];?></td>
			<td><?= $member['voting_rights'];?></td>
			<td><?= $member['active'];?></td>
			<td><?= $member['member_account_type_id'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $member['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
