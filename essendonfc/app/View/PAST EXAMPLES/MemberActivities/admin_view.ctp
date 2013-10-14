<div class="memberActivities view">
<h2><?= __('MemberActivity');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Member'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($memberActivity['Member']['id'], array('controller' => 'members', 'action' => 'view', $memberActivity['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Date'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['date']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Title'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['title']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Description'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['description']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Int Date'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $memberActivity['MemberActivity']['int_date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit MemberActivity'), array('action' => 'edit', $memberActivity['MemberActivity']['id'])); ?> </li>
		<li><?= $html->link(__('Delete MemberActivity'), array('action' => 'delete', $memberActivity['MemberActivity']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $memberActivity['MemberActivity']['id'])); ?> </li>
		<li><?= $html->link(__('List MemberActivities'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New MemberActivity'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
