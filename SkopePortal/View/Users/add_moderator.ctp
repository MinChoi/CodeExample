<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				$this->Html->addCrumb('Home', '/clients/');
				$this->Html->addCrumb('People', '/users/people');
				$this->Html->addCrumb('Add '.Company::SHORTNAME.' Moderator', '/users/add_moderator/');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Add <?php echo Company::SHORTNAME; ?> Moderator</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('User'),
				$this->Form->input('firstname', array('data-maxlength' => '20', 'data-output' => 'firstname-status', 'size' => '20',
					'label' => 'First Name (<span>Max: 20, Current: <span id="firstname-status"></span><span>)')),

				$this->Form->input('lastname', array('data-maxlength' => '20', 'data-output' => 'lastname-status', 'size' => '20',
					'label' => 'Last Name (<span>Max: 20, Current: <span id="lastname-status"></span><span>)')),

				$this->Form->input('title', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'title-status', 'size' => '50',
					'label' => 'Title (<span>Max: 50, Current: <span id="title-status"></span><span>)')),

				$this->Form->input('email', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'email-status', 'size' => '50',
					'label' => 'Email (<span>Max: 50, Current: <span id="email-status"></span><span>)')),
				$this->Form->end(array('class' => 'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

	</div>

</div>
