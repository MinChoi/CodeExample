<?php
/**
 * Template Name: Contact page
 *
 * @package joshbenham
 * @subpackage Skeleton
 * @since February 18th 2013
 */
?>

<?php get_header(); ?>

	<div class="content clearfix">
		<div class="row">
			<!--
			<div class="spacer large-1 columns">
				<div class="inner"></div>
			</div>
			-->
			
			<div role="main" class="main small-12 large-12 columns">
				<div class="inner">
					<?php if (have_posts()): ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php  get_template_part('content-contact', get_post_format()); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
<?php get_footer(); ?>