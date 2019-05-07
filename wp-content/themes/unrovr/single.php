<?php
	get_header();
?>

<div class="site-middle">
	<div class="<?php unrovr_sidebar($get_sidebar_class = false, $get_layout_class = true); ?>">
		<div id="primary" class="content-area <?php unrovr_sidebar($get_sidebar_class = true, $get_layout_class = false); ?>">
			<div id="content" class="site-content" role="main">
				<div class="blog-single page-layout">
					<?php
						while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
										<?php
											unrovr_meta();
										?>
									</header> <!-- .entry-header -->
									<?php
										if (has_post_thumbnail())
										{
											?>
												<div class="featured-image">
													<?php
														the_post_thumbnail(
															unrovr_image_size($custom = 'single-post')
														);
													?>
												</div> <!-- .featured-image -->
											<?php
										}
									?>
									<div class="entry-content">
										<?php
											unrovr_content();
										?>
										<?php
											unrovr_post_tags();
										?>
									</div> <!-- .entry-content -->
									<?php
										unrovr_related_posts();
									?>
								</article>
								<?php
									unrovr_single_navigation();
								?>
								<?php
									comments_template("", true);
								?>
							<?php
						endwhile;
					?>
				</div> <!-- .blog-single .page-layout -->
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			unrovr_sidebar();
		?>
	</div>
</div> <!-- .site-middle -->

<?php
	get_footer();
?>