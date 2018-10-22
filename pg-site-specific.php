<?php
/*
 Template Name: Site Specific
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space pg-site-specific">

			<?php if(have_posts()):?>

				<?php
				$page_id = get_the_ID();
				$the_page = new Vts_Post();
				$ed_note = null;
				$latest_articles = null;
				$previous_articles = null;
				$latest_articles_count = 0;

				$articles = $the_page->get_site_specific_articles($page_id);
				if($articles){
					$ed_note = (isset($articles['latest']['ed_note'])) ? $articles['latest']['ed_note'] : null;
					$latest_articles = (isset($articles['latest']['articles'])) ? $articles['latest']['articles'] : null;
					$previous_articles = $articles['previous'];
					$latest_articles_count = count($latest_articles);
				}

				$ed_note_region_classes = ($latest_articles_count == 1) ?  "t-8 d-8 w-8" : "t-6 d-6 w-6";
				$articles_region_classes = ($latest_articles_count == 1) ?  "t-4 d-4 w-4" : "t-6 d-6 w-6";

				?>


				<header class="page-header">
					<div class="wrap">
						<div class="region">
							<h1 class="page-title"><?php babel("Site-Specific");?></h1>
							<p class="page-subtitle"><?php babel("The Journal of Visual Thinking Strategies");?></p>
						</div>
					</div>
				</header>

				<?php if($latest_articles_count > 0):?>
				<section class="latest-edition count-<?php echo $latest_articles_count;?>">
					<div class="wrap">
						<header class="section-header region">
							<h2 class="section-title"><?php babel("Latest Edition");?></h2>
						</header>
						<div class="region">
							<h3 class="ed-note-title"><?php babel("A Note from the Editor");?></h3>
						</div>
						<div class="ed-note region <?php echo $ed_note_region_classes;?>">
							<?php if($ed_note):?>
							<div>
								<?php compose($ed_note->post->post_content);?>
							</div>
							<a href="<?php echo get_permalink($ed_note->ID);?>" class="read-more-ed-note"><?php babel("Read more");?></a>
							<?php else:?>
								<div><?php babel("A word from our editor");?></div>
							<?php endif;?>
						</div>
						<div class="articles region <?php echo $articles_region_classes;?>">
							<?php if($latest_articles_count > 1):?>
								<ul class="card-set flexgrid m1-one m2-two t-two d-two w-two">
									<?php foreach($latest_articles as $a):?>
									<li class="card-set-item article">
										<?php
										$args = array();
										$id = $a->ID;
										$args['title'] = get_the_title($id);
										$args['url'] = get_the_permalink($id);
										$args['img'] = get_the_post_thumbnail_url($id,'square-375');
										$args['date_pretty'] = get_the_date($id,"F j, Y");
										$args['date_ugly'] = get_the_date($id,"Y-m-d");
										$args['author'] = $a->byline_for_card;
										$args['excerpt'] = get_the_excerpt_max($id,125);
										$args['flag'] = ($a->edition) ? esc_html($a->edition) : null;
										load_component('card_blog',$args);?>
									</li>
									<?php endforeach;?>
								</ul>
							<?php else:?>
								<div class="card-set-item article">
									<?php
									$args = array();
									$a = $latest_articles[0];
									$id = intval($a->ID);
									$args['title'] = get_the_title($id);
									$args['url'] = get_the_permalink($id);
									$args['img'] = get_the_post_thumbnail_url($id,'square-375');
									$args['date_pretty'] = get_the_date($id,"F j, Y");
									$args['date_ugly'] = get_the_date($id,"Y-m-d");
									$args['author'] = $a->byline_for_card;
									$args['excerpt'] = get_the_excerpt_max($id,125);
									$args['flag'] = ($a->edition) ? esc_html($a->edition) : null;
									load_component('card_blog',$args);
									?>
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>
				<?php endif;?>

				<?php if($previous_articles):?>
				<section class="previous-articles">
					<div class="wrap">
						<header class="section-header region <?php if($latest_articles_count == 0) echo 'hide';?>">
							<h2 class="section-title"><?php babel("Previous Articles");?></h2>
						</header>
						<div class="section-content region">
							<ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">
								<?php foreach($previous_articles as $a):?>
								<li class="card-set-item">
									<?php
									$args = array();
									$id = $a->ID;
									$args['title'] = get_the_title($id);
									$args['url'] = get_the_permalink($id);
									$args['img'] = get_the_post_thumbnail_url($id,'square-375');
									$args['date_pretty'] = get_the_date($id,"F j, Y");
									$args['date_ugly'] = get_the_date($id,"Y-m-d");
									$args['author'] = $a->byline_for_card;
									$args['excerpt'] = get_the_excerpt_max($id,125);
									$args['flag'] = ($a->edition) ? esc_html($a->edition) : null;
									load_component('card_blog',$args);?>
								</li><?php endforeach;?>
							</ul>
						</div>
					</div>
				</section>
				<?php endif;?>

			<?php else:?>
			<header class="page-header">
				<div class="wrap">
					<div class="region">
						<h1 class="page-title"><?php the_title();?></h1>
					</div>
					<?php nothing_found("Sorry, but we couldn't find any articles for you.");?>
				</div>
			</header>
			<?php endif;?>

		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
