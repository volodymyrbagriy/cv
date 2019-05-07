<?php

	function unrovr_more_link_text()
	{
		$more_link_text = esc_html__('Read More', 'unrovr');
		
		return $more_link_text;
	}
	
	
	function unrovr_more_link_html()
	{
		$more_link_html  = '<p class="more">';
		$more_link_html .= '<a class="more-link" href="' . get_permalink(get_the_ID()) . '">' . unrovr_more_link_text() . '</a>';
		$more_link_html .= '</p>';
		
		return $more_link_html;
	}
	
	
	function unrovr_excerpt_more($more)
	{
		return '... ' . unrovr_more_link_html();
	}
	
	add_filter('excerpt_more', 'unrovr_excerpt_more');


/* ============================================================================================================================================= */


	function unrovr_content()
	{
		if (is_home() || is_archive() || is_search())
		{
			if (has_excerpt())
			{
				the_excerpt();
				
				echo unrovr_more_link_html();
			}
			else
			{
				$automatic_excerpt = get_theme_mod('unrovr_setting_automatic_excerpt', 'yes_standard');
				
				if ($automatic_excerpt == 'no')
				{
					the_content(
						unrovr_more_link_text()
					);
				}
				elseif ($automatic_excerpt == 'yes_all')
				{
					the_excerpt();
				}
				else
				{
					$format = get_post_format();
					
					if ($format == false)
					{
						the_excerpt();
					}
					else
					{
						the_content(
							unrovr_more_link_text()
						);
					}
				}
			}
		}
		else
		{
			the_content();
		}
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'unrovr'),
				'after'  => '</div>'
			)
		);
	}

?>