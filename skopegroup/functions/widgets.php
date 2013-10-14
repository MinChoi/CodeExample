<?php

add_action( 'widgets_init', create_function( '', 'register_widget("Featured_Projects_Widget");'));

class Featured_Projects_Widget extends WP_Widget {
	
	static $items = array('first', 'second', 'third');
	
	public function __construct() {
		$widget_options = array(
			'classname' => 'featured_projects',
			'description' => 'A list of projects that you can select to be featured'
		);
		parent::__construct("featured_projects", "Featured Projects", $widget_options);
	}
	
	public function form($instance) {
		$instance = wp_parse_args( 
			(array)$instance,
			array(
				'title' => '',
				'first' => '',
				'second' => '',
				'third' => '', 
			) 
		);
		
		$form = sprintf(
			'<p>
				<label for="%s">Title</label>
				<input id="%s" name="%s" value="%s" class="widefat" type="text" />
			</p>',
			$this->get_field_id('title'),
			$this->get_field_id('title'),
			$this->get_field_name('title'),
			$instance['title']
		);
		
		$posts = get_posts(array('post_type' => 'our-work', 'posts_per_page' => -1));

		foreach (self::$items as $item) {
			$form .= sprintf(
				'<div><label for="%s">%s Featured Project</label><select id="%s" name="%s"><option value=""></option>',
				$this->get_field_id($item),
				ucfirst($item),
				$this->get_field_id($item),
				$this->get_field_name($item)
			);

			foreach($posts as $post) {

				$form .= sprintf(
					'<option value="%s" %s>%s</option>',
					$post->ID,
					($instance[$item] == $post->ID) ? 'selected' : '',
					$post->post_title
				);

			}

			$form .= sprintf('</select></div>');
		}
		
		echo $form;
		
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		foreach (self::$items as $item)
			$instance[$item] = $new_instance[$item];

		return $instance;
	}

	public function widget($args, $instance) {
		global $post;
		extract($args, EXTR_SKIP);
		
		//$title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;
		
		foreach (self::$items as $item) {
			$post = get_post($instance[$item]);
			//setup_postdata($post);
			//print_r($post);

			$img = types_render_field("tile-image", array());
			$img = explode('-~-~-', types_render_field("tile-image", array('raw'=> true, 'separator' => '-~-~-')));

			//the_permalink();
			//var_dump ($img);
			//get_project();

			?><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'skeleton' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<div class="small-4 large-12 column our-work-tile" contain-img="<?php echo $img[0];?>">
					<img src="<?php echo $img[0];?>" class="our-work-img">
					<div class="fill">
						<div class="tile fadeIn" contain-img="<?php echo $img[0];?>">
							<div class="tile-table">
								<div class="tile-row">
									<?php the_title(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a><?php
			
		}

		echo $after_widget;
	}
	
}

