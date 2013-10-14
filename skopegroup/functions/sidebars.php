<?php
/*
add_filter('wp_list_categories', 'sidebar_count_span_inline');
function sidebar_count_span_inline($output) {
	$output = str_replace('</a> (',' <span>(',$output);
	$output = str_replace(')',')</span></a> ',$output);
	return $output;
}

add_filter('get_archives_link', 'archive_count_inline');
function archive_count_inline($output) {
	$output = str_replace('</a>&nbsp;(', ' (', $output);
	$output = str_replace(')', ')</a>', $output);
	return $output;
}
*/
if (function_exists('register_sidebar')) {
	
	$defaults = array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);	
	
	//register_sidebar($defaults);

	register_sidebar(array_merge(array(
		'name' => 'Expertise 1',
		'id' => 'expertise-sidebar-1',
	), $defaults));

	register_sidebar(array_merge(array(
		'name' => 'Expertise 2',
		'id' => 'expertise-sidebar-2',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 3',
		'id' => 'expertise-sidebar-3',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 4',
		'id' => 'expertise-sidebar-4',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 5',
		'id' => 'expertise-sidebar-5',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 6',
		'id' => 'expertise-sidebar-6',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 7',
		'id' => 'expertise-sidebar-7',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 8',
		'id' => 'expertise-sidebar-8',
	), $defaults));

	/*
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 9',
		'id' => 'expertise-sidebar-9',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Expertise 10',
		'id' => 'expertise-sidebar-10',
	), $defaults));

	register_sidebar(array_merge(array(
		'name' => 'Sidebar 2',
		'id' => 'sidebar-two',
	), $defaults));
	
	register_sidebar(array_merge(array(
		'name' => 'Topbar 1',
		'id' => 'topbar-one',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Topbar 2',
		'id' => 'topbar-two',
	), $defaults));
		
	register_sidebar(array_merge(array(
		'name' => 'Topbar 3',
		'id' => 'topbar-three',
	), $defaults));
					
	register_sidebar(array_merge(array(
		'name' => 'Footer Column One',
		'id' => 'footer-column-one',
	), $defaults));
        
	register_sidebar(array_merge(array(
		'name' => 'Footer Column Two',
		'id' => 'footer-column-two',
	), $defaults));
        
	register_sidebar(array_merge(array(
		'name' => 'Footer Column Three',
		'id' => 'footer-column-three',
	), $defaults));
	*/
}