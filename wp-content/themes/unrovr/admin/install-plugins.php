<?php

	require_once get_template_directory() . '/admin/class-tgm-plugin-activation.php';
	
	function unrovr_plugins()
	{
		$config = array(
			'id'           => 'unrovr_tgmpa',
			'default_path' => "",
			'menu'         => 'unrovr-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => esc_html__('Install Plugins', 'unrovr'),
			'is_automatic' => true,
			'message'      => "",
			'strings'      => array('nag_type' => 'updated')
		);
		
		$plugins = array(
			array(
				'name'               => esc_html__('Pixelwars Core', 'unrovr'),
				'slug'               => 'pixelwars-core',
				'source'             => get_template_directory() . '/admin/plugins/pixelwars-core.zip',
				'version'            => '1.0.7',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => "",
				'is_callable'        => ""
			),
			array(
				'name'     => esc_html__('One Click Demo Import', 'unrovr'),
				'slug'     => 'one-click-demo-import',
				'required' => false
			),
			array(
				'name'     => esc_html__('Regenerate Thumbnails', 'unrovr'),
				'slug'     => 'regenerate-thumbnails',
				'required' => false
			),
			array(
				'name'     => esc_html__('Loco Translate', 'unrovr'),
				'slug'     => 'loco-translate',
				'required' => false
			),
			array(
				'name'     => esc_html__('Top 10 - Popular Posts', 'unrovr'),
				'slug'     => 'top-10',
				'required' => false
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress', 'unrovr'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false
			),
			array(
				'name'     => esc_html__('SVG Support', 'unrovr'),
				'slug'     => 'svg-support',
				'required' => false
			),
			array(
				'name'     => esc_html__('Elementor Page Builder', 'unrovr'),
				'slug'     => 'elementor',
				'required' => false
			)
		);
		
		tgmpa($plugins, $config);
	}
	
	add_action('tgmpa_register', 'unrovr_plugins');

?>