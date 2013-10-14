<div class="eventRegistrations form">
<?= $this->Form->create('EventRegistration');?>
	<fieldset>
 		<legend><?= __('Add EventRegistration');?></legend>
	<?
		echo $this->Form->input('event_id');
		echo $this->Form->input('member_id');
		echo $this->Form->input('special_needs');
		echo $this->Form->input('hdyf_id');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List EventRegistrations'), array('action' => 'index'));?></li>
	</ul>
</div>
