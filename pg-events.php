<?php
/*
 Template Name: Custom VTS Events Archive
*/
?>

<?php get_header(); ?>

		<div id="content" class="site-content-space events-page">
			<main>

					<?php if(have_posts()): while(have_posts()): the_post();?>
						<?php the_content();?>
					<?php endwhile; endif;?>

			</main>
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
