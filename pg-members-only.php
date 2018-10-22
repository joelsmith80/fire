<?php get_header();?>

		<div id="content" class="site-content-space">
      <main class="wrap">

        <?php if(have_posts()):?>

          <header class="page-header region">
            <h1 class="page-title"><?php the_title();?></h1>
          </header>

          <?php if(can_see_membership_stuff()):?>

						<?php while(have_posts()): the_post();?>

              <div class="region intro t-3 d-3 w-3">
                <?php the_content();?>
              </div>

              <div class="region main t-9 d-9 w-9">

              </div>

            <?php endwhile;?>

          <?php
					// else if not a member
					else:?>
						<div class="region">
	            <?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
          <?php endif;?>

        <?php
				// else if no posts
				else:?>
					<div class="region">
	          <?php nothing_found();?>
					</div>
        <?php endif;?>

      </main>
    </div>

<?php get_footer();?>
