<div class="row">
	<div class="large-12 column">
		<div class="large-6 login">
			<div>
				<?php echo $this->Html->image('/client_themes/'.Company::ASSETS.'/img/logo.png', array('class' => 'logo', 'alt' => Company::NAME.' Logo')); ?>

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create(),
						$this->Form->input('email', array('label' => false, 'placeholder' => 'Email', 'value' => @$this->request->query['uname'])),
						$this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
				?>
				<a class="forgot-password" href="/users/forgot_password">Forgot password?</a>
				<?php echo $this->Form->end(array('class' => 'button button-alert', 'label' => 'Login')); ?>
			</div>
		</div>
	</div>
</div>
