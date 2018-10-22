<?php
/* REQUIRES
- $title
- $body
- $link
*/?>

<article class="card card-offering-preview">
  <a href="<?php echo esc_url($link);?>">
    <div class="card-text-space">
      <h3 class="card-title"><?php echo _e($title,"focustheme");?></h3>
      <p class="card-body-text"><?php echo esc_html($body);?></p>
    </div>
  </a>
</article>
