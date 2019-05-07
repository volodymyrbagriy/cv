<?php

	function unrovr_manage_posts_columns__add_new_columns($columns)
	{
		return array_merge(
			$columns,
			array(
				'unrovr_post_feat_img' => esc_html__('Featured Image', 'unrovr')
			)
		);
	}
	
	add_filter('manage_posts_columns' , 'unrovr_manage_posts_columns__add_new_columns');
	
	
	function unrovr_manage_posts_custom_column__new_columns_content($column, $post_id)
	{
		if ($column == 'unrovr_post_feat_img')
		{
			the_post_thumbnail(
				'thumbnail',
				array(
					'style' => 'max-height: 40px; max-width: 40px;'
				)
			);
		}
	}
	
	add_action('manage_posts_custom_column' , 'unrovr_manage_posts_custom_column__new_columns_content', 10, 2);

?>