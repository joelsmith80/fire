<?php get_header(); ?>

		<div id="content" class="site-content-space oss-page">

      <?php if(have_posts()):?>
        <?php if(can_see_membership_stuff()):?>
          <?php while(have_posts()): the_post();?>

            <section class="oss-intro-section">
              <div class="wrap">
                <header class="page-header region">
                  <h1 class="page-title"><?php the_title();?></h1>
                </header>
								<div class="page-intro region">
									<?php the_content();?>
								</div>
              </div>
            </section>

            <?php

            // make an array of the years we're looking for,
            // starting with 2015 and extending to the present year
            $starting_year = 2015;
            $year = date("Y");
            while($year >= $starting_year){
              $years[] = $year;
              $year--;
            }

            $i=1; foreach($years as $year){
              $videos = new WP_Query(array(
                'post_type' => 'vts_video',
                'category_name' => 'online-summer-series',
                'posts_per_page' => -1,
                'meta_query' => array(
                  'relation' => 'AND',
                  array(
                    'key' => 'vts_oss_date',
                    'compare' => '>=',
                    'value' => $year . '01-01'
                  ),
                  array(
                    'key' => 'vts_oss_date',
                    'compare' => '<=',
                    'value' => $year . '12-31'
                  )
                ),
                'meta_key' => 'vts_oss_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC'
              ));
              if($videos->have_posts()): ?>
                <section class="oss-sessions-grid-section oss-sessions-<?php echo $year; if(($i % 2) == 0) echo " white-stripes";?>">
                  <div class="wrap">
                    <div class="region">
                      <header class="section-header">
                        <h2 class="section-title"><?php echo $year;?></h2>
                      </header>
                      <ul class="card-set flexgrid m1-one m2-two t-three d-three w-three">
                        <?php while($videos->have_posts()):?><?php $videos->the_post();?><li class="card-set-item">
                          <?php
                          $id = get_the_ID();
                          $link = get_post_meta($id,'vts_video_url',true);
                          $tempTitle = get_post_meta($id,'vts_oss_title',true);
                          if($tempTitle != ""){
                            $title = $tempTitle;
                          } else {
                            $title = get_the_title();
                          }
                          $date = date("F j, Y",strtotime(get_post_meta($id,'vts_oss_date',true)));
                          $image = get_the_post_thumbnail($id,"square-375");
                          $body = get_the_content();
                          include(locate_template("templates/cards/video-with-excerpt.php"));?>
                          </li><?php endwhile; wp_reset_postdata();?>
                      </ul>
                    </div>
                  </div>
                </section>
              <?php $i++; endif;
             }?>

          <?php endwhile;?>
        <?php else:?>
					<section class="sole-section">
						<div class="wrap">
							<header class="page-header region">
								<h1 class="page-title"><?php the_title();?></h1>
							</header>
							<div class="region">
								<?php include(locate_template("templates/messages/not-allowed.php"));?>
							</div>
						</div>
					</section>
        <?php endif;?>
      <?php else:?>
        <?php include(locate_template("templates/messages/none-found.php"));?>
      <?php endif;?>

    </div>

<?php get_footer();?>
