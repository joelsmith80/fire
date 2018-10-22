<?php get_header();?>

		<div id="content" class="site-content-space about-page page-with-grid-mosaic-top">


      <?php if(have_posts()):?>

        <?php while(have_posts()): the_post();?>

					<section class="grid-mosaic-section">
						<div class="wrap">
							<header class="page-header region">
								<h1 class="page-title"><?php the_title();?></h1>
							</header>
							<div class="region">
								<?php include(locate_template("templates/grid-mosaic.php"));?>
							</div>
						</div>
					</section>

					<section class="about-page-intro page-with-grid-mosaic-top-intro">
						<div class="wrap">

							<div class="about-page-intro-sidebar page-with-grid-mosaic-top-intro-sidebar region t-4 d-3 w-3">
								<nav class="internal-page-nav">
									<?php wp_nav_menu(array(
										'menu' => __( 'About-Page Options', 'bonestheme' ),  // nav name
										'theme_location' => 'about-us',                 // where it's located in the theme
										'container' => false
									)); ?>
								</nav>
							</div>

							<div class="about-page-intro-main page-with-grid-mosaic-top-intro-main entry-content region t-8 d-9 w-9">
								<?php the_content();?>
							</div>

						</div>
					</section>

					<section class="our-mission">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php echo _e("Our Mission","focustheme");?></h2>
							</header>
							<div class="our-mission-main region t-4 d-4 w-4">
								<p>Visual Thinking Strategies (VTS) transforms the way students think and learn. Based in theory and research, our program uses skilled facilitation of visual art discussions to significantly increase student engagement, performance, and enjoyment of learning.</p>
								<p>We believe that rigorous discussion about visual art activates unique, transformational learning accessible to all.</p>
								<p>As a team of student-centered educators we are dedicated to cultivating flexible, curious learners. We envision a culture where careful listening and engagement build a community of open-minded and thoughtful citizens.</p>
							</div>
							<div class="our-mission-aside region t-8 d-8 w-8">
								<ul class="our-mission-statements">
									<li>To empower individuals to broaden their capacity to make meaning</li>
									<li>To shift education practice to prioritize facilitation of learner experience</li>
									<li>To connect the VTS network to foster collaboration and reflective practice</li>
								</ul>
							</div>
						</div>
					</section>

					<section class="opportunities-banner">
    				<div class="wrap">
              <div class="region">
                <h2><a href="/opportunities">Opportunities with VTS</a></h2>
              </div>
    				</div>
    			</section>

          <?php
          // FETCH ALL STAFF MEMBERS
          $staff = new WP_Query(array(
            'post_type' => 'vts_person',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'asc'
          ));
          if($staff):?>
            <section class="staff-grid-section white-stripes">
              <div class="wrap">
                <div class="region">
                  <header class="section-header">
                    <h2 class="section-title"><?php echo _e("Our Team","focustheme");?></h2>
                  </header>
                  <ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">
                    <?php while($staff->have_posts()) : $staff->the_post();?><li class="card-set-item">
                      <?php
                      $id = get_the_ID();
                      $name = get_the_title();
                      $title = get_post_meta($id,'vts_person_job_title',true);
                      $link = get_the_permalink();
                      $tempImg = get_the_post_thumbnail($id,'square-375');
                      if($tempImg == ""){
                        $img = "<img src='" . get_stylesheet_directory_uri() . "/library/images/chris.jpg" . "'>";
                      } else {
                        $img = $tempImg;
                      }
                      include(locate_template("templates/cards/staff.php"));?>
                    </li><?php endwhile;?>
                  </ul>
                </div>
              </div>
            </section>
          <?php endif;?>

					<section class="by-the-numbers cf">
						<header class="section-header">
							<h2 class="section-title"><?php echo _e("By the Numbers","focustheme");?></h2>
						</header>
						<ul class="by-the-numbers-list"><!--
						--><li>
								<p><span>12,750</span> students engaging in VTS image discussions</p>
							</li><!--
							--><li>
								<p><span>1,200</span> participants developing facilitation skills in VTS workshops</p>
							</li><!--
							--><li>
								<p><span>650</span> average weekly comments on the <i>New York Times</i> "What's Going On In This Picture?" feature</p>
							</li><!--
							--><li>
								<p><span>28</span> countries around the globe with lively VTS programs</p>
							</li><!--
							--><li>
								<p><span>58</span> museums hosting VTS workshops</p>
							</li><!--
							--><li>
								<p><span>141</span> image discussions a VTS student participates in by the end of fifth grade</p>
							</li><!--
						--></ul>
					</section>

          <section class="partners-grid-section">
            <div class="wrap">
              <div class="region">
                <header class="section-header">
                  <h2 class="section-title"><?php echo _e("Featured Partners","focustheme");?></h2>
									<p><?php echo _e("Thank you to all our partners who make this work possible.","focustheme");?></p>
                </header>
                <ul class="partners-grid card-set flexgrid m1-one m2-two t-three d-three w-three">
                  <li class="card-set-item">
                    <div class="card card-partner">
        							<a href="http://www.dublincityartsoffice.ie/" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/dublin.jpg" alt="Dublin City Council Arts Office logo">
        								<p class="card-title">Dublin City Council Arts Office</p>
        							</a>
                    </div>
      						</li><!--
      						--><li class="card-set-item">
                    <div class="card card-partner">
        							<a href="http://www.gardnermuseum.org/home" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/isgm.jpg" alt="Isabella Stewart Gardner Museum logo">
        								<p class="card-title">Isabella Stewart Gardner Museum</p>
        							</a>
                    </div>
      						</li><!--
      						--><li class="card-set-item">
                    <div class="card card-partner">
        							<a href="https://www.nytimes.com/column/learning-whats-going-on-in-this-picture" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/learningnetwork.jpg" alt="The New York Times Learning Network logo">
        								<p class="card-title">The New York Times Learning Network</p>
        							</a>
                    </div>
      						</li><!--
      						--><li class="card-set-item">
                    <div class="card card-partner">
        							<a href="https://www.ucc.ie/en/vts/" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/cork.jpg" alt="University College Cork logo">
        								<p class="card-title">University College Cork</p>
        							</a>
                    </div>
      						</li><!--
      						--><li class="card-set-item">
                    <div class="card card-partner">
        							<a href="https://www.wildcenter.org/" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/wild-center.jpg" alt="Wild Center logo">
        								<p class="card-title">The Wild Center</p>
        							</a>
                    </div>
      						</li><!--
      						--><li class="card-set-item">
                    <div class="card card-partner">
        							<a href="http://www.seattleartmuseum.org/" target="_blank" rel="noopener">
        								<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logos/sam.png" alt="Seattle Art Museum logo"/>
        								<p class="card-title">Seattle Art Museum</p>
        							</a>
                    </div>
      						</li>
                </ul>
              </div>
            </div>
          </section>

        <?php endwhile;?>

      <?php else:?>
        <div class="wrap">
          <div class="region">
						<?php nothing_found();?>
          </div>
        </div>
      <?php endif;?>

    </div>

<?php get_footer();?>
