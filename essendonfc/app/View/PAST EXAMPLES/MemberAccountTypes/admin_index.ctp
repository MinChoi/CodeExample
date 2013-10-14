<div class="memberAccountTypes index">
<h2><?= __('MemberAccountTypes');?></h2>
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
foreach ($memberAccountTypes as $memberAccountType):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $memberAccountType['MemberAccountType']['id']; ?>
		</td>
		<td>
			<?= $memberAccountType['MemberAccountType']['name']; ?>
		</td>
		<td>
			<?= $memberAccountType['MemberAccountType']['created']; ?>
		</td>
		<td>
			<?= $memberAccountType['MemberAccountType']['modified']; ?>
		</td>
		<td>
			<?= $memberAccountType['MemberAccountType']['created_by']; ?>
		</td>
		<td>
			<?= $memberAccountType['MemberAccountType']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $memberAccountType['MemberAccountType']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $memberAccountType['MemberAccountType']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $memberAccountType['MemberAccountType']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $memberAccountType['MemberAccountType']['id'])); ?>
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
		<li><?= $html->link(__('New MemberAccountType'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
