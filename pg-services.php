<?php get_header(); ?>

		<div id="content" class="site-content-space services-page">
			<main class="wrap">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article>

						<header class="page-header region">
							<h1 class="page-title"><?php the_title();?></h1>
							<?php the_content();?>
						</header>

						<div class="main region">

							<ul class="card-set flexgrid m1-one m2-two t-two d-two w-two">

								<?php $postID = get_the_ID();?>

								<?php $schoolPrograms = get_post_meta($postID,"vts_services_school",true);
								if($schoolPrograms != ""):?><li id="school-programs" class="card-set-item">
									<div class="card card-services">
										<div class="card-image-space">
											<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/services/school-programs-2.jpg" alt="VTS school programs">
										</div>
										<div class="card-text-space">
											<h2 class="card-title"><?php echo _e("School Programs","focustheme");?></h2>
											<div class="card-body-text"><?php echo wp_kses_post(wpautop($schoolPrograms)); ?></div>
										</div>
									</div>
								</li><?php endif;?>

								<?php $consulting = get_post_meta($postID,"vts_services_consulting",true);
								if($consulting != ""):?><li id="consulting" class="card-set-item">
									<div class="card card-services">
										<div class="card-image-space">
											<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/services/consulting.jpg" alt="VTS consulting">
										</div>
										<div class="card-text-space">
											<h2 class="card-title"><?php echo _e("Consulting","focustheme");?></h2>
											<div class="card-body-text"><?php echo wp_kses_post(wpautop($consulting));?></div>
										</div>
									</div>
								</li><?php endif;?>

								<?php $speaking = get_post_meta($postID,"vts_services_speaking",true);
								if($speaking != ""):?><li class="card-set-item">
									<div class="card card-services">
										<div class="card-image-space">
											<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/services/speaking.jpg" alt="Hire VTS for speaking engagements">
										</div>
										<div class="card-text-space">
											<h2 class="card-title"><?php echo _e("Speaking Engagements","focustheme");?></h2>
											<div class="card-body-text"><?php echo wp_kses_post(wpautop($speaking));?></div>
										</div>
									</div>
								</li><?php endif;?>

								<?php $shadow = get_post_meta($postID,"vts_services_shadow",true);
								if($shadow != ""):?><li class="card-set-item">
									<div class="card card-services">
										<div class="card-image-space">
											<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/services/shadow-a-trainer.jpg" alt="Shadow a VTS trainer">
										</div>
										<div class="card-text-space">
											<h2 class="card-title"><?php echo _e("Shadow a Trainer","focustheme");?></h2>
											<div class="card-body-text"><?php echo wp_kses_post(wpautop($shadow));?></div>
										</div>
									</div>
								</li><?php endif;?>

							</ul>

							<p class="experimental-disclaimer">Photos 1, 2, and 4 by <a href="http://dapingluo.com/" target="_blank" rel="noopener">Da Ping</a></p>

						</div>
					</article>

				<?php endwhile; else:?>
					<div class="region">
						<?php nothing_found();?>
					</div>
				<?php endif;?>

			</main> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
