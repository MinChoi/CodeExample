<div class="reportDetails view">
<h2><?= __('ReportDetail');?></h2>
	<dl><? $i = 0; $class = ' class="altrow"';?>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Report Id'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['report_id']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Fields'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['fields']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Tables'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['tables']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Conditions'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['conditions']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Created'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['created']; ?>
			&nbsp;
		</dd>
		<dt<? if ($i % 2 == 0) echo $class;?>><?= __('Modified'); ?></dt>
		<dd<? if ($i++ % 2 == 0) echo $class;?>>
			<?= $reportDetail['ReportDetail']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?= $html->link(__('Edit ReportDetail'), array('action' => 'edit', $reportDetail['ReportDetail']['id'])); ?> </li>
		<li><?= $html->link(__('Delete ReportDetail'), array('action' => 'delete', $reportDetail['ReportDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $reportDetail['ReportDetail']['id'])); ?> </li>
		<li><?= $html->link(__('List ReportDetails'), array('action' => 'index')); ?> </li>
		<li><?= $html->link(__('New ReportDetail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
