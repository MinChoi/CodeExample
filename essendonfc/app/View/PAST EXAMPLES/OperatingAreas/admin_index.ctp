<div class="operatingAreas index">
<h2><?= __('OperatingAreas');?></h2>
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
foreach ($operatingAreas as $operatingArea):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $operatingArea['OperatingArea']['id']; ?>
		</td>
		<td>
			<?= $operatingArea['OperatingArea']['name']; ?>
		</td>
		<td>
			<?= $operatingArea['OperatingArea']['created']; ?>
		</td>
		<td>
			<?= $operatingArea['OperatingArea']['modified']; ?>
		</td>
		<td>
			<?= $operatingArea['OperatingArea']['created_by']; ?>
		</td>
		<td>
			<?= $operatingArea['OperatingArea']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $operatingArea['OperatingArea']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $operatingArea['OperatingArea']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $operatingArea['OperatingArea']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $operatingArea['OperatingArea']['id'])); ?>
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
		<li><?= $html->link(__('New OperatingArea'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Organisations'), array('controller' => 'organisations', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Organisation'), array('controller' => 'organisations', 'action' => 'add')); ?> </li>
	</ul>
</div>
