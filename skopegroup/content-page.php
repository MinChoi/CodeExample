<?php //
	$title = types_render_field("title", array());	
	$p_id = 0;
	
	// Confirm logic 
	$img = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));
	$top_img = $img[0];

	// If none, show default
	if(empty($top_img))
		$top_img = get_template_directory_uri().'/images/pic-bobjane.jpg';

	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="clearfix">
		<div class="row">
			<div class="large-3 column page-title">
				<div class="fill"></div>
				<div class="tile">
					<div class="tile-table">
						<div class="tile-row">
							<h2><?php the_title(); ?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="large-9 column page-image clearfix">
				<!-- Testing -->
				<!--<img src="../wp-content/themes/skopegroup/images/pic-bobjane.jpg">-->
				<img src="<?php echo $top_img; ?>">
			</div>
		</div>
	</header>
	
	<section>
		<div class="row clearfix">
			<div class="large-3 column">

				<?php // Example from branson
				/*if (is_active_sidebar('about-sidebar') && ($post->ID == 20 || $post->post_parent == 20)): ?>
					<nav role="navigation" class="navigation-inline navigation-categories">
						<?php dynamic_sidebar('about-sidebar'); ?>
					</nav>
				<?php endif; */?>
				<ul class="sub-nav">
					<?php
					
					if($post->post_parent) {
						$tmp_post_id = $post->post_parent;
					} else {
						$tmp_post_id = $post->ID;
						$tmp_class = 'current_page_item';
					}
					
					echo '<li class="page_item parent_page '.@$tmp_class.'">'."<a class='back-parent' href='".get_page_link($tmp_post_id)."'>".
							get_the_title($tmp_post_id)
							."</a></li>";
					echo wp_list_pages("title_li=&child_of=".$tmp_post_id."&echo=0");; 
					?>
				</ul>
			</div>
			<div class="large-6 column left page-detail">
				<?php if($title) echo '<h3>'.$title.'</h3>'; ?>
				<?php the_content(); ?>
				<?php $link = types_render_field("hyperlink", array('raw' => true)); ?>
				<?php if (!empty($link)): ?>
				<a href="<?php echo $link; ?>" class="button">
						<?php echo types_render_field("link-text", array()); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<footer></footer>


</article>