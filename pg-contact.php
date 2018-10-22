<?php get_header(); ?>

		<div id="content" class="site-content-space contact-page">
			<div class="wrap">
				<main>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article>

							<header class="page-header region">
								<h1 class="page-title"><?php the_title();?></h1>
							</header>

							<div class="contact-page-content entry-content region d-8 w-8">
								<?php the_content();?>
							</div>

						</article>

					<?php endwhile; else:
						nothing_found();
					endif;?>

				</main> <!-- // main.region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
