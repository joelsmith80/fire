<?php get_header(); ?>

		<div id="content" class="site-content-space">
			<div class="wrap">
				<main class="region">

					<header class="page-header archive-header">
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
						<?php if(is_category()) echo category_description();?>
					</header>

					<?php if (have_posts()): ?>

						<ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">

							<?php while (have_posts()) : the_post();?><li class="card-set-item">
								<?php
								$title = get_the_title();
								$link = get_the_permalink();
								$datePretty = get_the_date("F j, Y");
								$dateUgly = get_the_date("Y-m-d");
								$content = get_the_excerpt_max(get_the_ID(),125);
								include(locate_template("templates/cards/archive.php"));?>
							</li><?php endwhile;?>

						</ul>

						<?php bones_page_navi(); ?>

					<?php else:
						nothing_found("Sorry, but we couldn't find anything for this category.");
					endif;?>

				</main> <!-- // .region -->
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
