<?php get_header();?>

<div id="content" class="site-content-space">
  <div class="wrap">
    <main class="region">

      <?php
      // SHOW PRESS 'GREATEST HITS' ON THE FIRST PAGE OF RESULTS
      if(!is_paged()){
        $core = get_posts(
          array(
            'posts_per_page' => -1,
            'post_type' => 'vts_press',
            'tax_query' => array(
              array(
                'taxonomy' => 'vts_press_category',
                'field' => 'slug',
                'terms' => 'core'
              )
            ),
            'orderby' => 'menu_order',
            'order' => 'asc'
          )
        );
      }

      if(isset($core) && !empty($core)):?>
      <section class="core-press-clipings">
        <header class="page-header">
          <h1 class="page-title"><?php echo _e("Press","focustheme");?></h1>
        </header>
        <ul class="card-set will-have-action-trays flexgrid m1-one m-two t-three d-three w-three">
          <?php foreach($core as $clip):?><li class="card-set-item">
            <?php
            $link = get_post_meta($clip->ID,"vts_press_clips_link",true);
            $quote = $clip->post_content;
            $publication = get_post_meta($clip->ID,"vts_press_clips_publication",true);
            $date = date("F j, Y",strtotime(get_post_meta($clip->ID,"vts_press_clips_date",true)));
            include(locate_template("templates/cards/press.php"));?>
          </li><?php endforeach;?>
        </ul>
      </section>
      <?php endif;?>

      <?php
      // THE MAIN FLOW
      if (have_posts()):?>
      <section class="all-press-clippings">
        <h2 class="section-header"><?php echo _e("Press Archive","focustheme");?></h2>
        <ul class="card-set will-have-action-trays flexgrid m1-one m2-two t-three d-three w-four">
        <?php while (have_posts()) : the_post(); ?><li class="card-set-item">
          <?php
          $link = get_post_meta(get_the_ID(),'vts_press_clips_link',true);
          $quote = get_the_content();
          $publication = get_post_meta(get_the_ID(),'vts_press_clips_publication',true);
          $date = date("F j, Y",strtotime(get_post_meta(get_the_ID(),'vts_press_clips_date',true)));
          include(locate_template("templates/cards/press.php"));
          ?></li><?php endwhile;?>
        </ul>
      </section>
      <?php bones_page_navi(); ?>
      <?php else:?>
        <p><?php echo _e("Sorry, no posts found.","focustheme");?></p>
      <?php endif;?>


    </main>
  </div>
</div>

<?php get_footer();?>
