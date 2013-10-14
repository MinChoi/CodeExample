<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER):
					$this->Html->addCrumb('Home', '/clients/');
				endif;
				$this->Html->addCrumb($project['Client']['name'], '/clients/view/'.$project['Client']['id']);
				$this->Html->addCrumb($project['Project']['name'], '/clients/'.$project['Client']['id'].'/projects/view/'.$project['Project']['id']);
				$this->Html->addCrumb('Add file', '/clients/'.$project['Client']['id'].'/projects/'.$project['Project']['id'].'/files/add');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Project: <?php echo $project['Project']['name']; ?></h2>
		</div>
	</div>
</header>

<div class="row">
	<div class="large-6 columns">
		<?php
			echo $this->Form->create('File', array('type' => 'file')),
				$this->Form->input('project_id', array('type' => 'hidden', 'value' => $project['Project']['id'])),
				$this->Form->input('name', array('label' => 'Title')),
				$this->Form->input('file_type_id', array('options' => $file_types, 'value' => @$this->request->params['file_type_id']));
		?>
			<div id="uploader">Your browser doesn't support upload.</div>
			<p>Click submit to upload file(s)</p>
		<?php 
			echo $this->Form->submit('submit', array('class' => 'button button-success', 'div' => false, 'after' => '<div class="loading-icon"></div>')),
				$this->Form->end();
		?>
	</div>
</div>
