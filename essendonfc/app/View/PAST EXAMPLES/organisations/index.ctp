<div class="organisations index">
<h2><?= __('Organisations');?></h2>
<p>
<?
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?= $this->Paginator->sort('id');?></th>
	<th><?= $this->Paginator->sort('name');?></th>
	<th><?= $this->Paginator->sort('street_address');?></th>
	<th><?= $this->Paginator->sort('street_country_id');?></th>
	<th><?= $this->Paginator->sort('street_postcode');?></th>
	<th><?= $this->Paginator->sort('street_state_id');?></th>
	<th><?= $this->Paginator->sort('street_suburb');?></th>
	<th><?= $this->Paginator->sort('postal_country_id');?></th>
	<th><?= $this->Paginator->sort('postal_address');?></th>
	<th><?= $this->Paginator->sort('postal_postcode');?></th>
	<th><?= $this->Paginator->sort('postal_state_id');?></th>
	<th><?= $this->Paginator->sort('postal_suburb');?></th>
	<th><?= $this->Paginator->sort('phonenumber');?></th>
	<th><?= $this->Paginator->sort('website');?></th>
	<th><?= $this->Paginator->sort('parent_company');?></th>
	<th><?= $this->Paginator->sort('industry_type_id');?></th>
	<th><?= $this->Paginator->sort('number_of_employees');?></th>
	<th><?= $this->Paginator->sort('reason');?></th>
	<th><?= $this->Paginator->sort('ceo_gname');?></th>
	<th><?= $this->Paginator->sort('ceo_lname');?></th>
	<th><?= $this->Paginator->sort('ceo_country_id');?></th>
	<th><?= $this->Paginator->sort('ceo_address');?></th>
	<th><?= $this->Paginator->sort('ceo_postcode');?></th>
	<th><?= $this->Paginator->sort('ceo_state_id');?></th>
	<th><?= $this->Paginator->sort('ceo_suburb');?></th>
	<th><?= $this->Paginator->sort('hr_gname');?></th>
	<th><?= $this->Paginator->sort('hr_lname');?></th>
	<th><?= $this->Paginator->sort('hr_email');?></th>
	<th><?= $this->Paginator->sort('hod_gname');?></th>
	<th><?= $this->Paginator->sort('hod_lname');?></th>
	<th><?= $this->Paginator->sort('hod_email');?></th>
	<th><?= $this->Paginator->sort('kc_gname');?></th>
	<th><?= $this->Paginator->sort('kc_lname');?></th>
	<th><?= $this->Paginator->sort('kc_email');?></th>
	<th><?= $this->Paginator->sort('kc_position');?></th>
	<th><?= $this->Paginator->sort('kc_phone');?></th>
	<th><?= $this->Paginator->sort('kc_address');?></th>
	<th><?= $this->Paginator->sort('kc_country_id');?></th>
	<th><?= $this->Paginator->sort('kc_postcode');?></th>
	<th><?= $this->Paginator->sort('kc_state_id');?></th>
	<th><?= $this->Paginator->sort('kc_suburb');?></th>
	<th class="actions"><?= __('Actions');?></th>
</tr>
<?
$i = 0;
foreach ($organisations as $organisation):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?= $class;?>>
		<td>
			<?= $organisation['Organisation']['id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['name']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['street_address']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['street_country_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['street_postcode']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['street_state_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['street_suburb']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['postal_country_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['postal_address']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['postal_postcode']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['postal_state_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['postal_suburb']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['phonenumber']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['website']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['parent_company']; ?>
		</td>
		<td>
			<?= $html->link($organisation['IndustryType']['name'], array('controller' => 'industry_types', 'action' => 'view', $organisation['IndustryType']['id'])); ?>
		</td>
		<td>
			<?= $organisation['Organisation']['number_of_employees']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['reason']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_gname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_lname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_country_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_address']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_postcode']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_state_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['ceo_suburb']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hr_gname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hr_lname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hr_email']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hod_gname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hod_lname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['hod_email']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_gname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_lname']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_email']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_position']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_phone']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_address']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_country_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_postcode']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_state_id']; ?>
		</td>
		<td>
			<?= $organisation['Organisation']['kc_suburb']; ?>
		</td>
		<td class="actions">
			<?= $html->link(__('View'), array('action' => 'view', $organisation['Organisation']['id'])); ?>
			<?= $html->link(__('Edit'), array('action' => 'edit', $organisation['Organisation']['id'])); ?>
			<?= $html->link(__('Delete'), array('action' => 'delete', $organisation['Organisation']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $organisation['Organisation']['id'])); ?>
		</td>
	</tr>
<? endforeach; ?>
</table>
</div>
<div class="paging">
	<?= $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
 | 	<?= $this->Paginator->numbers();?>
	<?= $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('New Organisation'), array('action' => 'add')); ?></li>
		<li><?= $html->link(__('List Industry Types'), array('controller' => 'industry_types', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Industry Type'), array('controller' => 'industry_types', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Operating Areas'), array('controller' => 'operating_areas', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Operating Area'), array('controller' => 'operating_areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
