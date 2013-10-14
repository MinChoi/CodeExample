<?php
	$title = preg_replace('/('.implode('|', explode(" ", $s)) .')/iu', '<strong class="search-excerpt">\0</strong>', get_the_title());
	$excerpt = preg_replace('/('.implode('|', explode(" ", $s)) .')/iu', '<strong class="search-excerpt">\0</strong>', get_the_excerpt());
?>
<article id="post-<?php the_ID(); ?>">

	<header>

		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'skeleton' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php echo $title; ?>
			</a>
		</h2>

	</header>

	<section><p><?php echo $excerpt; ?></p></section>

</article>
