<?php

	function quote($atts, $content = "")
	{
		extract(
			shortcode_atts(
				array('name' => ""),
				$atts
			)
		);
		
		$output  = '<blockquote>';
		$output .= do_shortcode($content);
		$output .= '<cite>' . esc_html($name) . '</cite>';
		$output .= '</blockquote>';
		
		return $output;
	}
	
	add_shortcode('quote', 'quote');


/* ============================================================================================================================================= */


	function mini_text($atts, $content = "")
	{
		$output = '<div class="mini-text">' . do_shortcode($content) . '</div>';
		
		return $output;
	}
	
	add_shortcode('mini_text', 'mini_text');


/* ============================================================================================================================================= */


	// Actual processing of the shortcode happens here
	function pixelwars_core_run_shortcode($content)
	{
		global $shortcode_tags;
		
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();
		
		add_shortcode('quote', 'quote');
		add_shortcode('mini_text', 'mini_text');
		
		// Do the shortcode ( only the one above is registered )
		$content = do_shortcode($content);
		
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		
		return $content;
	}
	
	add_filter('the_content', 'pixelwars_core_run_shortcode', 7);

?>