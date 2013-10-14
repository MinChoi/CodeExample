<div class="templates view">
<h2><?= __('Template');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Image'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['image']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Path'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['path']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $template['Template']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Template'), array('action' => 'edit', $template['Template']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Template'), array('action' => 'delete', $template['Template']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $template['Template']['id'])); ?> </li>
		<li><?= $html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Template'), array('action' => 'add')); ?> </li>
	</ul>
</div>
