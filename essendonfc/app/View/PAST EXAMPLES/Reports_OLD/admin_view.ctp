<div class="reports view">
<h2><?= __('Report');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Category Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['category_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Last Run'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['last_run']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $report['Report']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Report'), array('action' => 'edit', $report['Report']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Report'), array('action' => 'delete', $report['Report']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $report['Report']['id'])); ?> </li>
		<li><?= $html->link(__('List Reports'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Report'), array('action' => 'add')); ?> </li>
	</ul>
</div>
