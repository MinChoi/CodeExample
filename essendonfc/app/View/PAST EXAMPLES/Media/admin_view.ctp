<div class="media view">
<h2><?= __('Media');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Title'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['title']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Media Type Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['media_type_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Short Desc'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['short_desc']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Video File'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['video_file']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Preview File'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $media['Media']['preview_file']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Media'), array('action' => 'edit', $media['Media']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Media'), array('action' => 'delete', $media['Media']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $media['Media']['id'])); ?> </li>
		<li><?= $html->link(__('List Media'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Media'), array('action' => 'add')); ?> </li>
	</ul>
</div>
