<?php
/*
Plugin Name: Pixelwars Core
Plugin URI:  http://www.pixelwars.org
Description: Advanced features for Pixelwars themes.
Version:     1.0.7
Author:      Pixelwars
Author URI:  http://www.pixelwars.org
License:     ThemeForest License
Text Domain: pixelwars-core
Domain Path: /languages/
*/


/* ============================================================================================================================================= */


	// Don't load directly.
	
	if (! defined('ABSPATH'))
	{
		die('-1'); // Exit if accessed directly.
	}


/* ============================================================================================================================================= */


	function pixelwars_core_load_plugin_textdomain()
	{
		load_plugin_textdomain(
			'pixelwars-core',
			false,
			dirname(plugin_basename(__FILE__)) . '/languages'
		);
	}
	
	add_action('init', 'pixelwars_core_load_plugin_textdomain');


/* ============================================================================================================================================= */


	$pixelwars_core_ABSPATH  = dirname(__FILE__) . '/';
	
	include_once($pixelwars_core_ABSPATH . 'themes/themes.php');

?>