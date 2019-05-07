<?php
	get_header();
?>

<div class="site-middle">
	<div class="layout-medium">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<div class="portfolio-single page-layout">
					<?php
						while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php
											unrovr_single_navigation();
										?>
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
									</header> <!-- .entry-header -->
									<div class="entry-content">
										<?php
											unrovr_single_portfolio__details('top');
										?>
										<?php
											unrovr_single_portfolio__format_content();
											unrovr_content();
										?>
										<?php
											unrovr_single_portfolio__details('bottom');
										?>
										<?php
											unrovr_single_navigation();
										?>
									</div> <!-- .entry-content -->
								</article> <!-- .hentry -->
							<?php
						endwhile;
					?>
				</div> <!-- .portfolio-single .page-layout -->
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
	</div> <!-- .layout-medium -->
	<div class="layout-fixed">
		<?php
			comments_template("", true);
		?>
	</div> <!-- .layout-fixed -->
</div> <!-- .site-middle -->

<?php
	get_footer();
?>