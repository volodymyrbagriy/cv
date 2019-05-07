<?php
	if (post_password_required())
	{
		return;
	}
?>

<?php
	if (comments_open() || get_comments_number())
	{
		?>
			<div id="comments" class="comments-area">
				<?php
					if (have_comments())
					{
						?>
							<h3 class="comments-title">
								<?php
									printf(_n('1 Comment %2$s', '%1$s Comments %2$s', get_comments_number(), 'unrovr'),
										   number_format_i18n(get_comments_number()), "");
								?>
							</h3>
							<ol class="commentlist">
								<?php
									wp_list_comments( array('callback' => 'unrovr_comments',
															'style'    => 'ol'));
								?>
							</ol>
							<?php
								if ((get_comment_pages_count() > 1) && get_option('page_comments'))
								{
									?>
										<nav id="comment-nav-below" class="navigation" role="navigation">
											<div class="nav-previous">
												<?php
													previous_comments_link('&#8592; ' . esc_html__('Older Comments', 'unrovr'));
												?>
											</div>
											<div class="nav-next">
												<?php
													next_comments_link(esc_html__('Newer Comments', 'unrovr') . ' &#8594;');
												?>
											</div>
										</nav>
									<?php
								}
							?>
						<?php
					}
				?>
				<?php
					comment_form(array('title_reply' => esc_html__('Leave a comment', 'unrovr')));
				?>
			</div>
		<?php
	}
?>