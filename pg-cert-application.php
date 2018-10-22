<?php
/*
 Template Name: Certification - Application
 *
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-no-sidebar pg-cert-application">
			<div class="wrap">
				<div class="region">
					<main>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article>

								<?php $logged_in = is_user_logged_in();?>

								<?php if($logged_in):?>
									<header class="page-header">
										<h1 class="page-title"><?php the_title();?></h1>
									</header>
								<?php else:?>
									<header class="page-header not-logged-in">
										<h1 class="page-title"><?php the_title();?></h1>
										<p><?php babel("You must be logged in to apply for certification. If you already have an account with us, please sign in below. Otherwise, click 'Sign up' to create a new account.");?></p>
									</header>
								<?php endif;?>

								<?php if(is_user_logged_in()):?>
									<div class="entry-content page-effect">
										<?php the_content();?>
									</div>
								<?php else:
									echo "<div class='woocommerce entry-content'>";
										include(locate_template('woocommerce/myaccount/form-login.php'));
									echo "</div>";
								endif;?>

							</article>

						<?php endwhile; else:
							nothing_found();
						endif;?>

					</main>
				</div> <!-- // .region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
