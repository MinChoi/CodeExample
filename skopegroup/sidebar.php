<ul>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<li>
		<?php get_search_form(); ?>
	</li>
</ul>
<ul role="navigation">
	<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>' ); ?>

	<li>
		<h2><?php _e('Archives'); ?></h2>
		<ul>
		<?php wp_get_archives(array('type' => 'monthly')); ?>
		</ul>
	</li>

	<li>
		<h2><?php _e('Archives'); ?></h2>
		<ul>
			<?php $archives = get_archives(array('order' => 'ASC')); ?>
			<?php foreach ((array)$archives as $archive): ?>
					<li><a href="<?php echo get_archive_link($archive->term_id); ?>" rel="archive"><?php echo $archive->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>

	<li>
		<h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php $categories = get_categories(array('order' => 'ASC')); ?>
			<?php foreach ((array)$categories as $category): ?>
					<li><a href="<?php echo get_category_link($category->term_id); ?>" rel="category"><?php echo $category->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>

	<li>
		<h2><?php _e('Tags'); ?></h2>
		<ul>
			<?php $tags = get_tags(array('orderby' => 'count', 'order' => 'ASC')); ?>
			<?php foreach ((array)$tags as $tag): ?>
					<li><a href="<?php echo get_tag_link($tag->term_id); ?>" rel="tag"><?php echo $tag->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>

	<?php endif; ?>
</ul>
