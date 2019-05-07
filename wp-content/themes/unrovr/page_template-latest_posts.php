<?php
/*
Template Name: Latest Posts
*/

get_header();
?>

<div class="site-middle">
	<div class="layout-medium">
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
									</header>
									<div class="entry-content">
										<?php
											unrovr_content();
										?>
										
										<?php
											$unrovr_query = new WP_Query(array('post_type'      => 'post',
																		'posts_per_page' => 9));
											
											if ($unrovr_query->have_posts()) :
												?>
													<div class="latest-posts media-grid masonry" data-layout="masonry" data-item-width="340">
														<?php
															while ($unrovr_query->have_posts()) : $unrovr_query->the_post();
																?>
																	<article class="hentry media-cell">
																		<?php
																			if (has_post_thumbnail())
																			{
																				?>
																					<div class="media-box">
																						<?php
																							the_post_thumbnail(
																								unrovr_image_size($custom = 'latest-posts')
																							);
																						?>
																						<div class="mask"></div>
																						<span class="media-date">
																							<span class="day">
																								<?php
																									echo get_the_date('j');
																								?>
																							</span>
																							<span class="month">
																								<?php
																									echo get_the_date('M');
																								?>
																							</span>
																						</span>
																						<a href="<?php the_permalink(); ?>"></a>
																					</div>
																				<?php
																			}
																		?>
																		<header class="media-cell-desc">
																			<span class="cat-links">
																				<?php
																					the_category(' ');
																				?>
																			</span>
																			<h3>
																				<a href="<?php the_permalink(); ?>">
																					<?php
																						the_title();
																					?>
																				</a>
																			</h3>
																		</header>
																	</article>
																<?php
															endwhile;
														?>
													</div>
													
													<?php
														$front_page_displays = get_option('show_on_front');
														
														if ($front_page_displays == 'posts')
														{
															?>
																<p class="launch">
																	<a class="button" href="<?php echo esc_url(home_url('/')); ?>">
																		<?php
																			esc_html_e('See All Posts', 'unrovr');
																		?>
																	</a>
																</p>
															<?php
														}
														else
														{
															$blog_page_id = get_option('page_for_posts');
															
															if ($blog_page_id)
															{
																$blog_page_url = get_page_link($blog_page_id);
																
																?>
																	<p class="launch">
																		<a class="button" href="<?php echo esc_url($blog_page_url); ?>">
																			<?php
																				esc_html_e('See All Posts', 'unrovr');
																			?>
																		</a>
																	</p>
																<?php
															}
														}
													?>
												
												<?php
											endif;
											wp_reset_postdata();
										?>
									</div>
								</article>
							<?php
						endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>