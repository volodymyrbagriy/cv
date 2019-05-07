<?php

	function unrovr_widgets_init()
	{
		register_sidebar(
			array(
				'name'          => esc_html__('Blog Sidebar', 'unrovr'),
				'id'            => 'unrovr_sidebar__blog_sidebar',
				'description'   => esc_html__('Add widgets.', 'unrovr'),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>'
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__('Post Sidebar', 'unrovr'),
				'id'            => 'unrovr_sidebar__post_sidebar',
				'description'   => esc_html__('Add widgets.', 'unrovr'),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>'
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__('Footer Copyright Text', 'unrovr'),
				'id'            => 'unrovr_sidebar__footer_copyright_text',
				'description'   => esc_html__('Add "Text" widget.', 'unrovr'),
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>',
				'before_widget' => "",
				'after_widget'  => ""
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__('Header Social Media Icons', 'unrovr'),
				'id'            => 'unrovr_sidebar__header_social_media_icons',
				'description'   => esc_html__('Add "Social Media Icon" widget per icon.', 'unrovr'),
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>',
				'before_widget' => "",
				'after_widget'  => ""
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__('Homepage Menu', 'unrovr'),
				'id'            => 'unrovr_sidebar__homepage_icons_menu',
				'description'   => esc_html__('Navigation menu for Homepage template. Add "Homepage Menu Item" widget per link.', 'unrovr'),
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>',
				'before_widget' => "",
				'after_widget'  => ""
			)
		);
	}
	
	add_action('widgets_init', 'unrovr_widgets_init');


/* ============================================================================================================================================= */


	function unrovr_sidebar_html()
	{
		?>
			<div id="secondary" class="widget-area sidebar" role="complementary">
				<?php
					if (is_page())
					{
						$page_sidebar = get_option('unrovr_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
						dynamic_sidebar($page_sidebar); // Page sidebar. (for default and custom page templates)
					}
					elseif (is_singular('post'))
					{
						if (is_active_sidebar('unrovr_sidebar__post_sidebar'))
						{
							dynamic_sidebar('unrovr_sidebar__post_sidebar'); // Post sidebar.
						}
						else
						{
							dynamic_sidebar('unrovr_sidebar__blog_sidebar'); // Blog sidebar.
						}
					}
					else
					{
						dynamic_sidebar('unrovr_sidebar__blog_sidebar'); // Blog sidebar.
					}
				?>
			</div> <!-- #secondary .widget-area .sidebar -->
		<?php
	}


/* ============================================================================================================================================= */


	function unrovr_sidebar($get_sidebar_class = false, $get_layout_class = false)
	{
		$sidebar_class = 'with-sidebar';
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'no')
			{
				$sidebar_class = "";
			}
		}
		else
		{
			if (! have_posts())
			{
				$sidebar_class = "";
			}
			elseif (is_single())
			{
				$post_sidebar = get_theme_mod('unrovr_setting_sidebar_post', 'yes');
				
				if ($post_sidebar == 'no')
				{
					$sidebar_class = "";
				}
			}
			else
			{
				$blog_sidebar = get_theme_mod('unrovr_setting_sidebar_blog', 'yes');
				
				if ($blog_sidebar == 'no')
				{
					$sidebar_class = "";
				}
			}
		}
		
		if ($get_sidebar_class)
		{
			echo esc_attr($sidebar_class);
		}
		
		if ($get_layout_class)
		{
			if (empty($sidebar_class))
			{
				echo 'layout-fixed';
			}
			else
			{
				echo 'layout-medium';
			}
		}
		
		if ((! empty($sidebar_class)) && ($get_sidebar_class == false) && ($get_layout_class == false))
		{
			unrovr_sidebar_html();
		}
	}

?>