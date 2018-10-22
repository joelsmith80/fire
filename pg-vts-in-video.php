<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-no-sidebar">

      <?php if(have_posts()):?>
        <?php if(can_see_membership_stuff()):?>
          <?php while(have_posts()): the_post();?>

            <section class="page-intro-section">
              <div class="wrap">
                <header class="page-header region">
                  <h1 class="page-title"><?php the_title();?></h1>
									<?php the_content();?>
                </header>
								<div class="region">

									<?php
									$id = get_the_ID();
									$videos = get_post_meta($id,'vts_in_video_selections',true);
									if(!empty($videos)):?>
										<ul class="card-set will-have-action-trays flexgrid m1-one m2-two t-three d-three w-three">
											<?php foreach($videos as $vid):?><li class="card-set-item">
												<?php
												$video = get_post($vid);
												$meta = get_post_meta($vid);
												$link = $meta['vts_video_url'][0];
												$title = $video->post_title;
												$title = $video->post_title;
												$image = get_the_post_thumbnail($vid,"square-375");
												$date = "";
												$body = $video->post_content;
												include(locate_template("templates/cards/video-with-excerpt.php"));
												?>
											</li><?php endforeach;?>
										</ul>
									<?php endif;?>
								</div>
              </div>
            </section>

          <?php endwhile;?>

				<?php
				// else if not a member
				else:?>
					<div class="wrap">
						<div class="region">
          		<?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
					</div>
        <?php endif;?>

			<?php
			// else if no posts
			else:?>
				<div class="wrap">
					<div class="region">
						<?php nothing_found();?>
					</div>
				</div>
      <?php endif;?>

    </div>

<?php get_footer();?>
