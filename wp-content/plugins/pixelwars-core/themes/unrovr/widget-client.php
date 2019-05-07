<?php

	class pixelwars_core_Widget__Client extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__client',
				esc_html__('(Pixelwars) Client', 'pixelwars-core'),
				array(
					'description' => esc_html__('Client module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['image'])) { $image = $instance['image']; } else { $image = ""; }
			if (isset($instance['link'])) { $link = $instance['link']; } else { $link = ""; }
			if (isset($instance['new_tab'])) { $new_tab = $instance['new_tab']; } else { $new_tab = true; }
			
			?>
				<div class="pixelwars-widget media-widget-control">
					<div class="media-widget-preview media-widget-buttons">
						<br>
						<?php
							$widget_image_selected = "";
							
							if (! empty($image))
							{
								$widget_image_selected = 'widget-image-selected';
							}
						?>
						<div class="attachment-media-view <?php echo esc_attr($widget_image_selected); ?>">
							<div class="placeholder"><?php esc_html_e('No image selected', 'pixelwars-core'); ?></div>
						</div>
						
						<?php
							$image_url = wp_get_attachment_image_url($image, 'large');
						?>
						<img class="widget-image" alt="" src="<?php echo esc_url($image_url); ?>">
						
						<input type="button" class="button button-browse" value="<?php esc_attr_e('Select Image', 'pixelwars-core'); ?>">
						
						<input type="hidden" class="widget-image-id" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" value="<?php echo esc_attr($image); ?>">
						
						<?php
							$button_remove_display = "";
							
							if (! empty($image))
							{
								$button_remove_display = 'button-remove-display';
							}
						?>
						<input type="button" class="button button-remove <?php echo esc_attr($button_remove_display); ?>" value="<?php esc_attr_e('Remove Image', 'pixelwars-core'); ?>">
						<br>
					</div>
					<p>
						<label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Link URL', 'pixelwars-core'); ?></label>
						
						<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" value="<?php echo esc_url($link); ?>">
						
						
						<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
						
						<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
					</p>
				</div>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['image']   = strip_tags($new_instance['image']);
			$instance['link']    = strip_tags($new_instance['link']);
			$instance['new_tab'] = strip_tags($new_instance['new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$image   = apply_filters('widget_image', $instance['image']);
			$link    = apply_filters('widget_link', $instance['link']);
			$new_tab = apply_filters('widget_new_tab', $instance['new_tab']);
			
			echo $before_widget;
			
				if ($new_tab)
				{
					$new_tab = 'target="_blank"';
				}
				else
				{
					$new_tab = "";
				}
				
				if (! empty($image))
				{
					$image_url = wp_get_attachment_image_url($image, 'medium');
					$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
					
					if (! empty($link))
					{
						?>
							<div class="client">
								<a <?php echo $new_tab; ?> href="<?php echo esc_url($link); ?>">
									<img alt="<?php echo esc_attr($image_alt); ?>" src="<?php echo esc_url($image_url); ?>">
								</a>
							</div> <!-- .client -->
						<?php
					}
					else
					{
						?>
							<div class="client">
								<img alt="<?php echo esc_attr($image_alt); ?>" src="<?php echo esc_url($image_url); ?>">
							</div> <!-- .client -->
						<?php
					}
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Client'); });

?>