<?php
	$img = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));
	$top_img = $img[0];

	// If none, show default
	if(empty($top_img))
		$top_img = get_template_directory_uri().'/images/pic-bobjane.jpg';
	
	$short_desc = types_render_field("short-desc", array());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="clearfix expertise-content">
		<div class="row">
			<div class="large-3 column page-title">
				<div class="title">
					<?php $img = explode('-~-~-', types_render_field("thumbnail", array('raw'=> true, 'separator' => '-~-~-')));?> 
					<div class="fill"></div>
					<div class="tile" style="
						 background: url(<?php echo $img[0]; ?>) no-repeat center center;
						 background-size: cover;
						 filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $img[0]; ?>', sizingMethod='scale');
						 -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $img[0]; ?>', sizingMethod='scale')";
						 ">
						<div class="tile-table">
							<div class="tile-row">
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
					</div>
				</div>
				
				<ul class="sub-nav">
					<?php
						$back = "<a class='back-parent' href='".get_page_link($post->post_parent)."'>Back to ".
								get_the_title($post->post_parent)
								."</a>";
						echo wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); 
					?>
				</ul>

			</div>
			<div class="large-6 column clearfix">
				<p class="short-desc"><?php echo $short_desc; ?></p>
				<?php the_content(); ?>
				<?php if (!empty($link)): ?>
					<a href="<?php echo $link; ?>" class="button">
						<?php echo types_render_field("link-text", array()); ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="large-3 column clearfix expertise-tiles">
				<?php
				$expertise_projects = types_render_field("expertise-sidebar-navigation", array('raw' => true));	
				dynamic_sidebar('expertise-' . $expertise_projects);
				?>
			</div>
		</div>
	</header>
	<footer></footer>
</article>
	