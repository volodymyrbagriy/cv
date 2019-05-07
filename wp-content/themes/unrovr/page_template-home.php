<?php
/*
Template Name: Homepage
*/
?>

<?php
	get_header();
?>

<?php
	while (have_posts()) : the_post();
		?>
			<section class="card-layout">
				<div class="card-intro">
					<?php
						$unrovr_site_title = get_bloginfo('name'); // Used two times in this page.
						
						if (! empty($unrovr_site_title))
						{
							?>
								<h1 class="homepage-template-site-title">
									<?php
										echo esc_html($unrovr_site_title);
									?>
								</h1>
							<?php
						}
					?>
					<?php
						$unrovr_home_description = get_theme_mod('unrovr_setting_home_description', ""); // Used two times in this page.
						
						if (! empty($unrovr_home_description))
						{
							?>
								<p>
									<?php
										echo esc_html($unrovr_home_description);
									?>
								</p>
							<?php
						}
					?>
					<?php
						unrovr_content();
					?>
					<div class="card-triggers">
						<?php
							$unrovr_home_button_url = get_theme_mod('unrovr_setting_home_button_url', "");
							
							if (! empty($unrovr_home_button_url))
							{
								?>
									<a class="button primary" <?php echo unrovr_home_button_new_tab(); ?> href="<?php echo esc_url($unrovr_home_button_url); ?>">
										<?php
											$unrovr_home_button_text = get_theme_mod('unrovr_setting_home_button_text', "");
											
											if (! empty($unrovr_home_button_text))
											{
												echo esc_html($unrovr_home_button_text);
											}
											else
											{
												esc_html_e('Download CV', 'unrovr');
											}
										?>
									</a>
								<?php
							}
						?>
						<a id="card-open" class="button secondary" href="#card">
							<?php
								esc_html_e('Discover', 'unrovr');
							?>
						</a>
					</div> <!-- .card-triggers -->
				</div> <!-- .card-intro -->
				
				<div id="card" class="card">
					<div class="cover">
						<?php
							unrovr_card_image($size = 'homepage-small', $echo_only_url = false);
						?>
						
						<div class="cover-media" data-image-url="<?php unrovr_card_image($size = 'homepage-big', $echo_only_url = true); ?>" style="background-image: url(<?php unrovr_card_image($size = 'homepage-small', $echo_only_url = true); ?>);"></div> <!-- .cover-media -->
						
						<div class="card-info">
							<?php
								if (! empty($unrovr_site_title))
								{
									?>
										<h2 class="homepage-template-site-title">
											<?php
												echo esc_html($unrovr_site_title);
											?>
										</h2>
									<?php
								}
							?>
							<?php
								$unrovr_tagline = get_bloginfo('description');
								
								if (! empty($unrovr_tagline))
								{
									?>
										<h3 class="homepage-template-site-tagline">
											<?php
												echo esc_html($unrovr_tagline);
											?>
										</h3>
									<?php
								}
							?>
							<div class="card-desc">
								<?php
									if (! empty($unrovr_home_description))
									{
										?>
											<p>
												<?php
													echo esc_html($unrovr_home_description);
												?>
											</p>
										<?php
									}
								?>
								<?php
									unrovr_content();
								?>
							</div> <!-- .card-desc -->
						</div> <!-- .card-info -->
						
						<?php
							if (is_active_sidebar('unrovr_sidebar__homepage_icons_menu'))
							{
								?>
									<nav class="card-nav">
										<ul>
											<?php
												dynamic_sidebar('unrovr_sidebar__homepage_icons_menu');
											?>
										</ul>
									</nav> <!-- .card-nav -->
								<?php
							}
						?>
						
						<div class="cover-link"></div> <!-- .cover-link -->
					</div> <!-- .cover -->
					
					<div class="card-3d-right-side" style="background-image: url(<?php unrovr_card_image($size = 'homepage-small', $echo_only_url = true); ?>);"></div> <!-- .card-3d-right-side -->
					<div class="card-3d-bottom-side" style="background-image: url(<?php unrovr_card_image($size = 'homepage-small', $echo_only_url = true); ?>);"></div> <!-- .card-3d-bottom-side -->
					
					<div class="card-content"></div> <!-- .card-content -->
				</div> <!-- #card .card -->
				
				<a class="close-card" href="#"></a>
			</section> <!-- .card-layout -->
			
			<div class="card-footer">
				<h1>
					<a href="#card">
						<?php
							esc_html_e('go to top', 'unrovr');
						?>
					</a>
				</h1>
			</div> <!-- .card-footer -->
		<?php
	endwhile;
?>

<?php
	get_footer();
?>