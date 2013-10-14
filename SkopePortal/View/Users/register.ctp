<header>
	<div class="row">
		<div class="large-12 column">
			<h2>Register</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('User', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('User.Client.0.id', array('type'=>'hidden')),
				$this->Form->input('id', array('type' => 'hidden')),
				$this->Form->input('firstname', array('data-maxlength' => '20', 'data-output' => 'firstname-status', 'size' => '20',
					'label' => 'First Name (<span>Max: 20, Current: <span id="firstname-status"></span><span>)')),

				$this->Form->input('lastname', array('data-maxlength' => '20', 'data-output' => 'lastname-status', 'size' => '20',
					'label' => 'Last Name (<span>Max: 20, Current: <span id="lastname-status"></span><span>)')),

				$this->Form->input('title', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'title-status', 'size' => '50',
					'label' => 'Title (<span>Max: 50, Current: <span id="title-status"></span><span>)')),

				$this->Form->input('email', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'email-status', 'size' => '50',
					'label' => 'Email (<span>Max: 50, Current: <span id="email-status"></span><span>)')),
				$this->Form->input('password', array('value' => '', 'label' => 'New Password')),
				$this->Form->input('password_confirm', array('type' => 'password', 'label' => 'Confirm New Password')),
				$this->Form->end(array('class'=>'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

	</div>

</div>
