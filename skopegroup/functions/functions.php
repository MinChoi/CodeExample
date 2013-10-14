<?php

function get_project_image() {
	$images = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));
	return sprintf('<img src="%s" alt="%s">', $images[0], get_the_title());
}

add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {
	
	global $wp_the_query;

	if (!is_admin()) {
		if ($query->is_posts_page || is_category()) {
			$query->set( 'posts_per_page', 5 );		
		} 
		elseif (is_search()) {
			$query->set( 'posts_per_page', 10 );		
		}
	}
	
	return $query;
}

add_filter('wp_list_categories', 'sidebar_count_span_inline');
add_filter('get_archives_link', 'sidebar_count_span_inline');
function sidebar_count_span_inline($output) {
	$output = str_replace('</a> (',' <span>(',$output);
	$output = str_replace('</a>&nbsp;(',' <span>(',$output);
	$output = str_replace(')',')</span></a> ',$output);
	return $output;
}

//add_shortcode('a', 'b');
?>
