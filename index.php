<?php get_header(); ?>

		<div id="content" class="site-content-space">
			<div class="wrap">
				<main class="region">

					<?php if (have_posts()): ?>

						<header class="page-header">
							<h1 class="page-title"><?php babel("News from VTS");?></h1>
						</header>

						<ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">

							<?php while (have_posts()) : the_post();?><li class="card-set-item">
								<?php
								$args = array();
								$args['title'] = get_the_title();
								$args['url'] = get_the_permalink();
								$args['img'] = get_the_post_thumbnail_url(get_the_ID(),'square-375');
								$args['date_pretty'] = get_the_date("F j, Y");
								$args['date_ugly'] = get_the_date("Y-m-d");
								$args['author'] = get_the_author_meta('display_name');
								$args['excerpt'] = get_the_excerpt_max(get_the_ID(),125);
								load_component('card_blog',$args);?>
							</li><?php endwhile;?>

						</ul>

						<?php bones_page_navi(); ?>

					<?php else:?>
						<header class="page-header">
							<h1 class="page-title"><?php the_title();?></h1>
						</header>
						<?php nothing_found("Sorry, but we couldn't find any articles for you.");
					endif;?>

				</main> <!-- // .region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
