<?php get_header();?>

<div id="content" class="site-content-space">
  <div class="wrap">
    <main>

      <header class="page-header region">
        <h1 class="page-title"><?php echo _e("Publications by Abigail Housen","focustheme");?></h1>
      </header>

      <?php

      $authorPosts = new WP_Query(array(
        'post_type' => 'vts_publication',
        'posts_per_page' => 9,
        'paged' => $paged,
        'meta_query' => array(
          array(
            'key' => 'vts_publication_philip_abigail',
            'value' => '"abigail"',
            'compare' => 'LIKE'
          )
        ),
        'meta_key'	=> 'vts_publication_date',
        'orderby' => 'vts_publication_date',
        'order'		=> 'DESC'
      ));?>

      <?php if ($authorPosts->have_posts()):?>

        <div class="region">
          <ul class="card-set flexgrid m1-one m2-two t-two d-three w-four">

            <?php while($authorPosts->have_posts()): $authorPosts->the_post();?><li class="card-set-item">
              <?php
              $postID = get_the_ID();
              $title = get_the_title();
              $author = get_post_meta($postID,"vts_publication_author",true);
              $fileExternal = get_post_meta($postID,"vts_publication_link",true);
              $fileInternal = trim(get_post_meta($postID,"vts_publication_file",true));
              if($fileExternal != ""){
                $link = $fileExternal;
              } elseif($fileInternal != ""){
                $link = wp_get_attachment_url($fileInternal);
              } else {
                $link = "#";
              }
              $body = get_the_content();
              include(locate_template('templates/cards/download-with-excerpt.php'));?>
            </li><?php endwhile;?>

          </ul>
        </div>

        <div class="region">
          <?php bones_page_navi($authorPosts); ?>
        </div>

      <?php else:?>
        <div class="region">
          <p><?php nothing_found("Sorry, we couldn't find any publications by Abigail Housen");?></p>
        </div>
      <?php endif;?>

    </main>
  </div>
</div>

<?php get_footer();?>
