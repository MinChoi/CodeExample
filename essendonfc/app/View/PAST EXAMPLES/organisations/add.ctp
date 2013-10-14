<div class="organisations form">
<?= $this->Form->create('Organisation');?>
	<fieldset>
 		<legend><?= __('Add Organisation');?></legend>
	<?
		echo $this->Form->input('name');
		echo $this->Form->input('street_address');
		echo $this->Form->input('street_country_id');
		echo $this->Form->input('street_postcode');
		echo $this->Form->input('street_state_id');
		echo $this->Form->input('street_suburb');
		echo $this->Form->input('postal_country_id');
		echo $this->Form->input('postal_address');
		echo $this->Form->input('postal_postcode');
		echo $this->Form->input('postal_state_id');
		echo $this->Form->input('postal_suburb');
		echo $this->Form->input('phonenumber');
		echo $this->Form->input('website');
		echo $this->Form->input('parent_company');
		echo $this->Form->input('industry_type_id');
		echo $this->Form->input('number_of_employees');
		echo $this->Form->input('reason');
		echo $this->Form->input('ceo_gname');
		echo $this->Form->input('ceo_lname');
		echo $this->Form->input('ceo_country_id');
		echo $this->Form->input('ceo_address');
		echo $this->Form->input('ceo_postcode');
		echo $this->Form->input('ceo_state_id');
		echo $this->Form->input('ceo_suburb');
		echo $this->Form->input('hr_gname');
		echo $this->Form->input('hr_lname');
		echo $this->Form->input('hr_email');
		echo $this->Form->input('hod_gname');
		echo $this->Form->input('hod_lname');
		echo $this->Form->input('hod_email');
		echo $this->Form->input('kc_gname');
		echo $this->Form->input('kc_lname');
		echo $this->Form->input('kc_email');
		echo $this->Form->input('kc_position');
		echo $this->Form->input('kc_phone');
		echo $this->Form->input('kc_address');
		echo $this->Form->input('kc_country_id');
		echo $this->Form->input('kc_postcode');
		echo $this->Form->input('kc_state_id');
		echo $this->Form->input('kc_suburb');
		echo $this->Form->input('OperatingArea');
	?>
	</fieldset>
<?= $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('List Organisations'), array('action' => 'index'));?></li>
		<li><?= $html->link(__('List Industry Types'), array('controller' => 'industry_types', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Industry Type'), array('controller' => 'industry_types', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Operating Areas'), array('controller' => 'operating_areas', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Operating Area'), array('controller' => 'operating_areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
