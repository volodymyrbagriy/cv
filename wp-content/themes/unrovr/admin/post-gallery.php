<?php

	function unrovr_post_gallery__portfolio_page($atts)
	{
		extract(
			shortcode_atts(
				array(
					'ids'  => "",
					'size' => 'thumbnail'
				),
				$atts
			)
		);
		
		$output = "";
		$items_with_commas = $ids;
		
		if (! empty($items_with_commas))
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			foreach ($items_in_array as $item)
			{
				$image_url     = wp_get_attachment_image_url($item, 'full');
				$image_caption = get_post_field('post_excerpt', $item);
				
				if (! empty($image_caption))
				{
					$image_caption = 'data-title="' . esc_attr($image_caption) . '"';
				}
				
				$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_url) . '"></a>';
			}
		}
		
		return $output;
	}


/* ============================================================================================================================================= */


	function unrovr_post_gallery($output = "", $atts, $content = false, $tag = false)
	{
		$new_output = $output;
		
		if (is_page_template('page_template-portfolio.php'))
		{
			if (has_post_format('gallery'))
			{
				$new_output = unrovr_post_gallery__portfolio_page($atts);
			}
		}
		
		return $new_output;
	}
	
	add_filter('post_gallery', 'unrovr_post_gallery', 10, 4);

?>