<?php
/**
 * Template Name: Expertise
 *
 * @package minchoi
 * @subpackage Skeleton
 * @since February 18th 2013
 */
?>
<?php get_header(); ?>

	<div class="content clearfix">
		<div class="row">
			<div role="main" class="main small-12 large-12 columns">
				<div class="inner">
					<?php while (have_posts()) : the_post(); ?>
						<?php  get_template_part('content-expertise', get_post_format()); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>