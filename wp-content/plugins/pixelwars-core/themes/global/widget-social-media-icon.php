<?php

	class pixelwars_core_Widget_Social_Media_Icon extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget_social_media_icon',
				esc_html__('(Pixelwars) Social Media Icon', 'pixelwars-core'),
				array(
					'description'                 => esc_html__('Social media icons.', 'pixelwars-core'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['pixelwars_core_icon'])) { $pixelwars_core_icon = $instance['pixelwars_core_icon']; } else { $pixelwars_core_icon = 'facebook'; }
			if (isset($instance['pixelwars_core_url'])) { $pixelwars_core_url = $instance['pixelwars_core_url']; } else { $pixelwars_core_url = ""; }
			if (isset($instance['pixelwars_core_new_tab'])) { $pixelwars_core_new_tab = $instance['pixelwars_core_new_tab']; } else { $pixelwars_core_new_tab = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_icon')); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_icon')); ?>">
						<option <?php if ($pixelwars_core_icon == 'facebook') { echo 'selected="selected"'; } ?> value="facebook"><?php esc_html_e('Facebook', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'twitter') { echo 'selected="selected"'; } ?> value="twitter"><?php esc_html_e('Twitter', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'google-plus') { echo 'selected="selected"'; } ?> value="google-plus"><?php esc_html_e('Google+', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'instagram') { echo 'selected="selected"'; } ?> value="instagram"><?php esc_html_e('Instagram', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'linkedin') { echo 'selected="selected"'; } ?> value="linkedin"><?php esc_html_e('LinkedIn', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'pinterest') { echo 'selected="selected"'; } ?> value="pinterest"><?php esc_html_e('Pinterest', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'flickr') { echo 'selected="selected"'; } ?> value="flickr"><?php esc_html_e('Flickr', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'fivehundredpx') { echo 'selected="selected"'; } ?> value="fivehundredpx"><?php esc_html_e('500px', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'behance') { echo 'selected="selected"'; } ?> value="behance"><?php esc_html_e('Behance', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'dribbble') { echo 'selected="selected"'; } ?> value="dribbble"><?php esc_html_e('Dribbble', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'forrst') { echo 'selected="selected"'; } ?> value="forrst"><?php esc_html_e('Forrst', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'skype') { echo 'selected="selected"'; } ?> value="skype"><?php esc_html_e('Skype', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'youtube') { echo 'selected="selected"'; } ?> value="youtube"><?php esc_html_e('YouTube', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'vimeo') { echo 'selected="selected"'; } ?> value="vimeo"><?php esc_html_e('Vimeo', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'soundcloud') { echo 'selected="selected"'; } ?> value="soundcloud"><?php esc_html_e('SoundCloud', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'lastfm') { echo 'selected="selected"'; } ?> value="lastfm"><?php esc_html_e('Last.fm', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'wordpress') { echo 'selected="selected"'; } ?> value="wordpress"><?php esc_html_e('WordPress', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'tumblr') { echo 'selected="selected"'; } ?> value="tumblr"><?php esc_html_e('Tumblr', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'blogger') { echo 'selected="selected"'; } ?> value="blogger"><?php esc_html_e('Blogger', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'delicious') { echo 'selected="selected"'; } ?> value="delicious"><?php esc_html_e('Delicious', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'digg') { echo 'selected="selected"'; } ?> value="digg"><?php esc_html_e('Digg', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'github') { echo 'selected="selected"'; } ?> value="github"><?php esc_html_e('GitHub', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'stack-overflow') { echo 'selected="selected"'; } ?> value="stack-overflow"><?php esc_html_e('Stack Overflow', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'foursquare') { echo 'selected="selected"'; } ?> value="foursquare"><?php esc_html_e('Foursquare', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'xing') { echo 'selected="selected"'; } ?> value="xing"><?php esc_html_e('Xing', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'weibo') { echo 'selected="selected"'; } ?> value="weibo"><?php esc_html_e('Weibo', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'slideshare') { echo 'selected="selected"'; } ?> value="slideshare"><?php esc_html_e('SlideShare', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'vkontakte') { echo 'selected="selected"'; } ?> value="vkontakte"><?php esc_html_e('VKontakte', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'picasa') { echo 'selected="selected"'; } ?> value="picasa"><?php esc_html_e('Picasa', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'friendfeed') { echo 'selected="selected"'; } ?> value="friendfeed"><?php esc_html_e('FriendFeed', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'vine') { echo 'selected="selected"'; } ?> value="vine"><?php esc_html_e('Vine', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'bloglovin') { echo 'selected="selected"'; } ?> value="bloglovin"><?php esc_html_e('Bloglovin', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_icon == 'rss') { echo 'selected="selected"'; } ?> value="rss"><?php esc_html_e('RSS', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_url')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_url')); ?>" value="<?php echo esc_url($pixelwars_core_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('pixelwars_core_new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('pixelwars_core_new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('pixelwars_core_new_tab')); ?>">
						<option <?php if ($pixelwars_core_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
						<option <?php if ($pixelwars_core_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                  = strip_tags($new_instance['title']);
			$instance['pixelwars_core_icon']    = strip_tags($new_instance['pixelwars_core_icon']);
			$instance['pixelwars_core_url']     = strip_tags($new_instance['pixelwars_core_url']);
			$instance['pixelwars_core_new_tab'] = strip_tags($new_instance['pixelwars_core_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                  = apply_filters('widget_title', $instance['title']);
			$pixelwars_core_icon    = apply_filters('widget_icon', $instance['pixelwars_core_icon']);
			$pixelwars_core_url     = apply_filters('widget_url', $instance['pixelwars_core_url']);
			$pixelwars_core_new_tab = apply_filters('widget_new_tab', $instance['pixelwars_core_new_tab']);
			
			echo $before_widget;
			
			?>
				<a class="social-link <?php echo esc_attr($pixelwars_core_icon); ?>" <?php if ($pixelwars_core_new_tab != 'no') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($pixelwars_core_url); ?>"></a>
			<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget_Social_Media_Icon'); });

?>