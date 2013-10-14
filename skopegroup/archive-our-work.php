<?php
/**
 * Template Name: Archive our works
 *
 * @package joshbenham
 * @subpackage Skeleton
 * @since February 18th 2013
 */
?>

<?php get_header(); ?>
	
	<div role="main" class="row main large-12 columns top">
		<h1>Skope Group prides itself on offering superior customer service.</h1>
		<h1>Our clients range from small private companies to large corporates.</h1>
		<a href="/contact/" class="">Contact us</a>
	</div>

	<div class="row main-tiles our-work-archive columns">
		<div class="our-work-archive-inner">
			<?php if (have_posts()): ?>

				<?php while (have_posts()): ?>
					<?php the_post(); ?>
					<?php
						$img = types_render_field("tile-image", array());
						$img = explode('-~-~-', types_render_field("tile-image", array('raw'=> true, 'separator' => '-~-~-')));
					?>
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'skeleton' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
						<div class="small-6 large-3 columns left our-work-tile" contain-img="<?php echo $img[0];?>">
							<img src="<?php echo $img[0];?>" class="our-work-img">
							<div class="fill">
								<div class="tile" contain-img="<?php echo $img[0];?>">
									<div class="tile-table">
										<div class="tile-row">
											<?php the_title(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
			
				<?php endwhile; ?>

			<?php else: ?>

				<?php get_template_part('empty'); ?>

			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
