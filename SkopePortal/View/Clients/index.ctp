<header>
	<div class="row">
		<div class="large-12 column">
			<?php
				$this->Html->addCrumb('Home', '/clients/');
				echo $this->Html->getCrumbList(array('class' => 'breadcrumbs'));
			?>
		</div>
		<div class="large-12 column">
			<h2 class="left">Home</h2>
			<?php if ($_USER['type'] != $USER_USER): ?>
				<a href="/clients/add" class="button button-success right">
					<i class="add"></i><span>Add new client</span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</header>
<div class="row">
	<div class="large-12 pagination-counter column">
		<?php echo $this->Paginator->counter(); ?>
	</div>
	<div class="large-12">
		<ul class="">
			<?php $count = 0; ?>
			<?php foreach($clients as $client): ?>
				<li class="small-6 large-3 column left client-grid column-<?php echo $count++%4+1; ?>" client-id="<?php echo $client['Client']['id'];?>">
					<div class="inner-client-grid" client-id="<?php echo $client['Client']['id'];?>">
						<div class="box">
							<div class="client-logo" style="
								background:url(<?php echo $client['Client']['logo_file']; ?>) no-repeat center center;
								background-size: 80% auto;
							">
							</div>
						</div>
						<div class="client-detail">
							<h4><?php echo $client['Client']['name']; ?></h4>
							<p><?php echo count($client['Project']); ?> projects</p>
							<p><?php echo count($client['User']); ?> collaborators</p>

						</div>
					</div>
				</li>
			<?php endforeach; ?>
			<?php if ($_USER['type'] != $USER_USER): ?>
				<li class="small-6 large-3 column client-grid left add-new column-<?php echo $count++%4+1; ?>">
					<a href='/clients/add'>
						<div class="inner-client-grid">
							<div class="box">
								<div class="client-logo add-new-grid"></div>
							</div>
						</div>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<?php echo $this->element('cake_pagination'); ?>
