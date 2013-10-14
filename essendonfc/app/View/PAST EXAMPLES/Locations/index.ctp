<div class="locations index">
<h2><?= __('Locations');?></h2>
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
foreach ($locations as $location):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $location['Location']['id']; ?>
		</td>
		<td>
			<?= $location['Location']['name']; ?>
		</td>
		<td>
			<?= $location['Location']['created']; ?>
		</td>
		<td>
			<?= $location['Location']['modified']; ?>
		</td>
		<td>
			<?= $location['Location']['created_by']; ?>
		</td>
		<td>
			<?= $location['Location']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $location['Location']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $location['Location']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $location['Location']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $location['Location']['id'])); ?>
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
		<li><?= $html->link(__('New Location'), array('action' => 'add')); ?></li>
	</ul>
</div>
