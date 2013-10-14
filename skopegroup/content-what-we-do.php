<?php
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
	<div class="row main-tiles columns tiles what-we-do">
	    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
			<div class="small-6 large-3 columns scope-img">
				<div class="fill">
					<?php $img = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));?> 
					<img src="<?php echo $img[0]; ?>">
				</div>
				<div class="tile">
					<a class="tile-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="tile-table">
							<div class="tile-row tile-title"><?php the_title(); ?></div>
						</div>
					</a>
				</div>
			</div>
			<div class="small-6 large-3 columns scope-desc">
				<div class="fill"></div>
				<div class="tile">
					<div class="tile-table">
						<div class="tile-row">
							<p>
								<?php echo types_render_field("short-desc", array()); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more »</a>
							</p>
						</div>
					</div>
				</div>
			</div>		
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_query(); ?>
