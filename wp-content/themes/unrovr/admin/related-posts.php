<?php

	if (! function_exists('unrovr_related_posts'))
	{
		function unrovr_related_posts()
		{
			$unrovr_related_posts = get_theme_mod('unrovr_setting_related_posts', 'yes');
			
			if (($unrovr_related_posts != 'no') && (! is_attachment()))
			{
				$categories   = get_the_category();
				$category_ids = "";
				
				if ($categories)
				{
					foreach ($categories as $category)
					{
						$category_ids .= $category->cat_ID . ',';
					}
					
					$category_ids = trim($category_ids, ',');
				}
				
				$exclude_ids = array(get_the_ID());
				
				$query = new WP_Query(
					array(
						'post_type'      => 'post',
						'cat'            => $category_ids,
						'post__not_in'   => $exclude_ids,
						'posts_per_page' => 3
					)
				);
				
				if ($query->have_posts()) :
					?>
						<div class="related-posts">
							<h2>
								<?php esc_html_e('Related Posts', 'unrovr'); ?>
							</h2>
							
							<div class="latest-posts media-grid">
								<?php
									while ($query->have_posts()) : $query->the_post();
										?>
											<article class="media-cell">
												<?php
													if (has_post_thumbnail())
													{
														?>
															<div class="media-box">
																<?php
																	the_post_thumbnail(
																		unrovr_image_size($custom = 'related-posts')
																	);
																?>
																<div class="mask"></div> <!-- .mask -->
																<a href="<?php the_permalink(); ?>"></a>
															</div> <!-- .media-box -->
														<?php
													}
												?>
												<header class="media-cell-desc">
													<h3>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h3>
												</header> <!-- .media-cell-desc -->
											</article> <!-- .media-cell -->
										<?php
									endwhile;
								?>
							</div> <!-- .latest-posts .media-grid -->
						</div> <!-- .related-posts -->
					<?php
				endif;
				wp_reset_postdata();
			}
		}
	}

?>