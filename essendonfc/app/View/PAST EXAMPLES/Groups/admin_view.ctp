<div class="groups view">
<h2><?= __('Group');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $group['Group']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $group['Group']['id'])); ?> </li>
		<li><?= $html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Users');?></h3>
	<? if (!empty($group['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Username'); ?></th>
		<th><?= __('Password'); ?></th>
		<th><?= __('Email'); ?></th>
		<th><?= __('Last Login'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Group Id'); ?></th>
		<th><?= __('Status'); ?></th>
		<th><?= __('Deleteable'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($group['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $user['id'];?></td>
			<td><?= $user['username'];?></td>
			<td><?= $user['password'];?></td>
			<td><?= $user['email'];?></td>
			<td><?= $user['last_login'];?></td>
			<td><?= $user['created'];?></td>
			<td><?= $user['modified'];?></td>
			<td><?= $user['group_id'];?></td>
			<td><?= $user['status'];?></td>
			<td><?= $user['deleteable'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $user['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
