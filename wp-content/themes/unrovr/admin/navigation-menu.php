<?php

	function unrovr_wp_nav_menu()
	{
		wp_nav_menu(
			array(
				'theme_location' => 'unrovr_theme_menu_location',
				'menu'           => 'unrovr_theme_menu_location',
				'menu_class'     => 'menu-custom',
				'container'      => false,
				'depth'          => 1
			)
		);
	}


/* ============================================================================================================================================= */


	function unrovr_menu_item__home()
	{
		?>
			<li>
				<a class="home" href="<?php echo esc_url(home_url('/')); ?>">
					<?php esc_html_e('Home', 'unrovr'); ?>
				</a>
			</li>
		<?php
	}
	
	
	function unrovr_menu_item__search()
	{
		?>
			<li>
				<a class="search-toggle">
					<?php esc_html_e('Search', 'unrovr'); ?>
				</a>
			</li>
		<?php
	}
	
	
	function unrovr_menu_item__back_to_portfolio()
	{
		$portfolio_page_slug = get_option('portfolio_page_slug', 'portfolio');
		$portfolio_page_url  = get_home_url() . '/#/' . $portfolio_page_slug;
		
		?>
			<li>
				<a class="return" href="<?php echo esc_url($portfolio_page_url); ?>">
					<?php esc_html_e('Back To Portfolio', 'unrovr'); ?>
				</a>
			</li>
		<?php
	}
	
	
	function unrovr_menu_item__back_to_blog_html($url)
	{
		?>
			<li>
				<a class="return" href="<?php echo esc_url($url); ?>">
					<?php esc_html_e('Back To Blog', 'unrovr'); ?>
				</a>
			</li>
		<?php
	}
	
	function unrovr_menu_item__back_to_blog()
	{
		$unrovr_back_to_blog_link_behaviour = get_theme_mod('unrovr_setting_back_to_blog_link_behaviour', 'to_regular_blog');
		
		if ($unrovr_back_to_blog_link_behaviour == 'to_grid_blog')
		{
			$blog_page_slug = get_option('blog_page_slug', "");
			
			if (! empty($blog_page_slug))
			{
				$url = get_home_url() . '/#/' . $blog_page_slug;
				unrovr_menu_item__back_to_blog_html($url);
			}
		}
		else
		{
			$blog_page_id = get_option('page_for_posts');
			
			if ($blog_page_id)
			{
				$url = get_page_link($blog_page_id);
				unrovr_menu_item__back_to_blog_html($url);
			}
		}
	}


/* ============================================================================================================================================= */


	function unrovr_menu_items()
	{
		$unrovr_front_page_displays = get_option('show_on_front');
		
		?>
			<ul>
				<?php
					if (is_front_page() || ($unrovr_front_page_displays == 'posts'))
					{
						unrovr_menu_item__search();
					}
					elseif (is_home())
					{
						unrovr_menu_item__home();
						unrovr_menu_item__search();
					}
					elseif (is_singular('post') || is_archive() || is_search())
					{
						if ($unrovr_front_page_displays == 'posts')
						{
							unrovr_menu_item__home();
							unrovr_menu_item__search();
						}
						else
						{
							unrovr_menu_item__home();
							unrovr_menu_item__back_to_blog();
							unrovr_menu_item__search();
						}
					}
					elseif (is_singular('portfolio'))
					{
						unrovr_menu_item__home();
						unrovr_menu_item__back_to_portfolio();
						unrovr_menu_item__search();
					}
					else
					{
						unrovr_menu_item__home();
						unrovr_menu_item__search();
					}
				?>
			</ul>
		<?php
	}


/* ============================================================================================================================================= */


	function unrovr_navigation_menu_icons($unrovr_classic_nav_menu)
	{
		$unrovr_nav_menu_icons_class = "";
		
		if (($unrovr_classic_nav_menu != 'no') && ($unrovr_classic_nav_menu != 'yes_home')) // Yes - For all pages.
		{
			$unrovr_nav_menu_icons_class = "";
		}
		elseif ((is_page_template('page_template-home.php')) && ($unrovr_classic_nav_menu == 'yes_home'))
		{
			$unrovr_nav_menu_icons_class = "";
		}
		else
		{
			$unrovr_nav_menu_icons_class = 'menu-with-icons';
		}
		
		echo esc_attr($unrovr_nav_menu_icons_class);
	}


/* ============================================================================================================================================= */


	function unrovr_navigation_menu()
	{
		?>
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<?php
					$unrovr_classic_nav_menu = get_theme_mod('unrovr_setting_classic_nav_menu', 'yes_all');
				?>
				<div class="nav-menu <?php unrovr_navigation_menu_icons($unrovr_classic_nav_menu); ?>">
					<?php
						if (($unrovr_classic_nav_menu != 'no') && ($unrovr_classic_nav_menu != 'yes_home')) // Yes - For all pages.
						{
							unrovr_wp_nav_menu();
						}
						elseif (is_page_template('page_template-home.php'))
						{
							if ($unrovr_classic_nav_menu == 'yes_home') // Yes - Only for homepage.
							{
								unrovr_wp_nav_menu();
							}
						}
						else
						{
							unrovr_menu_items();
						}
					?>
				</div> <!-- .nav-menu -->
			</nav> <!-- #primary-navigation .site-navigation .primary-navigation -->
		<?php
	}

?>