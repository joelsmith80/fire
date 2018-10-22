<?php get_header(); ?>

		<div id="content" class="site-content-space page-aesthetic-development">
			<div class="wrap">
				<div class="region">
					<main>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article>

								<header class="page-header">
									<h1 class="page-title"><?php the_title();?></h1>
								</header>

								<div class="entry-content page-effect">
									<?php the_content();?>
									<h2>Aesthetic Stage Descriptions</h2>
									<h3>Stage 1 - Accountive</h3>
									<?php the_field('vts_aesth_dev_stage_1');?>
									<div class="pop-open dig-deeper">
										<h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo __("Examples of Stage 1 comments","focustheme");?></span></h4>
										<div class="main dig-deeper-main" data-action="reveal">
											<?php the_field('vts_aesth_dev_stage_1_examples');?>
										</div>
									</div>
									<h3>Stage 2 - Constructive</h3>
									<?php the_field('vts_aesth_dev_stage_2');?>
									<div class="pop-open dig-deeper">
										<h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo __("Examples of Stage 2 comments","focustheme");?></span></h4>
										<div class="main dig-deeper-main" data-action="reveal">
											<?php the_field('vts_aesth_dev_stage_2_examples');?>
										</div>
									</div>
									<h3>Stage 3 - Classifying</h3>
									<?php the_field('vts_aesth_dev_stage_3');?>
									<div class="pop-open dig-deeper">
										<h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo __("Examples of Stage 3 comments","focustheme");?></span></h4>
										<div class="main dig-deeper-main" data-action="reveal">
											<?php the_field('vts_aesth_dev_stage_3_examples');?>
										</div>
									</div>
									<h3>Stage 4 - Interpretive</h3>
									<?php the_field('vts_aesth_dev_stage_4');?>
									<div class="pop-open dig-deeper">
										<h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo __("Examples of Stage 4 comments","focustheme");?></span></h4>
										<div class="main dig-deeper-main" data-action="reveal">
											<?php the_field('vts_aesth_dev_stage_4_examples');?>
										</div>
									</div>
									<h3>Stage 5 - Re-Creative</h3>
									<?php the_field('vts_aesth_dev_stage_5');?>
									<div class="pop-open dig-deeper">
										<h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo __("Examples of Stage 5 comments","focustheme");?></span></h4>
										<div class="main dig-deeper-main" data-action="reveal">
											<?php the_field('vts_aesth_dev_stage_5_examples');?>
										</div>
									</div>
								</div>

							</article>

						<?php endwhile; else:
							include(locate_template("templates/messages/none-found.php"));
						endif;?>

					</main>
				</div> <!-- // .region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
