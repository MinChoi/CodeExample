<div class="templates form">
<?= $this->Form->create('Template');?>
	<fieldset>
 		<legend><?= __('Add Template');?></legend>
	<?
		echo $this->Form->input('name');
		echo $this->Form->input('image');
		echo $this->Form->input('path');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Templates'), array('action' => 'index'));?></li>
	</ul>
</div>
