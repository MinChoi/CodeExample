<div class="posts index">
	<h2><?= __('Posts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?= $this->Paginator->sort('id');?></th>
			<th><?= $this->Paginator->sort('user_id');?></th>
			<th><?= $this->Paginator->sort('title');?></th>
			<th><?= $this->Paginator->sort('body');?></th>
			<th><?= $this->Paginator->sort('created');?></th>
			<th><?= $this->Paginator->sort('modified');?></th>
			<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
	$i = 0;
	foreach ($posts as $post):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?= $class;?>>
		<td><?= $post['Post']['id']; ?>&nbsp;</td>
		<td>
			<?= $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td><?= $post['Post']['title']; ?>&nbsp;</td>
		<td><?= $post['Post']['body']; ?>&nbsp;</td>
		<td><?= $post['Post']['created']; ?>&nbsp;</td>
		<td><?= $post['Post']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $post['Post']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
	</table>
	<p>
	<?
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?= $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?= $this->Paginator->numbers();?>
 |
		<?= $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>