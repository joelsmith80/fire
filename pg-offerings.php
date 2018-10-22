<?php
/*
 Template Name: Offerings
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space pg-offerings">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php

					// get the basic stuff
					$page_id = get_the_ID();
					$meta = get_post_meta($page_id);

					// get the workshops section
					$workshops_count = get_post_meta($page_id,'vts_off_workshops_card',true);
					$workshops_intro = wp_kses_post(wpautop($meta['vts_off_workshops_intro'][0]));
					if($workshops_count){
						$workshops = array();
						for($x = 0; $x < $workshops_count; $x++ ){
							$w = array();
							$w['title'] = esc_html($meta['vts_off_workshops_card_' . $x . '_text_title'][0]);
							$w['content'] = wp_kses_post(wpautop($meta['vts_off_workshops_card_' . $x . '_text_content'][0]));
							$img = wp_get_attachment_image_src($meta['vts_off_workshops_card_' . $x . '_image'][0],'third-600');
							$w['img'] = $img[0];
							$workshops[] = $w;
						}
					} else {
						$workshops = null;
					}

					// get the stuff for the Other Services section
					$other_count = get_post_meta($page_id,'vts_off_other_card',true);
					$other_intro = wp_kses_post(wpautop($meta['vts_off_other_intro'][0]));
					if($other_count){
						$other_offerings = array();
						for($x = 0; $x < $other_count; $x++ ){
							$o = array();
							$o['title'] = esc_html($meta['vts_off_other_card_' . $x . '_text_title'][0]);
							$o['content'] = wp_kses_post(wpautop($meta['vts_off_other_card_' . $x . '_text_content'][0]));
							$img = wp_get_attachment_image_src($meta['vts_off_other_card_' . $x . '_image'][0],'third-600');
							$o['img'] = $img[0];
							$other_offerings[] = $o;
						}
					} else {
						$other_offerings = null;
					}

					// get the stuff for the Deepen section at the bottom
					$deepen_count = get_post_meta($page_id,'vts_off_deepen_card',true);
					$deepen_intro = wp_kses_post(wpautop($meta['vts_off_deepen_intro'][0]));
					if($deepen_count){
						$deepeners = array();
						for($x = 0; $x < $deepen_count; $x++ ){
							$d = array();
							$d['title'] = esc_html($meta['vts_off_deepen_card_' . $x . '_title'][0]);
							$d['subtitle'] = esc_html($meta['vts_off_deepen_card_' . $x . '_subtitle'][0]);
							$d['url'] = esc_url($meta['vts_off_deepen_card_' . $x . '_url'][0]);
							$deepeners[] = $d;
						}
					} else {
						$deepeners = null;
					}?>

					<article>

						<header class="page-header">
							<div class="wrap">
								<div class="region">
									<h1 class="page-title"><?php the_title();?></h1>
								</div>
							</div>
						</header>


						<div class="pg-offerings-intro">
							<div class="wrap">
								<aside class="region t-3 d-3 w-3">
									<nav class="internal-page-nav">
										<ul>
											<li><a href="#workshops" data-action="swoop-to"><?php babel("Workshops");?></a></li>
											<li><a href="#other" data-action="swoop-to"><?php babel("Other Services");?></a></li>
											<li><a href="#deepen" data-action="swoop-to"><?php babel("Going Deeper");?></a></li>
										</ul>
									</nav>
								</aside>
								<div class="entry-content section-content region t-9 d-9 w-9">
									<?php the_content();?>
								</div>
							</div>
						</div>


						<section id="workshops" class="pg-offerings-workshops">
							<div class="wrap">
								<header class="section-header region">
									<h2 class="section-title"><?php babel("Workshops");?></h2>
								</header>
								<div class="section-intro region">
									<?php echo $workshops_intro;?>
								</div>
								<div class="section-content region">
									<?php if($workshops):?>
									<ul class="card-set flexgrid m1-one m2-two t-three d-three w-three">
										<?php foreach($workshops as $w):?>
										<li class="card-set-item">
											<div class="card card-training has-action-tray">
												<div class="card-image-space">
													<img src="<?php echo $w['img'];?>" alt="<?php echo $w['title'];?>">
												</div>
												<div class="card-text-space">
													<div class="main">
														<h2 class="card-title"><?php echo $w['title'];?></h2>
														<div class="card-body-text">
															<?php echo $w['content'];?>
														</div>
													</div>
												</div>
												<div class="card-action-tray">
											    <a href="/events" class="card-action card-action-more">Find a Workshop</a>
											  </div>
											</div>
										</li>
										<?php endforeach;?>
									</ul>
									<?php endif;?>
								</div>
							</div>
						</section>


						<section id="other" class="pg-offerings-other">
							<div class="wrap">
								<header class="section-header region">
									<h2 class="section-title"><?php babel("Other Services");?></h2>
								</header>
								<div class="section-intro region">
									<?php echo $other_intro;?>
								</div>
								<div class="section-content region">
									<?php if($other_offerings):?>
									<ul class="card-set flexgrid m1-one m2-two t-two d-two w-two">
										<?php foreach($other_offerings as $o):?>
										<li class="card-set-item">
											<div class="card card-services">
												<div class="card-image-space">
													<img src="<?php echo $o['img'];?>" alt="<?php echo $o['title'];?>">
												</div>
												<div class="card-text-space">
													<h2 class="card-title"><?php echo $o['title'];?></h2>
													<div class="card-body-text">
														<?php echo $o['content'];?>
													</div>
												</div>
											</div>
										</li>
										<?php endforeach;?>
									</ul>
									<?php endif;?>
								</div>
							</div>
						</section>


						<section id="deepen" class="pg-offerings-deepen">
							<div class="wrap">
								<header class="section-header region">
									<h2 class="section-title"><?php babel("Deepen Your VTS Experience");?></h2>
								</header>
								<div class="section-intro region">
									<?php echo $deepen_intro;?>
								</div>
								<div class="section-content region">
									<?php if($deepeners):?>
									<ul class="top-tier card-set flexgrid m2-two t-three d-three w-three">
										<?php for($x = 0; $x < 2; $x++):?>
										<li class="card-set-item">
											<?php $args = array();
											$args['title'] = $deepeners[$x]['title'];
											$args['body'] = $deepeners[$x]['subtitle'];
											$args['link'] = $deepeners[$x]['url'];
											load_component('offerings',$args);
											?>
										</li>
										<?php endfor;?>
									</ul>
									<?php endif;?>
									<?php if($deepeners && count($deepeners) > 2):?>
									<ul class="card-set flexgrid m2-two t-three d-three w-three">
										<?php for($x = 2; $x < count($deepeners); $x++):?>
										<li class="card-set-item">
											<?php $args = array();
											$args['title'] = $deepeners[$x]['title'];
											$args['body'] = $deepeners[$x]['subtitle'];
											$args['link'] = $deepeners[$x]['url'];
											load_component('offerings',$args);
											?>
										</li>
										<?php endfor;?>
									</ul>
									<?php endif;?>
									<p class="experimental-disclaimer">Photos 1, 2, and 4 by <a href="http://dapingluo.com/" target="_blank" rel="noopener">Da Ping</a></p>
								</div>
							</div>
						</section>


					</article>

				<?php endwhile; else:?>
					<div class="region">
						<?php nothing_found();?>
					</div>
				<?php endif;?>


		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
