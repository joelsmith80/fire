<?php get_header();?>

		<main id="content" class="site-content-space single-curriculum-page">
			<div class="wrap">

				<?php if(have_posts()) : while(have_posts()) : the_post();?>

					<header class="page-header region">
						<h1 class="page-title"><?php the_title();?></h1>
					</header>

					<?php if(can_see_membership_stuff()):?>

						<?php
						$lessons = get_field('vts_lesson_content');
						if($lessons):?>

							<?php
							$lessonCount = count($lessons);
							if(count($lessons[0]['vts_lesson_content_images']) == 3){
								$majorSize = "t-9 d-9 w-9";
								$minorSize = "t-3 d-3 w-3";
							} else {
								$majorSize = "t-8 d-8 w-8";
								$minorSize = "t-4 d-4 w-4";
							}?>

							<div class="single-curriculum-lessons region <?php echo $majorSize;?> <?php if($lessonCount == 1) echo 'single-curriculum-single-tier-set';?>">

								<?php foreach($lessons as $lesson){
									$lessonTitle = $lesson['vts_lesson_content_title'];
									$images = $lesson['vts_lesson_content_images'];?>
									<div class="single-curriculum-lesson" data-role="lightbox-create">
										<?php if($lessonCount > 1):?>
											<h2 class="single-curriculum-lesson-title"><?php echo esc_html($lessonTitle);?></h2>
										<?php endif;
										if(count($images) == 3){
											$gridClasses = "m2-three t-three d-three w-three";
										} else {
											$gridClasses = "m2-two t-two d-two w-two";
										}?>
										<ul class="single-curriculum-lesson-set card-set flexgrid m1-one <?php echo $gridClasses;?>">
											<?php $i=1;foreach($images as $id){
												$content = get_post($id);
												$imgLink = wp_get_attachment_url(get_post_thumbnail_id($id));
												$contentLink = get_the_permalink($id);
												$title = get_the_title($content->ID);
												$img = get_the_post_thumbnail($id,"square-375");?><li class="single-curriculum-lesson-set-item card-set-item">
													<?php include(locate_template("templates/cards/lesson-set-image.php"));?>
												</li><?php
											$i++;}?>
										</ul>
									</div>
								<?php }?>

								<?php

								// disclaimer for experimental sets
								if(has_term('experimental','vts_curriculum_set')):?>
									<p class="experimental-disclaimer"><?php echo _e("Note: This image set is currently under pilot study and should be considered experimental.","focustheme");?></p>
								<?php endif;

								// link to permissions document
								if(has_term('permissions','vts_curriculum_set')):?>
									<p class="experimental-disclaimer"><a href="<?php echo get_stylesheet_directory_uri();?>/library/files/image-permissions.pdf" target="_blank" rel="noopener">Download permissions for this image set</a></p>
								<?php endif;?>

							</div>

							<div class="single-curriculum-intro region entry-content <?php echo $minorSize;?>">
								<?php the_content();?>
							</div>

						<?php
						// if no images were found, show the content and an empty set
						else:?>
							<div class="single-curriculum-intro region t-3 d-3 w-3">
								<?php the_content();?>
							</div>
							<div class="single-curriculum-lessons region t-9 d-9 w-9"><?php echo _e("No images found","focustheme");?></div>
						<?php endif;?>

					<?php
					// if not allowed to see membership stuff
					else:?>
						<div class="region">
							<?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
					<?php endif;?>

				<?php endwhile;
				// else if there's nothing to show
				else:?>
					<div class="region">
						<?php nothing_found("Sorry, but we couldn't find the curriculum set you're looking for.");?>
					</div>
				<?php endif;?>

      </div>
    </main>

<?php get_footer();?>
