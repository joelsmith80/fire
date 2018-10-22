<?php
/* REQUIRES
- $title
- $image
- $link
*/ ?>

<article class="card">
  <div class="card-image-space">
    <a href="<?php echo esc_url($link);?>">
      <img src="<?php echo esc_url($image);?>" alt="<?php echo esc_html($title);?>">
    </a>
  </div>
  <div class="card-text-space">
    <h3 class="card-title"><a href="<?php echo esc_url($link);?>"><?php echo esc_html($title);?></a></h3>
  </div>
</article>
