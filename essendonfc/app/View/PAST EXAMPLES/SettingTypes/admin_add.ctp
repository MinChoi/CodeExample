<div class="settingTypes form">
<h2><?= __('Add SettingType');?></h2>
<?= $this->Form->create('SettingType');?>
	<?
		echo $this->Form->input('name');
	?>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List SettingTypes'), array('action' => 'index'));?></li>
	</ul>
</div>
