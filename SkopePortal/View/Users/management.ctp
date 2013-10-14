<header>
	<div class="row">
		<div class="large-12 column clearfix">
			<?php
				$this->Html->addCrumb('Home', '/clients/');
				$this->Html->addCrumb('People', '/users/people');
				$this->Html->addCrumb('Manage Client Users', '/users/management/');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 column">
			<h2>Manage Client Users</h2>
		</div>
	</div>
</header>

<div class="row manage-users">

	<div class="large-12 columns left">

		<table class="user-list" width="100%">
			<thead>
				<tr>
					<?php $order = @$this->request->query['orderby']; ?>
					<?php $desc = isset($this->request->query['desc']); ?>
					<th class="row1">
						<a href="javascript:void(0)" class="user-management-order <?php if ($order=='name') echo 'current'; ?>" order-by="<?php echo $order=='name'&&!$desc ?'name&desc' : 'name'; ?>">User name</a>
					</th>
					<th class="row2">
						<a href="javascript:void(0)" class="user-management-order <?php if ($order=='email') echo 'current'; ?>" order-by="<?php echo $order=='email'&&!$desc ?'email&desc' : 'email'; ?>">Email</a>
					</th>
					<th class="row3">
						<a href="javascript:void(0)" class="user-management-order <?php if ($order=='title') echo 'current'; ?>" order-by="<?php echo $order=='title'&&!$desc ?'title&desc' : 'title'; ?>">Title / Position</a>
					</th>
					<th class="row4">
					<?php /*
						<a href="javascript:void(0)" class="user-management-order <?php if ($order=='Client.name') echo 'current'; ?>" order-by="<?php echo $order=='Client.name'&&!$desc ?'Client.name&desc' : 'Client.name'; ?>">Client</a>*/?>
						Client
					</th>
					<th class="row5">
						<?php // delete user form 
							echo $this->Form->create(array('action' => 'delete')),
								$this->Form->input('User.id', array('type' => 'hidden')),
								$this->Form->end();
						?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user): ?>
					<?php //pr($user); ?>
					<tr class="user-details">
						<td><p><?php echo $user['User']['firstname'].' '.$user['User']['lastname']; ?></p></td>
						<td><p><?php echo $user['User']['email']; ?></p></td>
						<td><p><?php echo $user['User']['title']; ?></p></td>
						<td><p>
							<?php 
								echo $user['Client'][0]['name']; 
								echo (count($user['Client']) > 1 ? ' + '.(count($user['Client'])-1):'')
							?>
						</p></td>
						<td>
							<a href="javascript:void(0)" class="button button-secondary user-button" user-id="<?php echo $user['User']['id']; ?>">Edit projects</a>
							<a href="javascript:void(0)" class="button button-alert user-delete" user-id="<?php echo $user['User']['id']; ?>">Delete</a>
						</td>
					</tr>
					<tr class="user-projects user-row-<?php echo $user['User']['id']; ?>"></tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $this->element('cake_pagination', array()); ?>

	</div>

</div>