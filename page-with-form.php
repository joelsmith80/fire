<?php
/*
 Template Name: Form Page
 *
 * A template for a basic page with a form. No "page" look to it. Just writing directly on the gray background.
 * 
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-no-sidebar page-with-form-only">
			<div class="wrap">
				<div class="region d-9 w-9">
					<main>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article>

								<header class="page-header">
									<h1 class="page-title"><?php the_title();?></h1>
								</header>

								<div class="entry-content">
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
