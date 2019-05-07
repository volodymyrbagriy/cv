<?php

	function unrovr_customize_register__settings($wp_customize)
	{
		$wp_customize->get_setting('blogname')->transport 		 = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'title_tagline',
			$id                = 'unrovr_setting_header_bg_img',
			$label             = esc_html__('Header Background Image', 'unrovr'),
			$description       = esc_html__('Upload an image or choose from your media library.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'image',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_color_1',
			$label             = esc_html__('Body Text Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#334455',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_color_11',
			$label             = esc_html__('Link Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#4ece99',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_color_12',
			$label             = esc_html__('Link Hover Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#399670',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_color_3',
			$label             = esc_html__('Primary Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#4ece99',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_color_4',
			$label             = esc_html__('Section Title Underline Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#fdf854',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_1',
			$label             = esc_html__('Body Font', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = 'Roboto',
			$choices           = unrovr_fonts(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_size_1',
			$label             = esc_html__('Body Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'number',
			$default           = '14',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 10,
				'max'  => 30,
				'step' => 1
			)
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_2',
			$label             = esc_html__('Headings Font', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = 'Poppins',
			$choices           = unrovr_fonts(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_size_2',
			$label             = esc_html__('Headings Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'number',
			$default           = '42',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 10,
				'max'  => 100,
				'step' => 2
			)
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_weight_1',
			$label             = esc_html__('Headings Font Weight', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = '600',
			$choices           = unrovr_font_weights(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_3',
			$label             = esc_html__('Sub Headings Font', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = 'Roboto',
			$choices           = unrovr_fonts(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_styles',
			$label             = esc_html__('Include All Font Weights (100-900)', 'unrovr'),
			$description       = esc_html__('Bold/italic styles.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'Yes',
			$choices           = array(
				'Yes' => esc_html__('Yes', 'unrovr'),
				'No'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_character_sets',
			$label             = esc_html__('Font Character Sets', 'unrovr'),
			$description       = esc_html__('Some fonts support all character sets.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'hidden',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_latin',
			$label             = esc_html__('Latin Characters', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 1,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_latin_ext',
			$label             = esc_html__('Latin Characters (extended)', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_cyrillic',
			$label             = esc_html__('Cyrillic Characters', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_cyrillic_ext',
			$label             = esc_html__('Cyrillic Characters (extended)', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_greek',
			$label             = esc_html__('Greek Characters', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_greek_ext',
			$label             = esc_html__('Greek Characters (extended)', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_font_char_sets_vietnamese',
			$label             = esc_html__('Vietnamese Characters', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_sound_effects',
			$label             = esc_html__('Sound Effects', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes',
			$choices           = array(
				'yes' => esc_html__('Yes', 'unrovr'),
				'no'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_classic_nav_menu',
			$label             = esc_html__('Classic Navigation Menu', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes_all',
			$choices           = array(
				'yes_all'  => esc_html__('Yes - For all pages', 'unrovr'),
				'yes_home' => esc_html__('Yes - Only for homepage', 'unrovr'),
				'no'       => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_mobile_zoom',
			$label             = esc_html__('Mobile Zoom', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'no',
			$choices           = array(
				'no'  => esc_html__('No', 'unrovr'),
				'yes' => esc_html__('Yes', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_ajax',
			$label             = esc_html__('Ajax', 'unrovr'),
			$description       = esc_html__('Ajax functionality for portfolio posts.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes',
			$choices           = array(
				'yes' => esc_html__('Yes', 'unrovr'),
				'no'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_general',
			$id                = 'unrovr_setting_google_map_api_key',
			$label             = esc_html__('Google Map API Key', 'unrovr'),
			$description       = esc_html__('Get an API key', 'unrovr') . ' ' . '<a target="_blank" href="//developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">' . esc_html__('here', 'unrovr') . '</a>.',
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'text',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_blog',
			$id                = 'unrovr_setting_font_size_4',
			$label             = esc_html__('Blog List Title Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'number',
			$default           = '34',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 10,
				'max'  => 120,
				'step' => 2
			)
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_blog',
			$id                = 'unrovr_setting_automatic_excerpt',
			$label             = esc_html__('Automatic Excerpt', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes_standard',
			$choices           = array(
				'yes_standard' => esc_html__('Yes - Only for standard format', 'unrovr'),
				'yes_all'      => esc_html__('Yes - For all post formats', 'unrovr'),
				'no'           => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_blog',
			$id                = 'unrovr_setting_blog_navigation',
			$label             = esc_html__('Blog Navigation', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'older_newer',
			$choices           = array(
				'older_newer' => esc_html__('Older/Newer Links', 'unrovr'),
				'numbered'    => esc_html__('Numbered Pagination', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_blog',
			$id                = 'unrovr_setting_back_to_blog_link_behaviour',
			$label             = esc_html__('Back To Blog', 'unrovr'),
			$description       = esc_html__('Link behaviour.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'to_regular_blog',
			$choices           = array(
				'to_regular_blog' => esc_html__('To Regular Blog', 'unrovr'),
				'to_grid_blog'    => esc_html__('To Grid Blog', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_post',
			$id                = 'unrovr_setting_related_posts',
			$label             = esc_html__('Related Posts', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes',
			$choices           = array(
				'yes' => esc_html__('Yes', 'unrovr'),
				'no'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_sidebar',
			$id                = 'unrovr_setting_sidebar_blog',
			$label             = esc_html__('Blog Sidebar', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes',
			$choices           = array(
				'yes' => esc_html__('Yes', 'unrovr'),
				'no'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_sidebar',
			$id                = 'unrovr_setting_sidebar_post',
			$label             = esc_html__('Post Sidebar', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'select',
			$default           = 'yes',
			$choices           = array(
				'yes' => esc_html__('Yes', 'unrovr'),
				'no'  => esc_html__('No', 'unrovr')
			),
			$input_attrs       = array()
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_buttons',
			$id                = 'unrovr_setting_color_5',
			$label             = esc_html__('Primary Button Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#334455',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_buttons',
			$id                = 'unrovr_setting_color_6',
			$label             = esc_html__('Secondary Button Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#334455',
			$choices           = array(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_buttons',
			$id                = 'unrovr_setting_font_size_3',
			$label             = esc_html__('Buttons Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'number',
			$default           = '11',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 9,
				'max'  => 20,
				'step' => 1
			)
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_buttons',
			$id                = 'unrovr_setting_font_weight_2',
			$label             = esc_html__('Buttons Font Weight', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = '700',
			$choices           = unrovr_font_weights(),
			$input_attrs       = array()
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'unrovr_section_buttons',
			$id                = 'unrovr_setting_letter_spacing_1',
			$label             = esc_html__('Buttons Letter Spacing', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '1',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1
			)
		);
		
		
		/* ================================================== */
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_card_image',
			$label             = esc_html__('Card Image', 'unrovr'),
			$description       = esc_html__('Upload an image or choose from your media library.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'image',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_color_10',
			$label             = esc_html__('Card Image Mask Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#0d3d6d',
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_card_image_mask_opacity',
			$label             = esc_html__('Card Image Mask Opacity', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '0.2',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 0,
				'max'  => 1,
				'step' => 0.1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_home_description',
			$label             = esc_html__('Description', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'textarea',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_home_button_text',
			$label             = esc_html__('"Download CV" Button Text', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'text',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_home_button_url',
			$label             = esc_html__('"Download CV" Button URL', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'url',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array(
				'placeholder' => 'http://'
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_home_button_new_tab',
			$label             = esc_html__('"Download CV" Button New Tab', 'unrovr'),
			$description       = esc_html__('Open in new tab.', 'unrovr'),
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'refresh',
			$type              = 'checkbox',
			$default           = 0,
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_color_7',
			$label             = esc_html__('Intro Title Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = "",
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_weight_3',
			$label             = esc_html__('Intro Title Font Weight', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = '700',
			$choices           = unrovr_font_weights(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_letter_spacing_2',
			$label             = esc_html__('Intro Title Letter Spacing', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '-5',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => -10,
				'max'  => 10,
				'step' => 1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_size_5',
			$label             = esc_html__('Intro Text Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '25',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 10,
				'max'  => 36,
				'step' => 1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_color_8',
			$label             = esc_html__('Card Title Background Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#1755cf',
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_color_9',
			$label             = esc_html__('Card Title Text Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#ffffff',
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_size_6',
			$label             = esc_html__('Card Title Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '11',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 9,
				'max'  => 36,
				'step' => 1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_weight_4',
			$label             = esc_html__('Card Title Font Weight', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = '400',
			$choices           = unrovr_font_weights(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_letter_spacing_3',
			$label             = esc_html__('Card Title Letter Spacing', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '3',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_color_2',
			$label             = esc_html__('Menu Selected Item Color', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'sanitize_hex_color',
			$transport         = 'postMessage',
			$type              = 'color',
			$default           = '#faff32',
			$choices           = array(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_weight_5',
			$label             = esc_html__('Grid Title Font Weight', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = '700',
			$choices           = unrovr_font_weights(),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_font_size_7',
			$label             = esc_html__('Grid Title Font Size', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'number',
			$default           = '18',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 10,
				'max'  => 30,
				'step' => 1
			),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_grid_title_text_transform',
			$label             = esc_html__('Grid Title Text Transform', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'select',
			$default           = 'none',
			$choices           = array(
				'none'      => 'None',
				'uppercase' => 'Uppercase'
			),
			$input_attrs       = array(),
			$priority          = 1
		);
		
		
		unrovr_customize_setting(
			$wp_customize,
			$section           = 'static_front_page',
			$id                = 'unrovr_setting_letter_spacing_4',
			$label             = esc_html__('Grid Title Letter Spacing', 'unrovr'),
			$description       = "",
			$sanitize_callback = 'unrovr_sanitize',
			$transport         = 'postMessage',
			$type              = 'range',
			$default           = '0',
			$choices           = array(),
			$input_attrs       = array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1
			),
			$priority          = 1
		);
	}
	
	add_action('customize_register', 'unrovr_customize_register__settings');

?>