<?php get_header(); ?>

<div id="content" class="site-content-space training-page">
	<main>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="wrap">

				<header class="page-header region">
					<h1 class="page-title"><?php the_title();?></h1>
				</header>

				<div class="intro region t-4 d-4 w-4">
					<?php the_content();?>
				</div>

				<div class="main region t-8 d-8 w-8">

					<ul class="card-set">

						<?php $postID = get_the_ID();?>

						<?php $training = get_post_meta($postID,"vts_training_beginner",true);
						if($training != ""):?><li class="card-set-item">
							<div class="card card-training">
								<div class="card-image-space">
									<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/training_beginner.jpg" alt="VTS Beginner Practicum">
								</div>
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Beginner Practicum","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

						<?php $training = get_post_meta($postID,"vts_training_advanced",true);
						if($training != ""):?><li class="card-set-item">
							<div class="card card-training">
								<div class="card-image-space">
									<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/training_advanced.jpg" alt="VTS Advanced Practicum">
								</div>
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Advanced Practicum","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

						<?php $training = get_post_meta($postID,"vts_training_aesthetic",true);
						if($training != ""):?><li class="card-set-item">
							<div class="card card-training">
								<div class="card-image-space">
									<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/training_aesthetic.jpg" alt="VTS Aesthetic Thinking workshop">
								</div>
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Aesthetic Thinking Workshop","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

						<?php $training = get_post_meta($postID,"vts_training_coaching",true);
						if($training != ""):?><li class="card-set-item">
							<div class="card card-training">
								<div class="card-image-space">
									<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/training_coaching.jpg" alt="VTS coaching workshop">
								</div>
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Coaching Workshop","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

						<?php $training = get_post_meta($postID,"vts_training_oss",true);
						if($training != ""):?><li id="online-summer-series" class="card-set-item">
							<div class="card card-training">
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Online Summer Series","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

						<?php $training = get_post_meta($postID,"vts_training_summer_institute",true);
						if($training != ""):?><li class="card-set-item">
							<div class="card card-training">
								<div class="card-text-space">
									<div class="main">
										<h2 class="card-title"><?php echo _e("Summer Institute","focustheme");?></h2>
										<div class="card-body-text"><?php echo wp_kses_post(wpautop($training));?></div>
									</div>
								</div>
							</div>
						</li><?php endif;?>

					</ul>

					<p class="experimental-disclaimer">Photos by <a href="http://dapingluo.com/" target="_blank" rel="noopener">Da Ping Luo</a>, except Aesthetic-Thinking Workshop photo, by Paola de Bruijn</p>

				</div><!-- .main.region -->
			</article>

		<?php endwhile; else:?>
			<div class="wrap">
				<div class="region">
					<?php include(locate_template("templates/messages/none-found.php"));?>
				</div>
			</div>
		<?php endif;?>

	</main>
</div> <!-- // .site-content-space -->

<?php get_footer();?>
