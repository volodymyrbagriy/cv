<?php

	class pixelwars_core_Widget__Section_Title extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__section_title',
				esc_html__('(Pixelwars) Section Title', 'pixelwars-core'),
				array(
					'description' => esc_html__('Section title for modules.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['align'])) { $align = $instance['align']; } else { $align = 'center'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('align')); ?>"><?php esc_html_e('Align', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('align')); ?>" name="<?php echo esc_attr($this->get_field_name('align')); ?>">
						<option <?php if ($align == 'center') { echo 'selected="selected"'; } ?> value="center"><?php esc_html_e('Center', 'pixelwars-core'); ?></option>
						<option <?php if ($align == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Left', 'pixelwars-core'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['align'] = strip_tags($new_instance['align']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$align = apply_filters('widget_align', $instance['align']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					?>
						<div class="section-title <?php echo esc_attr($align); ?>">    
							<h2>
								<i><?php echo $title; ?></i>
							</h2>
						</div> <!-- .section-title -->
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Section_Title'); });

?>