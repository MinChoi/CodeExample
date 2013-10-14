<div class="widgets view">
<h2><?= __('Widget');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $widget['Widget']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $widget['Widget']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Path'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $widget['Widget']['path']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Widget'), array('action' => 'edit', $widget['Widget']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Widget'), array('action' => 'delete', $widget['Widget']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $widget['Widget']['id'])); ?> </li>
		<li><?= $html->link(__('List Widgets'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Widget'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Events');?></h3>
	<? if (!empty($widget['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Title'); ?></th>
		<th><?= __('Date'); ?></th>
		<th><?= __('Date Int'); ?></th>
		<th><?= __('Start Time'); ?></th>
		<th><?= __('End Time'); ?></th>
		<th><?= __('Location Id'); ?></th>
		<th><?= __('Image'); ?></th>
		<th><?= __('Rsvp Date'); ?></th>
		<th><?= __('Rsvp Date Int'); ?></th>
		<th><?= __('Max Rsvp'); ?></th>
		<th><?= __('Who Can Rsvp'); ?></th>
		<th><?= __('Pricing'); ?></th>
		<th><?= __('Reminder'); ?></th>
		<th><?= __('Content'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Created By'); ?></th>
		<th><?= __('Modified By'); ?></th>
		<th><?= __('Category Id'); ?></th>
		<th><?= __('Publish Date'); ?></th>
		<th><?= __('Publish Date Int'); ?></th>
		<th><?= __('Published'); ?></th>
		<th><?= __('File Attach'); ?></th>
		<th><?= __('Showatlist'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($widget['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $event['id'];?></td>
			<td><?= $event['title'];?></td>
			<td><?= $event['date'];?></td>
			<td><?= $event['date_int'];?></td>
			<td><?= $event['start_time'];?></td>
			<td><?= $event['end_time'];?></td>
			<td><?= $event['location_id'];?></td>
			<td><?= $event['image'];?></td>
			<td><?= $event['rsvp_date'];?></td>
			<td><?= $event['rsvp_date_int'];?></td>
			<td><?= $event['max_rsvp'];?></td>
			<td><?= $event['who_can_rsvp'];?></td>
			<td><?= $event['pricing'];?></td>
			<td><?= $event['reminder'];?></td>
			<td><?= $event['content'];?></td>
			<td><?= $event['created'];?></td>
			<td><?= $event['modified'];?></td>
			<td><?= $event['created_by'];?></td>
			<td><?= $event['modified_by'];?></td>
			<td><?= $event['category_id'];?></td>
			<td><?= $event['publish_date'];?></td>
			<td><?= $event['publish_date_int'];?></td>
			<td><?= $event['published'];?></td>
			<td><?= $event['file_attach'];?></td>
			<td><?= $event['showatlist'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $event['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?= __('Related News');?></h3>
	<? if (!empty($widget['News'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Title'); ?></th>
		<th><?= __('Content'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Created By'); ?></th>
		<th><?= __('Modified By'); ?></th>
		<th><?= __('Category Id'); ?></th>
		<th><?= __('Publish Date'); ?></th>
		<th><?= __('Publish Date Int'); ?></th>
		<th><?= __('Published'); ?></th>
		<th><?= __('File Attach'); ?></th>
		<th><?= __('Showatlist'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($widget['News'] as $news):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $news['id'];?></td>
			<td><?= $news['title'];?></td>
			<td><?= $news['content'];?></td>
			<td><?= $news['created'];?></td>
			<td><?= $news['modified'];?></td>
			<td><?= $news['created_by'];?></td>
			<td><?= $news['modified_by'];?></td>
			<td><?= $news['category_id'];?></td>
			<td><?= $news['publish_date'];?></td>
			<td><?= $news['publish_date_int'];?></td>
			<td><?= $news['published'];?></td>
			<td><?= $news['file_attach'];?></td>
			<td><?= $news['showatlist'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'news', 'action' => 'view', $news['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'news', 'action' => 'edit', $news['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'news', 'action' => 'delete', $news['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $news['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New News'), array('controller' => 'news', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?= __('Related Pages');?></h3>
	<? if (!empty($widget['Page'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Name'); ?></th>
		<th><?= __('Content'); ?></th>
		<th><?= __('Section Id'); ?></th>
		<th><?= __('Sub Section Id'); ?></th>
		<th><?= __('Published'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Meta Id'); ?></th>
		<th><?= __('Menu Name'); ?></th>
		<th><?= __('Template Id'); ?></th>
		<th><?= __('Showatmenu'); ?></th>
		<th><?= __('Created By'); ?></th>
		<th><?= __('Modified By'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($widget['Page'] as $page):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $page['id'];?></td>
			<td><?= $page['name'];?></td>
			<td><?= $page['content'];?></td>
			<td><?= $page['section_id'];?></td>
			<td><?= $page['sub_section_id'];?></td>
			<td><?= $page['published'];?></td>
			<td><?= $page['created'];?></td>
			<td><?= $page['modified'];?></td>
			<td><?= $page['meta_id'];?></td>
			<td><?= $page['menu_name'];?></td>
			<td><?= $page['template_id'];?></td>
			<td><?= $page['showatmenu'];?></td>
			<td><?= $page['created_by'];?></td>
			<td><?= $page['modified_by'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'pages', 'action' => 'view', $page['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'pages', 'action' => 'edit', $page['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'pages', 'action' => 'delete', $page['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $page['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
