<?php

	class pixelwars_core_Widget_Link_Box extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget_link_box',
				esc_html__('(Pixelwars) Link Box', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Link box widget.', 'pixelwars-core'),
					'customize_selective_refresh' => false
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if (isset($instance['pixelwars_core_widget_option_1'])) { $pixelwars_core_widget_option_1 = $instance[ 'pixelwars_core_widget_option_1' ]; } else { $pixelwars_core_widget_option_1 = ""; }
			if (isset($instance['pixelwars_core_widget_option_2'])) { $pixelwars_core_widget_option_2 = $instance[ 'pixelwars_core_widget_option_2' ]; } else { $pixelwars_core_widget_option_2 = 'no'; }
			if (isset($instance['pixelwars_core_widget_option_3'])) { $pixelwars_core_widget_option_3 = $instance[ 'pixelwars_core_widget_option_3' ]; } else { $pixelwars_core_widget_option_3 = ""; }
			if (isset($instance['pixelwars_core_widget_option_4'])) { $pixelwars_core_widget_option_4 = $instance[ 'pixelwars_core_widget_option_4' ]; } else { $pixelwars_core_widget_option_4 = ""; }
			if (isset($instance['pixelwars_core_widget_option_5'])) { $pixelwars_core_widget_option_5 = $instance[ 'pixelwars_core_widget_option_5' ]; } else { $pixelwars_core_widget_option_5 = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_1')); ?>"><?php echo esc_html__('Link URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_1')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_1')); ?>" value="<?php echo esc_attr($pixelwars_core_widget_option_1); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_2')); ?>"><?php echo esc_html__('Open link in new tab', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_2')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_2')); ?>">
						<option <?php if ($pixelwars_core_widget_option_2 == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_2 == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_3')); ?>"><?php esc_html_e('Image', 'pixelwars-core'); ?></label>
					<br>
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_3')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_3')); ?>" value="<?php echo esc_attr($pixelwars_core_widget_option_3); ?>">
					<input type="button" class="button button-browse" value="<?php esc_attr_e('Browse', 'pixelwars-core'); ?>">
					<?php
						$image_url = wp_get_attachment_image_url($pixelwars_core_widget_option_3, 'pixelwars_core_image_size_3');
					?>
					<img class="lahanna-widget-preview-image" src="<?php echo esc_url($image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_4')); ?>"><?php echo esc_html__('Width', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_4')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_4')); ?>">
						<option <?php if ($pixelwars_core_widget_option_4 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('25%', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_4 == 'w-33') { echo 'selected="selected"'; } ?> value="w-33"><?php esc_html_e('33%', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_4 == 'w-50') { echo 'selected="selected"'; } ?> value="w-50"><?php esc_html_e('50%', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_4 == 'w-100') { echo 'selected="selected"'; } ?> value="w-100"><?php esc_html_e('100%', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_5')); ?>"><?php echo esc_html__('Ratio', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_5')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_5')); ?>">
						<option <?php if ($pixelwars_core_widget_option_5 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Square', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_5 == 'ratio-2-1') { echo 'selected="selected"'; } ?> value="ratio-2-1"><?php esc_html_e('Tall', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_5 == 'ratio-16-9') { echo 'selected="selected"'; } ?> value="ratio-16-9"><?php esc_html_e('Wide', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_widget_option_5 == 'ratio-21-9') { echo 'selected="selected"'; } ?> value="ratio-21-9"><?php esc_html_e('Extra Wide', 'pixelwars-core'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                          = strip_tags($new_instance['title']);
			$instance['pixelwars_core_widget_option_1'] = strip_tags($new_instance['pixelwars_core_widget_option_1']);
			$instance['pixelwars_core_widget_option_2'] = strip_tags($new_instance['pixelwars_core_widget_option_2']);
			$instance['pixelwars_core_widget_option_3'] = strip_tags($new_instance['pixelwars_core_widget_option_3']);
			$instance['pixelwars_core_widget_option_4'] = strip_tags($new_instance['pixelwars_core_widget_option_4']);
			$instance['pixelwars_core_widget_option_5'] = strip_tags($new_instance['pixelwars_core_widget_option_5']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                          = apply_filters('widget_title', $instance['title']);
			$pixelwars_core_widget_option_1 = apply_filters('pixelwars_core_widget_option_1', $instance['pixelwars_core_widget_option_1']);
			$pixelwars_core_widget_option_2 = apply_filters('pixelwars_core_widget_option_2', $instance['pixelwars_core_widget_option_2']);
			$pixelwars_core_widget_option_3 = apply_filters('pixelwars_core_widget_option_3', $instance['pixelwars_core_widget_option_3']);
			$pixelwars_core_widget_option_4 = apply_filters('pixelwars_core_widget_option_4', $instance['pixelwars_core_widget_option_4']);
			$pixelwars_core_widget_option_5 = apply_filters('pixelwars_core_widget_option_5', $instance['pixelwars_core_widget_option_5']);
			
			echo $before_widget;
			
				$width = $pixelwars_core_widget_option_4;
				
				if (isset($_GET['link_box_width']))
				{
					$width = 'w-' . $_GET['link_box_width'];
				}
				
				$ratio = $pixelwars_core_widget_option_5;
				
				if (isset($_GET['link_box_ratio']))
				{
					$ratio = 'ratio-' . $_GET['link_box_ratio'];
				}
				
				?>
                    <div class="block link-box <?php echo esc_attr($width); ?> <?php echo esc_attr($ratio); ?>">
						<?php
							$image = wp_get_attachment_image_src($pixelwars_core_widget_option_3, 'pixelwars_core_image_size_3');
						?>
                        <div class="post-thumbnail" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
                            <div class="post-wrap">
                                <header class="entry-header">
                                    <h2 class="entry-title">
										<a <?php if ($pixelwars_core_widget_option_2 == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($pixelwars_core_widget_option_1); ?>">
											<?php
												echo esc_html($title);
											?>
										</a>
									</h2>
                                </header>
                                <a class="block-link" <?php if ($pixelwars_core_widget_option_2 == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($pixelwars_core_widget_option_1); ?>">
									<?php
										echo esc_html($title);
									?>
								</a>
                            </div>
                        </div>
                    </div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget_Link_Box'); });

?>