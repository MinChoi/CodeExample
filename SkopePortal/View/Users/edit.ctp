<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				if ($_USER['type'] != $USER_USER || count($_USER_CLIENTS) > 1):
					$this->Html->addCrumb('Home', '/clients/');
				else:
					$this->Html->addCrumb($client['Client']['name'], '/clients/view/'.$_USER_CLIENTS[0]['id']);
				endif;
				$this->Html->addCrumb('Edit My Details', '/users/edit');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
</header>

<div class="row">

	<div class="large-5 columns">

		<h2>Edit My Details</h2>
		<?php
			echo $this->Form->create('User', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('id', array('type' => 'hidden')),

				$this->Form->input('firstname', array('data-maxlength' => '20', 'data-output' => 'firstname-status', 'size' => '20',
					'label' => 'First Name (<span>Max: 20, Current: <span id="firstname-status"></span><span>)')),

				$this->Form->input('lastname', array('data-maxlength' => '20', 'data-output' => 'lastname-status', 'size' => '20',
					'label' => 'Last Name (<span>Max: 20, Current: <span id="lastname-status"></span><span>)')),

				$this->Form->input('title', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'title-status', 'size' => '50',
					'label' => 'Title (<span>Max: 50, Current: <span id="title-status"></span><span>)')),

				$this->Form->input('email', array('data-maxlength' => '50', 'data-maxsize' => '50', 'data-output' => 'email-status', 'size' => '50',
					'label' => 'Email (<span>Max: 50, Current: <span id="email-status"></span><span>)')),

				$this->Form->input('UserDetail.id', array('type' => 'hidden')),

				// In DB, UserDetail fields are no_project_notify and no_file_notify (negative). For better user understanding, display opposite.
				$this->Form->input('UserDetail.project_notify', array('type' => 'checkbox', 'label' => 'Notify me when I have been added to / or removed from projects', 'checked' => !$this->request->data['UserDetail']['no_project_notify'],
					'value' => !$this->request->data['UserDetail']['no_project_notify'])),
				$this->Form->input('UserDetail.file_notify', array('type' => 'checkbox', 'label' => 'Notify me when new files are added to my projects', 'checked' => !$this->request->data['UserDetail']['no_file_notify'],
					'value' => !$this->request->data['UserDetail']['no_file_notify'])),

				$this->Form->end(array('class'=>'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

	</div>

	<div class="large-5 columns">

		<h2>Change My Password</h2>
		<?php
			echo $this->Form->create('User', array('type' => 'post', 'enctype' => "multipart/form-data")),
				$this->Form->input('id', array('type' => 'hidden')),
				$this->Form->input('change_pwd', array('type' => 'hidden')),
				$this->Form->input('old_password', array('type' => 'password')),
				$this->Form->input('password', array('label' => 'New Password')),
				$this->Form->input('password_confirm', array('type' => 'password', 'label' => 'Confirm New Password')),
				$this->Form->end(array('class' => 'button button-success', 'after' => '<div class="loading-icon"></div>'));
		?>

	</div>

</div>

