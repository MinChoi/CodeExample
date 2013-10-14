<? //echo $this->Form->create('Setting',array('action'=>'deleteall'));?>
<div class="settings index">
<h2><?=$setting_type;?>&nbsp;<?= __('Settings');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0" class="sample">
<tr>
	<!--<th><input type="checkbox" id="cust_chk_0" name="cust_chk_0" value="0" onclick="$(this.form).getInputs('checkbox').each(function (elem) { if(elem.checked){elem.checked = false;$('cust_chk_0').checked=false;}else{elem.checked = true;$('cust_chk_0').checked=true;}});"/></th>-->
	<th><?= $this->Paginator->sort('key');?></th>
	<th><?= $this->Paginator->sort('pair');?></th>
	<th><?= $this->Paginator->sort('description');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($settings as $setting):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<!--<td><input type="checkbox" id="test$i" name="data[Setting][ids][]" value="<? //echo $setting['Setting']['id']; ?>" /></td>-->
		<td>
			<?= $html->link($setting['Setting']['key'], array('action' => 'edit', $setting['Setting']['id'])); ?>
		</td>
		<td>
			<div id="in_place_editor_<?= $setting['Setting']['id']; ?>"><?= $setting['Setting']['pair']; ?></div>
			 <?
				 echo $ajax->editor(
						 "in_place_editor_".$setting['Setting']['id'],
						 array(
							 'controller' => 'settings',
							 'action' => 'update_pair',
							 'admin'=>1,
							 $setting['Setting']['id']
						 )
					);
			?>
		</td>
		<td style="white-space:normal;">
			<?= $setting['Setting']['description']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $setting['Setting']['id'])); ?>
			<? //echo $html->link(__('Delete'), array('action' => 'delete', $setting['Setting']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $setting['Setting']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
<!--	<? if(count($settings)>0){ ?>
<input type="submit" value="Delete Selected" name="submit" />
	<? } ?>
</div>
</form>-->
<div class="paging">
	<?= html_entity_decode($this->Paginator->prev('&laquo; Previous',  array('class'=>'pagNav')));?>
	<?= $this->Paginator->numbers(array('class'=>'pagNav', 'separator' => ''));?>
	<?= html_entity_decode($this->Paginator->next('Next &raquo;',  array('class'=>'pagNav')));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New Setting'), array('action' => 'add')); ?></li>
	</ul>
</div>
