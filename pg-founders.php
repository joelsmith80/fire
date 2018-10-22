<?php get_header(); ?>

		<main id="content" class="site-content-space founders-page">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="wrap">
					<header class="page-header region">
						<h1 class="page-title"><?php the_title();?></h1>
					</header>
				</div>

				<section class="founders-page-first-section">
					<div class="wrap">
						<aside class="founders-page-image-aside region t-4 d-3 w-3">
							<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/abigail-housen-square.jpg" alt="Abigail Housen">
						</aside>
						<div class="founders-page-bio-region-text-space entry-content region t-8 d-9 w-9">
							<h2 class="founders-page-bio-region-title">Abigail Housen</h2>
							<?php
							$postID = get_the_ID();
							$abigail = get_post_meta($postID,"vts_founders_abigail",true);
							if($abigail != ""){
								echo $abigail;
							}?>
						</div>
					</div>
				</section>

				<section class="white-stripes">
					<div class="wrap">
						<aside class="founders-page-image-aside region t-4 d-3 w-3">
							<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/philip-yenawine-square.jpg" alt="Philip Yenawine">
						</aside>
						<div class="founders-page-bio-region-text-space entry-content region t-8 d-9 w-9">
							<h2 class="founders-page-bio-region-title">Philip Yenawine</h2>
							<?php the_content();?>
						</div>
					</div>
				</section>

			<?php endwhile; else:?>
				<div class="wrap">
					<div class="region">
						<?php nothing_found();?>
					</div>
				</div>
			<?php endif;?>

		</main>

<?php get_footer(); ?>
