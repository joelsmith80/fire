<?php get_header();?>

		<div id="content" class="site-content-space">
      <main class="wrap">

        <?php if(have_posts()):?>

          <header class="page-header region">
            <h1 class="page-title"><?php the_title();?></h1>
          </header>

          <?php if(can_see_membership_stuff()):?>

            <?php while(have_posts()): the_post();?>

              <div class="region intro t-12 d-4 w-3">
                <?php the_content();
                $misc_files = get_post_meta(get_the_ID(),'vts_thinking_assess_aside',true);
                if(!empty($misc_files)):?>
								<nav class="student-thinking-assessments-nav">
	                <ul>
	                  <?php foreach($misc_files as $file):?>
	                    <li><a href="<?php echo wp_get_attachment_url($file);?>" rel="bookmark"><?php echo get_the_title($file);?></a></li>
	                  <?php endforeach;?>
											<li><a href="/curriculum/student-thinking-assessment-projections">Images for Projection</a></li>
	                </ul>
								</nav>
                <?php endif;?>
              </div>

              <div class="region main t-12 d-8 w-9">

                <?php
                // get the associated files
                $files = get_post_meta(get_the_ID(),'vts_file_display',true);
                // debug($files);
                if(count($files > 0)):?>
                <ul class="card-set flexgrid m1-one m2-two t-two d-two w-three">
                  <?php foreach($files as $file):?><li class="card-set-item">
                    <?php
                    $title = get_the_title($file);
                    $link = wp_get_attachment_url($file);
                    $thumb = wp_get_attachment_image_src(get_post_meta($file,'vts_doc_featured_image',true), 'square-375');
                    $image = $thumb[0];
                    include(locate_template("templates/cards/download-with-image.php"));
                    ?>
                  </li><?php endforeach;?>
                </ul>
                <?php endif;?>
              </div>

            <?php endwhile;?>

          <?php else:?>
						<div class="region">
            	<?php include(locate_template("templates/messages/not-allowed.php"));?>
						</div>
          <?php endif;?>

        <?php else:?>
					<div class="region">
          	<?php include(locate_template("templates/messages/none-found.php"));?>
					</div>
        <?php endif;?>

      </main>
    </div>

<?php get_footer();?>
