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
									<h2>Oops, there is no page here</h2>
								</div>
							</div>
						</div>
					</div>
				</header>
				<section>
					<div class="large-9 columns left">
						<header>
							<h2><?php _e('Sorry, there are no pages.'); ?></h2>
						</header>

						<section>
							<p><?php _e( 'Perhaps you have clicked on an old link or typed in the wrong address? Please return to our homepage to get back on track or use the search tool provided. Thank you for your patience.', 'twentytwelve' ); ?></p>
							<?php get_search_form(); ?>
						</section>

						<footer></footer>
					</div>
				</section>
			</article>
		</div>
	</div>
<?php get_footer(); ?>
