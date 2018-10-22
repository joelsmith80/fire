<?php
/* REQUIRES
- $link (to download itself)
- $title
- $author
- $body
*/ ?>

<article class="card card-download has-action-tray has-expanding-excerpt">
  <div class="card-main-action">
    <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener" class="card-download-header">Download</a>
    <div class="card-text-space">
      <h1 class="card-title"><a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener"><?php echo esc_html($title);?></a></h1>
      <h2 class="card-subtitle">Author(s): <?php echo esc_html($author);?></h2>
      <?php if($body != ""):?>
        <div class="card-body-text card-body-excerpt"><?php echo wp_kses_post(wpautop($body));?></div>
      <?php endif;?>
    </div>
  </div>
  <?php if($body != ""):?>
    <div class="card-action-tray">
      <a href="<?php echo esc_url($link);?>" class="card-action card-action-more" data-action="open-text"><span>Read More</span>
        <?php include(locate_template("templates/cards/flyout-arrow.php"));?>
      </a>
    </div>
  <?php endif;?>
</article>
