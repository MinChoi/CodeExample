<div class="settings form">
<h2><?= __('Edit Setting');?></h2>
<?= $this->Form->create('Setting');?>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('setting_type_id');
		echo $this->Form->input('key');
		echo $this->Form->input('pair');
		echo $this->Form->input('description');
	?>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Setting.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Setting.id'))); ?></li>
		<li><?= $html->link(__('List Settings'), array('action' => 'index'));?></li>
	</ul>
</div>
