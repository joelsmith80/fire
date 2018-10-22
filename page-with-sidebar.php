<?php
/*
 Template Name: Page With Sidebar
 *
 * Basic white "page" look, with a sidebar on the gray background
 * 
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-sidebar">
			<div class="wrap">
				<div class="region d-9 w-9">
					<main>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article>
								<header class="page-header">
									<h1 class="page-title"><?php the_title();?></h1>
								</header>
								<div class="entry-content page-effect">
									<?php the_content();?>
								</div>
							</article>
						<?php endwhile; else:
							echo _e("Sorry, nothing found.","focustheme");
						endif;?>
					</main>
				</div> <!-- // .region -->
				<aside class="region d-3 w-3">
					<?php dynamic_sidebar('post-page');?>
				</aside>
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
