<!doctype html>

<html <?php language_attributes(); ?> <?php echo unrovr_html_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php
		$unrovr_mobile_zoom = get_theme_mod('unrovr_setting_mobile_zoom', 'no');
		
		if ($unrovr_mobile_zoom == 'yes')
		{
			?>
				<meta name="viewport" content="width=device-width, initial-scale=1">
			<?php
		}
		else
		{
			?>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<?php
		}
	?>
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<?php
		if (! is_page_template('page_template-home.php'))
		{
			?>
				<div id="page" class="hfeed site">
					<main id="main" class="site-main cd-main">
						<header id="masthead" class="header" role="banner">
							<div class="header-wrap layout-full">
								<?php
									unrovr_header_background_image();
									
									unrovr_site_logo();
									
									unrovr_site_tagline();
									
									unrovr_header_social_media_icons();
									
									unrovr_navigation_menu();
									
									unrovr_header_search();
								?>
							</div> <!-- .header-wrap .layout-full -->
						</header> <!-- #masthead .header -->
			<?php
		}
	?>