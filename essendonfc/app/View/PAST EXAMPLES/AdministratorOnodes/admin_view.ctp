<div class="administratorNodes view">
<h2><?= __('AdministratorNode');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Member'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($administratorNode['Member']['id'], array('controller' => 'members', 'action' => 'view', $administratorNode['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Date'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['date']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Description'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['description']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Int Date'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['int_date']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $administratorNode['AdministratorNode']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit AdministratorNode'), array('action' => 'edit', $administratorNode['AdministratorNode']['id'])); ?> </li>
		<li><?= $html->link(__('Delete AdministratorNode'), array('action' => 'delete', $administratorNode['AdministratorNode']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $administratorNode['AdministratorNode']['id'])); ?> </li>
		<li><?= $html->link(__('List AdministratorNodes'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New AdministratorNode'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
