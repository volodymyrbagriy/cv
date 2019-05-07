<?php

	class life_Widget_Social_Media_Feed extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('life_widget_social_media_feed',
								esc_html__('(Life) Social Media Feed', 'pixelwars-core'),
								array('description' => esc_html__('Social media feed.', 'pixelwars-core')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['life_network'])) { $life_network = $instance['life_network']; } else { $life_network = ""; }
			if (isset($instance['life_user'])) { $life_user = $instance['life_user']; } else { $life_user = ""; }
			if (isset($instance['life_number_of_items'])) { $life_number_of_items = $instance['life_number_of_items']; } else { $life_number_of_items = '6'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_user')); ?>"><?php esc_attr_e('User', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('life_user')); ?>" name="<?php echo esc_attr($this->get_field_name('life_user')); ?>" value="<?php echo esc_attr($life_user); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('life_network')); ?>"><?php esc_attr_e('Network', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('life_network')); ?>" name="<?php echo esc_attr($this->get_field_name('life_network')); ?>">
						<option></option>
						<option <?php if ($life_network == 'pinterest') { echo 'selected="selected"'; } ?> value="pinterest">Pinterest</option>
						<option <?php if ($life_network == 'flickr') { echo 'selected="selected"'; } ?> value="flickr">Flickr</option>
						<option <?php if ($life_network == 'picasa') { echo 'selected="selected"'; } ?> value="picasa">Picasa</option>
					</select>
					
					<label for="<?php echo esc_attr($this->get_field_id('life_number_of_items')); ?>"><?php esc_attr_e('Show Items', 'pixelwars-core'); ?></label>
					
					<input type="number" min="1" max="50" step="1" id="<?php echo esc_attr($this->get_field_id('life_number_of_items')); ?>" name="<?php echo esc_attr($this->get_field_name('life_number_of_items')); ?>" value="<?php echo esc_attr($life_number_of_items); ?>">
				</p>
				
				<hr>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                      = strip_tags($new_instance['title']);
			$instance['life_network']         = strip_tags($new_instance['life_network']);
			$instance['life_user']            = strip_tags($new_instance['life_user']);
			$instance['life_number_of_items'] = strip_tags($new_instance['life_number_of_items']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                      = apply_filters('widget_title', $instance['title']);
			$life_network         = apply_filters('life_network', $instance['life_network']);
			$life_user            = apply_filters('life_user', $instance['life_user']);
			$life_number_of_items = apply_filters('life_number_of_items', $instance['life_number_of_items']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				if ($life_network == 'flickr')
				{
					?>
						<div class="flickr-badges flickr-badges-s">
							<script src="http://www.flickr.com/badge_code_v2.gne?size=s&amp;count=<?php echo esc_attr($life_number_of_items); ?>&amp;display=random&amp;layout=x&amp;source=user&amp;user=<?php echo esc_attr($life_user); ?>"></script>
						</div>
					<?php
				}
				else
				{
					?>
						<div class="social-feed" data-social-network="<?php echo esc_attr($life_network); ?>" data-username="<?php echo esc_attr($life_user); ?>" data-limit="<?php echo esc_attr($life_number_of_items); ?>"></div>
					<?php
				}
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget( "life_widget_social_media_feed" );'));

?>