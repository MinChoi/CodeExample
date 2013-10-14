<?php

add_action('wp_enqueue_scripts', 'skeleton_scripts');
function skeleton_scripts() {
	wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr/modernizr-2.6.2.min.js', false, '2.6.2');
	wp_enqueue_script('modernizr');

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery/jquery-1.9.1.min.js', false, '1.9.1', true);
	wp_enqueue_script('jquery');

	wp_register_script('foundation', get_template_directory_uri() . '/js/vendor/foundation/foundation-4.1.2.min.js', array('jquery'), '4.0.9', true);
	wp_enqueue_script('foundation');

	wp_register_script('cycle2', get_template_directory_uri() . '/js/cycle2/jquery.cycle2.js', array('jquery'), '4.0.9', true);
	wp_enqueue_script('cycle2');

	wp_register_script('cycle2carousel', get_template_directory_uri() . '/js/cycle2/jquery.cycle2.carousel.js', array('jquery'), '4.0.9', true);
	wp_enqueue_script('cycle2carousel');

	wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
	wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'skeleton_styles');
function skeleton_styles() {
	wp_register_style('normalize', get_template_directory_uri() . '/css/vendor/normalize/normalize-2.1.0.css');
	wp_enqueue_style('normalize');

	wp_register_style('foundation', get_template_directory_uri() . '/css/vendor/foundation/foundation-4.1.2.css');
	wp_enqueue_style('foundation');
	
	wp_register_style('helpers', get_template_directory_uri() . '/css/helpers.css');
	wp_enqueue_style('helpers');

	wp_register_style('layout', get_template_directory_uri() . '/css/layout.css');
	wp_enqueue_style('layout');
	
	wp_register_style('forms', get_template_directory_uri() . '/css/forms.css');
	wp_enqueue_style('forms');
	
	wp_register_style('modules', get_template_directory_uri() . '/css/modules.css');
	wp_enqueue_style('modules');
	
	wp_register_style('custom', get_template_directory_uri() . '/css/custom.css');
	wp_enqueue_style('custom');
}

if (function_exists('register_sidebar'))
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

include('functions/functions.php');
include('functions/widgets.php');
include('functions/sidebars.php');
?>
