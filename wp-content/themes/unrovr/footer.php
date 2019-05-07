			<?php
				if (is_active_sidebar('unrovr_sidebar__footer_copyright_text'))
				{
					?>
						<footer id="colophon" class="site-footer" role="contentinfo">
							<div class="site-info">
								<?php
									dynamic_sidebar('unrovr_sidebar__footer_copyright_text');
								?>
							</div> <!-- .site-info -->
						</footer> <!-- #colophon .site-footer -->
					<?php
				}
			?>
	
	<?php
		if (! is_page_template('page_template-home.php'))
		{
			?>
					</main> <!-- #main .site-main .cd-main -->
					
					<!-- ALERT: used for contact form mail delivery alert -->
					<div class="site-alert animated"></div> <!-- .site-alert .animated -->
				</div> <!-- #page .hfeed .site -->
			<?php
		}
	?>
	
	<!-- PORTFOLIO SINGLE AJAX CONTENT CONTAINER -->
	<div class="p-overlay"></div> <!-- .p-overlay -->
	<div class="p-overlay"></div> <!-- .p-overlay -->
	
	<?php
		wp_footer();
	?>
</body>
</html>