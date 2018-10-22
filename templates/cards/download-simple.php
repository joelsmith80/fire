<?php
/* REQUIRES
- $link (to download itself)
- $title
- $author
*/ ?>

<article class="card card-download-simple">
  <a href="<?php echo esc_url($link);?>" class="card-download-header" target="_blank" rel="noopener">Download</a>
  <div class="card-text-space">
    <h1 class="card-title"><a href="<?php echo esc_url($link);?>"><?php echo esc_html($title);?></a></h1>
    <?php if($author != ""):?>
      <h2 class="card-subtitle">Author(s): <?php echo esc_html($author);?></h2>
    <?php endif;?>
  </div>
</article>
