<?php

	class pixelwars_core_Widget_Intro extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget_intro',
				esc_html__('(Pixelwars) Intro', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Intro widget.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['pixelwars_core_image_url'])) { $pixelwars_core_image_url = $instance['pixelwars_core_image_url']; } else { $pixelwars_core_image_url = ""; }
			if (isset($instance['pixelwars_core_bg_image_url'])) { $pixelwars_core_bg_image_url = $instance['pixelwars_core_bg_image_url']; } else { $pixelwars_core_bg_image_url = ""; }
			if (isset($instance['pixelwars_core_bg_video_embed'])) { $pixelwars_core_bg_video_embed = $instance['pixelwars_core_bg_video_embed']; } else { $pixelwars_core_bg_video_embed = ""; }
			if (isset($instance['pixelwars_core_bg_video_self_hosted'])) { $pixelwars_core_bg_video_self_hosted = $instance['pixelwars_core_bg_video_self_hosted']; } else { $pixelwars_core_bg_video_self_hosted = ""; }
			if (isset($instance['pixelwars_core_bg_video_parallax'])) { $pixelwars_core_bg_video_parallax = $instance['pixelwars_core_bg_video_parallax']; } else { $pixelwars_core_bg_video_parallax = ""; }
			if (isset($instance['pixelwars_core_description'])) { $pixelwars_core_description = $instance['pixelwars_core_description']; } else { $pixelwars_core_description = ""; }
			if (isset($instance['pixelwars_core_button_text'])) { $pixelwars_core_button_text = $instance['pixelwars_core_button_text']; } else { $pixelwars_core_button_text = ""; }
			if (isset($instance['pixelwars_core_button_url'])) { $pixelwars_core_button_url = $instance['pixelwars_core_button_url']; } else { $pixelwars_core_button_url = ""; }
			if (isset($instance['pixelwars_core_new_tab'])) { $pixelwars_core_new_tab = $instance['pixelwars_core_new_tab']; } else { $pixelwars_core_new_tab = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_image_url')); ?>"><?php esc_html_e('Image', 'pixelwars-core'); ?></label>
					<br>
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_image_url')); ?>" value="<?php echo esc_attr($pixelwars_core_image_url); ?>">
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$image_url = wp_get_attachment_image_url($pixelwars_core_image_url, 'pixelwars_core_image_size_2');
					?>
					<img class="efor-widget-preview-image" src="<?php echo esc_url($image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_image_url')); ?>"><?php esc_html_e('Background Image', 'pixelwars-core'); ?></label>
					<br>
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_bg_image_url')); ?>" value="<?php echo esc_attr($pixelwars_core_bg_image_url); ?>">
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$bg_image_url = wp_get_attachment_image_url($pixelwars_core_bg_image_url, 'pixelwars_core_image_size_2');
					?>
					<img class="efor-widget-preview-image" src="<?php echo esc_url($bg_image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_embed')); ?>"><?php esc_html_e('Background Embed Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_embed')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_bg_video_embed')); ?>" value="<?php echo esc_attr($pixelwars_core_bg_video_embed); ?>">
					<small><?php esc_html_e('YouTube, Vimeo embed code.', 'pixelwars-core'); ?></small>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_self_hosted')); ?>"><?php esc_html_e('Background Self-Hosted Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_self_hosted')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_bg_video_self_hosted')); ?>" value="<?php echo esc_url($pixelwars_core_bg_video_self_hosted); ?>">
					<input type="button" class="button button-browse-video" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<small><?php esc_html_e('MP4 video.', 'pixelwars-core'); ?></small>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_parallax')); ?>"><?php esc_html_e('Background Parallax Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_bg_video_parallax')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_bg_video_parallax')); ?>" value="<?php echo esc_url($pixelwars_core_bg_video_parallax); ?>">
					<small><?php esc_html_e('YouTube, Vimeo page url.', 'pixelwars-core'); ?></small>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					
					<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_description')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_description')); ?>"><?php echo esc_textarea($pixelwars_core_description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_button_text')); ?>"><?php echo esc_html__('Button Text', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('pixelwars_core_button_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pixelwars_core_button_text') ); ?>" value="<?php echo esc_attr( $pixelwars_core_button_text ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_button_url')); ?>"><?php echo esc_html__('Button URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('pixelwars_core_button_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pixelwars_core_button_url') ); ?>" value="<?php echo esc_attr( $pixelwars_core_button_url ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_new_tab')); ?>">
						<option <?php if ($pixelwars_core_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] 					   		     = strip_tags($new_instance['title']);
			$instance['pixelwars_core_image_url'] 	   		 = strip_tags($new_instance['pixelwars_core_image_url']);
			$instance['pixelwars_core_bg_image_url']   		 = strip_tags($new_instance['pixelwars_core_bg_image_url']);
			$instance['pixelwars_core_bg_video_embed'] 		 = strip_tags($new_instance['pixelwars_core_bg_video_embed'], '<iframe>');
			$instance['pixelwars_core_bg_video_self_hosted'] = strip_tags($new_instance['pixelwars_core_bg_video_self_hosted']);
			$instance['pixelwars_core_bg_video_parallax'] 	 = strip_tags($new_instance['pixelwars_core_bg_video_parallax']);
			$instance['pixelwars_core_description']    		 = strip_tags($new_instance['pixelwars_core_description']);
			$instance['pixelwars_core_button_text']    		 = strip_tags($new_instance['pixelwars_core_button_text']);
			$instance['pixelwars_core_button_url']     		 = strip_tags($new_instance['pixelwars_core_button_url']);
			$instance['pixelwars_core_new_tab'] 	   		 = strip_tags($new_instance['pixelwars_core_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                               = apply_filters('widget_title', $instance['title']);
			$pixelwars_core_image_url      		 = apply_filters('pixelwars_core_image_url', $instance['pixelwars_core_image_url']);
			$pixelwars_core_bg_image_url   		 = apply_filters('pixelwars_core_bg_image_url', $instance['pixelwars_core_bg_image_url']);
			$pixelwars_core_bg_video_embed 		 = apply_filters('pixelwars_core_bg_video_embed', $instance['pixelwars_core_bg_video_embed']);
			$pixelwars_core_bg_video_self_hosted = apply_filters('pixelwars_core_bg_video_self_hosted', $instance['pixelwars_core_bg_video_self_hosted']);
			$pixelwars_core_bg_video_parallax 	 = apply_filters('pixelwars_core_bg_video_parallax', $instance['pixelwars_core_bg_video_parallax']);
			$pixelwars_core_description    		 = apply_filters('pixelwars_core_description', $instance['pixelwars_core_description']);
			$pixelwars_core_button_text    		 = apply_filters('pixelwars_core_button_text', $instance['pixelwars_core_button_text']);
			$pixelwars_core_button_url     		 = apply_filters('pixelwars_core_button_url', $instance['pixelwars_core_button_url']);
			$pixelwars_core_new_tab        		 = apply_filters('pixelwars_core_new_tab', $instance['pixelwars_core_new_tab']);
			
			echo $before_widget;
			
				?>
					<?php
						$image_bg = wp_get_attachment_image_src($pixelwars_core_bg_image_url, 'pixelwars_core_image_size_7');
					?>
					<div class="intro" style="background-image: url(<?php echo esc_url($image_bg[0]); ?>);" data-parallax-video="<?php echo esc_url($pixelwars_core_bg_video_parallax); ?>">
						<?php
							if (! empty($pixelwars_core_bg_video_embed))
							{
								?>
									<div class="intro-vid">
										<?php
											echo $pixelwars_core_bg_video_embed; // An iframe.
										?>
									</div>
								<?php
							}
							elseif (! empty($pixelwars_core_bg_video_self_hosted))
							{
								?>
									<div class="intro-vid">
										<video autoplay loop>
											<source type="video/mp4" src="<?php echo esc_url($pixelwars_core_bg_video_self_hosted); ?>">
										</video>
									</div>
								<?php
							}
						?>
						<div class="intro-content">
							<?php
								$image = wp_get_attachment_image_src($pixelwars_core_image_url, 'pixelwars_core_image_size_3');
								
								if (! empty($image))
								{
									?>
										<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image[0]); ?>">
									<?php
								}
							?>
							<div class="intro-text">
								<h1>
									<?php
										echo esc_html($pixelwars_core_description);
									?>
								</h1>
								<?php
									if (! empty($pixelwars_core_button_text))
									{
										?>
											<a class="button" <?php if ($pixelwars_core_new_tab == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($pixelwars_core_button_url); ?>">
												<?php
													echo esc_html($pixelwars_core_button_text);
												?>
											</a>
										<?php
									}
								?>
							</div> <!-- .intro-text -->
						</div> <!-- .intro-content -->
					</div> <!-- .intro -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget_Intro'); });

?>