<?php

	class pixelwars_core_Widget__Button extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__button',
				esc_html__('(Pixelwars) Button', 'pixelwars-core'),
				array(
					'description' => esc_html__('Button module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = 'Button'; }
			if (isset($instance['url'])) { $url = $instance['url']; } else { $url = ""; }
			if (isset($instance['new_tab'])) { $new_tab = $instance['new_tab']; } else { $new_tab = false; }
			if (isset($instance['size'])) { $size = $instance['size']; } else { $size = 'medium'; }
			if (isset($instance['icon'])) { $icon = $instance['icon']; } else { $icon = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Text', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" value="<?php echo esc_url($url); ?>" placeholder="http://">
					
					
					<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
					
					<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_html_e('Open in new tab', 'pixelwars-core'); ?></label>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>">
						<option <?php if ($size == 'small') { echo 'selected="selected"'; } ?> value="small"><?php esc_html_e('Small', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'medium') { echo 'selected="selected"'; } ?> value="medium"><?php esc_html_e('Medium', 'pixelwars-core'); ?></option>
						<option <?php if ($size == 'huge') { echo 'selected="selected"'; } ?> value="huge"><?php esc_html_e('Big', 'pixelwars-core'); ?></option>
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
			$instance['title']   = strip_tags($new_instance['title']);
			$instance['url']     = strip_tags($new_instance['url']);
			$instance['new_tab'] = strip_tags($new_instance['new_tab']);
			$instance['size']    = strip_tags($new_instance['size']);
			$instance['icon']    = strip_tags($new_instance['icon']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title   = apply_filters('widget_title', $instance['title']);
			$url     = apply_filters('widget_url', $instance['url']);
			$new_tab = apply_filters('widget_new_tab', $instance['new_tab']);
			$size    = apply_filters('widget_size', $instance['size']);
			$icon    = apply_filters('widget_icon', $instance['icon']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					if ($new_tab)
					{
						$new_tab = 'target="_blank"';
					}
					else
					{
						$new_tab = "";
					}
					
					?>
						<a class="button <?php echo esc_attr($size); ?>" <?php echo $new_tab; ?> href="<?php echo esc_url($url); ?>">
							<?php
								if (! empty($icon))
								{
									?>
										<i class="<?php echo esc_attr($icon); ?>"></i>
									<?php
								}
							?>
							<?php
								echo esc_html($title);
							?>
						</a>
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Button'); });

?>