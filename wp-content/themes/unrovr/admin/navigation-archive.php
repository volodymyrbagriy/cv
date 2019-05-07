<?php

	if (! function_exists('unrovr_blog_navigation'))
	{
		function unrovr_blog_navigation()
		{
			$blog_navigation = get_theme_mod('unrovr_setting_blog_navigation', 'older_newer');
			
			if ($blog_navigation == 'numbered')
			{
				the_posts_pagination(
					array(
						'screen_reader_text' => esc_html__('Posts Navigation', 'unrovr'),
						'prev_text'          => esc_html__('Prev', 'unrovr'),
						'next_text'          => esc_html__('Next', 'unrovr'),
						'end_size' 			 => 1,
						'mid_size' 			 => 1,
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'unrovr') . ' </span>'
					)
				);
			}
			else
			{
				$next_posts_link     = get_next_posts_link();
				$previous_posts_link = get_previous_posts_link();
				
				if ((! empty($next_posts_link)) || (! empty($previous_posts_link)))
				{
					?>
						<nav class="navigation" role="navigation">
							<div class="nav-previous">
								<?php
									next_posts_link('<span class="meta-nav">&#8592;</span> ' . esc_html__('Older Posts', 'unrovr'));
								?>
							</div> <!-- .nav-previous -->
							<div class="nav-next">
								<?php
									previous_posts_link(esc_html__('Newer Posts', 'unrovr') . ' <span class="meta-nav">&#8594;</span>');
								?>
							</div> <!-- .nav-next -->
						</nav> <!-- .navigation -->
					<?php
				}
			}
		}
	}

?>