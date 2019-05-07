<?php

	class pixelwars_core_Widget__Social_Media_Icon extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__social_media_icon',
				esc_html__('(Pixelwars) Social Media Icon', 'pixelwars-core'),
				array(
					'description' => esc_html__('Social media icons.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['icon'])) { $icon = $instance['icon']; } else { $icon = 'facebook'; }
			if (isset($instance['url'])) { $url = $instance['url']; } else { $url = ""; }
			if (isset($instance['new_tab'])) { $new_tab = $instance['new_tab']; } else { $new_tab = true; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e('Icon', 'pixelwars-core'); ?></label>
					
					<select id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" class="widefat">
						<option <?php if ($icon == 'facebook') { echo 'selected="selected"'; } ?> value="facebook"><?php esc_html_e('Facebook', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'twitter') { echo 'selected="selected"'; } ?> value="twitter"><?php esc_html_e('Twitter', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'instagram') { echo 'selected="selected"'; } ?> value="instagram"><?php esc_html_e('Instagram', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'google-plus') { echo 'selected="selected"'; } ?> value="google-plus"><?php esc_html_e('Google+', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'linkedin') { echo 'selected="selected"'; } ?> value="linkedin"><?php esc_html_e('LinkedIn', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'pinterest') { echo 'selected="selected"'; } ?> value="pinterest"><?php esc_html_e('Pinterest', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'flickr') { echo 'selected="selected"'; } ?> value="flickr"><?php esc_html_e('Flickr', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'fivehundredpx') { echo 'selected="selected"'; } ?> value="fivehundredpx"><?php esc_html_e('500px', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'behance') { echo 'selected="selected"'; } ?> value="behance"><?php esc_html_e('Behance', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'dribbble') { echo 'selected="selected"'; } ?> value="dribbble"><?php esc_html_e('Dribbble', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'forrst') { echo 'selected="selected"'; } ?> value="forrst"><?php esc_html_e('Forrst', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'skype') { echo 'selected="selected"'; } ?> value="skype"><?php esc_html_e('Skype', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'youtube') { echo 'selected="selected"'; } ?> value="youtube"><?php esc_html_e('YouTube', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'vimeo') { echo 'selected="selected"'; } ?> value="vimeo"><?php esc_html_e('Vimeo', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'soundcloud') { echo 'selected="selected"'; } ?> value="soundcloud"><?php esc_html_e('SoundCloud', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'spotify') { echo 'selected="selected"'; } ?> value="spotify"><?php esc_html_e('Spotify', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'lastfm') { echo 'selected="selected"'; } ?> value="lastfm"><?php esc_html_e('Last.fm', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'wordpress') { echo 'selected="selected"'; } ?> value="wordpress"><?php esc_html_e('WordPress', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'tumblr') { echo 'selected="selected"'; } ?> value="tumblr"><?php esc_html_e('Tumblr', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'blogger') { echo 'selected="selected"'; } ?> value="blogger"><?php esc_html_e('Blogger', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'delicious') { echo 'selected="selected"'; } ?> value="delicious"><?php esc_html_e('Delicious', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'digg') { echo 'selected="selected"'; } ?> value="digg"><?php esc_html_e('Digg', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'github') { echo 'selected="selected"'; } ?> value="github"><?php esc_html_e('GitHub', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'stack-overflow') { echo 'selected="selected"'; } ?> value="stack-overflow"><?php esc_html_e('Stack Overflow', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'foursquare') { echo 'selected="selected"'; } ?> value="foursquare"><?php esc_html_e('Foursquare', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'xing') { echo 'selected="selected"'; } ?> value="xing"><?php esc_html_e('Xing', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'weibo') { echo 'selected="selected"'; } ?> value="weibo"><?php esc_html_e('Weibo', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'slideshare') { echo 'selected="selected"'; } ?> value="slideshare"><?php esc_html_e('SlideShare', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'vkontakte') { echo 'selected="selected"'; } ?> value="vkontakte"><?php esc_html_e('VKontakte', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'vine') { echo 'selected="selected"'; } ?> value="vine"><?php esc_html_e('Vine', 'pixelwars-core'); ?></option>
						<option <?php if ($icon == 'rss') { echo 'selected="selected"'; } ?> value="rss"><?php esc_html_e('RSS', 'pixelwars-core'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" value="<?php echo esc_url($url); ?>">
					
					
					<input type="checkbox" <?php if ($new_tab) { echo 'checked="checked"'; } ?> id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>">
					
					<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_html_e('Open link in new tab', 'pixelwars-core'); ?></label>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['icon']    = strip_tags($new_instance['icon']);
			$instance['url']     = strip_tags($new_instance['url']);
			$instance['new_tab'] = strip_tags($new_instance['new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$icon    = apply_filters('widget_icon', $instance['icon']);
			$url     = apply_filters('widget_url', $instance['url']);
			$new_tab = apply_filters('widget_new_tab', $instance['new_tab']);
			
			echo $before_widget;
			
				if ($new_tab)
				{
					$new_tab = 'target="_blank"';
				}
				else
				{
					$new_tab = "";
				}
				
				?>
					<a class="social-link <?php echo esc_attr($icon); ?>" <?php echo $new_tab; ?> href="<?php echo esc_url($url); ?>"></a>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Social_Media_Icon'); });

?>