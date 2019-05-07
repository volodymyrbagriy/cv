<?php

	class pixelwars_core_Widget_Main_Slider extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget_main_slider',
				esc_html__('(Pixelwars) Main Slider', 'pixelwars-core'),
				array(
					'description'                 => esc_html__("Display your site's posts.", 'pixelwars-core'),
					'customize_selective_refresh' => false
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if (isset($instance['pixelwars_core_widget_option_1'])) { $pixelwars_core_widget_option_1 = $instance['pixelwars_core_widget_option_1']; } else { $pixelwars_core_widget_option_1 = 'sticky'; }
			if (isset($instance['pixelwars_core_widget_option_2'])) { $pixelwars_core_widget_option_2 = $instance['pixelwars_core_widget_option_2']; } else { $pixelwars_core_widget_option_2 = '5'; }
			if (isset($instance['pixelwars_core_widget_option_3'])) { $pixelwars_core_widget_option_3 = $instance['pixelwars_core_widget_option_3']; } else { $pixelwars_core_widget_option_3 = 'w-50'; }
			if (isset($instance['pixelwars_core_widget_option_4'])) { $pixelwars_core_widget_option_4 = $instance['pixelwars_core_widget_option_4']; } else { $pixelwars_core_widget_option_4 = ""; }
			if (isset($instance['pixelwars_core_widget_option_5'])) { $pixelwars_core_widget_option_5 = $instance['pixelwars_core_widget_option_5']; } else { $pixelwars_core_widget_option_5 = '1'; }
			if (isset($instance['pixelwars_core_widget_option_6'])) { $pixelwars_core_widget_option_6 = $instance['pixelwars_core_widget_option_6']; } else { $pixelwars_core_widget_option_6 = 'false'; }
			if (isset($instance['pixelwars_core_widget_option_7'])) { $pixelwars_core_widget_option_7 = $instance['pixelwars_core_widget_option_7']; } else { $pixelwars_core_widget_option_7 = 'true'; }
			if (isset($instance['pixelwars_core_widget_option_8'])) { $pixelwars_core_widget_option_8 = $instance['pixelwars_core_widget_option_8']; } else { $pixelwars_core_widget_option_8 = 'true'; }
			if (isset($instance['pixelwars_core_widget_option_9'])) { $pixelwars_core_widget_option_9 = $instance['pixelwars_core_widget_option_9']; } else { $pixelwars_core_widget_option_9 = 'false'; }
			if (isset($instance['pixelwars_core_widget_option_10'])) { $pixelwars_core_widget_option_10 = $instance['pixelwars_core_widget_option_10']; } else { $pixelwars_core_widget_option_10 = 'false'; }
			if (isset($instance['pixelwars_core_widget_option_11'])) { $pixelwars_core_widget_option_11 = $instance['pixelwars_core_widget_option_11']; } else { $pixelwars_core_widget_option_11 = '4000'; }
			if (isset($instance['pixelwars_core_widget_option_12'])) { $pixelwars_core_widget_option_12 = $instance['pixelwars_core_widget_option_12']; } else { $pixelwars_core_widget_option_12 = 'false'; }
			if (isset($instance['pixelwars_core_widget_option_13'])) { $pixelwars_core_widget_option_13 = $instance['pixelwars_core_widget_option_13']; } else { $pixelwars_core_widget_option_13 = 'true'; }
			if (isset($instance['pixelwars_core_widget_option_14'])) { $pixelwars_core_widget_option_14 = $instance['pixelwars_core_widget_option_14']; } else { $pixelwars_core_widget_option_14 = 'true'; }
			if (isset($instance['pixelwars_core_widget_option_15'])) { $pixelwars_core_widget_option_15 = $instance['pixelwars_core_widget_option_15']; } else { $pixelwars_core_widget_option_15 = ""; }
			if (isset($instance['pixelwars_core_widget_option_16'])) { $pixelwars_core_widget_option_16 = $instance['pixelwars_core_widget_option_16']; } else { $pixelwars_core_widget_option_16 = ""; }
			if (isset($instance['pixelwars_core_widget_option_17'])) { $pixelwars_core_widget_option_17 = $instance['pixelwars_core_widget_option_17']; } else { $pixelwars_core_widget_option_17 = ""; }
			if (isset($instance['pixelwars_core_widget_option_18'])) { $pixelwars_core_widget_option_18 = $instance['pixelwars_core_widget_option_18']; } else { $pixelwars_core_widget_option_18 = '0.7'; }
			
			?>
				<table class="lahanna-widget-table">
					<tr>
						<td class="lahanna-widget-table-td-left">
							<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
							<small><?php esc_html_e('Enter title.', 'pixelwars-core'); ?></small>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_1')); ?>"><?php esc_html_e('Slides', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_1')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_1')); ?>">
								<option <?php if ($pixelwars_core_widget_option_1 == 'sticky') { echo 'selected="selected"'; } ?> value="sticky"><?php esc_html_e('Sticky posts', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_1 == 'latest') { echo 'selected="selected"'; } ?> value="latest"><?php esc_html_e('Latest posts', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_2')); ?>"><?php esc_html_e('Slides Count', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<input type="number" min="1" max="20" step="1" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_2')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_2')); ?>" value="<?php echo esc_attr($pixelwars_core_widget_option_2); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_5')); ?>"><?php esc_html_e('Show Items', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_5')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_5')); ?>">
								<option <?php if ($pixelwars_core_widget_option_5 == '1') { echo 'selected="selected"'; } ?> value="1"><?php esc_html_e('1', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_5 == '2') { echo 'selected="selected"'; } ?> value="2"><?php esc_html_e('2', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_5 == '3') { echo 'selected="selected"'; } ?> value="3"><?php esc_html_e('3', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_5 == '4') { echo 'selected="selected"'; } ?> value="4"><?php esc_html_e('4', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_5 == '5') { echo 'selected="selected"'; } ?> value="5"><?php esc_html_e('5', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_3')); ?>"><?php esc_html_e('Width', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_3')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_3')); ?>">
								<option <?php if ($pixelwars_core_widget_option_3 == 'w-50') { echo 'selected="selected"'; } ?> value="w-50"><?php esc_html_e('50%', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_3 == 'w-75') { echo 'selected="selected"'; } ?> value="w-75"><?php esc_html_e('75%', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_3 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('100%', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_4')); ?>"><?php esc_html_e('Ratio', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_4')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_4')); ?>">
								<option <?php if ($pixelwars_core_widget_option_4 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Square', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_4 == 'ratio-tall') { echo 'selected="selected"'; } ?> value="ratio-tall"><?php esc_html_e('Tall', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_4 == 'ratio-16-9') { echo 'selected="selected"'; } ?> value="ratio-16-9"><?php esc_html_e('Wide', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_4 == 'ratio-21-9') { echo 'selected="selected"'; } ?> value="ratio-21-9"><?php esc_html_e('Extra Wide', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_4 == 'ratio-ultra-wide') { echo 'selected="selected"'; } ?> value="ratio-ultra-wide"><?php esc_html_e('Ultra Wide', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_6')); ?>"><?php esc_html_e('Animation', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_6')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_6')); ?>">
								<option <?php if ($pixelwars_core_widget_option_6 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('Slide', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fade') { echo 'selected="selected"'; } ?> value="fade"><?php esc_html_e('Fade', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'backSlide') { echo 'selected="selected"'; } ?> value="backSlide"><?php esc_html_e('Back Slide', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'scale') { echo 'selected="selected"'; } ?> value="scale"><?php esc_html_e('Scale', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'stackScale') { echo 'selected="selected"'; } ?> value="stackScale"><?php esc_html_e('Stack Scale', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'stackZoom') { echo 'selected="selected"'; } ?> value="stackZoom"><?php esc_html_e('Stack Zoom', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeHorizontal') { echo 'selected="selected"'; } ?> value="fadeHorizontal"><?php esc_html_e('Fade Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeHorizontalBig') { echo 'selected="selected"'; } ?> value="fadeHorizontalBig"><?php esc_html_e('Fade Horizontal Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeVertical') { echo 'selected="selected"'; } ?> value="fadeVertical"><?php esc_html_e('Fade Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeVerticalBig') { echo 'selected="selected"'; } ?> value="fadeVerticalBig"><?php esc_html_e('Fade Vertical Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jello') { echo 'selected="selected"'; } ?> value="jello"><?php esc_html_e('Jello', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jelloVertical') { echo 'selected="selected"'; } ?> value="jelloVertical"><?php esc_html_e('Jello Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jelloVerticalBig') { echo 'selected="selected"'; } ?> value="jelloVerticalBig"><?php esc_html_e('Jello Vertical Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jelloHorizontal') { echo 'selected="selected"'; } ?> value="jelloHorizontal"><?php esc_html_e('Jello Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jelloHorizontalBig') { echo 'selected="selected"'; } ?> value="jelloHorizontalBig"><?php esc_html_e('Jello Horizontal Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'swing') { echo 'selected="selected"'; } ?> value="swing"><?php esc_html_e('Swing', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'swingVertical') { echo 'selected="selected"'; } ?> value="swingVertical"><?php esc_html_e('Swing Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'swingVerticalBig') { echo 'selected="selected"'; } ?> value="swingVerticalBig"><?php esc_html_e('Swing Vertical Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'swingHorizontal') { echo 'selected="selected"'; } ?> value="swingHorizontal"><?php esc_html_e('Swing Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'swingHorizontalBig') { echo 'selected="selected"'; } ?> value="swingHorizontalBig"><?php esc_html_e('Swing Horizontal Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rubberBand') { echo 'selected="selected"'; } ?> value="rubberBand"><?php esc_html_e('Rubber Band', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rubberBandVertical') { echo 'selected="selected"'; } ?> value="rubberBandVertical"><?php esc_html_e('Rubber Band Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rubberBandVerticalBig') { echo 'selected="selected"'; } ?> value="rubberBandVerticalBig"><?php esc_html_e('Rubber Band Vertical Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rubberBandHorizontal') { echo 'selected="selected"'; } ?> value="rubberBandHorizontal"><?php esc_html_e('Rubber Band Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rubberBandHorizontalBig') { echo 'selected="selected"'; } ?> value="rubberBandHorizontalBig"><?php esc_html_e('Rubber Band Horizontal Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoom') { echo 'selected="selected"'; } ?> value="zoom"><?php esc_html_e('Zoom', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoomHorizontal') { echo 'selected="selected"'; } ?> value="zoomHorizontal"><?php esc_html_e('Zoom Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoomHorizontalBig') { echo 'selected="selected"'; } ?> value="zoomHorizontalBig"><?php esc_html_e('Zoom Horizontal Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoomVertical') { echo 'selected="selected"'; } ?> value="zoomVertical"><?php esc_html_e('Zoom Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoomVerticalBig') { echo 'selected="selected"'; } ?> value="zoomVerticalBig"><?php esc_html_e('Zoom Vertical Big', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'zoomInDown') { echo 'selected="selected"'; } ?> value="zoomInDown"><?php esc_html_e('Zoom In Down', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeUpZoomOut') { echo 'selected="selected"'; } ?> value="fadeUpZoomOut"><?php esc_html_e('Fade Up Zoom Out', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'fadeLeftZoomOut') { echo 'selected="selected"'; } ?> value="fadeLeftZoomOut"><?php esc_html_e('Fade Left Zoom Out', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'flipVertical') { echo 'selected="selected"'; } ?> value="flipVertical"><?php esc_html_e('Flip Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'flipHorizontal') { echo 'selected="selected"'; } ?> value="flipHorizontal"><?php esc_html_e('Flip Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'lightSpeed') { echo 'selected="selected"'; } ?> value="lightSpeed"><?php esc_html_e('Light Speed', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jackInTheBox') { echo 'selected="selected"'; } ?> value="jackInTheBox"><?php esc_html_e('Jack In The Box', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'hinge') { echo 'selected="selected"'; } ?> value="hinge"><?php esc_html_e('Hinge', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rotate') { echo 'selected="selected"'; } ?> value="rotate"><?php esc_html_e('Rotate', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rotateUpSwitch') { echo 'selected="selected"'; } ?> value="rotateUpSwitch"><?php esc_html_e('Rotate Up Switch', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rotateDownSwitch') { echo 'selected="selected"'; } ?> value="rotateDownSwitch"><?php esc_html_e('Rotate Down Switch', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rotateHorizontal') { echo 'selected="selected"'; } ?> value="rotateHorizontal"><?php esc_html_e('Rotate Horizontal', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'rotateVertical') { echo 'selected="selected"'; } ?> value="rotateVertical"><?php esc_html_e('Rotate Vertical', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'jumpIn') { echo 'selected="selected"'; } ?> value="jumpIn"><?php esc_html_e('Jump In', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'blur') { echo 'selected="selected"'; } ?> value="blur"><?php esc_html_e('Blur', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'blurZoom') { echo 'selected="selected"'; } ?> value="blurZoom"><?php esc_html_e('Blur Zoom', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'blurScale') { echo 'selected="selected"'; } ?> value="blurScale"><?php esc_html_e('Blur Scale', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'blurStackScale') { echo 'selected="selected"'; } ?> value="blurStackScale"><?php esc_html_e('Blur Stack Scale', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'blurStackZoom') { echo 'selected="selected"'; } ?> value="blurStackZoom"><?php esc_html_e('Blur Stack Zoom', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_6 == 'invert') { echo 'selected="selected"'; } ?> value="invert"><?php esc_html_e('Invert', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="lahanna-widget-table-td-left">
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_18')); ?>"><?php esc_html_e('Animation Duration', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<input type="number" min="0.1" max="2" step="0.1" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_18')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_18')); ?>" value="<?php echo esc_attr($pixelwars_core_widget_option_18); ?>">
							<small><?php esc_html_e('Default: 0.7 s', 'pixelwars-core'); ?></small>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_9')); ?>"><?php esc_html_e('Mouse Drag', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_9')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_9')); ?>">
								<option <?php if ($pixelwars_core_widget_option_9 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_9 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_7')); ?>"><?php esc_html_e('Nav Arrows', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_7')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_7')); ?>">
								<option <?php if ($pixelwars_core_widget_option_7 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_7 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_8')); ?>"><?php esc_html_e('Nav Dots', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_8')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_8')); ?>">
								<option <?php if ($pixelwars_core_widget_option_8 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_8 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_10')); ?>"><?php esc_html_e('Autoplay', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_10')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_10')); ?>">
								<option <?php if ($pixelwars_core_widget_option_10 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_10 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="lahanna-widget-table-td-left">
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_11')); ?>"><?php esc_html_e('Autoplay Timeout', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<input type="number" min="500" max="10000" step="250" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_11')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_11')); ?>" value="<?php echo esc_attr($pixelwars_core_widget_option_11); ?>">
							<small><?php esc_html_e('Default: 4000 ms', 'pixelwars-core'); ?></small>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_12')); ?>"><?php esc_html_e('Center', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_12')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_12')); ?>">
								<option <?php if ($pixelwars_core_widget_option_12 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_12 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_13')); ?>"><?php esc_html_e('Loop', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_13')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_13')); ?>">
								<option <?php if ($pixelwars_core_widget_option_13 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_13 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_14')); ?>"><?php esc_html_e('Rewind', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_14')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_14')); ?>">
								<option <?php if ($pixelwars_core_widget_option_14 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_14 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_15')); ?>"><?php esc_html_e('Overflow', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_15')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_15')); ?>">
								<option <?php if ($pixelwars_core_widget_option_15 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Hidden', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_15 == 'is-overflow-visible') { echo 'selected="selected"'; } ?> value="is-overflow-visible"><?php esc_html_e('Visible', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_16')); ?>"><?php esc_html_e('Background', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_16')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_16')); ?>">
								<option <?php if ($pixelwars_core_widget_option_16 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Dark', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_16 == 'is-post-slider-bg-none') { echo 'selected="selected"'; } ?> value="is-post-slider-bg-none"><?php esc_html_e('None', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_17')); ?>"><?php esc_html_e('Box Shadow', 'pixelwars-core'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_widget_option_17')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_widget_option_17')); ?>">
								<option <?php if ($pixelwars_core_widget_option_17 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('None', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_17 == 'has-shadow') { echo 'selected="selected"'; } ?> value="has-shadow"><?php esc_html_e('Container', 'pixelwars-core'); ?></option>
								<option <?php if ($pixelwars_core_widget_option_17 == 'has-slide-shadow') { echo 'selected="selected"'; } ?> value="has-slide-shadow"><?php esc_html_e('Slides', 'pixelwars-core'); ?></option>
							</select>
						</td>
					</tr>
				</table>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                           = strip_tags($new_instance['title']);
			$instance['pixelwars_core_widget_option_1']  = strip_tags($new_instance['pixelwars_core_widget_option_1']);
			$instance['pixelwars_core_widget_option_2']  = strip_tags($new_instance['pixelwars_core_widget_option_2']);
			$instance['pixelwars_core_widget_option_3']  = strip_tags($new_instance['pixelwars_core_widget_option_3']);
			$instance['pixelwars_core_widget_option_4']  = strip_tags($new_instance['pixelwars_core_widget_option_4']);
			$instance['pixelwars_core_widget_option_5']  = strip_tags($new_instance['pixelwars_core_widget_option_5']);
			$instance['pixelwars_core_widget_option_6']  = strip_tags($new_instance['pixelwars_core_widget_option_6']);
			$instance['pixelwars_core_widget_option_7']  = strip_tags($new_instance['pixelwars_core_widget_option_7']);
			$instance['pixelwars_core_widget_option_8']  = strip_tags($new_instance['pixelwars_core_widget_option_8']);
			$instance['pixelwars_core_widget_option_9']  = strip_tags($new_instance['pixelwars_core_widget_option_9']);
			$instance['pixelwars_core_widget_option_10'] = strip_tags($new_instance['pixelwars_core_widget_option_10']);
			$instance['pixelwars_core_widget_option_11'] = strip_tags($new_instance['pixelwars_core_widget_option_11']);
			$instance['pixelwars_core_widget_option_12'] = strip_tags($new_instance['pixelwars_core_widget_option_12']);
			$instance['pixelwars_core_widget_option_13'] = strip_tags($new_instance['pixelwars_core_widget_option_13']);
			$instance['pixelwars_core_widget_option_14'] = strip_tags($new_instance['pixelwars_core_widget_option_14']);
			$instance['pixelwars_core_widget_option_15'] = strip_tags($new_instance['pixelwars_core_widget_option_15']);
			$instance['pixelwars_core_widget_option_16'] = strip_tags($new_instance['pixelwars_core_widget_option_16']);
			$instance['pixelwars_core_widget_option_17'] = strip_tags($new_instance['pixelwars_core_widget_option_17']);
			$instance['pixelwars_core_widget_option_18'] = strip_tags($new_instance['pixelwars_core_widget_option_18']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                           = apply_filters('widget_title', $instance['title']);
			$pixelwars_core_widget_option_1  = apply_filters('pixelwars_core_widget_option_1', $instance['pixelwars_core_widget_option_1']);
			$pixelwars_core_widget_option_2  = apply_filters('pixelwars_core_widget_option_2', $instance['pixelwars_core_widget_option_2']);
			$pixelwars_core_widget_option_3  = apply_filters('pixelwars_core_widget_option_3', $instance['pixelwars_core_widget_option_3']);
			$pixelwars_core_widget_option_4  = apply_filters('pixelwars_core_widget_option_4', $instance['pixelwars_core_widget_option_4']);
			$pixelwars_core_widget_option_5  = apply_filters('pixelwars_core_widget_option_5', $instance['pixelwars_core_widget_option_5']);
			$pixelwars_core_widget_option_6  = apply_filters('pixelwars_core_widget_option_6', $instance['pixelwars_core_widget_option_6']);
			$pixelwars_core_widget_option_7  = apply_filters('pixelwars_core_widget_option_7', $instance['pixelwars_core_widget_option_7']);
			$pixelwars_core_widget_option_8  = apply_filters('pixelwars_core_widget_option_8', $instance['pixelwars_core_widget_option_8']);
			$pixelwars_core_widget_option_9  = apply_filters('pixelwars_core_widget_option_9', $instance['pixelwars_core_widget_option_9']);
			$pixelwars_core_widget_option_10 = apply_filters('pixelwars_core_widget_option_10', $instance['pixelwars_core_widget_option_10']);
			$pixelwars_core_widget_option_11 = apply_filters('pixelwars_core_widget_option_11', $instance['pixelwars_core_widget_option_11']);
			$pixelwars_core_widget_option_12 = apply_filters('pixelwars_core_widget_option_12', $instance['pixelwars_core_widget_option_12']);
			$pixelwars_core_widget_option_13 = apply_filters('pixelwars_core_widget_option_13', $instance['pixelwars_core_widget_option_13']);
			$pixelwars_core_widget_option_14 = apply_filters('pixelwars_core_widget_option_14', $instance['pixelwars_core_widget_option_14']);
			$pixelwars_core_widget_option_15 = apply_filters('pixelwars_core_widget_option_15', $instance['pixelwars_core_widget_option_15']);
			$pixelwars_core_widget_option_16 = apply_filters('pixelwars_core_widget_option_16', $instance['pixelwars_core_widget_option_16']);
			$pixelwars_core_widget_option_17 = apply_filters('pixelwars_core_widget_option_17', $instance['pixelwars_core_widget_option_17']);
			$pixelwars_core_widget_option_18 = apply_filters('pixelwars_core_widget_option_18', $instance['pixelwars_core_widget_option_18']);
			
			echo $before_widget;
			
				// *** start Main Slider ***
				
					$slides 		= $pixelwars_core_widget_option_1;
					$slides_count   = $pixelwars_core_widget_option_2;
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
					
					$query = new WP_Query(
						array(
							'post_type'      => 'post',
							'post__in'       => $slides,
							'post__not_in'   => $excluded_posts,
							'posts_per_page' => $slides_count
						)
					);
					
					if ($query->have_posts()) :
					
						$width = $pixelwars_core_widget_option_3;
						
						if (isset($_GET['main_slider_width']))
						{
							$width = 'w-' . $_GET['main_slider_width'];
						}
						
						$ratio = $pixelwars_core_widget_option_4;
						
						if (isset($_GET['main_slider_ratio']))
						{
							$ratio = 'ratio-' . $_GET['main_slider_ratio'];
						}
						
						$items 			    = $pixelwars_core_widget_option_5;
						$animation 		    = $pixelwars_core_widget_option_6;
						$nav_arrows 	    = $pixelwars_core_widget_option_7;
						$nav_dots 		    = $pixelwars_core_widget_option_8;
						$mouse_drag 	    = $pixelwars_core_widget_option_9;
						$autoplay 		    = $pixelwars_core_widget_option_10;
						$autoplay_timeout   = $pixelwars_core_widget_option_11;
						$center             = $pixelwars_core_widget_option_12;
						$loop               = $pixelwars_core_widget_option_13;
						$rewind             = $pixelwars_core_widget_option_14;
						$overflow           = $pixelwars_core_widget_option_15;
						$background         = $pixelwars_core_widget_option_16;
						$box_shadow         = $pixelwars_core_widget_option_17;
						$animation_duration = $pixelwars_core_widget_option_18;
						
						?>
							<div class="block slider-box <?php echo esc_attr($width); ?> <?php echo esc_attr($ratio); ?>">
								<?php
									if (! empty($animation_duration))
									{
										?>
											<style type="text/css"> .owl-carousel .animated { animation-duration: <?php echo esc_attr($animation_duration); ?>s; } </style>
										<?php
									}
								?>
								<div class="post-slider owl-carousel <?php echo esc_attr($overflow); ?> <?php echo esc_attr($background); ?> <?php echo esc_attr($box_shadow); ?>" data-items="<?php echo esc_attr($items); ?>" data-animation="<?php echo esc_attr($animation); ?>" data-nav="<?php echo esc_attr($nav_arrows); ?>" data-dots="<?php echo esc_attr($nav_dots); ?>" data-mouse-drag="<?php echo esc_attr($mouse_drag); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-timeout="<?php echo esc_attr($autoplay_timeout); ?>" data-center="<?php echo esc_attr($center); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-rewind="<?php echo esc_attr($rewind); ?>">
									<?php
										function pixelwars_core_main_slider__featured_media($width)
										{
											$browser_address_url = stripcslashes(get_option(get_the_ID() . 'pixelwars_core_featured_video_url', ""));
											$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
											
											if (! empty($browser_address_url))
											{
												echo 'data-parallax-video="' . esc_url($browser_address_url) . '"';
											}
											elseif (has_post_thumbnail())
											{
												$feat_img = "";
												$feat_area_width = get_theme_mod('lahanna_setting_feat_area_width', 'is-featured-area-fixed');
												
												if ($feat_area_width == 'is-featured-area-fixed')
												{
													$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'pixelwars_core_image_size_1');
												}
												else
												{
													if ($width == 'w-50')
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'pixelwars_core_image_size_1');
													}
													else
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'pixelwars_core_image_size_7');
													}
												}
												
												echo 'style="background-image: url(' . esc_url($feat_img[0]) . ');"';
											}
										}
									?>
									
									<?php
										while ($query->have_posts()) : $query->the_post();
										
											$main_slider_meta_style = get_theme_mod('lahanna_setting_main_slider_meta_style', 'is-cat-link-solid-light is-cat-link-rounded');
											
											?>
												<div class="slider-post main-slider-post is-post-dark <?php echo esc_attr($main_slider_meta_style); ?>">
													<div class="post-thumbnail" <?php pixelwars_core_main_slider__featured_media($width); ?>>
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
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget_Main_Slider'); });

?>