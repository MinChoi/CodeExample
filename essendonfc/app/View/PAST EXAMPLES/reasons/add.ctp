<div class="reasons form">
<?= $this->Form->create('Reason');?>
	<fieldset>
 		<legend><?= __('Add Reason');?></legend>
	<?
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Reasons'), array('action' => 'index'));?></li>
	</ul>
</div>
