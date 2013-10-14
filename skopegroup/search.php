<?php
/**
 * Template Name: Search
 *
 * @package joshbenham
 * @subpackage Skeleton
 * @since February 18th 2013
 */
?>

<?php get_header(); ?>
	<div class="row">
		<div role="main" class="main page"><?php // add 'page' class to apply page css ?>
			<article>
				<header>
					<div class="large-3 column page-title">
						<div class="fill"></div>
						<div class="tile">
							<div class="tile-table">
								<div class="tile-row">
									<h2>Search</h2>
								</div>
							</div>
						</div>
					</div>
				</header>
				<section>
					<div class="large-9 columns left">
						<?php if ( have_posts() ) : ?>

								<h3>Search Results for "<em><?php the_search_query() ?></em>"</h3>

								<?php get_search_form(); ?>

								<?php while( have_posts() ): the_post(); ?>
									<?php get_template_part('content-search', get_post_format()); ?>
								<?php endwhile; ?>

						<?php else: ?>

							<?php get_template_part('content-empty'); ?>

						<?php endif; ?>

						<?php if ( $wp_query->max_num_pages > 1 ) : ?>

							<?php get_template_part('pagination'); ?>

						<?php endif; ?>
					</div>
				</section>
			</article>
		</div>
	</div>
<?php get_footer(); ?>