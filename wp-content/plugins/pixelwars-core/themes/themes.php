<?php

	$pixelwars_core_template = get_option('template');
	
	switch ($pixelwars_core_template)
	{
		case 'life':
		
			include_once($pixelwars_core_ABSPATH . 'themes/life/meta-box-featured-media.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/share-links.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-social-media-icon.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-social-media-feed.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-link-box.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-about-me.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-intro.php');
			include_once($pixelwars_core_ABSPATH . 'themes/life/widget-main-slider.php');
		
		break;
		
		case 'unrovr':
		
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/post-type-portfolio.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/meta-box-portfolio-details.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/meta-box-featured-media.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/shortcodes.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-social-media-icon.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-homepage-menu-item.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-contact-form.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-section-title.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-map.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-testimonial.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-fun-fact.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-client.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-process.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-progress-bar.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-service.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-timeline-title.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-timeline-event.php');
			include_once($pixelwars_core_ABSPATH . 'themes/unrovr/widget-button.php');
		
		break;
		
		case 'lahanna':
		
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/post-type-portfolio.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/meta-box-featured-media.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/share-links.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/shortcodes.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/widget-social-media-icon.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/widget-about-me.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/widget-link-box.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/widget-intro.php');
			include_once($pixelwars_core_ABSPATH . 'themes/lahanna/widget-main-slider.php');
		
		break;
		
		case 'efor':
		
			include_once($pixelwars_core_ABSPATH . 'themes/global/post-type-portfolio.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/meta-box-featured-media.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/share-links.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/shortcodes.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/shortcode-generator/shortcode-generator.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/widget-social-media-icon.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/widget-about-me.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/widget-link-box.php');
			include_once($pixelwars_core_ABSPATH . 'themes/global/widget-intro.php');
			include_once($pixelwars_core_ABSPATH . 'themes/efor/widget-main-slider.php');
		
		break;
	}

?>