<div class="settingTypes form">
<h2><?= __('Edit SettingType');?></h2>
<?= $this->Form->create('SettingType');?>
	<?
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('SettingType.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('SettingType.id'))); ?></li>
		<li><?= $html->link(__('List SettingTypes'), array('action' => 'index'));?></li>
	</ul>
</div>
