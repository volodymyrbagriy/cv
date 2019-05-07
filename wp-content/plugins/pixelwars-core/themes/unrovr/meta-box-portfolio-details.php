<?php

	function pixelwars_core_meta_box__portfolio_details($post)
	{
		?>
			<?php
				wp_nonce_field(
					'pixelwars_core_meta_box__portfolio_details',
					'pixelwars_core_meta_box_nonce__portfolio_details'
				);
			?>
			<p>
				<label for="pixelwars_core_portfolio_details__description"><?php esc_html_e('Description', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__description = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__description', true);
				?>
				<textarea id="pixelwars_core_portfolio_details__description" name="pixelwars_core_portfolio_details__description" rows="4" cols="40" class="widefat"><?php echo esc_textarea($pixelwars_core_portfolio_details__description); ?></textarea>
			</p>
			<p>
				<label for="pixelwars_core_portfolio_details__client"><?php esc_html_e('Client', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__client = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__client', true);
				?>
				<input type="text" id="pixelwars_core_portfolio_details__client" name="pixelwars_core_portfolio_details__client" class="widefat" value="<?php echo esc_attr($pixelwars_core_portfolio_details__client); ?>">
			</p>
			<p>
				<label for="pixelwars_core_portfolio_details__date"><?php esc_html_e('Date', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__date = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__date', true);
				?>
				<input type="text" id="pixelwars_core_portfolio_details__date" name="pixelwars_core_portfolio_details__date" class="widefat" value="<?php echo esc_attr($pixelwars_core_portfolio_details__date); ?>">
			</p>
			<p>
				<label for="pixelwars_core_portfolio_details__services"><?php esc_html_e('Services', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__services = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__services', true);
				?>
				<input type="text" id="pixelwars_core_portfolio_details__services" name="pixelwars_core_portfolio_details__services" class="widefat" value="<?php echo esc_attr($pixelwars_core_portfolio_details__services); ?>">
			</p>
			<p>
				<label for="pixelwars_core_portfolio_details__launch_project_url"><?php esc_html_e('Launch Project URL', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__launch_project_url = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__launch_project_url', true);
				?>
				<input type="url" id="pixelwars_core_portfolio_details__launch_project_url" name="pixelwars_core_portfolio_details__launch_project_url" class="widefat" value="<?php echo esc_url($pixelwars_core_portfolio_details__launch_project_url); ?>" placeholder="http://">
			</p>
			<hr>
			<p>
				<label for="pixelwars_core_portfolio_details__display_location"><?php esc_html_e('Display location', 'pixelwars-core'); ?></label>
				<?php
					$pixelwars_core_portfolio_details__display_location = get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__display_location', true);
				?>
				<select id="pixelwars_core_portfolio_details__display_location" name="pixelwars_core_portfolio_details__display_location">
					<option <?php if ($pixelwars_core_portfolio_details__display_location == 'top') { echo 'selected="selected"'; } ?> value="top"><?php esc_html_e('Top', 'pixelwars-core'); ?></option>
					<option <?php if ($pixelwars_core_portfolio_details__display_location == 'bottom') { echo 'selected="selected"'; } ?> value="bottom"><?php esc_html_e('Bottom', 'pixelwars-core'); ?></option>
				</select>
			</p>
		<?php
	}
	
	
	function pixelwars_core_meta_box_save__portfolio_details($post_id)
	{
		if (! isset($_POST['pixelwars_core_meta_box_nonce__portfolio_details']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['pixelwars_core_meta_box_nonce__portfolio_details'];
		
		if (! wp_verify_nonce($nonce, 'pixelwars_core_meta_box__portfolio_details'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__description', $_POST['pixelwars_core_portfolio_details__description']);
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__client', $_POST['pixelwars_core_portfolio_details__client']);
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__date', $_POST['pixelwars_core_portfolio_details__date']);
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__services', $_POST['pixelwars_core_portfolio_details__services']);
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__launch_project_url', $_POST['pixelwars_core_portfolio_details__launch_project_url']);
		update_post_meta($post_id, 'pixelwars_core_portfolio_details__display_location', $_POST['pixelwars_core_portfolio_details__display_location']);
	}
	
	add_action('save_post', 'pixelwars_core_meta_box_save__portfolio_details');
	
	
	function pixelwars_core_add_meta_boxes__portfolio_details()
	{
		add_meta_box(
			'pixelwars_core_add_meta_box__portfolio_details',
			esc_html__('Details', 'pixelwars-core'),
			'pixelwars_core_meta_box__portfolio_details',
			array('portfolio'),
			'normal',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'pixelwars_core_add_meta_boxes__portfolio_details');


/* ============================================================================================================================================= */


	function pixelwars_core_portfolio_details__description()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__description', true);
	}
	
	
	function pixelwars_core_portfolio_details__client()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__client', true);
	}
	
	
	function pixelwars_core_portfolio_details__date()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__date', true);
	}
	
	
	function pixelwars_core_portfolio_details__services()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__services', true);
	}
	
	
	function pixelwars_core_portfolio_details__launch_project_url()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__launch_project_url', true);
	}
	
	
	function pixelwars_core_portfolio_details__display_location()
	{
		return get_post_meta(get_the_ID(), 'pixelwars_core_portfolio_details__display_location', true);
	}

?>