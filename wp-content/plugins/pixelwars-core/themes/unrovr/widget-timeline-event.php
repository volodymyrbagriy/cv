<?php

	class pixelwars_core_Widget__Timeline_Event extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__timeline_event',
				esc_html__('(Pixelwars) Timeline Event', 'pixelwars-core'),
				array(
					'description' => esc_html__('Timeline event module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['school_company'])) { $school_company = $instance['school_company']; } else { $school_company = ""; }
			if (isset($instance['description'])) { $description = $instance['description']; } else { $description = ""; }
			if (isset($instance['date'])) { $date = $instance['date']; } else { $date = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Department / Job', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('school_company')); ?>"><?php esc_html_e('School / Company', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('school_company')); ?>" name="<?php echo esc_attr($this->get_field_name('school_company')); ?>" value="<?php echo esc_attr($school_company); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
					
					<textarea rows="5" cols="30" class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_textarea($description); ?></textarea>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('date')); ?>"><?php esc_html_e('Date', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('date')); ?>" name="<?php echo esc_attr($this->get_field_name('date')); ?>" value="<?php echo esc_attr($date); ?>">
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']          = strip_tags($new_instance['title']);
			$instance['school_company'] = strip_tags($new_instance['school_company']);
			$instance['description']    = strip_tags($new_instance['description']);
			$instance['date']           = strip_tags($new_instance['date']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title          = apply_filters('widget_title', $instance['title']);
			$school_company = apply_filters('widget_school_company', $instance['school_company']);
			$description    = apply_filters('widget_description', $instance['description']);
			$date           = apply_filters('widget_date', $instance['date']);
			
			echo $before_widget;
			
				if ((! empty($title)) || (! empty($school_company)) || (! empty($description)) || (! empty($date)))
				{
					?>
						<div class="event">
							<?php
								if (! empty($date))
								{
									?>
										<h3><?php echo $date; ?></h3>
									<?php
								}
							?>
							<?php
								if (! empty($title))
								{
									?>
										<h4><?php echo $title; ?></h4>
									<?php
								}
							?>
							<?php
								if (! empty($school_company))
								{
									?>
										<h5><?php echo $school_company; ?></h5>
									<?php
								}
							?>
							<?php
								if (! empty($description))
								{
									?>
										<p><?php echo $description; ?></p>
									<?php
								}
							?>
						</div> <!-- .event -->
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Timeline_Event'); });

?>