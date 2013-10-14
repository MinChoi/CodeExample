<div class="eventRegistrations form">
<?= $this->Form->create('EventRegistration');?>
	<fieldset>
 		<legend><?= __('Edit EventRegistration');?></legend>
	<?
		echo $this->Form->input('id');
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
		<li><?= $html->link(__('Delete'), array('action' => 'delete', $this->Form->value('EventRegistration.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('EventRegistration.id'))); ?></li>
		<li><?= $html->link(__('List EventRegistrations'), array('action' => 'index'));?></li>
	</ul>
</div>
