<?php get_header(); ?>

<div id="content" class="site-content-space single-person">
  <?php if (have_posts()):?>
    <main class="hero-section">
      <?php while (have_posts()) : the_post(); $this_post_id = get_the_ID();?>
        <div class="wrap">

          <header class="page-header region">
            <h1 class="page-title"><?php the_title();?></h1>
          </header>

          <div class="aside region t-6 d-6 w-4">
            <?php the_post_thumbnail('max-natural');?>
          </div>

          <div class="main region t-6 d-6 w-8">
            <?php the_content();?>
          </div>

        </div>
      <?php endwhile;?>
    </main>
  <?php else:?>
    <div class="wrap">
      <div class="region">
        <p><?php nothing_found("Sorry, but we couldn't find anyone by that name.");?></p>
      </div>
    </div>
  <?php endif;?>

  <?php
  // NOW GET ALL STAFF MEMBERS EXCEPT THIS ONE
  $staff = new WP_Query(array(
    'post_type' => 'vts_person',
    'posts_per_page' => -1,
    'post__not_in' => array($this_post_id),
    'orderby' => 'menu_order',
    'order' => 'asc'
  ));
  if($staff):?>
    <section class="white-stripes">
      <div class="wrap">
        <div class="region">
          <header class="section-header">
            <a href="/about" class="internal-back-link">Back to About Us</a>
            <h2 class="section-title"><?php echo _e("Our Team","focustheme");?></h2>
          </header>
          <ul class="card-set flexgrid m1-one m2-two t-three d-three w-four">
            <?php while($staff->have_posts()) : $staff->the_post();?><li class="card-set-item">
              <?php
              $id = get_the_ID();
              $name = get_the_title();
              $title = get_post_meta($id,'vts_person_job_title',true);
              $link = get_the_permalink();
              $tempImg = get_the_post_thumbnail($id,'square-375');
              if($tempImg == ""){
                $img = "<img src='" . get_stylesheet_directory_uri() . "/library/images/chris.jpg" . "'>";
              } else {
                $img = $tempImg;
              }
              include(locate_template("templates/cards/staff.php"));?>
            </li><?php endwhile;?>
          </ul>
        </div>
      </div>
    </section>
  <?php endif;?>
</div>

<?php get_footer(); ?>
