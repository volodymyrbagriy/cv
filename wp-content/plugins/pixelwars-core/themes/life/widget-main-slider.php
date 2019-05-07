<?php

	class life_Widget_Main_Slider extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('life_widget_main_slider',
								esc_html__('(Life) Main Slider', 'pixelwars-core'),
								array('description' => esc_html__("Display your site's posts.", 'pixelwars-core')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if (isset($instance['life_widget_option_1'])) { $life_widget_option_1 = $instance['life_widget_option_1']; } else { $life_widget_option_1 = 'sticky'; }
			if (isset($instance['life_widget_option_2'])) { $life_widget_option_2 = $instance['life_widget_option_2']; } else { $life_widget_option_2 = '5'; }
			if (isset($instance['life_widget_option_3'])) { $life_widget_option_3 = $instance['life_widget_option_3']; } else { $life_widget_option_3 = 'w-50'; }
			if (isset($instance['life_widget_option_4'])) { $life_widget_option_4 = $instance['life_widget_option_4']; } else { $life_widget_option_4 = ""; }
			if (isset($instance['life_widget_option_5'])) { $life_widget_option_5 = $instance['life_widget_option_5']; } else { $life_widget_option_5 = '1'; }
			if (isset($instance['life_widget_option_6'])) { $life_widget_option_6 = $instance['life_widget_option_6']; } else { $life_widget_option_6 = 'false'; }
			if (isset($instance['life_widget_option_7'])) { $life_widget_option_7 = $instance['life_widget_option_7']; } else { $life_widget_option_7 = 'true'; }
			if (isset($instance['life_widget_option_8'])) { $life_widget_option_8 = $instance['life_widget_option_8']; } else { $life_widget_option_8 = 'true'; }
			if (isset($instance['life_widget_option_9'])) { $life_widget_option_9 = $instance['life_widget_option_9']; } else { $life_widget_option_9 = 'false'; }
			if (isset($instance['life_widget_option_10'])) { $life_widget_option_10 = $instance['life_widget_option_10']; } else { $life_widget_option_10 = 'false'; }
			if (isset($instance['life_widget_option_11'])) { $life_widget_option_11 = $instance['life_widget_option_11']; } else { $life_widget_option_11 = '4000'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
					<span class="widget-option-info"><?php esc_html_e('Enter title.', 'pixelwars-core'); ?></span>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_1')); ?>"><?php esc_html_e('Slides', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_1')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_1')); ?>">
						<option <?php if ($life_widget_option_1 == 'sticky') { echo 'selected="selected"'; } ?> value="sticky"><?php esc_html_e('Sticky posts', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_1 == 'latest') { echo 'selected="selected"'; } ?> value="latest"><?php esc_html_e('Latest posts', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_2')); ?>"><?php esc_html_e('Slides Count', 'pixelwars-core'); ?></label>
					
					<input type="number" min="1" max="20" step="1" id="<?php echo esc_attr($this->get_field_id('life_widget_option_2')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_2')); ?>" value="<?php echo esc_attr($life_widget_option_2); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_5')); ?>"><?php esc_html_e('Show Items', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_5')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_5')); ?>">
						<option <?php if ($life_widget_option_5 == '1') { echo 'selected="selected"'; } ?> value="1"><?php esc_html_e('1', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_5 == '2') { echo 'selected="selected"'; } ?> value="2"><?php esc_html_e('2', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_5 == '3') { echo 'selected="selected"'; } ?> value="3"><?php esc_html_e('3', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_5 == '4') { echo 'selected="selected"'; } ?> value="4"><?php esc_html_e('4', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_5 == '5') { echo 'selected="selected"'; } ?> value="5"><?php esc_html_e('5', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_3')); ?>"><?php esc_html_e('Width', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_3')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_3')); ?>">
						<option <?php if ($life_widget_option_3 == 'w-50') { echo 'selected="selected"'; } ?> value="w-50"><?php esc_html_e('50%', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_3 == 'w-75') { echo 'selected="selected"'; } ?> value="w-75"><?php esc_html_e('75%', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_3 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('100%', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_4')); ?>"><?php esc_html_e('Ratio', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_4')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_4')); ?>">
						<option <?php if ($life_widget_option_4 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Square', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_4 == 'ratio-16-9') { echo 'selected="selected"'; } ?> value="ratio-16-9"><?php esc_html_e('Wide', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_4 == 'ratio-21-9') { echo 'selected="selected"'; } ?> value="ratio-21-9"><?php esc_html_e('Extra Wide', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_4 == 'ratio-ultra-wide') { echo 'selected="selected"'; } ?> value="ratio-ultra-wide"><?php esc_html_e('Ultra Wide', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_6')); ?>"><?php esc_html_e('Animation', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_6')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_6')); ?>">
						<option <?php if ($life_widget_option_6 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('Slide', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_6 == 'fade') { echo 'selected="selected"'; } ?> value="fade"><?php esc_html_e('Fade', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_6 == 'backSlide') { echo 'selected="selected"'; } ?> value="backSlide"><?php esc_html_e('Back Slide', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_6 == 'goDown') { echo 'selected="selected"'; } ?> value="goDown"><?php esc_html_e('Go Down', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_6 == 'fadeUp') { echo 'selected="selected"'; } ?> value="fadeUp"><?php esc_html_e('Fade Zoom', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_9')); ?>"><?php esc_html_e('Mouse Drag', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_9')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_9')); ?>">
						<option <?php if ($life_widget_option_9 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_9 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_7')); ?>"><?php esc_html_e('Nav Arrows', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_7')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_7')); ?>">
						<option <?php if ($life_widget_option_7 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_7 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_8')); ?>"><?php esc_html_e('Nav Dots', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_8')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_8')); ?>">
						<option <?php if ($life_widget_option_8 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_8 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_10')); ?>"><?php esc_html_e('Autoplay', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_widget_option_10')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_10')); ?>">
						<option <?php if ($life_widget_option_10 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
						<option <?php if ($life_widget_option_10 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_widget_option_11')); ?>"><?php esc_html_e('Autoplay Timeout', 'pixelwars-core'); ?></label>
					
					<input type="number" min="500" max="10000" step="250" id="<?php echo esc_attr($this->get_field_id('life_widget_option_11')); ?>" name="<?php echo esc_attr($this->get_field_name('life_widget_option_11')); ?>" value="<?php echo esc_attr($life_widget_option_11); ?>">
					<span style="font-size: 11px; color: #999999;"><?php esc_html_e('Default: 4000 ms', 'pixelwars-core'); ?></span>
				</p>
				
				<hr>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['life_widget_option_1'] = strip_tags($new_instance['life_widget_option_1']);
			$instance['life_widget_option_2'] = strip_tags($new_instance['life_widget_option_2']);
			$instance['life_widget_option_3'] = strip_tags($new_instance['life_widget_option_3']);
			$instance['life_widget_option_4'] = strip_tags($new_instance['life_widget_option_4']);
			$instance['life_widget_option_5'] = strip_tags($new_instance['life_widget_option_5']);
			$instance['life_widget_option_6'] = strip_tags($new_instance['life_widget_option_6']);
			$instance['life_widget_option_7'] = strip_tags($new_instance['life_widget_option_7']);
			$instance['life_widget_option_8'] = strip_tags($new_instance['life_widget_option_8']);
			$instance['life_widget_option_9'] = strip_tags($new_instance['life_widget_option_9']);
			$instance['life_widget_option_10'] = strip_tags($new_instance['life_widget_option_10']);
			$instance['life_widget_option_11'] = strip_tags($new_instance['life_widget_option_11']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$life_widget_option_1 = apply_filters('life_widget_option_1', $instance['life_widget_option_1']);
			$life_widget_option_2 = apply_filters('life_widget_option_2', $instance['life_widget_option_2']);
			$life_widget_option_3 = apply_filters('life_widget_option_3', $instance['life_widget_option_3']);
			$life_widget_option_4 = apply_filters('life_widget_option_4', $instance['life_widget_option_4']);
			$life_widget_option_5 = apply_filters('life_widget_option_5', $instance['life_widget_option_5']);
			$life_widget_option_6 = apply_filters('life_widget_option_6', $instance['life_widget_option_6']);
			$life_widget_option_7 = apply_filters('life_widget_option_7', $instance['life_widget_option_7']);
			$life_widget_option_8 = apply_filters('life_widget_option_8', $instance['life_widget_option_8']);
			$life_widget_option_9 = apply_filters('life_widget_option_9', $instance['life_widget_option_9']);
			$life_widget_option_10 = apply_filters('life_widget_option_10', $instance['life_widget_option_10']);
			$life_widget_option_11 = apply_filters('life_widget_option_11', $instance['life_widget_option_11']);
			
			echo $before_widget;
			
				// *** start Main Slider ***
				
					$slides 		= $life_widget_option_1;
					$slides_count   = $life_widget_option_2;
					$excluded_posts = "";
					
					if ($slides != 'latest')
					{
						$slides = get_option('sticky_posts');
					}
					else
					{
						$slides = "";
						$excluded_posts = get_option('sticky_posts');
					}
					
					$query = new WP_Query(array('post_type'      => 'post',
												'post__in'       => $slides,
												'post__not_in'   => $excluded_posts,
												'posts_per_page' => $slides_count));
					
					if ($query->have_posts()) :
					
						$width = $life_widget_option_3;
						
						if (isset($_GET['main_slider_width']))
						{
							$width = 'w-' . $_GET['main_slider_width'];
						}
						
						$ratio = $life_widget_option_4;
						
						if (isset($_GET['main_slider_ratio']))
						{
							$ratio = 'ratio-' . $_GET['main_slider_ratio'];
						}
						
						$items 			  = $life_widget_option_5;
						$animation 		  = $life_widget_option_6;
						$nav_arrows 	  = $life_widget_option_7;
						$nav_dots 		  = $life_widget_option_8;
						$mouse_drag 	  = $life_widget_option_9;
						$autoplay 		  = $life_widget_option_10;
						$autoplay_timeout = $life_widget_option_11;
						
						?>
							<div class="block slider-box <?php echo esc_attr($width); ?> <?php echo esc_attr($ratio); ?>">
								<div class="post-slider owl-carousel" data-items="<?php echo esc_attr($items); ?>" data-animation="<?php echo esc_attr($animation); ?>" data-nav="<?php echo esc_attr($nav_arrows); ?>" data-dots="<?php echo esc_attr($nav_dots); ?>" data-mouse-drag="<?php echo esc_attr($mouse_drag); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-timeout="<?php echo esc_attr($autoplay_timeout); ?>">
									<?php
										function life_main_slider__featured_media($width)
										{
											$browser_address_url = stripcslashes(get_option(get_the_ID() . 'life_featured_video_url', ""));
											$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
											
											if (! empty($browser_address_url))
											{
												echo 'data-parallax-video="' . esc_url($browser_address_url) . '"';
											}
											elseif (has_post_thumbnail())
											{
												$feat_img = "";
												$feat_area_width = get_theme_mod('life_setting_feat_area_width', 'is-featured-area-fixed');
												
												if ($feat_area_width == 'is-featured-area-fixed')
												{
													if (($width == 'w-50') || ($width == 'w-75'))
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'life_image_size_3');
													}
													else
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'life_image_size_1');
													}
												}
												else
												{
													if ($width == 'w-50')
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'life_image_size_1');
													}
													else
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'life_image_size_7');
													}
												}
												
												echo 'style="background-image: url(' . esc_url($feat_img[0]) . ');"';
											}
										}
									?>
									
									<?php
										while ($query->have_posts()) : $query->the_post();
										
											$main_slider_meta_style = get_theme_mod('life_setting_main_slider_meta_style', 'is-cat-link-borders');
											
											?>
												<div class="slider-post main-slider-post is-post-dark <?php echo esc_attr($main_slider_meta_style); ?>">
													<div class="post-thumbnail" <?php life_main_slider__featured_media($width); ?>>
														<div class="post-wrap">
															<header class="entry-header">
																<div class="entry-meta">
																	<span class="cat-links">
																		<?php
																			the_category(' ');
																		?>
																	</span>	
																</div> <!-- .entry-meta -->
																<h2 class="entry-title">
																	<a href="<?php the_permalink(); ?>">
																		<?php
																			the_title();
																		?>
																	</a>
																</h2>
																<a class="more-link" href="<?php the_permalink(); ?>">
																	<?php
																		esc_html_e('View Post', 'pixelwars-core');
																	?>
																</a>
															</header> <!-- .entry-header -->
														</div> <!-- .post-wrap -->
													</div> <!-- .post-thumbnail -->
												</div> <!-- .main-slider-post -->
											<?php
										endwhile;
									?>
								</div> <!-- .post-slider -->
							</div> <!-- .slider-box -->
						<?php
					endif;
					wp_reset_postdata();
				
				// *** end Main Slider ***
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget("life_widget_main_slider");'));

?>