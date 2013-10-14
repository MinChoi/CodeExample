<div class="groups index">
<h2><?= __('Groups');?></h2>
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
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('created_by');?></th>
	<th><?= $this->Paginator->sort('modified_by');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($groups as $group):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $group['Group']['id']; ?>
		</td>
		<td>
			<?= $group['Group']['name']; ?>
		</td>
		<td>
			<?= $group['Group']['created']; ?>
		</td>
		<td>
			<?= $group['Group']['modified']; ?>
		</td>
		<td>
			<?= $group['Group']['created_by']; ?>
		</td>
		<td>
			<?= $group['Group']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $group['Group']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $group['Group']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $group['Group']['id'])); ?>
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
		<li><?= $html->link(__('New Group'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
