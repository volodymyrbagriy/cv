<?php

	class life_Widget_Intro extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('life_widget_intro',
								esc_html__('(Life) Intro', 'pixelwars-core'),
								array('description' => esc_html__('Intro widget.', 'pixelwars-core')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['life_image_url'])) { $life_image_url = $instance['life_image_url']; } else { $life_image_url = ""; }
			if (isset($instance['life_bg_image_url'])) { $life_bg_image_url = $instance['life_bg_image_url']; } else { $life_bg_image_url = ""; }
			if (isset($instance['life_bg_video_embed'])) { $life_bg_video_embed = $instance['life_bg_video_embed']; } else { $life_bg_video_embed = ""; }
			if (isset($instance['life_bg_video_self_hosted'])) { $life_bg_video_self_hosted = $instance['life_bg_video_self_hosted']; } else { $life_bg_video_self_hosted = ""; }
			if (isset($instance['life_bg_video_parallax'])) { $life_bg_video_parallax = $instance['life_bg_video_parallax']; } else { $life_bg_video_parallax = ""; }
			if (isset($instance['life_description'])) { $life_description = $instance['life_description']; } else { $life_description = ""; }
			if (isset($instance['life_button_text'])) { $life_button_text = $instance['life_button_text']; } else { $life_button_text = ""; }
			if (isset($instance['life_button_url'])) { $life_button_url = $instance['life_button_url']; } else { $life_button_url = ""; }
			if (isset($instance['life_new_tab'])) { $life_new_tab = $instance['life_new_tab']; } else { $life_new_tab = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
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
					<label for="<?php echo esc_attr($this->get_field_id('life_bg_image_url')); ?>"><?php esc_html_e('Background Image', 'pixelwars-core'); ?></label>
					
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('life_bg_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('life_bg_image_url')); ?>" value="<?php echo esc_attr($life_bg_image_url); ?>">
					<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$image = wp_get_attachment_image_src($life_bg_image_url, 'life_image_size_2');
					?>
					<img class="widget-image" alt="" src="<?php echo esc_url($image[0]); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_bg_video_embed')); ?>"><?php esc_html_e('Background Embed Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_bg_video_embed')); ?>" name="<?php echo esc_attr($this->get_field_name('life_bg_video_embed')); ?>" value="<?php echo esc_attr($life_bg_video_embed); ?>">
					<span class="widget-option-info"><?php esc_html_e('YouTube, Vimeo embed code.', 'pixelwars-core'); ?></span>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_bg_video_self_hosted')); ?>"><?php esc_html_e('Background Self-Hosted Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_bg_video_self_hosted')); ?>" name="<?php echo esc_attr($this->get_field_name('life_bg_video_self_hosted')); ?>" value="<?php echo esc_url($life_bg_video_self_hosted); ?>">
					<input type="button" class="button button-browse-video" value="<?php esc_html_e('Browse', 'pixelwars-core'); ?>">
					<span class="widget-option-info"><?php esc_html_e('MP4 video.', 'pixelwars-core'); ?></span>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_bg_video_parallax')); ?>"><?php esc_html_e('Background Parallax Video', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_bg_video_parallax')); ?>" name="<?php echo esc_attr($this->get_field_name('life_bg_video_parallax')); ?>" value="<?php echo esc_url($life_bg_video_parallax); ?>">
					<span class="widget-option-info"><?php esc_html_e('YouTube, Vimeo page url.', 'pixelwars-core'); ?></span>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					
					<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('life_description')); ?>" name="<?php echo esc_attr($this->get_field_name('life_description')); ?>"><?php echo esc_textarea($life_description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_button_text')); ?>"><?php esc_html_e('Button Text', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('life_button_text')); ?>" value="<?php echo esc_attr($life_button_text); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_button_url')); ?>"><?php esc_html_e('Button URL', 'pixelwars-core'); ?></label>
					
					<input type="text" id="<?php echo esc_attr($this->get_field_id('life_button_url')); ?>" name="<?php echo esc_attr($this->get_field_name('life_button_url')); ?>" value="<?php echo esc_attr($life_button_url); ?>">
					
					<label for="<?php echo esc_attr($this->get_field_id('life_new_tab')); ?>"><?php esc_html_e('New Tab', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('life_new_tab')); ?>">
						<option <?php if ($life_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
						<option <?php if ($life_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
					</select>
				</p>
				
				<hr>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] 					   	 = strip_tags($new_instance['title']);
			$instance['life_image_url'] 	   		 = strip_tags($new_instance['life_image_url']);
			$instance['life_bg_image_url']   		 = strip_tags($new_instance['life_bg_image_url']);
			$instance['life_bg_video_embed'] 		 = strip_tags($new_instance['life_bg_video_embed'], '<iframe>');
			$instance['life_bg_video_self_hosted'] = strip_tags($new_instance['life_bg_video_self_hosted']);
			$instance['life_bg_video_parallax'] 	 = strip_tags($new_instance['life_bg_video_parallax']);
			$instance['life_description']    		 = strip_tags($new_instance['life_description']);
			$instance['life_button_text']    		 = strip_tags($new_instance['life_button_text']);
			$instance['life_button_url']     		 = strip_tags($new_instance['life_button_url']);
			$instance['life_new_tab'] 	   		 = strip_tags($new_instance['life_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                     	 = apply_filters('widget_title', $instance['title']);
			$life_image_url      		 = apply_filters('life_image_url', $instance['life_image_url']);
			$life_bg_image_url   		 = apply_filters('life_bg_image_url', $instance['life_bg_image_url']);
			$life_bg_video_embed 		 = apply_filters('life_bg_video_embed', $instance['life_bg_video_embed']);
			$life_bg_video_self_hosted = apply_filters('life_bg_video_self_hosted', $instance['life_bg_video_self_hosted']);
			$life_bg_video_parallax 	 = apply_filters('life_bg_video_parallax', $instance['life_bg_video_parallax']);
			$life_description    		 = apply_filters('life_description', $instance['life_description']);
			$life_button_text    		 = apply_filters('life_button_text', $instance['life_button_text']);
			$life_button_url     		 = apply_filters('life_button_url', $instance['life_button_url']);
			$life_new_tab        		 = apply_filters('life_new_tab', $instance['life_new_tab']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<?php
						$image_bg = wp_get_attachment_image_src($life_bg_image_url, 'life_image_size_7');
					?>
					<div class="intro" style="background-image: url(<?php echo esc_url($image_bg[0]); ?>);" data-parallax-video="<?php echo esc_url($life_bg_video_parallax); ?>">
						<?php
							if (! empty($life_bg_video_embed))
							{
								?>
									<div class="intro-vid">
										<?php
											echo $life_bg_video_embed; // An iframe.
										?>
									</div>
								<?php
							}
							elseif (! empty($life_bg_video_self_hosted))
							{
								?>
									<div class="intro-vid">
										<video autoplay loop>
											<source type="video/mp4" src="<?php echo esc_url($life_bg_video_self_hosted); ?>">
										</video>
									</div>
								<?php
							}
						?>
						<div class="intro-content">
							<?php
								$image = wp_get_attachment_image_src($life_image_url, 'life_image_size_3');
								
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
										echo esc_html($life_description);
									?>
								</h1>
								<?php
									if (! empty($life_button_text))
									{
										?>
											<a class="button" <?php if ($life_new_tab == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($life_button_url); ?>">
												<?php
													echo esc_html($life_button_text);
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
	
	add_action('widgets_init', create_function('', 'register_widget( "life_widget_intro" );'));

?>