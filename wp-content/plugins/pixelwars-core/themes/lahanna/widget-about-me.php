<?php

	class pixelwars_core_Widget_About_Me extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget_about_me',
				esc_html__('(Pixelwars) About Me', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('About me widget.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if ( isset( $instance[ 'pixelwars_core_image_url' ] ) ) { $pixelwars_core_image_url = $instance[ 'pixelwars_core_image_url' ]; } else { $pixelwars_core_image_url = ""; }
			if ( isset( $instance[ 'pixelwars_core_description' ] ) ) { $pixelwars_core_description = $instance[ 'pixelwars_core_description' ]; } else { $pixelwars_core_description = ""; }
			if ( isset( $instance[ 'pixelwars_core_more_link_url' ] ) ) { $pixelwars_core_more_link_url = $instance[ 'pixelwars_core_more_link_url' ]; } else { $pixelwars_core_more_link_url = ""; }
			if ( isset( $instance[ 'pixelwars_core_style' ] ) ) { $pixelwars_core_style = $instance[ 'pixelwars_core_style' ]; } else { $pixelwars_core_style = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id('pixelwars_core_image_url') ); ?>"><?php esc_html_e('Image', 'pixelwars-core'); ?></label>
					<br>
					<input type="hidden" id="<?php echo esc_attr( $this->get_field_id('pixelwars_core_image_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pixelwars_core_image_url') ); ?>" value="<?php echo esc_attr( $pixelwars_core_image_url ); ?>">
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$image_url = wp_get_attachment_image_url($pixelwars_core_image_url, 'pixelwars_core_image_size_2');
					?>
					<img class="lahanna-widget-preview-image" src="<?php echo esc_url($image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					
					<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_description')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_description')); ?>"><?php echo esc_textarea($pixelwars_core_description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id('pixelwars_core_more_link_url') ); ?>"><?php esc_html_e('More Link URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('pixelwars_core_more_link_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pixelwars_core_more_link_url') ); ?>" value="<?php echo esc_attr( $pixelwars_core_more_link_url ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_style')); ?>"><?php esc_html_e('Style', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_style')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_style')); ?>">
						<option <?php if ($pixelwars_core_style == 'is-about-me-widget-default') { echo 'selected="selected"'; } ?> value="is-about-me-widget-default"><?php esc_html_e('Default', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_style == 'is-about-me-widget-round') { echo 'selected="selected"'; } ?> value="is-about-me-widget-round"><?php esc_html_e('Rounded Image', 'pixelwars-core'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title']                        = strip_tags( $new_instance['title'] );
			$instance['pixelwars_core_image_url']     = strip_tags( $new_instance['pixelwars_core_image_url'] );
			$instance['pixelwars_core_description']   = strip_tags( $new_instance['pixelwars_core_description'] );
			$instance['pixelwars_core_more_link_url'] = strip_tags( $new_instance['pixelwars_core_more_link_url'] );
			$instance['pixelwars_core_style']         = strip_tags( $new_instance['pixelwars_core_style'] );
			return $instance;
		}
		
		public function widget( $args, $instance )
		{
			extract( $args );
			$title                        = apply_filters( 'widget_title', $instance['title'] );
			$pixelwars_core_image_url     = apply_filters( 'pixelwars_core_image_url', $instance['pixelwars_core_image_url'] );
			$pixelwars_core_description   = apply_filters( 'pixelwars_core_description', $instance['pixelwars_core_description'] );
			$pixelwars_core_more_link_url = apply_filters( 'pixelwars_core_more_link_url', $instance['pixelwars_core_more_link_url'] );
			$pixelwars_core_style         = apply_filters( 'pixelwars_core_style', $instance['pixelwars_core_style'] );
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<div class="about-me-wrap <?php echo esc_attr($pixelwars_core_style); ?>">
						<?php
							$image = wp_get_attachment_image_src($pixelwars_core_image_url, 'pixelwars_core_image_size_2');
						?>
						<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image[0]); ?>">
						
						<?php
							echo esc_html($pixelwars_core_description);
						?>
						
						<?php
							if (! empty($pixelwars_core_more_link_url))
							{
								?>
									<a href="<?php echo esc_url($pixelwars_core_more_link_url); ?>"><?php esc_html_e('more', 'pixelwars-core'); ?></a>
								<?php
							}
						?>
					</div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget_About_Me'); });

?>