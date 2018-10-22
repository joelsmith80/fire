<?php
/*
 Template Name: Certification Scholarships
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space cert-scholarships">
			<div class="wrap">

				<main>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article>
							<header class="page-header region">
								<h1 class="page-title"><?php the_title();?></h1>
							</header>
							<div class="entry-content region d-9 w-9">
								<?php the_content();?>
							</div>
							<aside class="region d-3 w-3">
								<?php wp_nav_menu(array(
									'container' => 'nav',
									'container_class' => 'internal-page-nav',
									'menu' => __( 'Certification', 'focustheme' ),
									'menu_class' => 'menu',
									'theme_location' => 'certification'
								)); ?>
							</aside>
						</article>
					<?php endwhile; else:
						echo _e("Sorry, nothing found.","focustheme");
					endif;?>
				</main>

			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
