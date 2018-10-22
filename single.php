<?php get_header(); ?>

		<div id="content" class="site-content-space single-blog">
			<?php if(have_posts()): while(have_posts()): the_post();?>

				<?php
				$post_id = get_the_ID();
				$permalink = urlencode(get_the_permalink());
				$the_post = null;
				$is_site_specific = false;
				$back_link = "<a href='/site-specific' class='internal-back-link'>" . __('Back','focustheme') . "</a>";
				$byline = get_the_author_meta("display_name");
				$bios = null;
				$footnotes = null;
				$is_ed_note = false;
				$ed_note = false;
				$twitter_text = '';

				if(class_exists('Vts_Post')){
					$the_post = new Vts_Post($post_id);
					if($the_post && $the_post->is_site_specific){
						$is_site_specific = true;
						$back_link = "<a href='/site-specific' class='internal-back-link'>" . __('Site Specific','focustheme') . "</a>";
						$byline = $the_post->byline;
						$bios = $the_post->bios;
						$footnotes = $the_post->footnotes;
						$is_ed_note = $the_post->is_ed_note;
						$ed_note = (!$is_ed_note) ? $the_post->ed_note : null;
						$twitter_text = ($the_post->twitter_text) ? $the_post->twitter_text : '';
					}
				}
				?>

				<article itemscope itemtype="http://schema.org/BlogPosting">

					<header class="single-blog-header page-header wrap">
						<div class="single-blog-title-region region t-12 d-12 w-12">
							<?php echo $back_link;?>
							<h1 class="page-title" itemprop="name headline"><?php the_title();?></h1>
						</div>
					</header>

					<div class="single-blog-main">
						<div class="wrap">

							<div class="single-blog-meta region t-4 d-3 w-3">
								<div class="single-blog-byline-dateline">
									<p class="single-blog-byline single-blog-meta-item" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><?php babel("By");?> <span itemprop="name"><?php echo $byline;?></span></p>
								  <time class="single-blog-dateline single-blog-meta-item" datetime="<?php echo get_the_time('Y-m-d');?>" itemprop="datePublished"><?php echo get_the_time(get_option('date_format'));?></time>
								</div>
								<?php if(has_post_thumbnail()):?>
									<div class="single-blog-featured-image-space">
										<a href="<?php echo get_the_post_thumbnail_url(get_the_ID(),'max-natural');?>" itemprop="thumbnailUrl" data-action="lightbox-trigger">
											<?php the_post_thumbnail('square-375');?>
										</a>
									</div>
								<?php endif;?>
							</div>

							<div class="single-blog-main-content single-blog-entry-content entry-content region t-8 d-9 w-9" itemprop="articleBody">
								<?php the_content();?>
								<?php if($bios):?>
									<div class="single-blog-bios">
										<?php if(is_string($bios)){
											echo "This post was written by " . $bios;
										} else {
											foreach($bios as $b){
												echo "<div>";
													echo $b;
												echo "</div>";
											}
										}?>
									</div>
								<?php endif;?>
								<p class="single-blog-feedback-prompt"><?php babel("Questions or comments?");?> <a href="/contact" target="_blank" rel="noopener"><?php babel("Contact us.");?></a></p>
								<?php if($footnotes):?>
									<div id="footnotes" class="single-blog-footnotes">
										<h3 class="single-blog-footnotes-header">Foonotes</h3>
										<ol class="single-blog-footnotes-list">
										<?php $x = 1; foreach($footnotes as $f):?>
											<li><a href="#footnote-source-<?php echo $x;?>" data-action="swoop-to"><?php echo $x;?></a> - <?php echo $f;?></li>
										<?php $x++; endforeach;?>
									</ol>
									</div>
								<?php endif;?>
							</div>

							<div class="single-blog-misc-meta region t-4 d-3 w-3">
								<?php if(!$is_site_specific):?>
								<div class="single-blog-misc-meta-item">
									<p><span><?php babel("Categories");?>: </span><?php echo get_the_category_list( ', ', '', get_the_ID() );?></p>
								</div>
								<?php endif;?>
								<?php if($is_site_specific):?>
									<div class="single-blog-misc-meta-item">
										<p class="single-blog-tags"><?php the_tags('Frames: ',', ');?></p>
									</div>
								<?php else:?>
									<div class="single-blog-misc-meta-item">
										<p class="single-blog-tags"><?php the_tags('Related: ',', ');?></p>
									</div>
								<?php endif;?>
								<div class="single-blog-social-share-box single-blog-misc-meta-item">
							    <span><?php babel("Share on");?>: </span>
							    <ul class="single-blog-social-share-list">
							      <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $permalink;?>">Facebook</a></li>
										<li class="twitter">
											<a href="https://twitter.com/share?
											url=<?php echo $permalink;?>&
											via=vtsnational&
											hashtags=vts&
											text=<?php echo $twitter_text;?>">Twitter</a>
										</li>
							    </ul>
								</div>
							</div>

						</div>
					</div>

					<?php if($ed_note):?>
					<footer class="ed-note-section single-blog-footer">
						<div class="wrap">
							<header class="section-header region">
								<h3 class="section-title"><?php babel("Editor's Note for This Issue");?></h3>
							</header>
							<div class="section-content region">
								<?php echo $ed_note;?>
							</div>
						</div>
					</footer>
					<?php endif;?>

				</article>

			<?php endwhile; else:?>
				<section class="sole-section">
					<div class="wrap">
						<header class="page-header region">
							<h1 class="page-title"><?php the_title();?></h1>
						</header>
						<div class="region">
							<?php nothing_found();?>
						</div>
					</div>
				</section>
			<?php endif;?>
		</div>

<?php get_footer(); ?>
