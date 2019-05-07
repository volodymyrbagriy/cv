<?php

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


	function pixelwars_core_taxonomy__portfolio()
	{
		register_taxonomy(
			'portfolio-category',
			array('portfolio'),
			array(
				'label' 			=> esc_html__('Portfolio Categories', 'pixelwars-core'),
				'hierarchical' 		=> true,
				'show_admin_column' => true
			)
		);
	}
	
	add_action('init', 'pixelwars_core_taxonomy__portfolio');


/* ============================================================================================================================================= */


	function pixelwars_core_taxonomy_filter_portfolio()
	{
		global $typenow;
		
		if ($typenow == 'portfolio')
		{
			$filters = array('portfolio-category');
			
			foreach ($filters as $tax_slug)
			{
				$tax_obj  = get_taxonomy($tax_slug);
				$tax_name = $tax_obj->labels->name;
				$terms 	  = get_terms($tax_slug);
				
				echo '<select name="' . esc_attr($tax_slug) . '" id="' . esc_attr($tax_slug) . '" class="postform">';
				
					echo '<option value="">' . esc_html__('All', 'pixelwars-core') . ' ' . esc_html($tax_name) . '</option>';
					
					foreach ($terms as $term)
					{
						echo '<option value=' . $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . esc_html($term->name) .' (' . esc_html($term->count) . ')</option>';
					}
				
				echo '</select>';
			}
		}
	}
	
	add_action('restrict_manage_posts', 'pixelwars_core_taxonomy_filter_portfolio');

?>