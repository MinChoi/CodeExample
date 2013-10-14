<div class="administratorNodes index">
<h2><?= __('AdministratorNodes');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('member_id');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('date');?></th>
	<th><?= $this->Paginator->sort('description');?></th>
	<th><?= $this->Paginator->sort('int_date');?></th>
	<th><?= $this->Paginator->sort('created_by');?></th>
	<th><?= $this->Paginator->sort('modified_by');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($administratorNodes as $administratorNode):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $administratorNode['AdministratorNode']['id']; ?>
		</td>
		<td>
			<?= $html->link($administratorNode['Member']['id'], array('controller' => 'members', 'action' => 'view', $administratorNode['Member']['id'])); ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['created']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['modified']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['date']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['description']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['int_date']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['created_by']; ?>
		</td>
		<td>
			<?= $administratorNode['AdministratorNode']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $administratorNode['AdministratorNode']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $administratorNode['AdministratorNode']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $administratorNode['AdministratorNode']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $administratorNode['AdministratorNode']['id'])); ?>
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
		<li><?= $html->link(__('New AdministratorNode'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
