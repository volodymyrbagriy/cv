<?php

	class pixelwars_core_Widget__Homepage_Menu_Item extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__homepage_menu_item',
				esc_html__('(Pixelwars) Homepage Menu Item', 'pixelwars-core'),
				array(
					'description' => esc_html__('Navigation menu for Homepage template.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['custom_page_slug'])) { $custom_page_slug = $instance['custom_page_slug']; } else { $custom_page_slug = ""; }
			if (isset($instance['icon'])) { $icon = $instance['icon']; } else { $icon = 'pw-icon-vcard'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('custom_page_slug')); ?>"><?php esc_html_e('Select Page', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('custom_page_slug')); ?>" name="<?php echo esc_attr($this->get_field_name('custom_page_slug')); ?>">
						<option></option>
						<?php
							$pages = get_pages();
							
							foreach ($pages as $page)
							{
								if ($custom_page_slug == $page->post_name)
								{
									$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . esc_html($page->post_title) . '</option>';
									echo $option;
								}
								else
								{
									$option = '<option value="' . esc_attr($page->post_name) . '">' . esc_html($page->post_title) . '</option>';
									echo $option;
								}
							}
						?>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" value="<?php echo esc_attr($icon); ?>">
					
					<?php
						$available_icons = get_template_directory_uri() . '/css/fonts/fontello/demo.html';
					?>
					<small>
						<a target="_blank" href="<?php echo esc_url($available_icons); ?>"><?php esc_html_e('View available icons', 'pixelwars-core'); ?></a>
					</small>
				</p>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title']            = strip_tags($new_instance['title']);
			$instance['custom_page_slug'] = strip_tags($new_instance['custom_page_slug']);
			$instance['icon']             = strip_tags($new_instance['icon']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title            = apply_filters('widget_title', $instance['title']);
			$custom_page_slug = apply_filters('widget_custom_page_slug', $instance['custom_page_slug']);
			$icon             = apply_filters('widget_icon', $instance['icon']);
			
			echo $before_widget;
			
				$args_custom_page = 'pagename=' . $custom_page_slug;
				$loop_custom_page = new WP_Query($args_custom_page);
				
				if ($loop_custom_page->have_posts()) :
					while ($loop_custom_page->have_posts()) : $loop_custom_page->the_post();
						?>
							<li>
								<?php
									$page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
								?>
								<a <?php if ($page_template == 'page_template-portfolio.php') { echo 'id="portfolio-link"'; } ?> data-slug="<?php echo esc_attr($custom_page_slug); ?>" href="<?php the_permalink(); ?>">
									<?php
										if (! empty($icon))
										{
											?>
												<i class="<?php echo esc_attr($icon); ?>"></i>
											<?php
										}
									?>
									<?php
										if (! empty($title))
										{
											echo $title;
										}
										else
										{
											the_title();
										}
									?>
								</a>
							</li>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Homepage_Menu_Item'); });

?>