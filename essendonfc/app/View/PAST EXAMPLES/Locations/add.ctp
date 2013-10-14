<div class="locations form">
<?= $this->Form->create('Location');?>
	<fieldset>
 		<legend><?= __('Add Location');?></legend>
	<?
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Locations'), array('action' => 'index'));?></li>
	</ul>
</div>
