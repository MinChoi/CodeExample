<div class="memberActivities index">
<h2><?= __('MemberActivities');?></h2>
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
	<th><?= $this->Paginator->sort('date');?></th>
	<th><?= $this->Paginator->sort('title');?></th>
	<th><?= $this->Paginator->sort('description');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('int_date');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($memberActivities as $memberActivity):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $memberActivity['MemberActivity']['id']; ?>
		</td>
		<td>
			<?= $html->link($memberActivity['Member']['id'], array('controller' => 'members', 'action' => 'view', $memberActivity['Member']['id'])); ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['date']; ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['title']; ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['description']; ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['created']; ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['modified']; ?>
		</td>
		<td>
			<?= $memberActivity['MemberActivity']['int_date']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $memberActivity['MemberActivity']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $memberActivity['MemberActivity']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $memberActivity['MemberActivity']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $memberActivity['MemberActivity']['id'])); ?>
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
		<li><?= $html->link(__('New MemberActivity'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
