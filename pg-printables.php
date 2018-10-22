<?php get_header();?>

		<div id="content" class="site-content-space printables-page">
      <main class="wrap">

        <?php if(have_posts()): while(have_posts()): the_post();?>

          <header class="page-header region">
            <h1 class="page-title"><?php the_title();?></h1>
						<?php the_content();?>
          </header>

          <?php if(can_see_membership_stuff()):?>

            <div class="main region">
							<?php
							$postID = get_the_ID();
							$files = get_post_meta(get_the_ID(),"vts_subscriber_printable_files",true);
							if(!empty($files)):?>
								<ul class="printables-page-file-grid card-set flexgrid m1-one m2-two t-two d-four w-four">
									<?php foreach($files as $file):?>
										<li class="card-set-item">
											<?php
											$title = get_the_title($file);
	                    $link = wp_get_attachment_url($file);
	                    $author = "";
	                    include(locate_template("templates/cards/download-simple.php"));
											?>
										</li>
									<?php endforeach;?>
								</ul>
							<?php endif;?>
            </div>

          <?php
					// else if not a member
					else:?>
						<div class="region">
	            <?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
          <?php endif;?>

        <?php
				// else if no posts
				endwhile; else:?>
					<div class="region">
	          <?php nothing_found();?>
					</div>
        <?php endif;?>

      </main>
    </div>

<?php get_footer();?>
