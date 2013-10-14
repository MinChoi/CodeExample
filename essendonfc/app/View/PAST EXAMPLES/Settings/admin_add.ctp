<div class="settings form">
<h2><?= __('Add Setting');?></h2>
<?= $this->Form->create('Setting');?>
	<?
		echo $this->Form->input('setting_type_id');
		echo $this->Form->input('key');
		echo $this->Form->input('pair');
		echo $this->Form->input('description');
	?>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Settings'), array('action' => 'index'));?></li>
	</ul>
</div>
