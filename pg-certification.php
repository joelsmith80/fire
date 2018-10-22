<?php
/*
 Template Name: Certification Landing Page
 *
*/
?>

<?php get_header();?>

		<div id="content" class="site-content-space cert-page">


      <?php if(have_posts()):?>

        <?php while(have_posts()): the_post();?>

					<?php

					// get all meta
					$meta = get_post_meta(get_the_ID());

					// process the Benefits acf section
					$meta['benefits']['intro'] = (isset($meta['vts_cert_main_benefits_intro']) && !empty($meta['vts_cert_main_benefits_intro'][0])) ? wp_kses_post(wpautop($meta['vts_cert_main_benefits_intro'][0])) : '';
					$repeater = (isset($meta['vts_cert_main_benefits_list'])) ? $meta['vts_cert_main_benefits_list'][0] : 0;
					if($repeater){
						$list = array();
						for($x = 0; $x < $repeater; $x++){
							$list[] = wp_kses_post($meta['vts_cert_main_benefits_list_' . $x . '_item'][0]);
						}
						$meta['benefits']['list'] = $list;
					} else {
						$meta['benefits']['list'] = null;
					}

					// process the Profiles acf section
					$meta['profiles']['intro'] = (isset($meta['vts_cert_main_profiles_intro']) && !empty($meta['vts_cert_main_profiles_intro'][0])) ? wp_kses_post(wpautop($meta['vts_cert_main_profiles_intro'][0])) : '';
					$repeater = (isset($meta['vts_cert_main_profiles_list'])) ? $meta['vts_cert_main_profiles_list'][0] : 0;
					if($repeater){
						for($x = 0; $x < $repeater; $x++){
							$list = array();
							$list['title'] = sanitize_text_field($meta['vts_cert_main_profiles_list_' . $x . '_title'][0]);
							$list['icon'] = sanitize_text_field($meta['vts_cert_main_profiles_list_' . $x . '_icon'][0]);
							$list['item'] = wp_kses_post($meta['vts_cert_main_profiles_list_' . $x . '_item'][0]);
							$meta['profiles']['list'][] = $list;
						}
					} else {
						$meta['profiles']['list'] = null;
					}

					// process the Designations acf section
					$repeater = (isset($meta['vts_cert_main_designations_list'])) ? $meta['vts_cert_main_designations_list'][0] : 0;
					if($repeater){
						for($x = 0; $x < $repeater; $x++){
							$list = array();
							$thumb = get_stylesheet_directory_uri() . '/library/images/icons/certification/vts-';
							$list['page'] = (isset($meta['vts_cert_main_designations_list_' . $x . '_page']) && intval($meta['vts_cert_main_designations_list_' . $x . '_page'][0])) ? get_permalink($meta['vts_cert_main_designations_list_' . $x . '_page'][0]) : null;
							$list['active'] = (isset($meta['vts_cert_main_designations_list_' . $x . '_active']) && $meta['vts_cert_main_designations_list_' . $x . '_active'][0] == 1) ? 1 : 0;
							$list['title'] = sanitize_text_field($meta['vts_cert_main_designations_list_' . $x . '_title'][0]);
							$list['sub'] = (isset($meta['vts_cert_main_designations_list_' . $x . '_subtitle']) && trim(str_replace('&nbsp;','',strip_tags($meta['vts_cert_main_designations_list_' . $x . '_subtitle'][0]))) !== '') ? sanitize_text_field($meta['vts_cert_main_designations_list_' . $x . '_subtitle'][0]) : null;
							$list['link'] = (isset($meta['vts_cert_main_designations_list_' . $x . '_application_link']) && trim(str_replace('&nbsp;','',strip_tags($meta['vts_cert_main_designations_list_' . $x . '_application_link'][0]))) !== '') ? esc_url($meta['vts_cert_main_designations_list_' . $x . '_application_link'][0]) : null;
							if($list['title'] == 'Facilitator'){
								$list['thumb'] = $thumb . "facilitator-seal-sm.png";
							} elseif($list['title'] == 'Coach'){
								$list['thumb'] = $thumb . "coach-seal-sm.png";
							} else {
								$list['thumb'] = $thumb . "trainer-seal-sm.png";
							}
							$meta['designations']['list'][] = $list;
						}
					} else {
						$meta['designations']['list'] = null;
					}?>

					<header class="page-header">
						<div class="wrap">
							<div class="region">
								<h1 class="page-title"><?php the_title();?></h1>
							</div>
						</div>
					</header>

					<section class="cert-page-intro">
						<div class="wrap">

							<div class="cert-page-intro-image-area region t-12 d-12 w-12">
								<?php the_post_thumbnail('max-natural');?>
							</div>

							<div class="cert-page-intro-main-wrapper">
								<div class="about-page-intro-sidebar region t-3 d-3 w-3">
									<nav class="internal-page-nav" data-action="swoop-to">
										<ul class="menu">
											<li><a href="#cert-benefits"><?php babel("Benefits");?></a></li>
											<li><a href="#cert-opportunities"><?php babel("Who Is This For?");?></a></li>
											<li><a href="#cert-pathways"><?php babel("Apply Now");?></a></li>
											<li><a href="#cert-directory"><?php babel("Find a Practitioner");?></a></li>
										</ul>
									</nav>
								</div>
								<div class="cert-page-intro-main entry-content region t-9 d-9 w-9">
									<?php the_content();?>
								</div>
							</div>

						</div>
					</section>

					<section id="cert-benefits" class="cert-benefits">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php echo _e("Benefits of Certification","focustheme");?></h2>
							</header>
							<div class="cert-benefits-main region t-4 d-4 w-4">
								<?php compose($meta['benefits']['intro']);?>
							</div>
							<div class="cert-blue-list-area region t-8 d-8 w-8">
								<?php if($meta['benefits']['list']):?>
									<ul class="cert-blue-list">
										<?php foreach($meta['benefits']['list'] as $item):?>
											<li><?php echo $item;?></li>
										<?php endforeach;?>
									</ul>
								<?php endif;?>
							</div>
						</div>
					</section>

					<section id="cert-opportunities" class="cert-opportunities">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php babel("Who Is This For?");?></h2>
							</header>
							<div class="section-intro region">
								<?php echo $meta['profiles']['intro'];?>
							</div>
							<div class="section-content main region t-12 t-12 w-12">

								<?php if($meta['profiles']['list']):?>
									<ul class="cert-opportunities-profiles flexgrid m2-two t-four d-four w-four">
										<?php foreach($meta['profiles']['list'] as $item):?>
											<li class="<?php echo $item['icon'];?>">
												<h3><?php echo $item['title'];?></h3>
												<p><?php echo $item['item'];?></p>
											</li>
										<?php endforeach;?>
									</ul>
								<?php endif;?>
							</div>
						</div>
					</section>

					<section id="cert-pathways" class="cert-pathways">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php babel("Certification Designations");?></h2>
								<p><?php babel("Choose the type of endorsement that works for you");?></p>
							</header>
							<div class="cert-pathways-main section-content region">

								<?php if($meta['designations']['list']):?>
									<ul class="cert-pathways-menu card-set flexgrid m2-two t-three d-three w-three">
										<?php foreach($meta['designations']['list'] as $item):?>
											<li class="cert-pathways-menu-item card-set-item">
												<div class="card card-pathway<?php if($item['active']) echo ' has-action-tray'; else echo ' inactive';?>">
													<div class="card-image-space">
														<img src="<?php echo $item['thumb'];?>" alt="<?php echo $item['title'];?> VTS seal">
													</div>
													<?php if($item['active']):?>
														<div class="card-text-space">
															<h3 class="card-title"><?php echo $item['title'];?></h3>
															<p class="card-subtitle"><?php echo $item['sub'];?></p>
														</div>
														<div class="card-action-tray">
															<a href="<?php if($item['page']) echo $item['page']; else echo '#';?>" class="button"><?php echo _e("Learn More","focustheme");?></a>
															<?php if(isset($item['link']) && !empty_content($item['link'])):?>
																<a href="<?php echo $item['link'];?>" class="button"><?php babel("Apply Now");?></a>
															<?php endif;?>
													  </div>
													<?php else:?>
														<div class="card-text-space">
															<h3 class="card-title"><?php echo $item['title'];?></h3>
															<p class="card-subtitle"><?php echo babel("Coming soon...");?></p>
														</div>
													<?php endif;?>
												</div>
											</li>
										<?php endforeach;?>
									</ul>
								<?php endif;?>
							</div>
						</div>
					</section>

					<section id="cert-directory" class="cert-directory">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php babel("Find a Certified Practitioner");?></h2>
								<p><?php babel("Search our directory for a licensed facilitator");?></p>
								<a href="/certification/directory" class="button"><?php babel("Search the directory");?></a>
							</header>
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
