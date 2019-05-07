<?php

	function pixelwars_core_after_setup_theme__portfolio()
	{
		add_theme_support('post-thumbnails', array('portfolio'));
	}
	
	add_action('after_setup_theme', 'pixelwars_core_after_setup_theme__portfolio', 11);
	
	
	function pixelwars_core_register_taxonomy_for_object_type__portfolio()
	{
		register_taxonomy_for_object_type('post_format', 'portfolio');
	}
	
	add_action('init', 'pixelwars_core_register_taxonomy_for_object_type__portfolio', 11);


/* ============================================================================================================================================= */


	function pixelwars_core_create_post_type__portfolio()
	{
		register_post_type(
			'portfolio',
			array(
				'label'         => esc_html__('Portfolio', 'pixelwars-core'),
				'public' 		=> true,
				'menu_position' => 5,
				'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'post-formats')
			)
		);
	}
	
	add_action('init', 'pixelwars_core_create_post_type__portfolio');


/* ============================================================================================================================================= */


	function pixelwars_core_create_taxonomy__portfolio()
	{
		register_taxonomy(
			'portfolio-category',
			array('portfolio'),
			array(
				'label' 	        => esc_html__('Portfolio Categories', 'pixelwars-core'),
				'hierarchical'      => true,
				'show_admin_column' => true
			)
		);
	}
	
	add_action('init', 'pixelwars_core_create_taxonomy__portfolio');


/* ============================================================================================================================================= */


	function pixelwars_core_create_taxonomy_filter__portfolio()
	{
		global $typenow;
		
		if ($typenow == 'portfolio')
		{
			$filters = array('portfolio-category');
			
			foreach ($filters as $tax_slug)
			{
				$tax_obj  = get_taxonomy($tax_slug);
				$tax_name = $tax_obj->labels->name;
				$terms    = get_terms($tax_slug);
				
				echo '<select id="' . esc_attr($tax_slug) . '" name="' . esc_attr($tax_slug) . '" class="postform">';
				
					echo '<option value="">' . esc_html__('All', 'pixelwars-core') . ' ' . esc_html($tax_name) . '</option>';
					
					foreach ($terms as $term)
					{
						$term_name  = $term->name;
						$term_count = '(' . $term->count . ')';
						
						echo '<option value=' . $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . esc_html($term_name) . ' ' . esc_html($term_count) . '</option>';
					}
				
				echo '</select>';
			}
		}
	}
	
	add_action('restrict_manage_posts', 'pixelwars_core_create_taxonomy_filter__portfolio');

?>