<div class="posts form">
<?= $this->Form->create('Post');?>
	<fieldset>
 		<legend><?= __('Edit Post'); ?></legend>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?= $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>

		<li><?= $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Post.id'))); ?></li>
		<li><?= $this->Html->link(__('List Posts'), array('action' => 'index'));?></li>
		<li><?= $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?= $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>