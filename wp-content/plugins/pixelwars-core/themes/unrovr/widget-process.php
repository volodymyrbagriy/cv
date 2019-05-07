<?php

	class pixelwars_core_Widget__Process extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__process',
				esc_html__('(Pixelwars) Process', 'pixelwars-core'),
				array(
					'description' => esc_html__('Process module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['image'])) { $image = $instance['image']; } else { $image = ""; }
			
			?>
				<div class="pixelwars-widget media-widget-control">
					<p>
						<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
						
						<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
					</p>
					<div class="media-widget-preview media-widget-buttons">
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
						<br>
					</div>
				</div>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['image'] = strip_tags($new_instance['image']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$image = apply_filters('widget_image', $instance['image']);
			
			echo $before_widget;
			
				if ((! empty($image)) || (! empty($title)))
				{
					?>
						<div class="process">
							<?php
								if (! empty($image))
								{
									$image_url = wp_get_attachment_image_url($image, 'thumbnail');
									
									?>
										<img alt="<?php echo esc_attr($title); ?>" src="<?php echo esc_url($image_url); ?>">
									<?php
								}
							?>
							<?php
								if (! empty($title))
								{
									?>
										<h4><?php echo $title; ?></h4>
									<?php
								}
							?>
						</div> <!-- .process -->
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Process'); });

?>