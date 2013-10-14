<div class="templates index">
<h2><?= __('Templates');?></h2>
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
	<th><?= $this->Paginator->sort('image');?></th>
	<th><?= $this->Paginator->sort('path');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('created_by');?></th>
	<th><?= $this->Paginator->sort('modified_by');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($templates as $template):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $template['Template']['id']; ?>
		</td>
		<td>
			<?= $template['Template']['name']; ?>
		</td>
		<td>
			<?= $template['Template']['image']; ?>
		</td>
		<td>
			<?= $template['Template']['path']; ?>
		</td>
		<td>
			<?= $template['Template']['created']; ?>
		</td>
		<td>
			<?= $template['Template']['modified']; ?>
		</td>
		<td>
			<?= $template['Template']['created_by']; ?>
		</td>
		<td>
			<?= $template['Template']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $template['Template']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $template['Template']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $template['Template']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $template['Template']['id'])); ?>
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
		<li><?= $html->link(__('New Template'), array('action' => 'add')); ?></li>
	</ul>
</div>
