<?php

	function unrovr_child_scripts()
	{
		wp_enqueue_style('unrovr-parent-style', get_template_directory_uri(). '/style.css');
	}
	
	add_action('wp_enqueue_scripts', 'unrovr_child_scripts');


/* Custom Functions */