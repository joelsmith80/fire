<?php get_header();?>

		<div id="content" class="site-content-space dashboard">
      <main>

        <?php if(have_posts()): while(have_posts()): the_post();?>

					<?php if(can_see_membership_stuff()):?>

					<section class="dashboard-welcome white-stripes">
						<div class="wrap">
							<header class="page-header region">
		            			<h1 class="page-title"><?php babel("Welcome to Your Subscriber Dashboard");?></h1>
								<?php the_content();?>
								<a href="/my-account" class="button"><?php babel("Manage Account");?></a>
		          			</header>
						</div>
					</section>

					<section class="dashboard-main">
						<div class="wrap">

              				<div class="dashboard-image-sets-section region t-4 d-4 w-4">
								<header class="section-header">
									<h2 class="section-title"><a href="/curriculum"><?php babel("Image Curriculum");?></a></h2>
								</header>
								<?php
								// Check for curriculum-set viewing history
								$user = wp_get_current_user();
								if(has_vts_curriculum_view_order($user->ID)):?>
									<nav class="dashboard-curriculum-nav">
										<ul>
											<li><?php babel("Most viewed");?> |</li>
											<li><a href="/curriculum">All</a></li>
										</ul>
									</nav>
								<?php else:?>
									<nav class="dashboard-curriculum-nav">
										<ul>
											<li><a href="/curriculum">All</a></li>
										</ul>
									</nav>
								<?php endif;
								// make the query, spit out results
								$sets = get_vts_curriculum_view_order($user->ID,1);?>
								<ul class="image-sets card-set flexgrid m1-two m2-two t-one d-one w-one">
									<?php if(!empty($sets['history'])){
										foreach($sets['history'] as $set):?><li class="card-set-item image-set most-viewed">
											<?php
		                  					$id = $set->ID;
		                  					$link = get_the_permalink($set->ID);
		                  					$img = get_the_post_thumbnail($set->ID,"square-375");
		                  					$tempTitle = trim(get_post_meta($set->ID,"vts_curriculum_alternative_title",true));
		                  					if($tempTitle != ""){
		                    					$title = esc_html($tempTitle);
		                  					} else {
		                    					$title = get_the_title($set->ID);
		                  					}
											include(locate_template("templates/cards/curric-set.php"));?>
										</li><?php endforeach;
									}
									if(!empty($sets['core'])){
										foreach($sets['core'] as $set):?><li class="image-set card-set-item">
											<?php
		                  					$id = $set->ID;
		                  					$link = get_the_permalink($set->ID);
		                  					$img = get_the_post_thumbnail($set->ID,"square-375");
		                  					$tempTitle = trim(get_post_meta($set->ID,"vts_curriculum_alternative_title",true));
		                  					if($tempTitle != ""){
		                    					$title = esc_html($tempTitle);
		                  					} else {
		                    					$title = get_the_title($set->ID);
		                  					}
											include(locate_template("templates/cards/curric-set.php"));?>
										</li><?php endforeach;
									}?><li class="image-set dummy card-set-item">
										<div class="card card-curriculum-menu-item">
											<div class="card-image-space">
												<a href="/curriculum">
													<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/image-set-dummy.jpg" alt="VTS The Nightwatch">
												</a>
											</div>
											<div class="card-text-space">
												<a href="/curriculum">
													<h3 class="card-title"><?php babel("All Curriculum");?></h3>
												</a>
											</div>
										</div>
									</li>
								</ul>
              				</div>

							<div class="dashboard-tools-section region t-8 d-8 w-8">
								<header class="section-header">
									<h2 class="section-title"><?php babel("Tools");?></h2>
								</header>
								<ul class="dashboard-toolset card-set flexgrid m1-one m2-two t-one d-one w-one">
									<li class="tool card-set-item">
										<div class="card">
											<a href="/doing-vts">
												<div class="card-text-space">
													<h3 class="card-title"><?php babel("Facilitating a VTS Session");?></h3>
													<p><?php babel("Explore the elements and environment of VTS");?></p>
												</div>
											</a>
										</div>
									</li>
									<li class="tool card-set-item">
										<div class="card">
											<a href="/printable-materials">
												<div class="card-text-space">
													<h3 class="card-title"><?php babel("Printables, Guides and Handouts");?></h3>
													<p><?php babel("Classroom and training materials");?></p>
												</div>
											</a>
										</div>
									</li>
									<li class="tool card-set-item">
										<div class="card">
											<a href="/student-thinking-assessments">
												<div class="card-text-space">
													<h3 class="card-title"><?php babel("Student Thinking Assessments");?></h3>
													<p><?php babel("Printable assessments, protocols, and the rubric for scoring");?></p>
												</div>
											</a>
										</div>
									</li>
									<li class="tool reflection card-set-item">
										<div class="card-text-space">
											<h3 class="card-title"><?php babel("Facilitator Reflection");?></h3>
											<ul>
												<li><a href="/wp-content/uploads/2016/07/self-assessment.doc"><?php babel("Self-assessment checklist");?></a></li>
												<li><a href="/wp-content/uploads/2016/07/self-assessment-reflection.doc"><?php babel("Self-assessment reflection");?></a></li>
											</ul>
										</div>
									</li>
									<li class="tool card-set-item">
										<div class="card">
											<a href="/vts-video-facilitation">
												<div class="card-text-space">
													<h3 class="card-title"><?php babel("Videos");?></h3>
													<p><?php babel("See VTS in action");?></p>
												</div>
											</a>
										</div>
									</li>
									<li class="tool card-set-item">
										<div class="card">
											<a href="/readings">
												<div class="card-text-space">
													<h3 class="card-title"><?php babel("Readings");?></h3>
													<p><?php babel("Deep-dive into critical thought and aesthetic development");?></p>
												</div>
											</a>
										</div>
									</li>
								</ul>
							</div><!-- .region -->
						</div><!-- .wrap -->
					</section>

					<section class="dashboard-further-section">
						<div class="wrap">
							<div class="region">
								<header class="section-header">
									<h2 class="section-title"><?php babel("Taking VTS Further");?></h2>
								</header>
								<ul class="flexgrid m1-one m2-one t-two d-two w-two">
							    <li>
									<h3><a href="http://learning.blogs.nytimes.com/category/lesson-plans/whats-going-on-in-this-picture" target="_blank" rel="noopener noreferrer"><?php babel("VTS in the New York Times");?></a></h3>
									<p><?php babel("See the latest What's Going On In This Picture feature.");?></p>
							    </li><!--
							 --><li>
							      	<h3><a href="/online-summer-series"><?php babel("The Online Summer Series");?></a></h3>
									<p><?php babel("View the many ways VTS is being developed and applied in our growing community.");?></p>
							    </li>
							  </ul>
							</div>
						</div>
					</section>

					<?php 
					// else if not allowed to see this:
					else:?>
						<div class="wrap">
							<div class="region dashboard-not-allowed">
								<?php include(locate_template("templates/messages/not-allowed.php"));?>
							</div>
						</div>
					<?php endif;?>

		<?php 
		// end the loop 
		endwhile; else:?>
		<div class="wrap">
			<div class="region">
				<?php nothing_found();?>
			</div>
		</div>
        <?php endif;?>

      </main>
    </div>

<?php get_footer();?>
