<div class="settingTypes view">
<h2><?= __('SettingType');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $settingType['SettingType']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $settingType['SettingType']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $settingType['SettingType']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $settingType['SettingType']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit SettingType'), array('action' => 'edit', $settingType['SettingType']['id'])); ?> </li>
		<li><?= $html->link(__('Delete SettingType'), array('action' => 'delete', $settingType['SettingType']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $settingType['SettingType']['id'])); ?> </li>
		<li><?= $html->link(__('List SettingTypes'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New SettingType'), array('action' => 'add')); ?> </li>
	</ul>
</div>
