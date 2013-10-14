<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				$this->Html->addCrumb('Home', '/clients/');
				$this->Html->addCrumb('People', '/users/people');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>People</h2>
		</div>
	</div>
</header>

<div class="row people-links">

	<div class="large-4 column">
		<div class="people-inner">
			<h4>Add <?php echo Company::SHORTNAME; ?> Moderator</h4>
			<p>Click below to add new <?php echo Company::SHORTNAME; ?> moderators to the Portal. <?php echo Company::SHORTNAME; ?> moderators have access to all clients and projects. This feature must be reserved for only <?php echo Company::SHORTNAME; ?> personnel.<span>Warning: Do not add client users here. </span></p>
			<a href="/users/add_moderator/" class="button button-success">Add <?php echo Company::SHORTNAME; ?> moderator</a>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="people-inner">
			<h4>Add New Client User</h4>
			<p>Click below to add new client users to the Portal. Client users have access to only specific clients and projects. A client user is attached to only one client but can be assigned to multiple projects.</p>
			<a href="/users/add_user/" class="button button-success">Add new client user</a>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="people-inner">
			<h4>Manage Client Users</h4>
			<p>Click below to manage existing client users in the Portal. You can add existing client users to new projects or remove them from current projects. Client users will be notified by email if their access to projects are altered.</p>
			<a href="/users/management/" class="button button-success">Manage client users</a>
		</div>
	</div>

</div>
