<?php

	function pixelwars_core_shortcodes_enqueue_css()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // http://www.example.com/wp-content/plugins/my-plugin/
		
		wp_enqueue_style('fontello', $plugin_directory_url . 'css/fonts/fontello/css/fontello.css', null, null);
		wp_enqueue_style('pixelwars-core-shortcodes', $plugin_directory_url . 'css/shortcodes.css', array('fontello'), null);
	}
	
	add_action('wp_enqueue_scripts', 'pixelwars_core_shortcodes_enqueue_css', 10);
	
	
	function pixelwars_core_shortcodes_enqueue_js()
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // http://www.example.com/wp-content/plugins/my-plugin/
		
		wp_enqueue_script('jqueryvalidation', $plugin_directory_url . 'js/jquery-validation/jquery.validate.min.js', array('jquery'), null, true);
		wp_enqueue_script('pixelwars-core-shortcodes', $plugin_directory_url . 'js/shortcodes.js', array('jquery', 'jqueryvalidation'), null, true);
	}
	
	add_action('wp_enqueue_scripts', 'pixelwars_core_shortcodes_enqueue_js', 15);


/* ============================================================================================================================================= */


	add_filter('the_excerpt', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode');
	add_filter('category_description', 'do_shortcode');


/* ============================================================================================================================================= */


	function row( $atts, $content = "" )
	{
		$output = '<div class="row">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'row', 'row' );


/* ============================================================================================================================================= */


	function column( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width'    => "",
										'width_xs' => "",
										'width_md' => "",
										'width_lg' => "" ), $atts ) );
		
		if ( $width != "" )
		{
			$width = 'col-sm-' . $width;
		}
		
		if ( $width_xs != "" )
		{
			$width_xs = 'col-xs-' . $width_xs;
		}
		
		if ( $width_md != "" )
		{
			$width_md = 'col-md-' . $width_md;
		}
		
		if ( $width_lg != "" )
		{
			$width_lg = 'col-lg-' . $width_lg;
		}
		
		$output = '<div class="' . $width . ' ' . $width_xs . ' ' . $width_md . ' ' . $width_lg . '">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'column', 'column' );


/* ============================================================================================================================================= */


	function alert( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "" ), $atts ) );
		
		$output = '<div class="alert ' . $type . '">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'alert', 'alert' );


/* ============================================================================================================================================= */


	function button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text'      => "",
										'url'       => "",
										'new_tab'   => "",
										'size'      => "",
										'icon'      => "" ), $atts ) );
		
		if ( $new_tab == 'yes' )
		{
			$new_tab = 'target="_blank"';
		}
		
		if ( $icon != "" )
		{
			$icon = '<i class="pw-icon-' . $icon . '"></i>';
		}
		
		$output = '<a ' . $new_tab . ' href="' . $url . '" class="button ' . $size . '">' . $icon . $text . '</a>';
		
		return $output;
	}
	
	add_shortcode( 'button', 'button' );


/* ============================================================================================================================================= */


	function social_icon( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type'     => "",
										'same_tab' => "",
										'url'      => "" ), $atts ) );
		
		if ( $same_tab == 'yes' )
		{
			$output = '<a class="social-link ' . $type . '" href="' . $url . '"></a>';
		}
		else
		{
			$output = '<a target="_blank" class="social-link ' . $type . '" href="' . $url . '"></a>';
		}
		
		return $output;
	}
	
	add_shortcode( 'social_icon', 'social_icon' );


/* ============================================================================================================================================= */


	function toggle_wrap( $atts, $content = "" )
	{
		$output = '<div class="toggle-group">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'toggle_wrap', 'toggle_wrap' );


/* ============================================================================================================================================= */


	function toggle( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		$output = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		return $output;
	}
	
	add_shortcode( 'toggle', 'toggle' );


/* ============================================================================================================================================= */


	function accordion_wrap( $atts, $content = "" )
	{
		$output = '<div class="toggle-group accordion">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'accordion_wrap', 'accordion_wrap' );


/* ============================================================================================================================================= */


	function accordion( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "" ), $atts ) );
		
		$output = '<div class="toggle"><h4>' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		return $output;
	}
	
	add_shortcode( 'accordion', 'accordion' );


/* ============================================================================================================================================= */


	function tab_wrap( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'titles' => "",
										'active' => "" ), $atts ) );
		
		$titles_with_commas = $titles;
		$titles_with_markup = "";
		
		if ( $titles_with_commas != "" )
		{
			$titles_array = preg_split("/[\s]*[,][\s]*/", $titles_with_commas);
			
			foreach ( $titles_array as $title_name )
			{
				if ( $active == $title_name )
				{
					$titles_with_markup .= '<li><a class="active">' . $title_name . '</a></li>';
				}
				else
				{
					$titles_with_markup .= '<li><a>' . $title_name . '</a></li>';
				}
			}
		}
		
		$output = '<div class="tabs"><ul class="tab-titles">' . $titles_with_markup . '</ul><div class="tab-content">' . do_shortcode( $content ) . '</div></div>';
		
		return $output;
	}
	
	add_shortcode( 'tab_wrap', 'tab_wrap' );


/* ============================================================================================================================================= */


	function tab( $atts, $content = "" )
	{
		$output = '<div>' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'tab', 'tab' );


/* ============================================================================================================================================= */


	function contact_form($atts, $content = "")
	{
		extract(
			shortcode_atts(
				array(
					'to'      => "",
					'subject' => "",
					'captcha' => ""
				),
				$atts
			)
		);
		
		$to = trim($to);
		update_option('pixelwars_core_contact_form_to', $to);
		
		$captcha_html = '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="captcha" name="captcha" value="no"></p>';
		
		if ($captcha == 'yes')
		{
			$random1 = rand(1, 5);
			$random2 = rand(1, 5);
			$sum_random = $random1 + $random2;
			
			$captcha_html  = '<p>';
			$captcha_html .= '<input type="hidden" id="captcha" name="captcha" value="yes">';
			$captcha_html .= '<label for="sum_user">' . $random1 . ' + ' . $random2 . ' = ?</label>';
			$captcha_html .= '<input type="text" id="sum_user" name="sum_user" class="required" placeholder="' . esc_html__('What is the sum?', 'pixelwars-core') . '">';
			$captcha_html .= '<input type="hidden" id="sum_random" name="sum_random" value="' . $sum_random . '">';
			$captcha_html .= '</p>';
		}
		
		$site_url = strtolower($_SERVER['SERVER_NAME']);
		
		if ( substr( $site_url, 0, 4 ) == 'www.' )
		{
			$site_url = substr( $site_url, 4 );
		}
		
		$plugin_directory_url = plugin_dir_url(__FILE__); // http://example.com/wp-content/plugins/my-plugin/
		$sender_domain = 'server@' . $site_url;
		
		$output  = '<div class="contact-form">';
		$output .= '<form id="contact-form" class="validate-form" method="post" action="' . $plugin_directory_url . 'send-mail.php">';
		$output .= '<p><label for="name">' . esc_html__('NAME', 'pixelwars-core') . '</label><input type="text" id="name" name="name" class="required"></p>';
		$output .= '<p><label for="email">' . esc_html__('EMAIL', 'pixelwars-core') . '</label><input type="text" id="email" name="email" class="required email"></p>';
		$output .= '<p><label for="message">' . esc_html__('MESSAGE', 'pixelwars-core') . '</label><textarea id="message" name="message" class="required"></textarea></p>';
		$output .= $captcha_html;
		$output .= '<p><button class="submit button"><span class="submit-label">' . esc_html__('Submit', 'pixelwars-core') . '</span><span class="submit-status"></span></button></p>';
		$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="sender_domain" name="sender_domain" value="' . $sender_domain . '"></p>';
		$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="subject" name="subject" value="' . esc_attr($subject) . '"></p>';
		$output .= '</form>';
		$output .= '</div>';
		
		return $output;
	}
	
	add_shortcode('contact_form', 'contact_form');


/* ============================================================================================================================================= */


	function quote( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'name'  => "",
										'align' => "" ), $atts ) );
		
		$output = '<blockquote class="' . $align . '">' . do_shortcode( $content ) . '<cite>' . $name . '</cite></blockquote>';
		
		return $output;
	}
	
	add_shortcode( 'quote', 'quote' );


/* ============================================================================================================================================= */


	function drop_cap( $atts, $content = "" )
	{
		$output = '<p class="drop-cap">' . do_shortcode( $content ) . '</p>';
		
		return $output;
	}
	
	add_shortcode( 'drop_cap', 'drop_cap' );


/* ============================================================================================================================================= */


	function timeline( $atts, $content = "" )
	{
		$output = '<div class="timeline">' . do_shortcode( $content ) . '</div>';
		
		return $output;
	}
	
	add_shortcode( 'timeline', 'timeline' );


/* ============================================================================================================================================= */


	function event_group_title( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'icon' => "",
										'text' => "" ), $atts ) );
		
		$output = '<div class="event"><h2>' . $text . '</h2><i class="pw-icon-' . $icon . '"></i></div>';
		
		return $output;
	}
	
	add_shortcode( 'event_group_title', 'event_group_title' );


/* ============================================================================================================================================= */


	function event( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'current' => "",
										'date' => "",
										'title' => "",
										'sub_title' => "" ), $atts ) );
		
		$output = '<div class="event ' . $current . '"><h6>' . $date . '<h6><h4>' . $title . '</h4><h5>' . $sub_title . '</h5><p>' . do_shortcode( $content ) . '</p></div>';
		
		return $output;
	}
	
	add_shortcode( 'event', 'event' );


/* ============================================================================================================================================= */


	function skill( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title'   => "",
										'percent' => "" ), $atts ) );
		
		$output = '<div class="skill-unit"><h4>' . $title . '</h4><div class="bar" data-percent="' . $percent . '"><div class="progress"></div></div></div>';
		
		return $output;
	}
	
	add_shortcode( 'skill', 'skill' );


/* ============================================================================================================================================= */


	function testimonial( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'image'     => "",
										'title'     => "",
										'sub_title' => "" ), $atts ) );
		
		$output = '<div class="testo"><img alt="" src="' . $image . '"><h4>' . $title . '<span>' . $sub_title . '</span></h4><p>' . do_shortcode( $content ) . '</p></div>';
		
		return $output;
	}
	
	add_shortcode( 'testimonial', 'testimonial' );


/* ============================================================================================================================================= */


	function section_title($atts, $content = "")
	{
		$output = '<h3 class="section-title widget-title">';
		$output .= '<span>';
		$output .= do_shortcode($content);
		$output .= '</span>';
		$output .= '</h3>';
		
		return $output;
	}
	
	add_shortcode('section_title', 'section_title');


/* ============================================================================================================================================= */


	function fun_fact($atts, $content = "")
	{
		$output = '<div class="fun-fact">' . do_shortcode($content) . '</div>';
		
		return $output;
	}
	
	add_shortcode('fun_fact', 'fun_fact');


/* ============================================================================================================================================= */


	function service($atts, $content = "")
	{
		$output = '<div class="service">' . do_shortcode($content) . '</div>';
		
		return $output;
	}
	
	add_shortcode('service', 'service');


/* ============================================================================================================================================= */


	function pixelwars_core_theme_run_shortcode($content)
	{
		global $shortcode_tags;
		
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		
		remove_all_shortcodes();
		
		add_shortcode('row', 'row');
		add_shortcode('column', 'column');
		add_shortcode('button', 'button');
		add_shortcode('social_icon', 'social_icon');
		add_shortcode('contact_form', 'contact_form');
		add_shortcode('alert', 'alert');
		add_shortcode('tab_wrap', 'tab_wrap');
		add_shortcode('tab', 'tab');
		add_shortcode('accordion_wrap', 'accordion_wrap');
		add_shortcode('accordion', 'accordion');
		add_shortcode('toggle_wrap', 'toggle_wrap');
		add_shortcode('toggle', 'toggle');
		add_shortcode('quote', 'quote');
		add_shortcode('drop_cap', 'drop_cap');
		add_shortcode('timeline', 'timeline');
		add_shortcode('event_group_title', 'event_group_title');
		add_shortcode('event', 'event');
		add_shortcode('skill', 'skill');
		add_shortcode('testimonial', 'testimonial');
		add_shortcode('section_title', 'section_title');
		add_shortcode('fun_fact', 'fun_fact');
		add_shortcode('service', 'service');
		
		// Do the shortcode (only the one above is registered)
		$content = do_shortcode($content);
		
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		
		return $content;
	}
	
	add_filter('the_content', 'pixelwars_core_theme_run_shortcode', 7);

?>