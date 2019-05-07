<?php

	class life_Widget_About_Me extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('life_widget_about_me',
								esc_html__( '(Life) About Me', 'pixelwars-core' ),
								array( 'description' => esc_html__( 'About me widget.', 'pixelwars-core' ) ) );
		}
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if ( isset( $instance[ 'life_image_url' ] ) ) { $life_image_url = $instance[ 'life_image_url' ]; } else { $life_image_url = ""; }
			if ( isset( $instance[ 'life_description' ] ) ) { $life_description = $instance[ 'life_description' ]; } else { $life_description = ""; }
			if ( isset( $instance[ 'life_more_link_url' ] ) ) { $life_more_link_url = $instance[ 'life_more_link_url' ]; } else { $life_more_link_url = ""; }
			if ( isset( $instance[ 'life_style' ] ) ) { $life_style = $instance[ 'life_style' ]; } else { $life_style = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_image_url')); ?>"><?php esc_html_e('Image', 'pixelwars-core'); ?></label>
					
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('life_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('life_image_url')); ?>" value="<?php echo esc_attr($life_image_url); ?>">
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$image = wp_get_attachment_image_src($life_image_url, 'life_image_size_2');
					?>
					<img class="widget-image" alt="" src="<?php echo esc_url($image[0]); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					
					<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('life_description')); ?>" name="<?php echo esc_attr($this->get_field_name('life_description')); ?>"><?php echo esc_textarea($life_description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_more_link_url')); ?>"><?php esc_html_e('More Link URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_more_link_url')); ?>" name="<?php echo esc_attr($this->get_field_name('life_more_link_url')); ?>" value="<?php echo esc_attr($life_more_link_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_style')); ?>"><?php esc_html_e('Style', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_style')); ?>" name="<?php echo esc_attr($this->get_field_name('life_style')); ?>">
						<option <?php if ($life_style == 'is-about-me-widget-default') { echo 'selected="selected"'; } ?> value="is-about-me-widget-default"><?php esc_html_e('Default', 'pixelwars-core'); ?></option>
						<option <?php if ($life_style == 'is-about-me-widget-round') { echo 'selected="selected"'; } ?> value="is-about-me-widget-round"><?php esc_html_e('Rounded Image', 'pixelwars-core'); ?></option>
					</select>
				</p>
				
				<hr>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['life_image_url'] = strip_tags( $new_instance['life_image_url'] );
			$instance['life_description'] = strip_tags( $new_instance['life_description'] );
			$instance['life_more_link_url'] = strip_tags( $new_instance['life_more_link_url'] );
			$instance['life_style'] = strip_tags( $new_instance['life_style'] );
			return $instance;
		}
		
		public function widget( $args, $instance )
		{
			extract( $args );
			$title                    = apply_filters( 'widget_title', $instance['title'] );
			$life_image_url     = apply_filters( 'life_image_url', $instance['life_image_url'] );
			$life_description   = apply_filters( 'life_description', $instance['life_description'] );
			$life_more_link_url = apply_filters( 'life_more_link_url', $instance['life_more_link_url'] );
			$life_style         = apply_filters( 'life_style', $instance['life_style'] );
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<div class="about-me-wrap <?php echo esc_attr($life_style); ?>">
						<?php
							$image = wp_get_attachment_image_src($life_image_url, 'life_image_size_2');
						?>
						<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image[0]); ?>">
						
						<?php
							echo esc_html($life_description);
						?>
						
						<?php
							if (! empty($life_more_link_url))
							{
								?>
									<a href="<?php echo esc_url($life_more_link_url); ?>"><?php esc_html_e('more', 'pixelwars-core'); ?></a>
								<?php
							}
						?>
					</div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget( "life_widget_about_me" );'));

?>