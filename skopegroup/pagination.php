<nav role="navigation" class="pagination">
	<?php echo paginate_links( array(
		'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'current' => get_query_var('paged') ? get_query_var('paged') : 1,
		'show_all' => True,
	)); ?>
</nav>
