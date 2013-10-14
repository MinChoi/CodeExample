<?php $count = 0; ?>
<?php foreach($projects as $project): ?>
	<li class="small-6 large-3 column left column-<?php echo $count++%4+1; ?> filter-project">
		<a class="inner cell" href="/clients/<?php echo $client['Client']['id']; ?>/projects/view/<?php echo $project['Project']['id']; ?>">
			<h4><?php echo $project['Project']['name'];?></h4>

			<?php if ($project['Project']['archived']) : ?>
				<span class="recent-file">Archived</span>
			<?php else : ?>
				<span class="recent-file">
					<?php echo ( count($project['File']) == 0 ? 'No Uploads' : 'Recent uploads'); ?>
				</span>
				<?php foreach($project['File'] as $file): ?>
					<div class="file-detail">
						<i class="file-<?php echo $file['extension']; ?>"></i>
						<span class="file-name"><?php echo $file['name']; ?></span>
						<span class="file-date" created="<?php echo date('YmdHi', strtotime($file['created'])); ?>"></span>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</a>
	</li>
<?php endforeach; ?>
<?php if ($count == 0): ?>
	<li class="small-6 large-3 column">
		<?php if ($_USER['type'] == $USER_USER): ?>
			<p>No projects are available.</p>
		<?php elseif ($this->request->data['project_status'] === '1'): ?>
			<p>No projects have been archived.</p>
		<?php else: ?>
			<p>Click create to start a new project.</p>
		<?php endif; ?>
	</li>
<?php endif; ?>
<li class="large-12 column">
	<?php echo $this->element('cake_pagination', array('controller' => 'view', 'url' => array('action' => 'view', $this->request->data['client_id'], $this->request->data['project_status'], $this->request->data['states']))); ?>
</li>
