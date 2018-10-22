<?php
/*
 Template Name: Site Feedback
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
				<div class="region d-3 w-3">
					<div class="widget">
						<h2 class="widget-title">Common Issues</h2>
						<ul>
							<li><p><a href="/logging-in">How to log in to the new site</a></p></li>
							<li><p><a href="/manage-group-subscriptions">How to manage group subscriptions</a></p></li>
							<li><p><a href="redeem-group-subscription">How to redeem a group subscription</a></p></li>
						</ul>
					</div>
					<?php // dynamic_sidebar('post-page');?>
				</div>
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
