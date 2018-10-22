<?php get_header();?>

		<main id="content" class="site-content-space single-curriculum-page">
			<div class="wrap">

				<?php if(have_posts()) : while(have_posts()) : the_post();?>

					<header class="page-header region">
						<h1 class="page-title"><?php the_title();?></h1>
					</header>

					<?php if(can_see_membership_stuff()):?>

						<div class="intro region">
							<?php the_content();?>
						</div>

						<div class="single-curriculum-lessons region">

							<?php $lessons = get_field('vts_lesson_content');
							$lessonCount = count($lessons);
							if($lessons){
								foreach($lessons as $lesson){
									$lessonTitle = $lesson['vts_lesson_content_title'];
									$images = $lesson['vts_lesson_content_images'];?>
									<div class="single-curriculum-lesson" data-role="lightbox-create">
										<ul class="single-curriculum-lesson-set lesson-set card-set flexgrid m1-one m2-two t-three d-three w-four">
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
								<?php }
							}

							if(has_term('experimental','vts_curriculum_set')):?>
								<p class="experimental-disclaimer"><?php echo _e("Note: This image set is currently under pilot study and should be considered experimental.","focustheme");?></p>
							<?php endif;?>

						</div>

					<?php // else if not a member
					else:?>
						<div class="region">
							<?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
					<?php endif;?>

				<?php
				// end the loop
				endwhile; else:?>
					<div class="region">
						<?php nothing_found("Sorry, we couldn't find the image set you're looking for.");?>
					</div>
				<?php endif;?>
			</div>
		</main>

<?php get_footer();?>
