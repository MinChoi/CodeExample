<div class="pages index">
<h2><?= __('Pages');?></h2>
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
	<th><?= $this->Paginator->sort('content');?></th>
	<th><?= $this->Paginator->sort('page_id');?></th>
	<th><?= $this->Paginator->sort('published');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th><?= $this->Paginator->sort('meta_id');?></th>
	<th><?= $this->Paginator->sort('menu_name');?></th>
	<th><?= $this->Paginator->sort('template_id');?></th>
	<th><?= $this->Paginator->sort('showatmenu');?></th>
	<th><?= $this->Paginator->sort('created_by');?></th>
	<th><?= $this->Paginator->sort('modified_by');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($pages as $page):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $page['Page']['id']; ?>
		</td>
		<td>
			<?= $page['Page']['name']; ?>
		</td>
		<td>
			<?= $page['Page']['content']; ?>
		</td>
		<td>
			<?= $page['Page']['page_id']; ?>
		</td>
		<td>
			<?= $page['Page']['published']; ?>
		</td>
		<td>
			<?= $page['Page']['created']; ?>
		</td>
		<td>
			<?= $page['Page']['modified']; ?>
		</td>
		<td>
			<?= $page['Page']['meta_id']; ?>
		</td>
		<td>
			<?= $page['Page']['menu_name']; ?>
		</td>
		<td>
			<?= $page['Page']['template_id']; ?>
		</td>
		<td>
			<?= $page['Page']['showatmenu']; ?>
		</td>
		<td>
			<?= $page['Page']['created_by']; ?>
		</td>
		<td>
			<?= $page['Page']['modified_by']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $page['Page']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $page['Page']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $page['Page']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $page['Page']['id'])); ?>
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
		<li><?= $html->link(__('New Page'), array('action' => 'add')); ?></li>
	</ul>
</div>
