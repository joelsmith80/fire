<?php get_header(); ?>

		<div id="content" class="site-content-space">
			<div class="wrap">
				<main class="region">

					<header class="page-header">
						<h1 class="page-title"><span><?php babel("Search results for:");?></span> "<?php echo esc_attr(get_search_query()); ?>"</h1>
					</header>

					<?php if (have_posts()) :?>
						<ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">
							<?php while (have_posts()) : the_post();?>
								<li class="card-set-item">
									<?php
									$title = get_the_title();
									$link = get_the_permalink();
									$datePretty = get_the_date("F j, Y");
									$dateUgly = get_the_date("Y-m-d");
									$content = get_the_excerpt_max(get_the_ID(),125);
									include(locate_template("templates/cards/archive.php"));?>
								</li>
							<?php endwhile;?>
						</ul>

						<?php bones_page_navi(); ?>

					<?php else:
						nothing_found("We couldn't find what you're looking for. Maybe try another search?");
					endif;?>

				</main>
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
