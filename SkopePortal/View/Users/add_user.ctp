<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				$this->Html->addCrumb('Home', '/clients/');
				$this->Html->addCrumb('People', '/users/people');
				$this->Html->addCrumb('Add New Client User', '/users/add_user/');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Add New Client User</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-12 columns">

		<?php
			echo $this->Form->create('User'),
				$this->Form->input('firstname', array('data-maxlength' => '20', 'data-output' => 'firstname-status', 'size' => '20',
					'label' => 'First Name (<span>Max: 20, Current: <span id="firstname-status"></span><span>)')),

				$this->Form->input('lastname', array('data-maxlength' => '20', 'data-output' => 'lastname-status', 'size' => '20',
					'label' => 'Last Name (<span>Max: 20, Current: <span id="lastname-status"></span><span>)')),

				$this->Form->input('title', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'title-status', 'size' => '50',
					'label' => 'Title (<span>Max: 50, Current: <span id="title-status"></span><span>)')),

				$this->Form->input('email', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'email-status', 'size' => '50',
					'label' => 'Email (<span>Max: 50, Current: <span id="email-status"></span><span>)'));

			echo '<label for="" class="client-project-label">Clients / Projects</label>';
			echo '<div class="client-project-selction">';
			foreach ($clients as $client) :
				$projects = '';
				if (@in_array($client['Client']['id'], $this->request->data['Client'])) {
					if (!empty($client['Project'])):
						foreach ($client['Project'] as $p) :
							$projects.= $this->Form->input('project_'.$p['id'], array(
								'div' => array('class' => 'checkbox input project-ids'),
								'name' => 'data[Project][]',
								'type' => 'checkbox',
								'value' => $p['id'],
								'label' => $p['name'],
								'checked' => in_array($p['id'], $this->request->data['Project']),
							));
						endforeach;
					endif;
				}
						
				echo $this->Form->input('client_'.$client['Client']['id'], array(
					'div' => array('class' => 'checkbox input client-ids'),
					'name' => 'data[Client][]',
					'type' => 'checkbox',
					'value' => $client['Client']['id'],
					'checked' => @in_array($client['Client']['id'], $this->request->data['Client']),
					'client-id' => $client['Client']['id'],
					'label' => $client['Client']['name'],
					'after' => '<div class="projects-client-'.$client['Client']['id'].'">'
						. $projects . '</div>'
				));
			endforeach;
			echo '</div>';
			echo $this->Form->end(array('class' => 'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>
	</div>
</div>
