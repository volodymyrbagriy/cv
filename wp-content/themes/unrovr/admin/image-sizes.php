<?php

	add_image_size('unrovr_image_size_1', 1000); // Blog page, Single post.
	add_image_size('unrovr_image_size_2', 550); // Portfolio page, Latest posts, Related posts.
	add_image_size('unrovr_image_size_3', 150); // Homepage.
	add_image_size('unrovr_image_size_4', 1600); // Homepage.
	
	
	function unrovr_image_size($custom = "")
	{
		$image_size = 'full';
		
		if (($custom == 'blog-page') || ($custom == 'single-post'))
		{
			$image_size = 'unrovr_image_size_1';
		}
		elseif (($custom == 'portfolio-page') || ($custom == 'latest-posts') || ($custom == 'related-posts'))
		{
			$image_size = 'unrovr_image_size_2';
		}
		elseif ($custom == 'homepage-small')
		{
			$image_size = 'unrovr_image_size_3';
		}
		elseif ($custom == 'homepage-big')
		{
			$image_size = 'unrovr_image_size_4';
		}
		
		return $image_size;
	}

/* ============================================================================================================================================= */


	if (! isset($content_width))
	{
		$content_width = 540;
	}

?>