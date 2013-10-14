<div class="eventRegistrations index">
<h2><?= __('EventRegistrations');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('event_id');?></th>
	<th><?= $this->Paginator->sort('member_id');?></th>
	<th><?= $this->Paginator->sort('special_needs');?></th>
	<th><?= $this->Paginator->sort('hdyf_id');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($eventRegistrations as $eventRegistration):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $eventRegistration['EventRegistration']['id']; ?>
		</td>
		<td>
			<?= $eventRegistration['EventRegistration']['event_id']; ?>
		</td>
		<td>
			<?= $eventRegistration['EventRegistration']['member_id']; ?>
		</td>
		<td>
			<?= $eventRegistration['EventRegistration']['special_needs']; ?>
		</td>
		<td>
			<?= $eventRegistration['EventRegistration']['hdyf_id']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $eventRegistration['EventRegistration']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $eventRegistration['EventRegistration']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $eventRegistration['EventRegistration']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $eventRegistration['EventRegistration']['id'])); ?>
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
		<li><?= $html->link(__('New EventRegistration'), array('action' => 'add')); ?></li>
	</ul>
</div>
