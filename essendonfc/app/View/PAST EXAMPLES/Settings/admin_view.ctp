<div class="settings view">
<h2><?= __('Setting');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Key'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['key']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Pair'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['pair']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Description'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['description']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $setting['Setting']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Setting'), array('action' => 'edit', $setting['Setting']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Setting'), array('action' => 'delete', $setting['Setting']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $setting['Setting']['id'])); ?> </li>
		<li><?= $html->link(__('List Settings'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Setting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
