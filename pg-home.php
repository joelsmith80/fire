<?php get_header();?>

		<div id="content" class="site-content-space">

      <?php if(have_posts()):?>

        <?php while(have_posts()): the_post();?>

					<section class="grid-slider-container">
						<div class="wrap">
							<div class="region">
								<div id="grid-slider" class="grid-slider state-1">
	      					<div class="grid-slider-text-overlay grid-slider-trigger">
	        					<header class="grid-slider-header">
	          					<h1 class="grid-slider-headline"><?php echo _e("What's going on in this picture?","focustheme");?></h1>
	        					</header>
	      					</div>
						      <div class="block block-1"><div class="inner">1</div></div>
						      <div class="block block-2"><div class="inner">2</div></div>
						      <div class="block block-3"><div class="inner">3</div></div>
						      <div class="block block-4"><div class="inner">4</div></div>
						      <div class="block block-5"><div class="inner">5</div></div>
						      <div class="block block-6"><div class="inner">6</div></div>
						      <div class="block block-7"><div class="inner">7</div></div>
						      <div class="block block-8"><div class="inner">8</div></div>
						      <div class="block block-9"><div class="inner">9</div></div>
						      <div class="block block-10"><div class="inner">10</div></div>
						      <div class="block block-11"><div class="inner">11</div></div>
						      <div class="block block-12"><div class="inner">12</div></div>
						      <div class="block block-13"><div class="inner">13</div></div>
						      <div class="block block-14"><div class="inner">14</div></div>
						      <div class="block block-15"><div class="inner">15</div></div>
						      <div class="block block-16"><div class="inner">16</div></div>
						      <div class="grid-slider-tease grid-slider-trigger"></div>
	  						</div>
							</div>
						</div>
					</section>

					<section class="what-we-do-banner">
						<div class="wrap">

							<div class="main region t-8 d-8 w-8">
								<header class="section-header">
									<h2 class="section-title">What We Do</h2>
								</header>
								<p>Founded in 1995, Visual Thinking Strategies is a research-based education nonprofit that provides a teaching methodology, a developmentally appropriate image curriculum, and a learner-centered professional development program. VTS cultivates an evolving, global community of practitioners in schools, museums, and beyond.</p>
							</div>
							<aside class="region t-4 d-4 w-4">
								<p>We believe that thoughtful, facilitated discussion of art activates transformational learning accessible to all.</p>
							</aside>
						</div>
					</section>


          <section class="offerings-grid-section">
    				<div class="wrap">
              <div class="region">
                <header class="section-header">
									<h2 class="section-title"><?php echo _e("What We Offer","focustheme");?></h2>
								</header>
								<ul class="offerings-grid card-set flexgrid m1-one m2-two t-three d-three w-three">
									<li class="card-set-item">
										<?php
										$title = "School Programs";
										$body = "Support for schools, teachers, and kids through learner-centered professional development — closely tracking student growth and shifting teacher practice";
										$link = "/services#school-programs";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
									<li class="card-set-item">
										<?php
										$title = "Curriculum";
										$body = "Carefully chosen image sets, lesson plans, a comprehensive toolbox, guides and more — all designed to support growth";
										$link = "/store";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
									<li class="card-set-item">
										<?php
										$title = "Workshops";
										$body = "Training in facilitation, coaching and aesthetic development, providing rich learning opportunities for both new and seasoned practitioners";
										$link = "/training";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
									<li class="card-set-item">
										<?php
										$title = "Consulting";
										$body = "A full range of customized support for museums, universities, schools, nonprofits, and corporations (One-on-one consultations are also available.)";
										$link = "/services#consulting";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
									<li class="card-set-item">
										<?php
										$title = "Online Summer Series";
										$body = "A virtual gathering to share stories, research and applications of VTS in a wide range of contexts";
										$link = "/training#online-summer-series";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
									<li class="card-set-item">
										<?php
										$title = "Site Specific";
										$body = "The journal of Visual Thinking Strategies";
										$link = "/site-specific";
										include(locate_template("templates/cards/offerings.php")); ?>
									</li>
								</ul>
              </div>
    				</div>
    			</section>

					<section class="full-bleed-video-tease">
						<a href="https://vimeo.com/191824222" target="_blank" rel="noopener">
							<div class="wrap">
								<div class="region">
									<header class="section-header">
										<h2 class="section-title"><?php echo _e("See VTS in Action");?></h2>
										<p><?php echo _e("'Interesting and Weird at the Same Time,' a partnership with the LAB Gallery, Dublin City Council, Ireland","focustheme");?></p>
									</header>
								</div>
							</div>
						</a>
					</section>

					<section class="highlighted-projects-grid-section">
						<div class="wrap">
							<div class="region">
								<header class="section-header">
									<h2 class="section-title"><?php echo _e("Highlighted Projects","focustheme");?></h2>
								</header>
								<ul class="highlighted-projects-grid card-set flexgrid m1-one m2-two t-two d-three w-three">
									<?php $highlightedProjects = array(
										array(
											'title' => "VTS Core School Programs",
											'image' => "schools-thumb.jpg",
											'link' => "/highlighted-projects#vts-core-school-programs"
										),
										array(
											'title' => "The New York Times",
											'image' => "wgoitp.jpg",
											'link' => "/highlighted-projects#new-york-times"
										),
										array(
											'title' => "VTS in Science",
											'image' => "vts-in-science-thumb.jpg",
											'link' => "/highlighted-projects#vts-in-science"
										),
										array(
											'title' => "Turnaround Arts",
											'image' => "turnaround-arts-thumb.jpg",
											'link' => "/highlighted-projects#turnaround-arts"
										),
										array(
											'title' => "The STELLAR Project",
											'image' => "stellar-thumb.jpg",
											'link' => "/highlighted-projects#the-stellar-project"
										),
										array(
											'title' => "UCC College of Health and Medicine",
											'image' => "ucc-thumb.jpg",
											'link' => "/highlighted-projects#ucc-college-of-health-and-medicine"
										),
									);
									foreach($highlightedProjects as $project):?><li class="card-set-item">
										<?php
										$title = $project['title'];
										$image = get_stylesheet_directory_uri() . "/library/images/projects/" . $project['image'];
										$link = $project['link'];
										include(locate_template("templates/cards/projects.php"));?>
									</li><?php endforeach;?>
								</ul>
							</div>
						</div>
					</section>



        <?php endwhile;?>

      <?php else:?>
        <div class="wrap">
          <div class="region">
            <?php include(locate_template("templates/messages/none-found.php"));?>
          </div>
        </div>
      <?php endif;?>

    </div>

<?php get_footer();?>
