<?php

	function unrovr_theme_setup()
	{
		load_theme_textdomain('unrovr', get_template_directory() . '/languages');
		register_nav_menus(array('unrovr_theme_menu_location' => esc_html__('Classic Navigation Menu', 'unrovr')));
		add_editor_style('admin/css/editor-style.css');
		
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'quote', 'link', 'chat', 'status', 'aside'));
		add_theme_support('post-thumbnails', array('post'));
		
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 400,
				'height'      => 400,
				'flex-width'  => true,
				'flex-height' => true
			)
		);
	}
	
	add_action('after_setup_theme', 'unrovr_theme_setup');


/* ============================================================================================================================================= */


	include_once(get_template_directory() . '/admin/enqueue-styles-scripts.php');
	include_once(get_template_directory() . '/admin/enqueue-inline-style.php');
	include_once(get_template_directory() . '/admin/enqueue-inline-script.php');
	include_once(get_template_directory() . '/admin/image-sizes.php');


/* ============================================================================================================================================= */


	/*
		To override this walker in a child theme without modifying the comments template
		simply create your own unrovr_comments(), and that function will be used instead.
		
		Used as a callback by wp_list_comments() for displaying the comments.
	*/
	
	function unrovr_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		
		switch ($comment->comment_type)
		{
			case 'pingback':
			
			case 'trackback':
				?>
					<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<p>
							<?php
								esc_html_e('Pingback:', 'unrovr');
							?>
							<?php
								comment_author_link();
							?>
							<?php
								edit_comment_link(esc_html__('(Edit)', 'unrovr'), '<span class="edit-link">', '</span>');
							?>
						</p>
				<?php
			break;
			
			default :
			
				global $post;
				
				?>
					<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar($comment, 150);
								?>
								<?php
									printf(
										'<cite class="fn">%1$s %2$s</cite>',
										
										get_comment_author_link(),
										
										// If current post author is also comment author, make it known visually.
										($comment->user_id === $post->post_author) ? '<span></span>' : ""
									);
								?>
								<span class="comment-date"><?php echo get_comment_date() . ' ' . esc_html__('at', 'unrovr') . ' ' . get_comment_time(); ?></span>
							</header>
							
							<section class="comment-content comment">
								<?php
									if ('0' == $comment->comment_approved)
									{
										?>
											<p class="comment-awaiting-moderation">
												<?php
													esc_html_e('Your comment is awaiting moderation.', 'unrovr');
												?>
											</p>
										<?php
									}
								?>
								<?php
									comment_text();
								?>
								<?php
									edit_comment_link(esc_html__('Edit', 'unrovr'), '<p class="comment-edit-link">', '</p>');
								?>
							</section>
							
							<div class="reply">
								<?php
									comment_reply_link(
										array_merge(
											$args,
											array(
												'reply_text' => esc_html__('Reply', 'unrovr'),
												'after'      => "",
												'depth'      => $depth,
												'max_depth'  => $args['max_depth']
											)
										)
									);
								?>
							</div>
						</article>
				<?php
			break;
		}
	}


/* ============================================================================================================================================= */


	/*
		This function returns an ID based on the provided chat author name. It keeps these IDs in a global 
		array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
		that will be used in an HTML class for individual chat rows so they can be styled. So, speaker "John" 
		will always have the same class each time he speaks. And, speaker "Mary" will have a different class 
		from "John" but will have the same class each time she speaks.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $chat_author Author of the current chat row.
		@return int The ID for the chat row based on the author.
	*/
	
	
	function unrovr_format_chat_row_id($chat_author)
	{
		global $_post_format_chat_ids;
		
		/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
		$chat_author = strtolower(strip_tags($chat_author));
		
		/* Add the chat author to the array. */
		$_post_format_chat_ids[] = $chat_author;
		
		/* Make sure the array only holds unique values. */
		$_post_format_chat_ids = array_unique($_post_format_chat_ids);
		
		/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
		return absint(array_search($chat_author, $_post_format_chat_ids)) + 1;
	}
	
	
	/*
		This function filters the post content when viewing a post with the "chat" post format.  It formats the 
		content with structured HTML markup to make it easy for theme developers to style chat posts. The 
		advantage of this solution is that it allows for more than two speakers (like most solutions). You can 
		have 100s of speakers in your chat post, each with their own, unique classes for styling.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $content The content of the post.
		@return string $chat_output The formatted content of the post.
	*/
	
	
	function unrovr_format_chat_content($content)
	{
		global $_post_format_chat_ids;
		
		/* If this is not a 'chat' post, return the content. */
		if (! has_post_format('chat'))
		{
			return $content;
		}
		
		/* Set the global variable of speaker IDs to a new, empty array for this chat. */
		$_post_format_chat_ids = array();
		
		/* Allow the separator (separator for speaker/text) to be filtered. */
		$separator = apply_filters('unrovr_post_format_chat_separator', ':');
		
		/* Open the chat transcript div and give it a unique ID based on the post ID. */
		$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr(get_the_ID()) . '" class="chat-transcript">';
		
		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
		
		/* Loop through each row and format the output. */
		foreach ($chat_rows as $chat_row)
		{
			/* If a speaker is found, create a new chat row with speaker and text. */
			if (strpos($chat_row, $separator))
			{
				/* Split the chat row into author/text. */
				$chat_row_split = explode($separator, trim($chat_row), 2);
				
				/* Get the chat author and strip tags. */
				$chat_author = strip_tags(trim($chat_row_split[0]));
				
				/* Get the chat text. */
				$chat_text = trim($chat_row_split[1]);
				
				/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
				$speaker_id = unrovr_format_chat_row_id($chat_author);
				
				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class("chat-speaker-{$speaker_id}") . '">';
				
				/* Add the chat row author. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class(strtolower("chat-author-{$chat_author}")) . ' vcard"><cite class="fn">' . apply_filters('unrovr_post_format_chat_author', $chat_author, $speaker_id) . '</cite>' . $separator . '</div>';
				
				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace(array("\r", "\n", "\t"), '', apply_filters('unrovr_post_format_chat_text', $chat_text, $chat_author, $speaker_id)) . '</p></div>';
				
				/* Close the chat row. */
				$chat_output .= "\n\t\t\t\t" . '</div>';
			}
			/*
				If no author is found, assume this is a separate paragraph of text that belongs to the
				previous speaker and label it as such, but let's still create a new row.
			*/
			else
			{
				/* Make sure we have text. */
				if (! empty($chat_row))
				{
					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class("chat-speaker-{$speaker_id}") . '">';
					
					/* Don't add a chat row author.  The label for the previous row should suffice. */
					
					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace(array("\r", "\n", "\t"), '', apply_filters('unrovr_post_format_chat_text', $chat_row, $chat_author, $speaker_id)) . '</p></div>';
					
					/* Close the chat row. */
					$chat_output .= "\n\t\t\t</div>";
				}
			}
		}
		
		/* Close the chat transcript div. */
		$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";
		
		/* Return the chat content and apply filters for developers. */
		return apply_filters('unrovr_post_format_chat_content', $chat_output);
	}
	
	/* Filter the content of chat posts. */
	add_filter('the_content', 'unrovr_format_chat_content');


/* ============================================================================================================================================= */


	function unrovr_text_logo()
	{
		$site_title = get_bloginfo('name');
		
		if (! empty($site_title))
		{
			?>
				<h1 class="site-title">
					<?php
						echo esc_html($site_title);
					?>
				</h1> <!-- .site-title -->
			<?php
		}
	}
	
	
	function unrovr_image_logo($image_logo_url)
	{
		?>
			<h1 class="site-title">
				<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image_logo_url); ?>">
			</h1> <!-- .site-title -->
		<?php
	}
	
	
	function unrovr_site_logo()
	{
		if (has_custom_logo())
		{
			$image_logo_id  = get_theme_mod('custom_logo');
			$image_logo_url = wp_get_attachment_image_url($image_logo_id , 'full');
			
			unrovr_image_logo($image_logo_url);
		}
		else
		{
			unrovr_text_logo();
		}
	}
	
	
	function unrovr_site_tagline()
	{
		$tagline = get_bloginfo('description');
		
		if (! empty($tagline))
		{
			?>
				<p class="site-description">
					<?php
						echo esc_html($tagline);
					?>
				</p> <!-- .site-description -->
			<?php
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_html_attributes'))
	{
		function unrovr_html_attributes()
		{
			$page_layout = 'classic-page-layout';
			
			if (is_page_template('page_template-home.php'))
			{
				$page_layout = 'one-page-layout';
			}
			
			$sound_effects = get_theme_mod('unrovr_setting_sound_effects', 'yes');
			
			if ($sound_effects != 'no')
			{
				$sound_effects = 'sound-effects';
			}
			
			$class = 'class="' . 'no-js' . ' ' . esc_attr($page_layout) . ' ' . esc_attr($sound_effects) . '"';
			
			$theme_directory_url = get_template_directory_uri();
			
			$data_audio_wind         = 'data-audio-wind="' . esc_url($theme_directory_url . '/audio/wind.mp3') . '"';
			$data_audio_wind_reverse = 'data-audio-wind-reverse="' . esc_url($theme_directory_url . '/audio/wind-reverse.mp3') . '"';
			$data_audio_tick         = 'data-audio-tick="' . esc_url($theme_directory_url . '/audio/tick.mp3') . '"';
			
			$attributes = $class . ' ' . $data_audio_wind . ' ' . $data_audio_wind_reverse . ' ' . $data_audio_tick;
			
			return $attributes;
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_header_search'))
	{
		function unrovr_header_search()
		{
			?>
				<div class="header-search">
					<form id="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
						<input type="text" id="search" name="s" required="required" placeholder="<?php esc_attr_e('type and hit enter', 'unrovr'); ?>">
						<input type="submit" id="search-submit" title="<?php esc_attr_e('Search', 'unrovr'); ?>" value="&#8594;">
					</form> <!-- #search-form -->
				</div> <!-- .header-search -->
			<?php
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_header_background_image'))
	{
		function unrovr_header_background_image()
		{
			$header_bg_img = get_theme_mod('unrovr_setting_header_bg_img', "");
			
			if (! empty($header_bg_img))
			{
				?>
					<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($header_bg_img); ?>">
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_header_social_media_icons'))
	{
		function unrovr_header_social_media_icons()
		{
			if (is_active_sidebar('unrovr_sidebar__header_social_media_icons'))
			{
				?>
					<div class="header-bottom">
						<?php
							dynamic_sidebar('unrovr_sidebar__header_social_media_icons');
						?>
					</div> <!-- .header-bottom -->
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_card_image'))
	{
		function unrovr_card_image($size = 'homepage-small', $echo_only_url = false)
		{
			$card_image_url = get_theme_mod('unrovr_setting_card_image', ""); // Full image size.
			
			if (! empty($card_image_url))
			{
				$id   = attachment_url_to_postid($card_image_url);
				$size = unrovr_image_size($size);
				$attr = array('class' => 'cover-img');
				
				if ($echo_only_url)
				{
					echo esc_url(wp_get_attachment_image_url($id, $size)); // Image URL. (custom image size)
				}
				else
				{
					echo wp_get_attachment_image($id, $size, null, $attr); // HTML img. (custom image size)
				}
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_portfolio_page__post_filters'))
	{
		function unrovr_portfolio_page__post_filters()
		{
			?>
				<ul id="filters" class="filters">
					<?php
						$unrovr_categories = get_categories(
							array(
								'type'     => 'portfolio',
								'taxonomy' => 'portfolio-category',
								'parent'   => 0 // Get top level categories.
							)
						);
						
						if (count($unrovr_categories) >= 1)
						{
							?>
								<li class="current">
									<a href="#" data-filter="*">
										<?php
											esc_html_e('all', 'unrovr');
										?>
									</a>
								</li>
							<?php
						}
						
						foreach ($unrovr_categories as $category)
						{
							?>
								<li>
									<a data-filter=".<?php echo esc_attr($category->slug); ?>" href="#">
										<?php
											echo esc_html($category->name);
										?>
									</a>
								</li>
							<?php
						}
					?>
				</ul> <!-- #filters .filters -->
			<?php
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_portfolio_page__post_class'))
	{
		function unrovr_portfolio_page__post_class()
		{
			$taxonomy         = 'portfolio-category';
			$categories_slugs = "";
			$categories 	  = get_the_terms(get_the_ID(), $taxonomy);
			
			if ($categories && (! is_wp_error($categories)))
			{
				foreach ($categories as $category)
				{
					// Get post's category slug and its parent category slug.
					
					$categories_slugs .= get_term_parents_list(
						$category->term_id,
						$taxonomy,
						array(
							'format'    => 'slug',
							'separator' => ' ',
							'link'      => false,
							'inclusive' => true,
						)
					);
				}
			}
			
			$post_class = 'media-cell hentry' . ' ' . esc_attr($categories_slugs);
			
			return $post_class;
		}
	}


/* ============================================================================================================================================= */


	function unrovr_core_featured_media__url()
	{
		if (function_exists('pixelwars_core_featured_media__url'))
		{
			return pixelwars_core_featured_media__url();
		}
	}
	
	
	function unrovr_core_featured_media__new_tab()
	{
		if (function_exists('pixelwars_core_featured_media__new_tab'))
		{
			return pixelwars_core_featured_media__new_tab();
		}
	}
	
	
	if (! function_exists('unrovr_featured_media__url'))
	{
		function unrovr_featured_media__url($return_new_tab = false)
		{
			$featured_media = "";
			
			if ($return_new_tab)
			{
				$featured_media = unrovr_core_featured_media__new_tab();
			}
			else
			{
				$featured_media = unrovr_core_featured_media__url();
			}
			
			return $featured_media;
		}
	}
	
	
	if (! function_exists('unrovr_youtube_vimeo_soundcloud_iframe'))
	{
		function unrovr_youtube_vimeo_soundcloud_iframe($return_iframe_url = false)
		{
			$browser_address_url = unrovr_featured_media__url();
			
			if (! empty($browser_address_url))
			{
				$xml_url = "";
				$browser_address_url__youtube    = strpos($browser_address_url, 'youtube.com'); // Check url for YouTube.
				$browser_address_url__vimeo      = strpos($browser_address_url, 'vimeo.com'); // Check url for Vimeo.
				$browser_address_url__soundcloud = strpos($browser_address_url, 'soundcloud.com'); // Check url for SoundCloud.
				
				if ($browser_address_url__youtube !== false)
				{
					$xml_url = 'http://www.youtube.com/oembed?url=' . $browser_address_url . '&format=xml'; // Create YouTube xml url.
				}
				elseif ($browser_address_url__vimeo !== false)
				{
					$xml_url = 'http://vimeo.com/api/oembed.xml?url=' . $browser_address_url; // Create Vimeo xml url.
				}
				elseif ($browser_address_url__soundcloud !== false)
				{
					$xml_url = 'http://soundcloud.com/oembed?url=' . $browser_address_url; // Create SoundCloud xml url.
				}
				
				
				$iframe = "";
				$xml_content = simplexml_load_file($xml_url); // Get xml content from xml url.
				
				if ($xml_content)
				{
					$iframe = $xml_content->html; // Get iframe from xml content.
				}
				
				
				$iframe_url  = "";
				
				if (($return_iframe_url) && ($xml_content))
				{
					preg_match_all('#src=([\'"])(.+?)\1#is', $iframe, $out); // Split iframe attributes.
					$iframe_url = $out[2][0]; // Get url from iframe src.
					
					return $iframe_url;
				}
				else
				{
					return $iframe;
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function unrovr_ajax()
	{
		$ajax = get_theme_mod('unrovr_setting_ajax', 'yes');
		
		if ($ajax != 'no')
		{
			$ajax = 'class="ajax"';
		}
		else
		{
			$ajax = "";
		}
		
		return $ajax;
	}
	
	
	if (! function_exists('unrovr_portfolio_page__post_content__standard'))
	{
		function unrovr_portfolio_page__post_content__standard()
		{
			?>
				<a <?php echo unrovr_ajax(); ?> href="<?php the_permalink(); ?>"></a>
			<?php
		}
	}
	
	
	if (! function_exists('unrovr_portfolio_page__post_content__gallery'))
	{
		function unrovr_portfolio_page__post_content__gallery()
		{
			the_content();
		}
	}
	
	
	function unrovr_feat_img_caption()
	{
		$feat_img_caption = get_post_field('post_excerpt', get_post_thumbnail_id());
		
		if (! empty($feat_img_caption))
		{
			$feat_img_caption = 'data-title="' . esc_attr($feat_img_caption) . '"';
		}
		
		return $feat_img_caption;
	}
	
	if (! function_exists('unrovr_portfolio_page__post_content__image_audio_video'))
	{
		function unrovr_portfolio_page__post_content__image_audio_video($format)
		{
			$url          = "";
			$iframe_class = "";
			
			if ($format == 'image')
			{
				$url = get_the_post_thumbnail_url(null, 'full');
			}
			elseif ($format == 'audio')
			{
				$url          = unrovr_youtube_vimeo_soundcloud_iframe($return_iframe_url = true); // Get iframe url from browser address for SoundCloud.
				$iframe_class = 'mfp-iframe';
			}
			elseif ($format == 'video')
			{
				$url          = unrovr_featured_media__url(); // Use browser address url directly for YouTube/Vimeo.
				$iframe_class = 'mfp-iframe';
			}
			
			?>
				<a class="lightbox <?php echo esc_attr($iframe_class); ?>" <?php echo unrovr_feat_img_caption(); ?> href="<?php echo esc_url($url); ?>"></a>
			<?php
		}
	}
	
	
	if (! function_exists('unrovr_portfolio_page__post_content__link'))
	{
		function unrovr_portfolio_page__post_content__link()
		{
			$url     = unrovr_featured_media__url();
			$new_tab = unrovr_featured_media__url($return_new_tab = true);
			
			?>
				<a <?php if ($new_tab) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($url); ?>"></a>
			<?php
		}
	}
	
	
	if (! function_exists('unrovr_portfolio_page__post_content'))
	{
		function unrovr_portfolio_page__post_content()
		{
			$format = get_post_format();
			
			if (($format == 'image') || ($format == 'audio') || ($format == 'video'))
			{
				unrovr_portfolio_page__post_content__image_audio_video($format);
			}
			elseif ($format == 'gallery')
			{
				unrovr_portfolio_page__post_content__gallery();
			}
			elseif ($format == 'link')
			{
				unrovr_portfolio_page__post_content__link();
			}
			else
			{
				unrovr_portfolio_page__post_content__standard();
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_portfolio_post__short_description'))
	{
		function unrovr_portfolio_post__short_description()
		{
			if (has_excerpt())
			{
				?>
					<p class="category">
						<?php
							echo get_the_excerpt();
						?>
					</p> <!-- .category -->
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_single_portfolio__featured_image'))
	{
		function unrovr_single_portfolio__featured_image()
		{
			if (has_post_thumbnail())
			{
				?>
					<p>
						<?php
							the_post_thumbnail('full');
						?>
					</p>
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_single_portfolio__format_content__image'))
	{
		function unrovr_single_portfolio__format_content__image()
		{
			unrovr_portfolio_post__short_description();
			unrovr_single_portfolio__featured_image();
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__format_content__gallery'))
	{
		function unrovr_single_portfolio__format_content__gallery()
		{
			unrovr_portfolio_post__short_description();
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__format_content__audio'))
	{
		function unrovr_single_portfolio__format_content__audio()
		{
			echo unrovr_youtube_vimeo_soundcloud_iframe();
			unrovr_portfolio_post__short_description();
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__format_content__video'))
	{
		function unrovr_single_portfolio__format_content__video()
		{
			echo unrovr_youtube_vimeo_soundcloud_iframe();
			unrovr_portfolio_post__short_description();
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__format_content__link'))
	{
		function unrovr_single_portfolio__format_content__link()
		{
			$url = unrovr_featured_media__url();
			
			if (! empty($url))
			{
				$new_tab = unrovr_featured_media__url($return_new_tab = true);
				
				?>
					<p>
						<a class="button" <?php if ($new_tab) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($url); ?>">
							<?php
								esc_html_e('Go To Link', 'unrovr');
							?>
						</a>
					</p>
				<?php
			}
			
			unrovr_portfolio_post__short_description();
			unrovr_single_portfolio__featured_image();
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__format_content'))
	{
		function unrovr_single_portfolio__format_content()
		{
			$format = get_post_format();
			
			if ($format == 'image')
			{
				unrovr_single_portfolio__format_content__image();
			}
			elseif ($format == 'gallery')
			{
				unrovr_single_portfolio__format_content__gallery();
			}
			elseif ($format == 'audio')
			{
				unrovr_single_portfolio__format_content__audio();
			}
			elseif ($format == 'video')
			{
				unrovr_single_portfolio__format_content__video();
			}
			elseif ($format == 'link')
			{
				unrovr_single_portfolio__format_content__link();
			}
		}
	}


/* ============================================================================================================================================= */


	function unrovr_core_portfolio_details__description()
	{
		if (function_exists('pixelwars_core_portfolio_details__description'))
		{
			return pixelwars_core_portfolio_details__description();
		}
	}
	
	
	function unrovr_core_portfolio_details__client()
	{
		if (function_exists('pixelwars_core_portfolio_details__client'))
		{
			return pixelwars_core_portfolio_details__client();
		}
	}
	
	
	function unrovr_core_portfolio_details__date()
	{
		if (function_exists('pixelwars_core_portfolio_details__date'))
		{
			return pixelwars_core_portfolio_details__date();
		}
	}
	
	
	function unrovr_core_portfolio_details__services()
	{
		if (function_exists('pixelwars_core_portfolio_details__services'))
		{
			return pixelwars_core_portfolio_details__services();
		}
	}
	
	
	function unrovr_core_portfolio_details__launch_project_url()
	{
		if (function_exists('pixelwars_core_portfolio_details__launch_project_url'))
		{
			return pixelwars_core_portfolio_details__launch_project_url();
		}
	}
	
	
	function unrovr_core_portfolio_details__display_location()
	{
		if (function_exists('pixelwars_core_portfolio_details__display_location'))
		{
			return pixelwars_core_portfolio_details__display_location();
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_single_portfolio__details_html'))
	{
		function unrovr_single_portfolio__details_html()
		{
			$unrovr_portfolio_details__description        = unrovr_core_portfolio_details__description();
			$unrovr_portfolio_details__client             = unrovr_core_portfolio_details__client();
			$unrovr_portfolio_details__date               = unrovr_core_portfolio_details__date();
			$unrovr_portfolio_details__services           = unrovr_core_portfolio_details__services();
			$unrovr_portfolio_details__launch_project_url = unrovr_core_portfolio_details__launch_project_url();
			
			if ((! empty($unrovr_portfolio_details__description)) || 
				(! empty($unrovr_portfolio_details__client)) || 
				(! empty($unrovr_portfolio_details__date)) || 
				(! empty($unrovr_portfolio_details__services)) || 
				(! empty($unrovr_portfolio_details__launch_project_url)))
			{
				?>
					<div class="portfolio-desc">
						<?php
							if (! empty($unrovr_portfolio_details__description))
							{
								?>
									<p>
										<?php
											echo esc_html($unrovr_portfolio_details__description);
										?>
									</p>
								<?php
							}
						?>
						<?php
							if ((! empty($unrovr_portfolio_details__client)) || (! empty($unrovr_portfolio_details__date)) || (! empty($unrovr_portfolio_details__services)))
							{
								?>
									<div class="portfolio-meta">
										<?php
											if (! empty($unrovr_portfolio_details__client))
											{
												?>
													<strong><?php esc_html_e('Client:', 'unrovr'); ?></strong> <?php echo esc_html($unrovr_portfolio_details__client); ?>
												<?php
											}
										?>
										<?php
											if (! empty($unrovr_portfolio_details__date))
											{
												?>
													<strong><?php esc_html_e('Date:', 'unrovr'); ?></strong> <?php echo esc_html($unrovr_portfolio_details__date); ?>
												<?php
											}
										?>
										<?php
											if (! empty($unrovr_portfolio_details__services))
											{
												?>
													<strong><?php esc_html_e('Services:', 'unrovr'); ?></strong> <?php echo esc_html($unrovr_portfolio_details__services); ?>
												<?php
											}
										?>
									</div> <!-- .portfolio-meta -->
								<?php
							}
						?>
						<?php
							if (! empty($unrovr_portfolio_details__launch_project_url))
							{
								?>
									<p>
										<a class="button primary" target="_blank" href="<?php echo esc_url($unrovr_portfolio_details__launch_project_url); ?>">
											<?php
												esc_html_e('Launch Project', 'unrovr');
											?>
										</a>
									</p>
								<?php
							}
						?>
					</div> <!-- .portfolio-desc -->
				<?php
			}
		}
	}
	
	
	if (! function_exists('unrovr_single_portfolio__details'))
	{
		function unrovr_single_portfolio__details($display_location = 'top')
		{
			$portfolio_details__display_location = unrovr_core_portfolio_details__display_location();
			
			if ($portfolio_details__display_location == $display_location)
			{
				unrovr_single_portfolio__details_html();
			}
		}
	}


/* ============================================================================================================================================= */


	function unrovr_get_search_form($form)
	{
		$form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
					<label>
						<span class="screen-reader-text">' . esc_html__('Search for:', 'unrovr') . '</span>
						<input type="search" class="search-field" placeholder="' . esc_attr__('Enter Keyword', 'unrovr') . '" value="' . get_search_query() . '" name="s" />
					</label>
					<input type="submit" class="search-submit" value="'. esc_attr__('Search', 'unrovr') .'" />
				</form>';
		
		return $form;
	}
	
	add_filter('get_search_form', 'unrovr_get_search_form');


/* ============================================================================================================================================= */


	if (! function_exists('unrovr_excerpt_class'))
	{
		function unrovr_excerpt_class()
		{
			$excerpt_class = "";
			
			if (has_excerpt())
			{
				$excerpt_class = 'excerpt';
			}
			else
			{
				$automatic_excerpt = get_theme_mod('unrovr_setting_automatic_excerpt', 'yes_standard'); // Values: yes_standard, yes_all, no.
				
				if ($automatic_excerpt == 'no')
				{
					$excerpt_class = "";
				}
				elseif ($automatic_excerpt == 'yes_all')
				{
					$excerpt_class = 'excerpt';
				}
				else // yes_standard
				{
					$post_format = get_post_format();
					
					if ($post_format == false) // Standard post.
					{
						$excerpt_class = 'excerpt';
					}
					else
					{
						$excerpt_class = "";
					}
				}
			}
			
			echo esc_attr($excerpt_class);
		}
	}


/* ============================================================================================================================================= */


	function unrovr_home_button_new_tab()
	{
		$new_tab = get_theme_mod('unrovr_setting_home_button_new_tab', "");
		
		if ($new_tab)
		{
			$new_tab = 'target="_blank"';
		}
		else
		{
			$new_tab = "";
		}
		
		return $new_tab;
	}


/* ============================================================================================================================================= */


	function unrovr_tinyplugin_register($plugin_array)
	{
		$url = get_template_directory_uri() . '/admin/shortcode-generator.js';
		$plugin_array['tinyplugin'] = $url;
		
		return $plugin_array;
	}
	
	function unrovr_tinyplugin_add_button($buttons)
	{
		array_push($buttons, 'separator', 'tinyplugin');
		
		return $buttons;
	}
	
	add_filter('mce_external_plugins', 'unrovr_tinyplugin_register');
	add_filter('mce_buttons', 'unrovr_tinyplugin_add_button', 0);


/* ============================================================================================================================================= */


	include_once(get_template_directory() . '/admin/posts-columns.php');
	include_once(get_template_directory() . '/admin/navigation-menu.php');
	include_once(get_template_directory() . '/admin/sidebar.php');
	include_once(get_template_directory() . '/admin/archive-title.php');
	include_once(get_template_directory() . '/admin/automatic-excerpt.php');
	include_once(get_template_directory() . '/admin/post-gallery.php');
	include_once(get_template_directory() . '/admin/post-meta.php');
	include_once(get_template_directory() . '/admin/post-tags.php');
	include_once(get_template_directory() . '/admin/related-posts.php');
	include_once(get_template_directory() . '/admin/content-none.php');
	include_once(get_template_directory() . '/admin/navigation-archive.php');
	include_once(get_template_directory() . '/admin/navigation-single.php');
	include_once(get_template_directory() . '/admin/customizer.php');
	include_once(get_template_directory() . '/admin/install-plugins.php');
	include_once(get_template_directory() . '/admin/demo-import.php');

?>