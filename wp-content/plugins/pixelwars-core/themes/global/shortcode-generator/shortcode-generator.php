<?php

	function pixelwars_core_tinyplugin_register($plugin_array)
	{
		$plugin_directory_url = plugin_dir_url(__FILE__); // http://www.example.com/wp-content/plugins/my-plugin-folder/
		
		$url = $plugin_directory_url . 'shortcode-generator-control.js';
		$plugin_array['tinyplugin'] = $url;
		return $plugin_array;
	}
	
	add_filter('mce_external_plugins', 'pixelwars_core_tinyplugin_register');
	
	
	function pixelwars_core_tinyplugin_add_button($buttons)
	{
		array_push($buttons, 'separator', 'tinyplugin');
		return $buttons;
	}
	
	add_filter('mce_buttons', 'pixelwars_core_tinyplugin_add_button', 0);

?>