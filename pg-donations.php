<?php
/*
 Template Name: Donations
 *
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-no-sidebar fundly-donation-page">
			<div class="wrap">
				<div class="region">
					<main>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article>

								<header class="page-header">
									<h1 class="page-title"><?php the_title();?></h1>
								</header>

								<div class="entry-content cf">
									<?php the_content();?>
								</div>

							</article>

						<?php endwhile; else:
							nothing_found();
						endif;?>

					</main>
				</div> <!-- // .region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
