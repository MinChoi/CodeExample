<div class="reasons view">
<h2><?= __('Reason');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reason['Reason']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reason['Reason']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Reason'), array('action' => 'edit', $reason['Reason']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Reason'), array('action' => 'delete', $reason['Reason']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reason['Reason']['id'])); ?> </li>
		<li><?= $html->link(__('List Reasons'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Reason'), array('action' => 'add')); ?> </li>
	</ul>
</div>
