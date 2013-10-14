<div class="widgets index">
<h2><?= __('Widgets');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('name');?></th>
	<th><?= $this->Paginator->sort('path');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($widgets as $widget):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $widget['Widget']['id']; ?>
		</td>
		<td>
			<?= $widget['Widget']['name']; ?>
		</td>
		<td>
			<?= $widget['Widget']['path']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $widget['Widget']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $widget['Widget']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $widget['Widget']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $widget['Widget']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
</div>
<div class="paging">
	<?= $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
 | 	<?= $this->Paginator->numbers();?>
	<?= $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New Widget'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List News'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New News'), array('controller' => 'news', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
