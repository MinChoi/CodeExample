<div class="organisations view">
<h2><?= __('Organisation');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Name'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['name']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Street Address'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['street_address']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Street Country Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['street_country_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Street Postcode'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['street_postcode']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Street State Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['street_state_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Street Suburb'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['street_suburb']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Postal Country Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['postal_country_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Postal Address'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['postal_address']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Postal Postcode'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['postal_postcode']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Postal State Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['postal_state_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Postal Suburb'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['postal_suburb']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Phonenumber'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['phonenumber']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Website'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['website']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Parent Company'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['parent_company']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Industry Type'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $html->link($organisation['IndustryType']['name'], array('controller' => 'industry_types', 'action' => 'view', $organisation['IndustryType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Number Of Employees'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['number_of_employees']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Reason'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['reason']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Gname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_gname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Lname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_lname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Country Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_country_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Address'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_address']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Postcode'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_postcode']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo State Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_state_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Ceo Suburb'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['ceo_suburb']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hr Gname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hr_gname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hr Lname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hr_lname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hr Email'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hr_email']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hod Gname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hod_gname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hod Lname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hod_lname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Hod Email'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['hod_email']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Gname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_gname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Lname'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_lname']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Email'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_email']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Position'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_position']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Phone'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_phone']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Address'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_address']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Country Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_country_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Postcode'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_postcode']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc State Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_state_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Kc Suburb'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $organisation['Organisation']['kc_suburb']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit Organisation'), array('action' => 'edit', $organisation['Organisation']['id'])); ?> </li>
		<li><?= $html->link(__('Delete Organisation'), array('action' => 'delete', $organisation['Organisation']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $organisation['Organisation']['id'])); ?> </li>
		<li><?= $html->link(__('List Organisations'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Organisation'), array('action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Industry Types'), array('controller' => 'industry_types', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Industry Type'), array('controller' => 'industry_types', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?= $html->link(__('List Operating Areas'), array('controller' => 'operating_areas', 'action' => 'index')); ?> </li>
		<li><?= $html->link(__('New Operating Area'), array('controller' => 'operating_areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Members');?></h3>
	<? if (!empty($organisation['Member'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Username'); ?></th>
		<th><?= __('Password'); ?></th>
		<th><?= __('Last Login'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Email Active'); ?></th>
		<th><?= __('Member Group Id'); ?></th>
		<th><?= __('Organisation Id'); ?></th>
		<th><?= __('Renewal Date'); ?></th>
		<th><?= __('Targeted'); ?></th>
		<th><?= __('Voting Rights'); ?></th>
		<th><?= __('Active'); ?></th>
		<th><?= __('Member Account Type Id'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($organisation['Member'] as $member):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $member['id'];?></td>
			<td><?= $member['username'];?></td>
			<td><?= $member['password'];?></td>
			<td><?= $member['last_login'];?></td>
			<td><?= $member['created'];?></td>
			<td><?= $member['modified'];?></td>
			<td><?= $member['email_active'];?></td>
			<td><?= $member['member_group_id'];?></td>
			<td><?= $member['organisation_id'];?></td>
			<td><?= $member['renewal_date'];?></td>
			<td><?= $member['targeted'];?></td>
			<td><?= $member['voting_rights'];?></td>
			<td><?= $member['active'];?></td>
			<td><?= $member['member_account_type_id'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $member['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Member'), array('controller' => 'members', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?= __('Related Operating Areas');?></h3>
	<? if (!empty($organisation['OperatingArea'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Id'); ?></th>
		<th><?= __('Name'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Created By'); ?></th>
		<th><?= __('Modified By'); ?></th>
		<th class="actions"><?= __('Actions');?></th>
	</tr>
	<?
		$i = 0;
		foreach ($organisation['OperatingArea'] as $operatingArea):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $operatingArea['id'];?></td>
			<td><?= $operatingArea['name'];?></td>
			<td><?= $operatingArea['created'];?></td>
			<td><?= $operatingArea['modified'];?></td>
			<td><?= $operatingArea['created_by'];?></td>
			<td><?= $operatingArea['modified_by'];?></td>
			<td class="actions">
				<?= $html->link(__('View'), array('controller' => 'operating_areas', 'action' => 'view', $operatingArea['id'])); ?>
				<?= $html->link(__('Edit'), array('controller' => 'operating_areas', 'action' => 'edit', $operatingArea['id'])); ?>
				<?= $html->link(__('Delete'), array('controller' => 'operating_areas', 'action' => 'delete', $operatingArea['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $operatingArea['id'])); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</table>
<? endif; ?>

	<div class="actions">
		<ul>
			<li><?= $html->link(__('New Operating Area'), array('controller' => 'operating_areas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
