<header class="clearfix blog-">
	<div class="small-4 large-4 column page-image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php echo get_project_image(); ?>
		</a>
	</div>
	<div class="small-8 large-8 column page-detail">
		<?php if ($date = get_the_date('d')): ?>
			<?php $month = get_the_date('M'); ?>
			<div class="blog-date">
				<span class="month"><?php echo $month; ?></span>
				<span class="date"><?php echo $date; ?></span>
			</div>
		<?php endif; ?>
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php foreach (get_the_category() as $category):?>
			<a class="blog-cat clearfix" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a>
		<?php endforeach; ?>
		<section>
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'skeleton' ) ); ?>
		</section>
		<a class="link-continue" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			Continue reading »
		</a>
	</div>
</header>
