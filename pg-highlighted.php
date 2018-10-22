<?php get_header(); ?>

<div id="content" class="site-content-space highlighted-projects-page">
	<main>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article>
				<div class="wrap">

					<header class="page-header region">
						<h1 class="page-title"><?php the_title();?></h1>
					</header>

					<div class="intro region t-4 d-4 w-4">
						<?php the_content();?>
					</div>

					<div class="main region t-8 d-8 w-8">

						<?php
						$postID = get_the_ID();
						$projects = get_post_meta($postID,"vts_additional_highlighted_projects",true);
						if($projects):?>
							<ul class="card-set">
								<?php for($i = 0; $i < $projects; $i++):?><li class="card-set-item">
									<?php
									$title = get_post_meta(get_the_ID(),"vts_additional_highlighted_projects_" . $i . "_vts_additional_highlighted_projects_title",true);
									$titleLowered = strtolower($title);
									$titleExploded = explode(" ",$titleLowered);
									$titleDashed = implode("-",$titleExploded);
									$image = wp_get_attachment_image(get_post_meta(get_the_ID(),"vts_additional_highlighted_projects_" . $i . "_vts_additional_highlighted_projects_image",true),"max-natural",false);
									$body = get_post_meta(get_the_ID(),"vts_additional_highlighted_projects_" . $i . "_vts_additional_highlighted_projects_details",true);?>
									<div id="<?php echo esc_html($titleDashed);?>" class="card">
										<div class="card-image-space">
											<?php echo $image;?>
										</div>
										<div class="card-text-space">
											<h2 class="card-title"><?php echo esc_html($title);?></h2>
											<div class="card-body-text"><?php echo wp_kses_post(wpautop($body));?></div>
										</div>
									</div>
								</li><?php endfor;?>
							</ul>
						<?php endif;?>

					</div><!-- .main.region -->

				</div><!-- .wrap -->
			</article>

		<?php endwhile; else:
			include(locate_template("templates/messages/none-found.php"));
		endif;?>

	</main>
</div> <!-- // .site-content-space -->

<?php get_footer();?>
