<?php get_header();?>

		<div id="content" class="site-content-space page-with-no-sidebar">
      <div class="wrap">
        <main class="region">

					<?php if(have_posts()):?>

						<header class="page-header">
              <h1 class="page-title"><?php the_title();?></h1>
            </header>

						<?php if(can_see_membership_stuff()):?>

							<ul class="flexgrid card-set m1-one m2-two t-three d-three w-four">
	              <?php while(have_posts()): the_post();?>
									<li class="card-set-item">
		                <?php
										$file = wp_prepare_attachment_for_js(4937);
										$title = $file['title'];
										$author = get_post_meta($file['id'],'vts_doc_author',true);
										$link = $file['url'];
										$body = $file['description'];
		                include(locate_template("templates/cards/download-with-excerpt.php"));?>
	              	</li>
									<li class="card-set-item">
										<?php
										$file = wp_prepare_attachment_for_js(2842);
										$title = $file['title'];
										$author = get_post_meta($file['id'],'vts_doc_author',true);
										$link = $file['url'];
										$spanishFile = wp_prepare_attachment_for_js(2843);
										$spanishLink = $spanishFile['url'];?>
										<article class="card card-download has-action-tray has-expanding-excerpt">
										  <div class="card-main-action">
										    <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener" class="card-download-header">Download</a>
										    <div class="card-text-space">
										      <h1 class="card-title"><a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener"><?php echo esc_html($title);?></a></h1>
										      <h2 class="card-subtitle">Author(s): <?php echo esc_html($author);?></h2>
										      <p class="card-body-text card-body-excerpt"><?php echo esc_html($body);?> <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener">Download in English</a> | <a href="<?php echo esc_url($spanishLink);?>" target="_blank" rel="noopener">Descarga en español</a></p>
										    </div>
										  </div>
										  <div class="card-action-tray">
										    <a href="<?php echo esc_url($link);?>" class="card-action card-action-more" data-action="open-text">Read More
													<?php include(locate_template("templates/cards/flyout-arrow.php"));?>
												</a>
										  </div>
										</article>
									</li>
									<li class="card-set-item">
										<?php
										$file = wp_prepare_attachment_for_js(3143);
										$title = $file['title'];
										$author = get_post_meta($file['id'],'vts_doc_author',true);
										$link = $file['url'];
										$spanishFile = wp_prepare_attachment_for_js(2844);
										$spanishLink = $spanishFile['url'];?>
										<article class="card card-download has-action-tray has-expanding-excerpt">
										  <div class="card-main-action">
										    <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener" class="card-download-header">Download</a>
										    <div class="card-text-space">
										      <h1 class="card-title"><a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener"><?php echo esc_html($title);?></a></h1>
										      <h2 class="card-subtitle">Author(s): <?php echo esc_html($author);?></h2>
										      <p class="card-body-text card-body-excerpt"><?php echo esc_html($body);?> <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener">Download in English</a> | <a href="<?php echo esc_url($spanishLink);?>" target="_blank" rel="noopener">Descarga en español</a></p>
										    </div>
										  </div>
										  <div class="card-action-tray">
										    <a href="<?php echo esc_url($link);?>" class="card-action card-action-more" data-action="open-text">Read More
													<?php include(locate_template("templates/cards/flyout-arrow.php"));?>
												</a>
										  </div>
										</article>
									</li>
									<li class="card-set-item">
										<?php
										$file = wp_prepare_attachment_for_js(2845);
										$title = $file['title'];
										$author = get_post_meta($file['id'],'vts_doc_author',true);
										$link = $file['url'];
										include(locate_template("templates/cards/download-with-excerpt.php"));?>
									</li>
									<li class="card-set-item">
										<?php
										$file = wp_prepare_attachment_for_js(2846);
										$title = $file['title'];
										$author = get_post_meta($file['id'],'vts_doc_author',true);
										$link = $file['url'];
										include(locate_template("templates/cards/download-with-excerpt.php"));?>
									</li>
								<?php endwhile;?>
	            </ul>

						<?php
						// else if not a member
						else:?>
							<div class="region">
								<?php include(locate_template("templates/messages/not-allowed.php"));?>
							</div>
						<?php endif;?>

					<?php else:?>
						<div class="region">
            	<?php nothing_found();?>
						</div>
          <?php endif;?>
        </main>
      </div>
    </div>

<?php get_footer();?>
