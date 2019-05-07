<?php

	class pixelwars_core_Widget__Timeline_Title extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__timeline_title',
				esc_html__('(Pixelwars) Timeline Title', 'pixelwars-core'),
				array(
					'description' => esc_html__('Timeline title with icon.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['icon'])) { $icon = $instance['icon']; } else { $icon = 'pw-icon-briefcase'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
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
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['icon']  = strip_tags($new_instance['icon']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$icon  = apply_filters('widget_icon', $instance['icon']);
			
			echo $before_widget;
			
				if ((! empty($title)) || (! empty($icon)))
				{
					?>
						<div class="event">
							<h2><?php echo $title; ?></h2>
							<?php
								if (! empty($icon))
								{
									?>
										<p>
											<i class="<?php echo esc_attr($icon); ?>"></i>
										</p>
									<?php
								}
							?>
						</div> <!-- .event -->
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Timeline_Title'); });

?>