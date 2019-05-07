<?php

	function unrovr_enqueue__inline_style()
	{
		/* Custom Fonts */
		
		$font_styles 	   = ':400,700,400italic,700italic';
		$extra_font_styles = get_theme_mod('unrovr_setting_font_styles', 'Yes');
		
		if ($extra_font_styles != 'No')
		{
			$font_styles = ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		}
		
		
		// Fonts
		
		$unrovr_setting_font_1 = get_theme_mod('unrovr_setting_font_1');
		$unrovr_setting_font_2 = get_theme_mod('unrovr_setting_font_2');
		$unrovr_setting_font_3 = get_theme_mod('unrovr_setting_font_3');
		
		$fonts = array(
			$unrovr_setting_font_1,
			$unrovr_setting_font_2,
			$unrovr_setting_font_3
		);
		
		$fonts = array_unique($fonts);
		
		foreach ($fonts as $font)
		{
			if (! empty($font))
			{
				$font_lowercase = strtolower($font);
				$font_id        = str_replace(' ', '-', $font_lowercase); // Parameters: Old value, New value, String.
				wp_enqueue_style('unrovr-font-' . $font_id, unrovr_fonts_url($font . $font_styles), array(), null);
			}
		}
		
		
		/* Custom CSS */
        
		$custom_css = "";
		
		
		// Font Family
		
		if (! empty($unrovr_setting_font_1))
		{
			$custom_css .= "body, input, textarea, select { font-family: '{$unrovr_setting_font_1}'; }";
		}
		
		if (! empty($unrovr_setting_font_2))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title { font-family: '{$unrovr_setting_font_2}'; }";
		}
		
		if (! empty($unrovr_setting_font_3))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, .filters, .nav-menu, .card-nav, th, dt, .button, .catlinks a, input[type=submit], button, label, .tab-titles, a.more-link, blockquote { font-family: '{$unrovr_setting_font_3}'; }";
		}
        
		
		// Font Size
		
		$unrovr_setting_font_size_1 = get_theme_mod('unrovr_setting_font_size_1');
		
		if (! empty($unrovr_setting_font_size_1))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { font-size: {$unrovr_setting_font_size_1}px; }";
		}
        
		
		$unrovr_setting_font_size_2 = get_theme_mod('unrovr_setting_font_size_2');
		
		if (! empty($unrovr_setting_font_size_2))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 768px) { h1 { font-size: {$unrovr_setting_font_size_2}px; } }";
		}
        
		
		$unrovr_setting_font_size_3 = get_theme_mod('unrovr_setting_font_size_3');
		
		if (! empty($unrovr_setting_font_size_3))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit], input[type=button], button, .button { font-size: {$unrovr_setting_font_size_3}px; }";
		}
        
		
		$unrovr_setting_font_size_4 = get_theme_mod('unrovr_setting_font_size_4');
		
		if (! empty($unrovr_setting_font_size_4))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 768px) { .blog-regular .entry-title { font-size: {$unrovr_setting_font_size_4}px; } }";
		}
        
		
		$unrovr_setting_font_size_5 = get_theme_mod('unrovr_setting_font_size_5');
		
		if (! empty($unrovr_setting_font_size_5))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media only screen and (min-width: 992px) { .card-intro p { font-size: {$unrovr_setting_font_size_5}px; } }";
		}
        
		
		$unrovr_setting_font_size_6 = get_theme_mod('unrovr_setting_font_size_6');
		
		if (! empty($unrovr_setting_font_size_6))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-info h2 { font-size: {$unrovr_setting_font_size_6}px; }";
		}
        
		
		$unrovr_setting_font_size_7 = get_theme_mod('unrovr_setting_font_size_7');
		
		if (! empty($unrovr_setting_font_size_7))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 768px) { .media-grid h3 { font-size: {$unrovr_setting_font_size_7}px; } }";
		}
        
		
		// Font Weight
        
		$unrovr_setting_font_weight_1 = get_theme_mod('unrovr_setting_font_weight_1');
		
		if (! empty($unrovr_setting_font_weight_1))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title { font-weight: {$unrovr_setting_font_weight_1}; }";
		}
        
		
		$unrovr_setting_font_weight_2 = get_theme_mod('unrovr_setting_font_weight_2');
		
		if (! empty($unrovr_setting_font_weight_2))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit], input[type=button], button, .button { font-weight: {$unrovr_setting_font_weight_2}; }";
		}
        
		
		$unrovr_setting_font_weight_3 = get_theme_mod('unrovr_setting_font_weight_3');
		
		if (! empty($unrovr_setting_font_weight_3))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-intro h1, .site-title { font-weight: {$unrovr_setting_font_weight_3}; }";
		}
        
		
		$unrovr_setting_font_weight_4 = get_theme_mod('unrovr_setting_font_weight_4');
		
		if (! empty($unrovr_setting_font_weight_4))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-info h2 { font-weight: {$unrovr_setting_font_weight_4}; }";
		}
        
		
		$unrovr_setting_font_weight_5 = get_theme_mod('unrovr_setting_font_weight_5');
		
		if (! empty($unrovr_setting_font_weight_5))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".media-grid h3 { font-weight: {$unrovr_setting_font_weight_5}; }";
		}
        
		
		// Letter Spacing
		
		$unrovr_setting_letter_spacing_1 = get_theme_mod('unrovr_setting_letter_spacing_1');
		
		if ((! empty($unrovr_setting_letter_spacing_1)) || ($unrovr_setting_letter_spacing_1 === '0'))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit], input[type=button], button, .button { letter-spacing: {$unrovr_setting_letter_spacing_1}px; }";
		}
		
		
		$unrovr_setting_letter_spacing_2 = get_theme_mod('unrovr_setting_letter_spacing_2');
		
		if ((! empty($unrovr_setting_letter_spacing_2)) || ($unrovr_setting_letter_spacing_2 === '0'))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media only screen and (min-width: 992px) { .card-intro h1 { letter-spacing: {$unrovr_setting_letter_spacing_2}px; } }";
		}
		
		
		$unrovr_setting_letter_spacing_3 = get_theme_mod('unrovr_setting_letter_spacing_3');
		
		if ((! empty($unrovr_setting_letter_spacing_3)) || ($unrovr_setting_letter_spacing_3 === '0'))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-info h2 { letter-spacing: {$unrovr_setting_letter_spacing_3}px; }";
		}
		
		
		$unrovr_setting_letter_spacing_4 = get_theme_mod('unrovr_setting_letter_spacing_4');
		
		if ((! empty($unrovr_setting_letter_spacing_4)) || ($unrovr_setting_letter_spacing_4 === '0'))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".media-grid h3 { letter-spacing: {$unrovr_setting_letter_spacing_4}px; }";
		}
		
		
		// Color
		
		$unrovr_setting_color_1 = get_theme_mod('unrovr_setting_color_1');
		
		if (! empty($unrovr_setting_color_1))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { color: {$unrovr_setting_color_1}; }";
		}
		
		
		$unrovr_setting_color_2 = get_theme_mod('unrovr_setting_color_2');
		
		if (! empty($unrovr_setting_color_2))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-nav li.current_page_item a { color: {$unrovr_setting_color_2}; }";
		}
		
		
		$unrovr_setting_color_3 = get_theme_mod('unrovr_setting_color_3');
		
		if (! empty($unrovr_setting_color_3))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".pagination a:hover, .navigation a:hover, a.more-link:hover, .event:nth-of-type(2):after, .elementor-element:nth-of-type(2) .event:after, .portfolio-nav a:hover, .skill-unit .bar .progress, #nprogress .bar { background-color: {$unrovr_setting_color_3}; }";
			$custom_css .= PHP_EOL . PHP_EOL . ".bypostauthor > article, .event h3, input:not([type=submit]):not([type=button]):not([type=file]):not([type=radio]):not([type=checkbox]):focus, textarea:focus, input:focus, select:focus, .tabs .tab-titles li a.active { border-color: {$unrovr_setting_color_3}; }";
			$custom_css .= PHP_EOL . PHP_EOL . ".event h3, .entry-title a:hover { color: {$unrovr_setting_color_3}; }";
			$custom_css .= PHP_EOL . PHP_EOL . "#nprogress .spinner-icon { border-top-color: {$unrovr_setting_color_3}; border-left-color: {$unrovr_setting_color_3}; }";
		}
		
		
		$unrovr_setting_color_4 = get_theme_mod('unrovr_setting_color_4');
		
		if (! empty($unrovr_setting_color_4))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".section-title h2 i, .cat-links a, .filters li a:hover, .filters .current > a { box-shadow: inset 0 -6px 0px {$unrovr_setting_color_4}; }";
		}
		
		
		$unrovr_setting_color_5 = get_theme_mod('unrovr_setting_color_5');
		
		if (! empty($unrovr_setting_color_5))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit], input[type=button], button, .button { color: {$unrovr_setting_color_5}; border-color: {$unrovr_setting_color_5}; }";
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit]:hover, input[type=button]:hover, button:not(.button):hover, .button:after { background: {$unrovr_setting_color_5}; }";
		}
		
		
		$unrovr_setting_color_6 = get_theme_mod('unrovr_setting_color_6');
		
		if (! empty($unrovr_setting_color_6))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".button.secondary { color: {$unrovr_setting_color_6}; border-color: {$unrovr_setting_color_6}; }";
			$custom_css .= PHP_EOL . PHP_EOL . ".button.secondary:after { background: {$unrovr_setting_color_6}; }";
		}
		
		
		$unrovr_setting_color_7 = get_theme_mod('unrovr_setting_color_7');
		
		if (! empty($unrovr_setting_color_7))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-intro h1 { color: {$unrovr_setting_color_7}; }";
		}
		
		
		$unrovr_setting_color_8 = get_theme_mod('unrovr_setting_color_8');
		
		if (! empty($unrovr_setting_color_8))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-info h2 { background: {$unrovr_setting_color_8}; }";
		}
		
		
		$unrovr_setting_color_9 = get_theme_mod('unrovr_setting_color_9');
		
		if (! empty($unrovr_setting_color_9))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".card-info h2 { color: {$unrovr_setting_color_9}; }";
		}
		
		
		$unrovr_setting_color_10 = get_theme_mod('unrovr_setting_color_10');
		
		if (! empty($unrovr_setting_color_10))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".cover:after, .card-3d-right-side:after, .card-3d-bottom-side:after, .header:before { background: {$unrovr_setting_color_10}; }";
		}
		
		
		$unrovr_setting_color_11 = get_theme_mod('unrovr_setting_color_11');
		
		if (! empty($unrovr_setting_color_11))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a { color: {$unrovr_setting_color_11}; }";
		}
		
		
		$unrovr_setting_color_12 = get_theme_mod('unrovr_setting_color_12');
		
		if (! empty($unrovr_setting_color_12))
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a:hover { color: {$unrovr_setting_color_12}; }";
		}
		
		
		// Other
		
		$unrovr_setting_card_image_mask_opacity = get_theme_mod('unrovr_setting_card_image_mask_opacity');
		
		if (! empty($unrovr_setting_card_image_mask_opacity))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".cover:after, .card-3d-right-side:after, .card-3d-bottom-side:after, .header:before { opacity: {$unrovr_setting_card_image_mask_opacity}; }";
		}
		
		
		$unrovr_setting_grid_title_text_transform = get_theme_mod('unrovr_setting_grid_title_text_transform');
		
		if (! empty($unrovr_setting_grid_title_text_transform))
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".media-grid h3 { text-transform: {$unrovr_setting_grid_title_text_transform}; }";
		}
		
		
		$custom_css = trim($custom_css);
		
        wp_add_inline_style('unrovr-style', $custom_css);
	}
	
	
	function unrovr_after_setup_theme__inline_style()
	{
		add_action('wp_enqueue_scripts', 'unrovr_enqueue__inline_style');
	}
	
	add_action('after_setup_theme', 'unrovr_after_setup_theme__inline_style');

?>