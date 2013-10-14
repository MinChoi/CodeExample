<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER || count($_USER_CLIENTS) > 1):
					$this->Html->addCrumb('Home', '/clients/');
				else:
					$this->Html->addCrumb($client['Client']['name'], '/clients/view/'.$_USER_CLIENTS[0]);
				endif;
				$this->Html->addCrumb('Search', '/files/search');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Search</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 pagination-counter column">
		<?php
			$count = $this->Paginator->counter(array('format' => '{:count}'));
			if ($count == '0') :
				echo $this->request->query['q'] . ' has returned no results';
			elseif ($count == '1') :
				echo '1 file';
			else :
				echo $count . ' files';
			endif;
		?>
	</div>
	<div class="large-6 column">
		<?php echo $this->Form->input('row_per_page', array(
				'div' => array('class' => 'input select row-per-page right'),
				'data-query-string' => $this->request->query['q'],
				'class' => 'file-list-count',
				'label' => 'Show results',
				'value' => @$count,
				'options' => array(
						'10' => '10 per page',
						'20' => '20 per page',
						'50' => '50 per page',
						'100' => '100 per page',
						'9999' => 'All'
					)
				)); ?>

	</div>

</div>

<?php if (empty($files)) return; ?>

<div class="row">

	<div class="large-12 column">

		<table width="100%" class="search-list">
			<thead>
				<tr>
					<th>File name</th>
					<th>Date</th>
					<th>Updated by</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($files as $file): ?>
					<tr>
						<td>
							<?php
								echo '<span class="file-name">' . $file['File']['name'] . '</span>' .
									'<span class="file-route">' .
										'<a href="/clients/view/' . $file['Client']['id'] . '">' . $file['Client']['name'] . '</a>' .
										' > ' .
										'<a href="/clients/' . $file['Client']['id'] . '/projects/view/' . $file['Project']['id'] . '">' . $file['Project']['name'] . '</a>' .
										' > ' .
										'<a href="/clients/' . $file['Client']['id'] . '/projects/view/' . $file['Project']['id'] . '/' . $file['FileType']['id'] . '">' . $file['FileType']['name'] . '</a>' .
									'</span>';
							?>
						</td>
						<td class="file-times" created="<?php echo date('Ymdhi', strtotime($file['File']['created'])); ?>"></td>
						<td><?php echo $file['CreatedBy']['firstname'].' '.$file['CreatedBy']['lastname']; ?></td>
						<td>
							<a class="button button-success button-small-download" href="/clients/<?php echo $file['Project']['client_id']; ?>/projects/<?php echo $file['Project']['id']; ?>/files/view/<?php echo $file['File']['id']; ?>" target="_blank">Download</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php echo $this->element('cake_pagination'); ?>

	</div>

</div>
