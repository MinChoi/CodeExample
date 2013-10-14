<div class="industryTypes view">
<h2><?= __('IndustryType');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $industryType['IndustryType']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit IndustryType'), array('action' => 'edit', $industryType['IndustryType']['id'])); ?> </li>
		<li><?= $html->link(__('Delete IndustryType'), array('action' => 'delete', $industryType['IndustryType']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $industryType['IndustryType']['id'])); ?> </li>
		<li><?= $html->link(__('List IndustryTypes'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New IndustryType'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Organisations'), array('controller' => 'organisations', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Organisation'), array('controller' => 'organisations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Organisations');?></h3>
	<? if (!empty($industryType['Organisation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Name'); ?></th>
		<th><?= __('Street Address'); ?></th>
		<th><?= __('Street Country Id'); ?></th>
		<th><?= __('Street Postcode'); ?></th>
		<th><?= __('Street State Id'); ?></th>
		<th><?= __('Street Suburb'); ?></th>
		<th><?= __('Postal Country Id'); ?></th>
		<th><?= __('Postal Address'); ?></th>
		<th><?= __('Postal Postcode'); ?></th>
		<th><?= __('Postal State Id'); ?></th>
		<th><?= __('Postal Suburb'); ?></th>
		<th><?= __('Phonenumber'); ?></th>
		<th><?= __('Website'); ?></th>
		<th><?= __('Parent Company'); ?></th>
		<th><?= __('Industry Type Id'); ?></th>
		<th><?= __('Number Of Employees'); ?></th>
		<th><?= __('Reason'); ?></th>
		<th><?= __('Ceo Gname'); ?></th>
		<th><?= __('Ceo Lname'); ?></th>
		<th><?= __('Ceo Country Id'); ?></th>
		<th><?= __('Ceo Address'); ?></th>
		<th><?= __('Ceo Postcode'); ?></th>
		<th><?= __('Ceo State Id'); ?></th>
		<th><?= __('Ceo Suburb'); ?></th>
		<th><?= __('Hr Gname'); ?></th>
		<th><?= __('Hr Lname'); ?></th>
		<th><?= __('Hr Email'); ?></th>
		<th><?= __('Hod Gname'); ?></th>
		<th><?= __('Hod Lname'); ?></th>
		<th><?= __('Hod Email'); ?></th>
		<th><?= __('Kc Gname'); ?></th>
		<th><?= __('Kc Lname'); ?></th>
		<th><?= __('Kc Email'); ?></th>
		<th><?= __('Kc Position'); ?></th>
		<th><?= __('Kc Phone'); ?></th>
		<th><?= __('Kc Address'); ?></th>
		<th><?= __('Kc Country Id'); ?></th>
		<th><?= __('Kc Postcode'); ?></th>
		<th><?= __('Kc State Id'); ?></th>
		<th><?= __('Kc Suburb'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($industryType['Organisation'] as $organisation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $organisation['id'];?></td>
			<td><?= $organisation['name'];?></td>
			<td><?= $organisation['street_address'];?></td>
			<td><?= $organisation['street_country_id'];?></td>
			<td><?= $organisation['street_postcode'];?></td>
			<td><?= $organisation['street_state_id'];?></td>
			<td><?= $organisation['street_suburb'];?></td>
			<td><?= $organisation['postal_country_id'];?></td>
			<td><?= $organisation['postal_address'];?></td>
			<td><?= $organisation['postal_postcode'];?></td>
			<td><?= $organisation['postal_state_id'];?></td>
			<td><?= $organisation['postal_suburb'];?></td>
			<td><?= $organisation['phonenumber'];?></td>
			<td><?= $organisation['website'];?></td>
			<td><?= $organisation['parent_company'];?></td>
			<td><?= $organisation['industry_type_id'];?></td>
			<td><?= $organisation['number_of_employees'];?></td>
			<td><?= $organisation['reason'];?></td>
			<td><?= $organisation['ceo_gname'];?></td>
			<td><?= $organisation['ceo_lname'];?></td>
			<td><?= $organisation['ceo_country_id'];?></td>
			<td><?= $organisation['ceo_address'];?></td>
			<td><?= $organisation['ceo_postcode'];?></td>
			<td><?= $organisation['ceo_state_id'];?></td>
			<td><?= $organisation['ceo_suburb'];?></td>
			<td><?= $organisation['hr_gname'];?></td>
			<td><?= $organisation['hr_lname'];?></td>
			<td><?= $organisation['hr_email'];?></td>
			<td><?= $organisation['hod_gname'];?></td>
			<td><?= $organisation['hod_lname'];?></td>
			<td><?= $organisation['hod_email'];?></td>
			<td><?= $organisation['kc_gname'];?></td>
			<td><?= $organisation['kc_lname'];?></td>
			<td><?= $organisation['kc_email'];?></td>
			<td><?= $organisation['kc_position'];?></td>
			<td><?= $organisation['kc_phone'];?></td>
			<td><?= $organisation['kc_address'];?></td>
			<td><?= $organisation['kc_country_id'];?></td>
			<td><?= $organisation['kc_postcode'];?></td>
			<td><?= $organisation['kc_state_id'];?></td>
			<td><?= $organisation['kc_suburb'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'organisations', 'action' => 'view', $organisation['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'organisations', 'action' => 'edit', $organisation['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'organisations', 'action' => 'delete', $organisation['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $organisation['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Organisation'), array('controller' => 'organisations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
