<?php

	class pixelwars_core_Widget__Map extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__map',
				esc_html__('(Pixelwars) Map', 'pixelwars-core'),
				array(
					'description' => esc_html__('Map module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['latitude'])) { $latitude = $instance['latitude']; } else { $latitude = '29.720157'; }
			if (isset($instance['longitude'])) { $longitude = $instance['longitude']; } else { $longitude = '-95.4013379'; }
			if (isset($instance['zoom'])) { $zoom = $instance['zoom']; } else { $zoom = '4'; }
			if (isset($instance['image'])) { $image = $instance['image']; } else { $image = ""; }
			
			?>
				<div class="pixelwars-widget media-widget-control">
					<p>
						<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude', 'pixelwars-core'); ?></label>
						
						<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" value="<?php echo esc_attr($latitude); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude', 'pixelwars-core'); ?></label>
						
						<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" value="<?php echo esc_attr($longitude); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr($this->get_field_id('zoom')); ?>"><?php esc_html_e('Zoom', 'pixelwars-core'); ?></label>
						
						<input type="number" min="0" max="50" step="1" class="widefat" id="<?php echo esc_attr($this->get_field_id('zoom')); ?>" name="<?php echo esc_attr($this->get_field_name('zoom')); ?>" value="<?php echo esc_attr($zoom); ?>">
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
						<small><?php esc_html_e('A marker image for your location.', 'pixelwars-core'); ?></small>
					</div>
					<p class="howto">
						<?php
							esc_html_e('Visit Google Maps online and find your location on the map then fill the inputs above.', 'pixelwars-core');
						?>
						<br>
						<br>
						<?php
							esc_html_e('Fill the field: Appearance > Customize > General > Google Map API Key.', 'pixelwars-core');
						?>
						<br>
						<br>
						<a target="_blank" href="//developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">
							<?php
								esc_html_e('How to Get Google Map Api Key?', 'pixelwars-core');
							?>
						</a>
					</p>
				</div>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['latitude']  = strip_tags($new_instance['latitude']);
			$instance['longitude'] = strip_tags($new_instance['longitude']);
			$instance['zoom']      = strip_tags($new_instance['zoom']);
			$instance['image']     = strip_tags($new_instance['image']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$latitude  = apply_filters('widget_latitude', $instance['latitude']);
			$longitude = apply_filters('widget_longitude', $instance['longitude']);
			$zoom      = apply_filters('widget_zoom', $instance['zoom']);
			$image     = apply_filters('widget_image', $instance['image']);
			
			echo $before_widget;
			
				$image_url = wp_get_attachment_image_url($image, 'thumbnail');
				
				?>
					<div class="map">
						<div id="map-canvas" class="map-canvas" data-latitude="<?php echo esc_attr($latitude); ?>" data-longitude="<?php echo esc_attr($longitude); ?>" data-zoom="<?php echo esc_attr($zoom); ?>" data-marker-image="<?php echo esc_url($image_url); ?>">
						</div> <!-- #map-canvas .map-canvas -->
					</div> <!-- .map -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Map'); });

?>