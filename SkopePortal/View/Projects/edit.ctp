<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER):
					$this->Html->addCrumb('Home', '/clients/');
				endif;
				$this->Html->addCrumb($client['Client']['name'], '/clients/view/'.$client['Client']['id']);

				$txt = 'Add Project';
				if (isset($this->request->data['Project']['id'])) {
					$this->Html->addCrumb($this->request->data['Project']['name'], '/clients/'.$client['Client']['id'].'/projects/view/'.$this->request->data['Project']['id']);
					$txt = 'Edit Project';
					$this->Html->addCrumb($txt, '/clients/'.$client['Client']['id'].'/projects/edit/'.$this->request->data['Project']['id']);
				}
				else
					$this->Html->addCrumb($txt, '/clients/'.$client['Client']['id'].'/projects/add');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2><?php echo $txt; ?></h2>
		</div>
	</div>
</header>
<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('Project', array('type' => 'post', 'enctype' => 'multipart/form-data')),
				$this->Form->input('id', array('type' => 'hidden')),
				$this->Form->input('archived', array('type' => 'hidden')),
				$this->Form->input('is_archived', array('type' => 'hidden', 'value' => '0')),
				$this->Form->input('name', array('data-maxlength' => '15', 'data-output' => 'name-status', 'size' => '20',
					'label' => 'Name (<span>Max: 28, Current: <span id="name-status"></span><span>)')),
				$this->Form->input('state', array('options' => Project::getStates())),
				$this->Form->submit('submit', array('class' => 'button button-success left', 'after' => '<div class="loading-icon"></div>'));

				if (isset($this->request->data['Project']['id'])) {
					echo $this->Form->submit(($this->data['Project']['archived'] ? 'Unarchive':'Archive'), array(
						'class' => 'button button-secondary right submit-archive'
					));
				}

				echo $this->Form->end();
		?>

	</div>

</div>
