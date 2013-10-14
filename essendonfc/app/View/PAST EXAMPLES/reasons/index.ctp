<div class="reasons index">
<h2><?= __('Reasons');?></h2>
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
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($reasons as $reason):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $reason['Reason']['id']; ?>
		</td>
		<td>
			<?= $reason['Reason']['name']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $reason['Reason']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $reason['Reason']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $reason['Reason']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reason['Reason']['id'])); ?>
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
		<li><?= $html->link(__('New Reason'), array('action' => 'add')); ?></li>
	</ul>
</div>
