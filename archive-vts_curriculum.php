<?php get_header();?>

		<main id="content" class="site-content-space curriculum-archive">

			<section class="curriculum-archive-intro">
        <div class="wrap">
          <div class="region">
            <header class="page-header">
              <h1 class="page-title"><?php echo _e("Curriculum","focustheme");?></h1>
            </header>
						<?php if(!can_see_membership_stuff()){
							include(locate_template("templates/messages/not-allowed.php"));
						}?>
					</div>
				</div>
			</section>

      <?php if(can_see_membership_stuff()):

	      // GET CORE VTS SETS
	      $core = new WP_Query(
	        array(
	          'posts_per_page' => -1,
	          'post_type' => 'vts_curriculum',
	          'orderby' => 'menu_order',
	          'order' => 'asc',
	          'tax_query' => array(
	            array(
	              'taxonomy' => 'vts_curriculum_set',
	              'field' => 'slug',
	              'terms' => 'core'
	            )
	          )
	        )
	      );

        if($core->have_posts()):?>
					<section class="core-curriculum-sets-section">
						<div class="wrap">
							<div class="region">
	              <ul class="flexgrid card-set m1-one m2-two t-three d-three w-three">
	                <?php while($core->have_posts()): $core->the_post();?><li class="card-set-item">
	                  <?php
	                  $id = get_the_ID();
	                  $link = get_the_permalink($id);
	                  $img = get_the_post_thumbnail($id,"square-375");
	                  $tempTitle = trim(get_post_meta($id,"vts_curriculum_alternative_title",true));
	                  if($tempTitle != ""){
	                    $title = esc_html($tempTitle);
	                  } else {
	                    $title = get_the_title($id);
	                  }
	                  $relatedSets = get_post_meta($id,"vts_related_curriculum_sets",true);
	                  if($relatedSets){
	                    include(locate_template("templates/cards/curric-set-with-menu.php"));
	                  } else {
	                    include(locate_template("templates/cards/curric-set.php"));
	                  }?>
	                </li><?php endwhile;?>
	              </ul>
							</div>
						</div>
					</section>
				<?php endif;?>

	      <?php
	      // GET MUSEUM SETS
	      $museum = new WP_Query(
	        array(
	          'posts_per_page' => -1,
	          'post_type' => 'vts_curriculum',
	          'tax_query' => array(
	            'relation' => 'OR',
	            array(
	              'taxonomy' => 'vts_curriculum_set',
	              'field' => 'slug',
	              'terms' => 'museum'
	            ),
	            array(
	              'taxonomy' => 'vts_curriculum_set',
	              'field' => 'slug',
	              'terms' => 'peer-to-peer'
	            )
	          ),
						'meta_query' => array(
							array(
								'key' => 'vts_curriculum_subsidiary_set',
								'compare' => '!=',
								'value' => '1'
							)
						),
	          'orderby' => 'menu_order',
	          'order' => 'asc'
	        )
	      );

				if($museum->have_posts()):?>
		      <section id="partner-sets" class="white-stripes">
		        <div class="wrap">
		          <div class="region">
								<header class="section-header">
		            	<h2 class="section-title"><?php echo _e("Partner Image Sets","focustheme");?></h2>
								</header>
		            <ul class="flexgrid card-set m1-one m2-two t-three d-three w-three">
		              <?php while($museum->have_posts()): $museum->the_post();?><li class="card-set-item">
		                <?php
		                $id = get_the_ID();
		                $link = get_the_permalink($id);
		                $img = get_the_post_thumbnail($id,"square-375");
		                $tempTitle = trim(get_post_meta($id,"vts_curriculum_alternative_title",true));
		                if($tempTitle != ""){
		                  $title = esc_html($tempTitle);
		                } else {
		                  $title = get_the_title($id);
		                }
		                $relatedSets = get_post_meta($id,"vts_related_curriculum_sets",true);
		                if($relatedSets){
		                  include(locate_template("templates/cards/curric-set-with-menu.php"));
		                } else {
		                  include(locate_template("templates/cards/curric-set.php"));
		                }?>
		              </li><?php endwhile;?>
		            </ul>
		          </div>
		        </div>
		      </section>
      	<?php endif;?>

			<?php endif;?>
    </main>

<?php get_footer();?>
