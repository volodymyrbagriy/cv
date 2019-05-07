<?php

	class life_Widget_Social_Media_Icon extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('life_widget_social_media_icon',
								esc_html__('(Life) Social Media Icon', 'pixelwars-core'),
								array('description' => esc_html__('Social media icons.', 'pixelwars-core')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['life_icon'])) { $life_icon = $instance['life_icon']; } else { $life_icon = ""; }
			if (isset($instance['life_url'])) { $life_url = $instance['life_url']; } else { $life_url = ""; }
			if (isset($instance['life_new_tab'])) { $life_new_tab = $instance['life_new_tab']; } else { $life_new_tab = ""; }
			
			?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('life_icon'); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo $this->get_field_id('life_icon'); ?>" name="<?php echo $this->get_field_name('life_icon'); ?>">
						<option></option>
						<option <?php if ($life_icon == 'facebook') { echo 'selected="selected"'; } ?> value="facebook">Facebook</option>
						<option <?php if ($life_icon == 'twitter') { echo 'selected="selected"'; } ?> value="twitter">Twitter</option>
						<option <?php if ($life_icon == 'google-plus') { echo 'selected="selected"'; } ?> value="google-plus">Google+</option>
						<option <?php if ($life_icon == 'instagram') { echo 'selected="selected"'; } ?> value="instagram">Instagram</option>
						<option <?php if ($life_icon == 'linkedin') { echo 'selected="selected"'; } ?> value="linkedin">LinkedIn</option>
						<option <?php if ($life_icon == 'pinterest') { echo 'selected="selected"'; } ?> value="pinterest">Pinterest</option>
						<option <?php if ($life_icon == 'flickr') { echo 'selected="selected"'; } ?> value="flickr">Flickr</option>
						<option <?php if ($life_icon == 'fivehundredpx') { echo 'selected="selected"'; } ?> value="fivehundredpx">500px</option>
						<option <?php if ($life_icon == 'behance') { echo 'selected="selected"'; } ?> value="behance">Behance</option>
						<option <?php if ($life_icon == 'dribbble') { echo 'selected="selected"'; } ?> value="dribbble">Dribbble</option>
						<option <?php if ($life_icon == 'forrst') { echo 'selected="selected"'; } ?> value="forrst">Forrst</option>
						<option <?php if ($life_icon == 'skype') { echo 'selected="selected"'; } ?> value="skype">Skype</option>
						<option <?php if ($life_icon == 'youtube') { echo 'selected="selected"'; } ?> value="youtube">YouTube</option>
						<option <?php if ($life_icon == 'vimeo') { echo 'selected="selected"'; } ?> value="vimeo">Vimeo</option>
						<option <?php if ($life_icon == 'soundcloud') { echo 'selected="selected"'; } ?> value="soundcloud">SoundCloud</option>
						<option <?php if ($life_icon == 'lastfm') { echo 'selected="selected"'; } ?> value="lastfm">Last.fm</option>
						<option <?php if ($life_icon == 'wordpress') { echo 'selected="selected"'; } ?> value="wordpress">WordPress</option>
						<option <?php if ($life_icon == 'tumblr') { echo 'selected="selected"'; } ?> value="tumblr">Tumblr</option>
						<option <?php if ($life_icon == 'blogger') { echo 'selected="selected"'; } ?> value="blogger">Blogger</option>
						<option <?php if ($life_icon == 'delicious') { echo 'selected="selected"'; } ?> value="delicious">Delicious</option>
						<option <?php if ($life_icon == 'digg') { echo 'selected="selected"'; } ?> value="digg">Digg</option>
						<option <?php if ($life_icon == 'github') { echo 'selected="selected"'; } ?> value="github">GitHub</option>
						<option <?php if ($life_icon == 'stack-overflow') { echo 'selected="selected"'; } ?> value="stack-overflow">Stack Overflow</option>
						<option <?php if ($life_icon == 'foursquare') { echo 'selected="selected"'; } ?> value="foursquare">Foursquare</option>
						<option <?php if ($life_icon == 'xing') { echo 'selected="selected"'; } ?> value="xing">Xing</option>
						<option <?php if ($life_icon == 'weibo') { echo 'selected="selected"'; } ?> value="weibo">Weibo</option>
						<option <?php if ($life_icon == 'slideshare') { echo 'selected="selected"'; } ?> value="slideshare">SlideShare</option>
						<option <?php if ($life_icon == 'vkontakte') { echo 'selected="selected"'; } ?> value="vkontakte">VKontakte</option>
						<option <?php if ($life_icon == 'picasa') { echo 'selected="selected"'; } ?> value="picasa">Picasa</option>
						<option <?php if ($life_icon == 'friendfeed') { echo 'selected="selected"'; } ?> value="friendfeed">FriendFeed</option>
						<option <?php if ($life_icon == 'vine') { echo 'selected="selected"'; } ?> value="vine">Vine</option>
						<option <?php if ($life_icon == 'bloglovin') { echo 'selected="selected"'; } ?> value="bloglovin">Bloglovin</option>
						<option <?php if ($life_icon == 'rss') { echo 'selected="selected"'; } ?> value="rss">RSS</option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('life_url'); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					
					<input type="text" id="<?php echo $this->get_field_id('life_url'); ?>" name="<?php echo $this->get_field_name('life_url'); ?>" value="<?php echo esc_url($life_url); ?>">
					
					<label for="<?php echo $this->get_field_id('life_new_tab'); ?>"><?php esc_html_e('New Tab', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo $this->get_field_id('life_new_tab'); ?>" name="<?php echo $this->get_field_name('life_new_tab'); ?>">
						<option <?php if ($life_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'pixelwars-core'); ?></option>
						<option <?php if ($life_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'pixelwars-core'); ?></option>
					</select>
				</p>
				
				<hr>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']          = strip_tags($new_instance['title']);
			$instance['life_icon']    = strip_tags($new_instance['life_icon']);
			$instance['life_url']     = strip_tags($new_instance['life_url']);
			$instance['life_new_tab'] = strip_tags($new_instance['life_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$life_icon    = apply_filters('widget_icon', $instance['life_icon']);
			$life_url     = apply_filters('widget_url', $instance['life_url']);
			$life_new_tab = apply_filters('widget_new_tab', $instance['life_new_tab']);
			
			echo $before_widget;
			
				if ($life_new_tab != 'no')
				{
					$life_new_tab = 'target="_blank"';
				}
				else
				{
					$life_new_tab = "";
				}
				
				?>
					<a class="social-link <?php echo esc_attr($life_icon); ?>" <?php echo $life_new_tab; ?> href="<?php echo esc_url($life_url); ?>"></a>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget("life_widget_social_media_icon");'));

?>