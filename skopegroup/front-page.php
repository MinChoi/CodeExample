<?php
/**
 * Template Name: Main
 *
 * @package joshbenham
 * @subpackage Skeleton
 * @since February 18th 2013
 */
?>

<?php get_header(); ?>

	<div role="main" class="row main large-12 columns top">
		<h1>Skope Group is a full service sign company.</h1>
		<h1>We design, manufacture and install signage for clients all over Australia.</h1>
		<a href="<?php echo $_SERVER['REQUEST_URI'].'our-work'?>/" class="">View our work</a>
	</div>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => 12, // page id 12 is 
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
<?php /*
	 * // NEW ONEs
	<div class="row columns">
	<ul class="small-block-grid-2 large-block-grid-4 home-tiles">
	    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
			<li class="">
				<?php $img = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));?> 
				<img src="<?php echo $img[0]; ?>">
				<a class="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
<!--				<div class="tile">
					<a class="tile-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="tile-table">
							<div class="tile-row tile-title"><?php the_title(); ?></div>
						</div>
					</a>-->
			
			</li>
		<?php endwhile; ?>
	</ul>
	</div>*/?>
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
				<div class="tile-hover">
					<p><?php echo types_render_field("short-desc", array()); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
			
	
<?php endif; ?>
	<div class="row row-main-widget-tiles">
		<div class="main-widget-tiles clearfix">
			<div class="small-6 large-3 columns">
				<h4><a href="'.site_url().'/blog/">Blog</a></h4>					
				<?php // Testing
				$args = array( 'numberposts' => 1 );
				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); ?>
					<h3><a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
						</a></h3>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Read article »</a>
				<?php endforeach; ?>
			</div>
			<div class="small-6 large-3 columns">
				<?php // Testing
					$args=array(
						'orderby' => 'date',
						'order' => 'DESC',
						'post_type' => 'our-work',
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'caller_get_posts'=> 1
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						echo '<h4><a href="'.site_url().'/our-work/">Work</a></h4>';
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<h3><a href="<?php the_permalink() ?>">
								<?php the_title(); ?>
								</a></h3>
							<p><?php echo types_render_field("short-desc", array()); ?></p>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View project »</a>
						<?php endwhile;
					} 
					wp_reset_query();  // Restore global post data stomped by the_post().
				?>
			</div>
			<div class="small-12 large-6 columns home-clients">
				<!-- Testing -->
				<h4>Our clients</h4>
				<ul class="small-block-grid-3 large-block-grid-4">
					<li><a><img src="wp-content/themes/skopegroup/images/icon-coles.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-woolworths.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-amp.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-meriton.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-bws.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-bobjane.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-vintagecellars.png"></a></li>
					<li><a><img src="wp-content/themes/skopegroup/images/icon-choice.png"></a></li>
				</ul>
			</div>
		</div>
	</div>
<?php get_footer(); ?>