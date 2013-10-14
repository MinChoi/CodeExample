<div class="reportResults view">
<h2><?= __('ReportResult');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Report Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['report_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Result'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['result']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['modified']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified By'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportResult['ReportResult']['modified_by']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit ReportResult'), array('action' => 'edit', $reportResult['ReportResult']['id'])); ?> </li>
		<li><?= $html->link(__('Delete ReportResult'), array('action' => 'delete', $reportResult['ReportResult']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reportResult['ReportResult']['id'])); ?> </li>
		<li><?= $html->link(__('List ReportResults'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New ReportResult'), array('action' => 'add')); ?> </li>
	</ul>
</div>
