<?php
/*
Template Name: Portfolio
*/
?>

<?php
	$unrovr_portfolio_page_slug = get_post_field('post_name', get_the_ID());
	update_option('unrovr_portfolio_page_slug', $unrovr_portfolio_page_slug);
?>

<?php
	get_header();
?>

<div class="site-middle">
	<div class="layout-fixed">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<div class="page-single page-layout">
					<?php
						while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
									</header> <!-- .entry-header -->
									<div class="entry-content">
										<?php
											unrovr_content();
										?>
										<?php
											unrovr_portfolio_page__post_filters();
										?>
										<?php
											$unrovr_query = new WP_Query(
												array(
													'post_type'      => 'portfolio',
													'posts_per_page' => -1
												)
											);
											
											if ($unrovr_query->have_posts()) :
												?>
													<div class="portfolio-items media-grid masonry" data-layout="masonry" data-item-width="340">
														<?php
															while ($unrovr_query->have_posts()) : $unrovr_query->the_post();
																?>
																	<div id="post-<?php the_ID(); ?>" <?php post_class(unrovr_portfolio_page__post_class()); ?>>
																		<?php
																			if (has_post_thumbnail())
																			{
																				?>
																					<div class="media-box">
																						<?php
																							the_post_thumbnail(
																								unrovr_image_size($custom = 'portfolio-page')
																							);
																						?>
																						<div class="mask"></div> <!-- .mask -->
																						<?php
																							unrovr_portfolio_page__post_content();
																						?>
																					</div> <!-- .media-box -->
																				<?php
																			}
																		?>
																		<div class="media-cell-desc">
																			<h3><?php the_title(); ?></h3>
																			<?php
																				unrovr_portfolio_post__short_description();
																			?>
																		</div> <!-- .media-cell-desc -->
																	</div> <!-- .media-cell -->
																<?php
															endwhile;
														?>
													</div> <!-- .portfolio-items .media-grid .masonry -->
												<?php
											endif;
											wp_reset_postdata();
										?>
									</div> <!-- .entry-content -->
								</article> <!-- .page -->
							<?php
						endwhile;
					?>
				</div> <!-- .page-single .page-layout -->
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
	</div> <!-- .layout-fixed -->
</div> <!-- .site-middle -->

<?php
	get_footer();
?>