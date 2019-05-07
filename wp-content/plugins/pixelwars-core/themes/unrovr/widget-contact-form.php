<?php

	class pixelwars_core_Widget__Contact_Form extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars_core_widget__contact_form',
				esc_html__('(Pixelwars) Contact Form', 'pixelwars-core'),
				array(
					'description' => esc_html__('Contact form module.', 'pixelwars-core')
				)
			);
		}
		
		public function form($instance)
		{
			$admin_email = get_bloginfo('admin_email');
			
			if (isset($instance['to'])) { $to = $instance['to']; } else { $to = $admin_email; }
			if (isset($instance['subject'])) { $subject = $instance['subject']; } else { $subject = 'Contact form message'; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('to')); ?>"><?php esc_html_e('To', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('to')); ?>" name="<?php echo esc_attr($this->get_field_name('to')); ?>" value="<?php echo esc_attr($to); ?>">
					
					<small><?php esc_html_e('Use your email to recieve contact from messages.', 'pixelwars-core'); ?></small>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('subject')); ?>"><?php esc_html_e('Subject', 'pixelwars-core'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('subject')); ?>" name="<?php echo esc_attr($this->get_field_name('subject')); ?>" value="<?php echo esc_attr($subject); ?>">
					
					<small><?php esc_html_e('Define subject text.', 'pixelwars-core'); ?></small>
				</p>
				<p class="howto">
					<?php
						esc_html_e("You can see sender's name and email in Reply info.", 'pixelwars-core');
					?>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['to']      = strip_tags($new_instance['to']);
			$instance['subject'] = strip_tags($new_instance['subject']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$to      = apply_filters('widget_to', $instance['to']);
			$subject = apply_filters('widget_subject', $instance['subject']);
			
			echo $before_widget;
			
				$to = trim($to);
				update_option('contact_form_to', $to);
				
				// Get the site domain and get rid of www.
				$site_url = strtolower($_SERVER['SERVER_NAME']);
				
				if (substr($site_url, 0, 4) == 'www.')
				{
					$site_url = substr($site_url, 4);
				}
				
				$sender_domain         = 'server@' . $site_url;
				$current_directory_url = plugin_dir_url(__FILE__); // Get url directory of this file. (with trailing slash)
				
				?>
					<div class="contact-form">
						<form id="contact-form" class="validate-form" method="post" action="<?php echo esc_url($current_directory_url); ?>send-mail.php">
							<p>
								<input type="text" id="name" name="name" class="required" placeholder="<?php esc_html_e('Name', 'pixelwars-core'); ?>">
							</p>
							<p>
								<input type="text" id="email" name="email" class="required email" placeholder="<?php esc_html_e('Email', 'pixelwars-core'); ?>">
							</p>
							<p class="antispam">
								<input type="text" id="url" name="url" placeholder="<?php esc_html_e('Leave this empty if you are a human', 'pixelwars-core'); ?>">
							</p>
							<p>
								<textarea id="message" name="message" class="required" placeholder="<?php esc_html_e('Message', 'pixelwars-core'); ?>"></textarea>
							</p>
							<p>
								<button class="submit button primary"><?php esc_html_e('Send', 'pixelwars-core'); ?></button>
								
								<input type="hidden" id="sender_domain" name="sender_domain" value="<?php echo esc_attr($sender_domain); ?>">
								<input type="hidden" id="subject" name="subject" value="<?php echo esc_attr($subject); ?>">
							</p>
						</form> <!-- #contact-form -->
					</div> <!-- .contact-form -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('pixelwars_core_Widget__Contact_Form'); });

?>