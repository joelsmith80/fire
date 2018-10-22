<?php
/* REQUIRES
- $link (to download itself)
- $image
- $title
- $date
- $body
*/?>

<article class="card card-download has-action-tray has-expanding-excerpt">
  <div class="card-main-action">
    <div class="card-video-space">
      <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener">
        <?php echo $image;?>
      </a>
    </div>
    <div class="card-text-space">
      <h1 class="card-title"><a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener"><?php echo esc_html($title);?></a></h1>
      <p class="card-subtitle"><?php echo esc_html($date);?></p>
      <div class="card-body-text card-body-excerpt"><?php echo $body;?></div>
    </div>
  </div>
  <div class="card-action-tray">
    <a href="<?php echo esc_url($link);?>" class="card-action card-action-more" data-action="open-text">Read More
      <?php include(locate_template("templates/cards/flyout-arrow.php"));?>
    </a>
  </div>
</article>
