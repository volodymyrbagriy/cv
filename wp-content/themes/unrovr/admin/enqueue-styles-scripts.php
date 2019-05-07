<?php

	function unrovr_font_subsets()
	{
		$font_subset    = "";
		$extra_char_set = false;
		
		if (get_theme_mod('unrovr_setting_font_char_sets_latin', false)) { $font_subset .= 'latin,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_latin_ext', false)) { $font_subset .= 'latin-ext,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_cyrillic', false)) { $font_subset .= 'cyrillic,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_cyrillic_ext', false)) { $font_subset .= 'cyrillic-ext,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_greek', false)) { $font_subset .= 'greek,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_greek_ext', false)) { $font_subset .= 'greek-ext,'; $extra_char_set = true; }
		if (get_theme_mod('unrovr_setting_font_char_sets_vietnamese', false)) { $font_subset .= 'vietnamese,'; $extra_char_set = true; }
		
		if ($extra_char_set == false) { $font_subset = ""; } else { $font_subset = substr($font_subset, 0, -1); }
		
		return $font_subset;
	}
	
	
	function unrovr_fonts_url($fonts = 'Poppins:300,400,500,600,700|Roboto:100,100italic,300,300italic,400,400italic,700,700italic')
	{
		$font_url = "";
		$subsets  = unrovr_font_subsets();
		
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		
		if ('off' !== _x('on', 'Google font: on or off', 'unrovr'))
		{
			$font_url = add_query_arg(
				array(
					'family' => urlencode($fonts),
					'subset' => urlencode($subsets)
				),
				'//fonts.googleapis.com/css'
			);
		}
		
		return $font_url;
	}


/* ============================================================================================================================================= */


	function unrovr_enqueue_scripts__theme_styles()
	{
		$theme_directory_url = get_template_directory_uri();
		
		wp_enqueue_style('unrovr-fonts', unrovr_fonts_url(), array(), null);
		wp_enqueue_style('normalize', $theme_directory_url . '/css/normalize.css', null, null);
		wp_enqueue_style('bootstrap', $theme_directory_url . '/css/bootstrap.min.css', null, null);
		wp_enqueue_style('nprogress', $theme_directory_url . '/js/nprogress/nprogress.css', null, null);
		wp_enqueue_style('magnific-popup', $theme_directory_url . '/js/jquery.magnific-popup/magnific-popup.css', null, null);
		wp_enqueue_style('fontello', $theme_directory_url . '/css/fonts/fontello/css/fontello.css', null, null);
		wp_enqueue_style('unrovr-layout', $theme_directory_url . '/css/layout.css', null, null);
		wp_enqueue_style('unrovr-main', $theme_directory_url . '/css/main.css', null, null);
		wp_enqueue_style('unrovr-768', $theme_directory_url . '/css/768.css', null, null);
		wp_enqueue_style('unrovr-style', get_stylesheet_uri(), null, null);
	}
	
	
	function unrovr_enqueue_scripts__theme_scripts()
	{
		$theme_directory_url = get_template_directory_uri();
		
		if (is_singular() && comments_open() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
		
		wp_enqueue_script('fastclick', $theme_directory_url . '/js/fastclick.js', array('jquery'), null, true);
		wp_enqueue_script('jquery.address', $theme_directory_url . '/js/jquery.address.js', array('jquery'), null, true);
		wp_enqueue_script('nprogress', $theme_directory_url . '/js/nprogress/nprogress.js', array('jquery'), null, true);
		wp_enqueue_script('isotope', $theme_directory_url . '/js/jquery.isotope.min.js', array('jquery'), null, true);
		wp_enqueue_script('imagesloaded', null, null, null, true);
		wp_enqueue_script('fitvids', $theme_directory_url . '/js/jquery.fitvids.js', array('jquery'), null, true);
		wp_enqueue_script('magnific-popup', $theme_directory_url . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', array('jquery'), null, true);
		wp_enqueue_script('easing', $theme_directory_url . '/js/jquery.easing.1.3.js', array('jquery'), null, true);
		wp_enqueue_script('validate', $theme_directory_url . '/js/jquery.validate.min.js', array('jquery'), null, true);
		
		$google_map_api_key = get_theme_mod('unrovr_setting_google_map_api_key', "");
		
		if (! empty($google_map_api_key))
		{
			wp_enqueue_script('unrovr-google-map', '//maps.googleapis.com/maps/api/js?key=' . esc_attr($google_map_api_key), null, null, true);
		}
		else
		{
			wp_enqueue_script('unrovr-google-map', '//maps.googleapis.com/maps/api/js?v=3.exp&amp;', null, null, true);
		}
		
		wp_enqueue_script('unrovr-main', $theme_directory_url . '/js/main.js', array('jquery'), null, true);
	}
	
	
	function unrovr_after_setup_theme__enqueue_scripts()
	{
		add_action('wp_enqueue_scripts', 'unrovr_enqueue_scripts__theme_styles');
		add_action('wp_enqueue_scripts', 'unrovr_enqueue_scripts__theme_scripts');
	}
	
	add_action('after_setup_theme', 'unrovr_after_setup_theme__enqueue_scripts');


/* ============================================================================================================================================= */


	function unrovr_enqueue_scripts__admin()
	{
		$theme_directory_url = get_template_directory_uri();
		
		wp_enqueue_style('unrovr-admin', $theme_directory_url . '/admin/css/admin.css');
		wp_enqueue_script('unrovr-admin', $theme_directory_url . '/admin/js/admin.js', array('jquery'), null, true);
	}
	
	add_action('admin_enqueue_scripts', 'unrovr_enqueue_scripts__admin');
	
	add_action('elementor/editor/before_enqueue_scripts', 'unrovr_enqueue_scripts__admin');


/* ============================================================================================================================================= */


	function unrovr_enqueue_scripts__customize_controls()
	{
		wp_enqueue_style('unrovr-customize-controls', get_template_directory_uri() . '/admin/css/customize-controls.css', null, null);
	}
	
	add_action('customize_controls_enqueue_scripts', 'unrovr_enqueue_scripts__customize_controls');
	
	
	function unrovr_enqueue_scripts__customize_preview()
	{
		wp_enqueue_script('unrovr-customize-preview', get_template_directory_uri() . '/admin/js/customize-preview.js', array('customize-preview'), null, true);
	}
	
	add_action('customize_preview_init', 'unrovr_enqueue_scripts__customize_preview');

?>