<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER):
					$this->Html->addCrumb('Home', '/clients/');
				else:
					$this->Html->addCrumb($client['Client']['name'], '/clients/view/'.$_USER_CLIENTS[0]['id']);
				endif;
				$this->Html->addCrumb('Change password', '/users/change_password');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Change Password</h2>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-6 columns">

		<?php
			echo $this->Form->create('User', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('old_password', array('type' => 'password')),
				$this->Form->input('password'),
				$this->Form->input('password_confirm', array('type' => 'password')),
				$this->Form->end(array('class' => 'button button-success'));
		?>

	</div>

</div>

