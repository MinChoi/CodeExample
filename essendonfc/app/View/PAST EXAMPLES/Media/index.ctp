<div class="media index">
<h2><?= __('Media');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('title');?></th>
	<th><?= $this->Paginator->sort('media_type_id');?></th>
	<th><?= $this->Paginator->sort('short_desc');?></th>
	<th><?= $this->Paginator->sort('video_file');?></th>
	<th><?= $this->Paginator->sort('preview_file');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($media as $media):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $media['Media']['id']; ?>
		</td>
		<td>
			<?= $media['Media']['title']; ?>
		</td>
		<td>
			<?= $media['Media']['media_type_id']; ?>
		</td>
		<td>
			<?= $media['Media']['short_desc']; ?>
		</td>
		<td>
			<?= $media['Media']['video_file']; ?>
		</td>
		<td>
			<?= $media['Media']['preview_file']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $media['Media']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $media['Media']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $media['Media']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $media['Media']['id'])); ?>
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
		<li><?= $html->link(__('New Media'), array('action' => 'add')); ?></li>
	</ul>
</div>
