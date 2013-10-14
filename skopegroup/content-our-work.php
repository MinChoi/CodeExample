<?php
	$title = types_render_field("title", array());
	$year = types_render_field("year", array());
	$short_desc = types_render_field("short-desc", array());
	//var_dump($short_desc);
	
	//$images = types_render_field("work-images", array());
	$images = explode('-~-~-', types_render_field("work-images", array('raw'=> true, 'separator' => '-~-~-')));
	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header>
			<div class="row">
				<div class="large-3 column work-title">
					<div class="fill"></div>
					<div class="tile">
						<div class="tile-table">
							<div class="tile-row">
								<h2><?php the_title(); ?></h2>
								<h5><?php echo $year; ?></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="large-9 column work-images">
					<div class="slideshow" 
						data-cycle-fx=carousel
						data-cycle-timeout=50000
						data-cycle-carousel-visible=2
						data-cycle-carousel-fluid=true
						data-cycle-next="#prop-pic-next"
						data-cycle-prev="#prop-pic-prev"
						>
						<img src="<?php echo $images[0]; ?>">
						<img src="<?php echo $images[1]; ?>">
						<img src="<?php echo $images[0]; ?>">
					</div>
					<div class="slide-navigation">
						<div class="slide-main-pic">
							<a href="#" class="prop-pic-prev" id="prop-pic-prev">&nbsp;</a>
						</div>
						<a href="#" class="prop-pic-next" id="prop-pic-next">
							<?php // this image is for ie8 and earlier ?>
							<img src="http://223.27.22.48/~skgroup/wp-content/themes/skopegroup/images/img-prop-next.png">
						</a>
					</div>

				</div>
			</div>
		</header>

		<section>

			<div class="row">
				<div class="large-3 column project-scope">
					<?php
						$categories = wp_get_object_terms(get_the_ID(), 'our-work-categories');
						
						if (count($categories) > 0) {
							echo '<h4>Project scope</h4>';
							echo '<ul>';
							foreach($categories as $category){
								//var_dump($category);
								echo '<li>'.$category->name.'</li>';
							}
							echo '</ul>';
						}
					?>
				</div>
				<div class="large-6 column">
					<h3><?php echo $title; ?></h3>
					<p class="short-desc"><?php echo $short_desc; ?></p>
					<?php the_content(); ?>
				</div>
				<div class="large-3 column">
					<div class="image-nav">
						<?php next_post_link(__('%link'), '<h4 class="next">Next</h4>'); ?>
						<?php previous_post_link(__('%link'), '<h4 class="next">Prev</h4>'); ?>
						<a href="/our-work/"><h4 class="ack">Back</h4></a>
					</div>
				</div>
			</div>
		</section>

		<footer></footer>

</article>
