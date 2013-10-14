<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<?php echo $this->Html->charset(); ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo Company::NAME; ?></title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href='<?php echo Company::GOOGLE_FONT; ?>' rel='stylesheet' type='text/css'>

		<?php echo $this->Html->meta('favicon.ico', '/client_themes/'.Company::ASSETS.'/img/favicon.ico', array('type' => 'icon')); ?>
		<?php echo $this->Html->css('vendor/normalize/normalize-2.1.0'); ?>
		<?php echo $this->Html->css('vendor/foundation/foundation-4.1.2'); ?>
		<?php echo $this->Html->css('helpers'); ?>
		<?php echo $this->Html->css('layout'); ?>
		<?php echo $this->Html->css('forms'); ?>
		<?php echo $this->Html->css('modules'); ?>
		<?php echo $this->Html->css('/client_themes/'.Company::ASSETS.'/css/'.Company::ASSETS); ?>

		<?php echo $this->Html->script('vendor/modernizr/modernizr-2.6.2.min'); ?>
		<!--[if lt IE 9]>
			<?php echo $this->Html->script('vendor/respond/respond'); ?>
		<![endif]-->
	</head>

	<?php
		$userLogged = ($this->request->params['controller'] == 'users'
			&& $this->request->params['action'] == 'login');

		$userLoggedClass = $userLogged
			? 'user-login'
			: 'user-logged-in';
	?>

	<body class="<?php echo $userLoggedClass; ?>">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<?php if (!$userLogged): ?>

			<header role="banner" class="header">
				<div class="row">
					<div class="large-3 columns">
						<?php
							echo $this->Html->link(
								 $this->Html->image('/client_themes/'.Company::ASSETS.'/img/logo.png', array('class' => 'logo', 'alt' => Company::NAME.' Logo')),
								 '/clients',
								 array('escape' => false)
							);
						?>
					</div>
					<div class="large-9 columns">
						<div class="navigation-toggle"><a class="toggle" href="javascript:void(0);"><span>Menu</span></a></div>
						<nav role="navigation" class="navigation">
							<?php if (isset($_USER)): ?>
								<div class="menu-container">
									<ul class="inline-list">
										<?php if ($_USER['type'] == $USER_USER && count($_USER_CLIENTS) == 1) : ?>
											<?php // This is valid when User is only assigned to one client and global variable $_USER_CLIENTS is array ?>
											<li><a href="/clients/view/<?php echo $_USER_CLIENTS[0]; ?>">Home</a></li>
										<?php else: ?>
											<li><a href="/clients/">Home</a></li>
										<?php endif; ?>
										<li><a href="/users/edit">My account</a></li>
										<?php if ($_USER['type'] != $USER_USER) : ?>
											<li><a href="/users/people">People</a></li>
										<?php endif; ?>
										<li><a class="logout" href="/users/logout">Logout</a></li>
									</ul>
								</div>
							<?php endif; ?>
						</nav>
					</div>
				</div>
			</header>

		<?php endif; ?>


		<?php if (isset($_USER) && $this->request->here!='/'): ?>
			<div role="search" class="search">
				<div class="row">
					<div class="large-12 column">
						<div class="row">
							<div class="top-search clearfix">
								<div class="small-0 large-3 columns">&nbsp;</div>
								<div class="small-12 large-6 columns">
									<?php echo $this->element('search'); ?>
								</div>
								<div class="small-0 large-3 columns">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>


		<div role="main" class="main">
			<?php if (!($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'login')) : ?>
				<div class="row">
					<div class="large-12 columns">
						<?php echo $this->Session->flash(); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="inner">
				<?php echo $this->fetch('content'); ?>
			</div>

		</div>

		<?php echo $this->Html->script('vendor/jquery/jquery-1.9.1.min'); ?>
		<?php echo $this->Html->script('vendor/foundation/foundation-4.1.2.min'); ?>
		<?php echo $this->Html->script('vendor/momentjs/moment.min'); ?>
		<?php echo $this->Html->script('vendor/maxlength/maxlength'); ?>
		<?php echo $this->Html->script('main.js'); ?>
		<?php 
			if ($this->request['controller']=='files' && $this->request['action']=='add'): 
				echo $this->element('file_upload_scripts');
			endif;
		?>
		<?php echo $this->element('sql_dump'); ?>

	</body>
</html>

