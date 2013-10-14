<div class="eventRegistrations view">
<h2><?= __('EventRegistration');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $eventRegistration['EventRegistration']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Event Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $eventRegistration['EventRegistration']['event_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Member Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $eventRegistration['EventRegistration']['member_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Special Needs'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $eventRegistration['EventRegistration']['special_needs']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hdyf Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $eventRegistration['EventRegistration']['hdyf_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit EventRegistration'), array('action' => 'edit', $eventRegistration['EventRegistration']['id'])); ?> </li>
		<li><?= $html->link(__('Delete EventRegistration'), array('action' => 'delete', $eventRegistration['EventRegistration']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $eventRegistration['EventRegistration']['id'])); ?> </li>
		<li><?= $html->link(__('List EventRegistrations'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New EventRegistration'), array('action' => 'add')); ?> </li>
	</ul>
</div>
