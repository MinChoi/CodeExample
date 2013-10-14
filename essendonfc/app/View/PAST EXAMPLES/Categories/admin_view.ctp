<div class="categories view">
<h2><?= __('Category');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $category['Category']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $category['Category']['id'])); ?> </li>
		<li><?= $html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
