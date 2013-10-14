<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				$this->Html->addCrumb('Login', '/');
				$this->Html->addCrumb('Forgot password', '/users/forgot_password');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Reset Your Password</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create(),
				$this->Form->input('email'),
				$this->Form->end(array('class' => 'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

		<a href="/" class="back-link">Back to login</a>

	</div>

</div>
