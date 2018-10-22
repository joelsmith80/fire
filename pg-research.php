<?php get_header();?>

		<div id="content" class="site-content-space research-page page-with-grid-mosaic-top">
      <?php if(have_posts()): while(have_posts()): the_post();?>

				<!-- A GRID MOSAIC -->
				<section class="grid-mosaic-section">
					<div class="wrap">
						<header class="page-header region">
							<h1 class="page-title"><?php the_title();?></h1>
						</header>
						<div class="region">
							<?php include(locate_template("templates/grid-mosaic.php"));?>
						</div>
					</div>
				</section>

				<!-- THE INTRO -->
				<section class="page-with-grid-mosaic-top-intro">
					<div class="wrap">
						<div class="page-with-grid-mosaic-top-intro-sidebar region t-4 d-3 w-3">
							<nav class="internal-page-nav" data-action="swoop-to">
								<ul>
									<li><a href="#aesthetic-development"><?php babel("Aesthetic Development");?></a></li>
									<li><a href="#methods"><?php babel("Methods");?></a></li>
									<li><a href="#research-reports"><?php babel("Research Reports");?></a></li>
									<li><a href="#publications"><?php babel("Publications");?></a></li>
								</ul>
							</nav>
						</div>
						<div class="page-with-grid-mosaic-top-intro-main entry-content region t-8 d-9 w-9">
							<?php $postID = get_the_ID(); the_content();?>
						</div>
					</div>
				</section>

				<!-- AESTHETIC DEVELOPMENT/METHODS -->
				<section>
					<div class="wrap">
						<div id="aesthetic-development" class="region t-6 d-6 w-6">
							<header class="section-header">
								<h2 class="section-title"><?php babel("Aesthetic Development");?></h2>
							</header>
							<div class="entry-content">
								<?php $aesthetic = get_post_meta($postID,"vts_research_aesthetic_development_intro",true); if($aesthetic != ""):?>
									<?php echo wp_kses_post(wpautop($aesthetic));?>
									<p><a href="<?php echo get_page_link(2937);?>" class="read-more"><?php babel("Read more");?></a></p>
								<?php endif;?>
							</div>
						</div>
						<div id="methods" class="region t-6 d-6 w-6">
							<header class="section-header">
								<h2 class="section-title"><?php babel("Methods");?></h2>
							</header>
							<div class="entry-content">
								<?php $methods = get_post_meta($postID,"vts_research_methods",true); if($aesthetic != ""){
									echo wp_kses_post(wpautop($methods));
								}?>
							</div>
						</div>
					</div>
				</section>

				<!-- RESEARCH REPORTS -->
				<section id="research-reports" class="research-reports white-stripes">
					<div class="wrap">
						<header class="section-header region">
							<h2 class="section-title"><?php babel("Research Reports");?></h2>
						</header>
						<div class="section-intro region entry-content">
							<?php $reportsIntro = get_post_meta($postID,"vts_research_reports_intro",true); if($aesthetic != ""){
								echo wp_kses_post(wpautop($reportsIntro));
							}?>
						</div>
						<div class="region">

							<?php $ids = get_post_meta($postID,'vts_research_reports_files',true);
							if(!empty($ids)):?>

								<div class="section-header">
									<h3 class="section-subtitle"><?php babel("Key Studies");?></h3>
								</div>

								<ul class="card-set flexgrid m1-one m2-one t-two d-three w-three">
									<?php
									// show the selected posts
									foreach($ids as $id){
										$pub = get_post($id);
										$title = $pub->post_title;
										$author = get_post_meta($pub->ID,"vts_publication_author",true);
										$fileExternal = get_post_meta($pub->ID,"vts_publication_link",true);
										$fileInternal = trim(get_post_meta($pub->ID,"vts_publication_file",true));
										if($fileExternal != ""){
										  $link = $fileExternal;
										} elseif($fileInternal != ""){
										  $link = wp_get_attachment_url($fileInternal);
										} else {
										  $link = "#";
										}
										$body = $pub->post_content;
										echo "<li class='card-set-item'>";
										include(locate_template('templates/cards/download-with-excerpt.php'));
										echo "</li>";
									}?>
								</ul>
							<?php endif;?>

							<?php $ids = get_post_meta($postID,'vts_research_publications_files',true);
							if(!empty($ids)):?>

								<div class="section-header">
									<h3 class="section-subtitle"><?php babel("Reports");?></h3>
								</div>

								<ul class="card-set flexgrid m1-one m2-one t-two d-three w-three">
									<?php
									// show the selected posts
									foreach($ids as $id){
										$pub = get_post($id);
										$title = $pub->post_title;
										$author = get_post_meta($pub->ID,"vts_publication_author",true);
										$fileExternal = get_post_meta($pub->ID,"vts_publication_link",true);
										$fileInternal = trim(get_post_meta($pub->ID,"vts_publication_file",true));
										if($fileExternal != ""){
										  $link = $fileExternal;
										} elseif($fileInternal != ""){
										  $link = wp_get_attachment_url($fileInternal);
										} else {
										  $link = "#";
										}
										$body = $pub->post_content;
										echo "<li class='card-set-item'>";
										include(locate_template('templates/cards/download-with-excerpt.php'));
										echo "</li>";
									}?>
								</ul>
							<?php endif;?>

						</div>
					</div>
				</section>

				<section id="publications" class="publications-preview">
					<div class="wrap">

						<header class="section-header region">
							<h2 class="section-title"><?php babel("Publications");?></h2>
						</header>

						<div class="section-intro region"><?php echo trim(get_post_meta($postID,"vts_research_publications_intro",true));?></div>

						<?php
						// get the three categories of publications
						$philip = get_post_meta($postID,"vts_research_philip_files",true);
						$abigail = get_post_meta($postID,"vts_research_abigail_files",true);
						$all = get_posts(array(
							'posts_per_page' => 6,
							'post_type' => 'vts_publication',
							'meta_key'	=> 'vts_publication_date',
							'orderby' => 'vts_publication_date',
							'order'		=> 'DESC',
						));?>


						<div class="region">

							<?php if(!empty($philip)):?>
								<div class="section-header">
									<a href="/publications-philip-yenawine" class="internal-back-link more-vts-publications-by-author"><?php babel("All by Philip Yenawine");?></a>
									<h3 class="section-subtitle"><?php babel("By Philip Yenawine");?></h3>
								</div>
								<ul class="card-set flexgrid m1-one m2-one t-two d-three w-four">
									<li class="card-set-item clear-back">
										<div class="card">
											<div class="card-image-space">
												<a href="/publications-philip-yenawine">
													<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/about_philip_square.jpg" alt="Philip Yenawine">
												</a>
											</div>
											<div class="card-text-space">
												<h4 class="card-title"><a href="/publications-philip-yenawine"><?php babel("All publications by Philip Yenawine");?></a></h4>
											</div>
										</div>
									</li>
									<?php
									// show the selected posts
									foreach($philip as $id){
										$pub = get_post($id);
										$title = $pub->post_title;
										$author = get_post_meta($pub->ID,"vts_publication_author",true);
										$fileExternal = get_post_meta($pub->ID,"vts_publication_link",true);
										$fileInternal = trim(get_post_meta($pub->ID,"vts_publication_file",true));
										if($fileExternal != ""){
										  $link = $fileExternal;
										} elseif($fileInternal != ""){
										  $link = wp_get_attachment_url($fileInternal);
										} else {
										  $link = "#";
										}
										$body = $pub->post_content;
										echo "<li class='card-set-item'>";
										include(locate_template('templates/cards/download-with-excerpt.php'));
										echo "</li>";
									}?>
								</ul>
							<?php endif;?>

							<?php if(!empty($abigail)):?>

								<div class="section-header">
									<a href="/publications-abigail-housen" class="internal-back-link more-vts-publications-by-author"><?php babel("All by Abigail Housen");?></a>
									<h3 class="section-subtitle"><?php babel("By Abigail Housen");?></h3>
								</div>

								<ul class="card-set flexgrid m1-one m2-one t-two d-three w-four">
									<li class="card-set-item clear-back">
										<div class="card">
											<div class="card-image-space">
												<a href="/publications-abigail-housen">
													<img src="<?php echo get_stylesheet_directory_uri();?>/library/images/about_abigail_square.jpg" alt="Abigail Housen">
												</a>
											</div>
											<div class="card-text-space">
												<h4 class="card-title"><a href="/publications-abigail-housen"><?php babel("All publications by Abigail Housen");?></a></h4>
											</div>
										</div>
									</li>
									<?php
									// show the selected posts
									foreach($abigail as $id){
										$pub = get_post($id);
										$title = $pub->post_title;
										$author = get_post_meta($pub->ID,"vts_publication_author",true);
										$fileExternal = get_post_meta($pub->ID,"vts_publication_link",true);
										$fileInternal = trim(get_post_meta($pub->ID,"vts_publication_file",true));
										if($fileExternal != ""){
										  $link = $fileExternal;
										} elseif($fileInternal != ""){
										  $link = wp_get_attachment_url($fileInternal);
										} else {
										  $link = "#";
										}
										$body = $pub->post_content;
										echo "<li class='card-set-item'>";
										include(locate_template('templates/cards/download-with-excerpt.php'));
										echo "</li>";
									}?>
								</ul>
							<?php endif;?>

							<?php if(!empty($all)):?>

								<div class="section-header">
									<a href="<?php echo get_post_type_archive_link("vts_publication");?>" class="internal-back-link more-vts-publications-by-author"><?php babel("View all publications");?></a>
									<h3 class="section-subtitle"><?php babel("All Authors");?></h3>
								</div>

								<ul class="card-set flexgrid m1-one m2-one t-two d-three w-four">
									<?php
									// show the selected posts
									foreach($all as $id){
										$pub = get_post($id);
										$title = $pub->post_title;
										$author = get_post_meta($pub->ID,"vts_publication_author",true);
										$fileExternal = get_post_meta($pub->ID,"vts_publication_link",true);
										$fileInternal = trim(get_post_meta($pub->ID,"vts_publication_file",true));
										if($fileExternal != ""){
										  $link  = $fileExternal;
										} elseif($fileInternal != ""){
										  $link = wp_get_attachment_url($fileInternal);
										} else {
										  $link = "#";
										}
										$body = $pub->post_content;
										echo "<li class='card-set-item'>";
										include(locate_template('templates/cards/download-with-excerpt.php'));
										echo "</li>";
									}?>
								</ul>
							<?php endif;?>

						</div>
					</div>
				</section>

      <?php
			// else if no posts
			endwhile; else:?>
				<section>
					<div class="wrap">
						<div class="region">
        			<?php nothing_found();?>
						</div>
					</div>
				</section>
      <?php endif;?>

    </div>

<?php get_footer();?>
