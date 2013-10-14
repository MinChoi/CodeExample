<?= $this->Form->create('SettingType',array('action'=>'deleteall'));?>
<div class="settingTypes index">
<h2><?= __('SettingTypes');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0" class="sample">
<tr>
	<th><input type="checkbox" id="cust_chk_0" name="cust_chk_0" value="0" onclick="$(this.form).getInputs('checkbox').each(function (elem) { if(elem.checked){elem.checked = false;$('cust_chk_0').checked=false;}else{elem.checked = true;$('cust_chk_0').checked=true;}});"/></th>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('name');?></th>
	<th><?= $this->Paginator->sort('created');?></th>
	<th><?= $this->Paginator->sort('modified');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($settingTypes as $settingType):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td><input type="checkbox" id="test$i" name="data[SettingType][ids][]" value="<?= $settingType['SettingType']['id']; ?>" /></td>
		<td>
			<?= $settingType['SettingType']['id']; ?>
		</td>
		<td>
			<?= $settingType['SettingType']['name']; ?>
		</td>
		<td>
			<?= $settingType['SettingType']['created']; ?>
		</td>
		<td>
			<?= $settingType['SettingType']['modified']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $settingType['SettingType']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $settingType['SettingType']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $settingType['SettingType']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $settingType['SettingType']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
	<? if(count($settingTypes)>0){ ?>
<input type="submit" value="Delete Selected" name="submit" />
	<? } ?>
</div>
</form>
<div class="paging">
	<?= html_entity_decode($this->Paginator->prev('&laquo; Previous',  array('class'=>'pagNav')));?>
	<?= $this->Paginator->numbers(array('class'=>'pagNav', 'separator' => ''));?>
	<?= html_entity_decode($this->Paginator->next('Next &raquo;',  array('class'=>'pagNav')));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New SettingType'), array('action' => 'add')); ?></li>
	</ul>
</div>
