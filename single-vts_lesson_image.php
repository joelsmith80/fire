<?php get_header();?>

		<div id="content" class="site-content-space layout-clear-hero single-lesson-image">
      <main class="wrap hero-section">

        <?php if(have_posts()):?>

          <header class="page-header region">
            <h1 class="page-title"><?php the_title();?></h1>
          </header>

          <?php if(can_see_membership_stuff()):?>

						<?php while(have_posts()): the_post();?>

              <div class="region aside t-6 d-6 w-6">
                <?php the_post_thumbnail('max-natural');?>
              </div>

              <div class="region main t-6 d-6 w-6">

                <dl>

                  <?php $postID = get_the_ID();?>

                  <dt><?php if(is_asian_art($postID)) echo _e("Subject","focustheme"); else echo __("Title","focustheme");?></dt>
                  <dd><?php the_title();?></dd>

                  <?php $acf_artist = get_post_meta($postID,"vts_lesson_image_artist",true);
                  if($acf_artist != ""):?>
                    <dt><?php echo __("Artist","bonestheme");?></dt>
                    <dd><?php echo esc_html($acf_artist);?></dd>
                  <?php endif;?>

                  <?php $acf_date = get_post_meta($postID,"vts_lesson_image_date",true);
                  if($acf_date != ""):?>
                    <dt><?php echo __("Date","focustheme");?></dt>
                    <dd><?php echo esc_html($acf_date);?></dd>
                  <?php endif;?>

                  <?php $acf_medium = get_post_meta($postID,"vts_lesson_image_medium",true);
                  if($acf_medium != ""):?>
                    <dt><?php echo __("Medium","focustheme");?></dt>
                    <dd><?php echo esc_html($acf_medium);?></dd>
                  <?php endif;?>

                  <?php $acf_dimensions = get_post_meta($postID,"vts_lesson_image_dimensions",true);
                  if($acf_dimensions != ""):?>
                    <dt><?php echo __("Dimensions","focustheme");?></dt>
                    <dd><?php echo esc_html($acf_dimensions);?></dd>
                  <?php endif;?>

                  <?php $acf_location = get_post_meta($postID,"vts_lesson_image_location",true);
                  if($acf_location != ""):?>
                    <dt><?php echo __("Location","focustheme");?></dt>
                    <dd><?php echo esc_html($acf_location);?></dd>
                  <?php endif;?>

                  <?php $acf_link = get_post_meta($postID,"vts_lesson_image_additional_info",true);
                  if($acf_link != ""):?>
                    <p><a href="<?php echo esc_url($acf_link);?>" target="_blank" rel="noopener"><?php echo __("Additional Info","focustheme");?></a></p>
                  <?php endif;?>

                </dl>
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
