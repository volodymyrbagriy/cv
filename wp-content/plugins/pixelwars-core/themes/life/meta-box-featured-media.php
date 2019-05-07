<?php

	function life_meta_box__featured_video($post)
	{
		?>
			<?php
				wp_nonce_field('life_meta_box__featured_video',
							   'life_meta_box_nonce__featured_video');
			?>
			<p>
				<label for="life_featured_video_url"><?php esc_html_e('URL', 'pixelwars-core'); ?></label>
				<?php
					$life_featured_video_url          = stripcslashes(get_option(get_the_ID() . 'life_featured_video_url', ""));
					$life_featured_video_url__new_tab = get_option(get_the_ID() . 'life_featured_video_url__new_tab', true);
				?>
				<input type="text" id="life_featured_video_url" name="life_featured_video_url" class="widefat" value="<?php echo esc_url($life_featured_video_url); ?>">
				<span id="life_featured_video__new_tab">
					<label style="font-size: 12px; color: #777777;">
						<input type="checkbox" name="life_featured_video_url__new_tab" <?php if ($life_featured_video_url__new_tab != false) { echo 'checked="checked"'; } ?>> <?php esc_html_e('Open In New Tab', 'pixelwars-core'); ?> <span style="color: #999999;"><?php esc_html_e('(for Link format)', 'pixelwars-core'); ?></span>
					</label>
				</span>
			</p>
			
			<p class="howto life_featured_video__howto_post">
				<?php
					esc_html_e('Audio: Just paste the browser address url of an audio from SoundCloud. This audio will be shown in place of featured image.', 'pixelwars-core');
				?>
				<br>
				<br>
				<?php
					esc_html_e('Video: Just paste the browser address url of a video from YouTube or Vimeo. This video will be shown in place of featured image.', 'pixelwars-core');
				?>
			</p>
			
			<p class="howto life_featured_video__howto_portfolio">
				<?php
					esc_html_e('Use this URL field for format; Link, Audio and Video.', 'pixelwars-core');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Link: Enter your custom url.', 'pixelwars-core');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Audio: Use browser address url of an audio from SoundCloud. This audio will be shown in a lightbox in your portfolio page.', 'pixelwars-core');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Video: Use browser address url of a video from YouTube or Vimeo. This video will be shown in a lightbox in your portfolio page.', 'pixelwars-core');
				?>
			</p>
		<?php
	}
	
	
	function life_meta_box_save__featured_video($post_id)
	{
		if (! isset($_POST['life_meta_box_nonce__featured_video']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['life_meta_box_nonce__featured_video'];
		
		if (! wp_verify_nonce($nonce, 'life_meta_box__featured_video'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option($post_id . 'life_featured_video_url', $_POST['life_featured_video_url']);
		update_option($post_id . 'life_featured_video_url__new_tab', $_POST['life_featured_video_url__new_tab']);
	}
	
	add_action('save_post', 'life_meta_box_save__featured_video');
	
	
	function life_add_meta_boxes__featured_video()
	{
		add_meta_box('life_add_meta_box__featured_video__post',
					 esc_html__('Featured Audio/Video', 'pixelwars-core'),
					 'life_meta_box__featured_video',
					 array('post'),
					 'side',
					 'low');
		
		add_meta_box('life_add_meta_box__featured_video__portfolio',
					 esc_html__('Featured Audio/Video/Link', 'pixelwars-core'),
					 'life_meta_box__featured_video',
					 array('portfolio'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'life_add_meta_boxes__featured_video');

?>