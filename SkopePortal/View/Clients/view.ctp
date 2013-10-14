<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php if ($_USER['type'] != $USER_USER || count($_USER_CLIENTS) > 1): ?>
				<?php $this->Html->addCrumb('Home', '/clients/'); ?>
			<?php endif; ?>

			<?php $this->Html->addCrumb($client['Client']['name'], '/clients/view/'.$this->request->params['client_id']); ?>
			<?php echo $this->Html->getCrumbList(array('class' => 'breadcrumbs')); ?>
		</div>
	</div>

	<div class="row project-head">
		<div class="large-12 columns ">
			<img src="<?php echo $client['Client']['logo_file']; ?>">
			<h2><?php echo $client['Client']['name']; ?></h2>
			<div class="client-view-menus">
				<?php if ($_USER['type'] != $USER_USER): ?>
					<a href="/clients/<?php echo $client['Client']['id']; ?>/projects/add/" class="button button-success">
						<i class="add"></i><span>Create project</span>
					</a>
					<a href="/clients/edit/<?php echo $client['Client']['id']; ?>" class="button button-secondary">
						<i class="edit"></i><span>Edit client</span>
					</a>
					<a href="javascript:void(0)" class="button button-alert action-delete-client" data-clientid="<?php echo $client['Client']['id']; ?>">
						<i class="delete"></i><span>Delete</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="large-12 column">
			<div class='states-list'>
				<?php $states = json_decode(@$this->request->params['project_states']); ?>
				<?php echo $this->Form->input('all', array('value' => '', 'type' => 'checkbox', 'class' => 'checkall state', 'data-clientid' => $client['Client']['id'],
						'checked' => ((@in_array(1, $states) || !isset($this->request->params['project_states']) ? 'checked' : '')))); ?>
				<?php foreach (Project::getStates() as $state): ?>
					<?php echo $this->Form->input($state, array('value' => $state, 'type' => 'checkbox', 'label' => $state, 'class' => 'state', 'data-clientid' => $client['Client']['id'],
							'checked' => ((@in_array($state, $states) || !isset($this->request->params['project_states'])) ? 'checked' : ''))); ?>
				<?php endforeach; ?>

				<?php echo $this->Form->input('client_id', array('type' => 'hidden', 'value' => $client['Client']['id'])); ?>
				<?php echo $this->Form->input('project_status', array('label'=>false,
						'value' => @$this->request->params['project_status'],
						'options'=> array('Current', 'Archived', 'All'))); ?>
				<span class="project-count"><?php echo (count($projects) == 1 ? '1 project' : count($projects) . ' projects'); ?></span>
			</div>
		</div>
	</div>
</header>

<div class="row">
	<ul class="project-list">
		<?php $count = 0; ?>
		<?php foreach($projects as $project): ?>
			<li class="small-6 large-3 column left column-<?php echo $count++%4+1; ?>">
				<div class="inner cell">
					<a href="/clients/<?php echo $client['Client']['id']; ?>/projects/view/<?php echo $project['Project']['id']; ?>">
						<h4><?php echo $project['Project']['name'];?></h4>
					</a>
				
					<?php if ($project['Project']['archived']) : ?>
						<span class="recent-file">Archived</span>
					<?php else : ?>
						<span class="recent-file">
							<?php echo ( count($project['File']) == 0 ? 'No Uploads' : 'Recent uploads'); ?>
						</span>
						<?php foreach($project['File'] as $file): ?>
							<div class="file-detail">
								<a href="/clients/<?php echo $client['Client']['id']; ?>/projects/view/<?php echo $project['Project']['id'].'/'.$file['file_type_id']; ?>">
									<i class="file-<?php echo strtolower($file['extension']); ?>"></i>
									<span class="file-name"><?php echo $file['name']; ?></span>
									<span class="file-date">
										<?php echo relativeTime(strtotime($file['created'])); ?>
									</span>
								</a>	
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				
			</li>
		<?php endforeach; ?>
		<?php if ($count == 0): ?>
			<li class="large-12 column">
				<?php if ($_USER['type'] == $USER_USER): ?>
					<p>No projects are available.</p>
				<?php elseif ($this->request->params['project_status'] === '1'): ?>
					<p>No projects have been archived.</p>
				<?php else: ?>
					<p>Click create to start a new project.</p>
				<?php endif; ?>
			</li>
		<?php endif; ?>
		<li class="large-12 column">
			<?php echo $this->element('cake_pagination', array('url' => array(@$client['Client']['id'], @$this->request->params['project_status'], @$this->request->params['project_states']))); ?>
		</li>
	</ul>
</div>
