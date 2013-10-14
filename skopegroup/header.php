<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<?php echo home_url() ?>/favicon.ico">
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<link href='http://fonts.googleapis.com/css?family=Oswald:700,400,300' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">

		<?php wp_head(); ?>
		
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri() . '/js/vendor/respond/respond.js';?>"></script>
		<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->


			<header role="banner" class="header large-12 columns">
				<div class="background-left"></div>
				<div class="background-right"></div>				
				<div class="inner clearfix">
					<div class="row">
						<div class="navigation-toggle"><a class="toggle" href="javascript:void(0);"><span>Menu</span></a></div>

						<div class="small-12 large-3 column">
							<a href="<?php echo home_url(); ?>" class="logo">
								<h1><span><?php bloginfo('name'); ?></span></h1>
							</a>
						</div>
						<div class="small-12 large-9 column right header-right">
							<a class="right login" href="/portal/index.php">Login</a>
							<nav role="navigation" class="navigation ">
								<?php wp_nav_menu( array( 'menu' => 'primary-nav', 'container_class' => 'menu-container' ) ); ?>
							</nav>
						</div>
					</div>
				</div>
			</header>
