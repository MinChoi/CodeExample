<div class="posts view">
<h2><?= __('Post');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $post['Post']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('User'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Title'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $post['Post']['title']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Body'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $post['Post']['body']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $post['Post']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $post['Post']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?= $this->Html->link(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $post['Post']['id'])); ?> </li>
		<li><?= $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
		<li><?= $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
		<li><?= $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
