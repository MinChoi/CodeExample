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

	<div class="content clearfix">
		<div class="row">
			<?php if (is_home() || is_category() || is_archive() || (is_single() && $post->post_type=='post')): ?>
			
				<div role="main" class="main clearfix">
					<div class="small-12 large-9 columns blog-list">
					<?php while (have_posts()) : the_post(); ?>
						<?php if (is_single()) : ?>
							<?php get_template_part('content-single', get_post_format()); ?>
						<?php else : ?>
							<?php get_template_part('content-blog', get_post_format()); ?>
						<?php endif; ?>
					<?php endwhile; ?>
					</div>
					<aside role="complementary" class="blog-sidebar sidebar large-3 columns">
						<?php get_sidebar(); ?>
						<?php 
							$next = get_next_posts_link('Next','');
							$prev = get_previous_posts_link('Previous');

							if ($next.$prev != '')
								echo '<div class="image-nav">' . $next.$prev  . '</div>';
						?>						
					</aside>
				</div>
			
			<?php else: ?>

				<div role="main" class="main small-12 large-12 columns">
					<div class="inner">
						<?php if (have_posts()): ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php if ($post->post_type == 'our-work'): ?>
									<?php  get_template_part('content-our-work', get_post_format()); ?>
								<?php elseif (get_the_ID() == 8): // Contact form page ?>
									<?php  get_template_part('content-contact', get_post_format()); ?>
								<?php elseif (is_page()): ?>
									<?php get_template_part('content-page', get_post_format()); ?>
								<?php else: ?>
									<?php get_template_part('content', get_post_format()); ?>
								<?php endif; ?>
							<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part('content-empty'); ?>

						<?php endif; ?>

					</div>
				</div>
			
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>