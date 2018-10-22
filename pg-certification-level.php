<?php
/*
 Template Name: Certification Tier
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space page-with-no-sidebar single-cert">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php

				// get all meta
				$meta = get_post_meta(get_the_ID());

				// process the Benefits acf section
				$meta['benefits']['intro'] = (isset($meta['vts_cert_tier_benefits_intro']) && !empty($meta['vts_cert_tier_benefits_intro'][0])) ? wp_kses_post(wpautop($meta['vts_cert_tier_benefits_intro'][0])) : '';
				$repeater = (isset($meta['vts_cert_tier_benefits_list'])) ? $meta['vts_cert_tier_benefits_list'][0] : 0;
				if($repeater){
					$list = array();
					for($x = 0; $x < $repeater; $x++){
						$list[] = wp_kses_post($meta['vts_cert_tier_benefits_list_' . $x . '_item'][0]);
					}
					$meta['benefits']['list'] = $list;
				} else {
					$meta['benefits']['list'] = null;
				}

				// process the Pathways acf section
				$meta['pathways']['intro'] = (isset($meta['vts_cert_tier_pathways_intro']) && !empty($meta['vts_cert_tier_pathways_intro'][0])) ? wp_kses_post(wpautop($meta['vts_cert_tier_pathways_intro'][0])) : '';
				$meta['pathways']['map'] = (isset($meta['vts_cert_tier_pathways_map']) && !empty($meta['vts_cert_tier_pathways_map'][0])) ? sanitize_text_field($meta['vts_cert_tier_pathways_map'][0]) : '';
				$repeater = (isset($meta['vts_cert_tier_pathways_list'])) ? $meta['vts_cert_tier_pathways_list'][0] : 0;
				if($repeater){
					for($x = 0; $x < $repeater; $x++){
						$list = array();
						$list['title'] = sanitize_text_field($meta['vts_cert_tier_pathways_list_' . $x . '_title'][0]);
						$list['item'] = wp_kses_post($meta['vts_cert_tier_pathways_list_' . $x . '_item'][0]);
						$meta['pathways']['list'][] = $list;
					}
				} else {
					$meta['pathways']['list'] = null;
				}

				// process the Process acf section
				$meta['process']['intro'] = (isset($meta['vts_cert_tier_process_intro']) && !empty($meta['vts_cert_tier_process_intro'][0])) ? wp_kses_post(wpautop($meta['vts_cert_tier_process_intro'][0])) : '';
				$repeater = (isset($meta['vts_cert_tier_process_list'])) ? $meta['vts_cert_tier_process_list'][0] : 0;
				if($repeater){
					$list = array();
					for($x = 0; $x < $repeater; $x++){
						$list[] = wp_kses_post($meta['vts_cert_tier_process_list_' . $x . '_item'][0]);
					}
					$meta['process']['list'] = $list;
				} else {
					$meta['process']['list'] = null;
				}

				// process the FAQs acf section
				$repeater = (isset($meta['vts_faq'])) ? $meta['vts_faq'][0] : 0;
				if($repeater){
					$list = array();
					for($x = 0; $x < $repeater; $x++){
						$list['title'] = sanitize_text_field($meta['vts_faq_' . $x . '_title'][0]);
						$list['content'] = wp_kses_post(wpautop($meta['vts_faq_' . $x . '_content'][0]));
						$list['x'] = 0;
						$list['c'] = $x;
						$meta['faqs'][] = $list;
					}
				} else {
					$meta['faqs'] = null;
				}

				?>

				<article>

					<header class="page-header">
						<div class="wrap">
							<div class="region">
								<h1 class="page-title"><?php the_title();?></h1>
							</div>
						</div>
					</header>


					<?php // THE INTRODUCTION SECTION ?>
					<section class="single-cert-intro">
						<div class="wrap">
							<div class="region t-4 d-4 w-3">
								<div class="single-cert-intro-image-space">
									<?php the_post_thumbnail('max-natural');?>
								</div>
								<nav class="internal-page-nav" data-action="swoop-to">
									<ul>
										<li><a href="#single-cert-benefits"><?php babel("Benefits");?></a></li>
										<li><a href="#single-cert-pathways"><?php babel("Pathways");?></a></li>
										<li><a href="#single-cert-process"><?php babel("Application Process");?></a></li>
										<!--<li><a href="#">Apply Now</a></li>-->
										<li><a href="#single-cert-faqs"><?php babel("FAQs");?></a></li>
									</ul>
								</nav>
							</div>
							<div class="single-cert-intro-text region t-8 d-8 w-9">
								<?php the_content();?>
							</div>
						</div>
					</section>


					<?php // THE BENEFITS SECTION ?>
					<section id="single-cert-benefits" class="single-cert-benefits">
						<div class="wrap">
							<header class="section-header region t-12 d-12 w-12">
								<h2 class="section-title"><?php babel("Benefits");?></h2>
							</header>
							<div class="region t-4 d-4 w-4">
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


					<?php // THE PATHWAYS SECTION ?>
					<section id="single-cert-pathways" class="single-cert-pathways">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><?php babel("Pathways to Certification");?></h2>
							</header>
							<div class="section-intro region">
								<?php echo $meta['pathways']['intro'];?>
							</div>
							<div class="graphic-space region">
								<?php echo file_get_contents(get_stylesheet_directory_uri() . '/templates/metro-maps/facilitator.svg');?>
							</div>
							<div class="section-content region">
								<?php if($meta['pathways']['list']):?>
									<ul class="cert-pathway-description-list flexgrid m2-three t-three d-three w-three">
										<?php $x = 0; foreach($meta['pathways']['list'] as $item):?>
											<?php
											$color = "green";
											switch($x){
												case 0:
													$color = "green";
													break;
												case 1:
													$color = "orange";
													break;
												case 2:
													$color = "yellow";
													break;
											}?>
											<li class="cert-pathway-desc cert-pathway-desc-<?php echo $color;?>" data-desc-color="<?php echo $color;?>">
												<h3><?php echo $item['title'];?></h3>
												<?php echo $item['item'];?>
											</li>
										<?php $x++; endforeach;?>
									</ul>
								<?php endif;?>
							</div>
						</div>
					</section>


					<?php // THE APPLICATION PROCESS SECTION ?>
					<section id="single-cert-process" class="single-cert-process">
						<div class="wrap">
							<header class="section-header region t-12 d-12 w-12">
								<h2 class="section-title"><?php babel("Application Process");?></h2>
							</header>
							<div class="single-cert-process-main region t-4 d-4 w-4">
								<?php compose($meta['process']['intro']);?>
								<ul class="single-cert-process-more-options">
									<li><a href="/certification/instructions">Learn More About the Process</a></li>
									<li><a href="/certification/scholarship">Apply for a Scholarship</a></li>
								</ul>
							</div>
							<div class="cert-blue-list-area region t-8 d-8 w-8">
								<?php if($meta['process']['list']):?>
									<ol class="cert-blue-list">
										<?php foreach($meta['process']['list'] as $item):?>
											<li><?php echo $item;?></li>
										<?php endforeach;?>
									</ol>
								<?php endif;?>
							</div>
						</div>
					</section>


					<?php // THE APPLICATION CALL-TO-ACTION ?>
					<section id="single-cert-apply" class="single-cert-apply">
						<div class="wrap">
							<header class="section-header region">
								<h2 class="section-title"><a href="/certification/apply"><?php babel("Apply Now");?></a></h2>
							</header>
						</div>
					</section>


					<?php // THE FAQS SECTION (IF FAQS EXIST)
					if($meta['faqs']):?>
						<section id="single-cert-faqs" class="single-cert-faqs">
							<div class="wrap">
								<header class="section-header region">
									<h2 class="section-title"><?php babel("Frequently Asked Questions");?></h2>
								</header>
								<div class="section-content region">
									<ul class="flexgrid m2-two t-two d-two w-three">
										<?php foreach($meta['faqs'] as $item):?>
											<li><?php load_component('expando',$item);?></li>
										<?php endforeach;?>
									</ul>
								</div>
							</div>
						</section>
					<?php endif;?>

				</article>

			<?php endwhile; else:?>
				<article>
					<div class="wrap">
						<div class="region">
							<?php nothing_found();?>
						</div>
					</div>
				</article>
			<?php endif;?>

		</div>


<?php get_footer(); ?>
