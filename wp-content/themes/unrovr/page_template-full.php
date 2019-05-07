<?php
/*
Template Name: Full width
*/

get_header();
?>

<div class="site-middle">
	<div class="layout-full">
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
									</div>
								</article>
							<?php
						endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="layout-fixed">
		<?php
			comments_template("", true);
		?>
	</div>
</div>

<?php
	get_footer();
?>