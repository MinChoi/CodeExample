<header>
	<div class="row">
		<div class="large-12 column">
			<h2>Reset Your Password</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('User', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('password', array('label' => 'New Password')),
				$this->Form->input('password_confirm', array('type' => 'password', 'label' => 'Confirm New Password')),
				$this->Form->end(array('class' => 'button button-success'));
		?>

		<a href="/">Go to login</a>

	</div>

</div>
