<?php

	class pixelwars_core_Widget__Progress_Bar extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__progress_bar',
				esc_html__('(Pixelwars) Progress Bar', 'pixelwars-core'),
				array(
					'description' => esc_html__('Progress bar module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['percent'])) { $percent = $instance['percent']; } else { $percent = '100'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('percent')); ?>"><?php esc_html_e('Percent', 'pixelwars-core'); ?></label>
					
					<input type="number" min="0" max="100" step="1" class="widefat" id="<?php echo esc_attr($this->get_field_id('percent')); ?>" name="<?php echo esc_attr($this->get_field_name('percent')); ?>" value="<?php echo esc_attr($percent); ?>">
					
					<small><?php esc_html_e('Number of value. (1 to 100)', 'pixelwars-core'); ?></small>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']   = strip_tags($new_instance['title']);
			$instance['percent'] = strip_tags($new_instance['percent']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title   = apply_filters('widget_title', $instance['title']);
			$percent = apply_filters('widget_percent', $instance['percent']);
			
			echo $before_widget;
			
				if ((! empty($title)) || (! empty($percent)))
				{
					?>
						<div class="skill-unit">
							<?php
								if (! empty($title))
								{
									?>
										<h4><?php echo $title; ?></h4>
									<?php
								}
							?>
							<?php
								if (! empty($percent))
								{
									?>
										<div class="bar" data-percent="<?php echo esc_attr($percent); ?>">
											<div class="progress"></div> <!-- .progress -->
										</div> <!-- .bar -->
									<?php
								}
							?>
						</div> <!-- .skill-unit -->
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Progress_Bar'); });

?>