<?php
/* REQUIRES
- $link (to downloaded material)
- $image
- $title
*/?>

<article class="card card-download-with-image">
  <div class="card-image-space">
    <a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener">
      <img src="<?php echo esc_url($image);?>" alt="VTS Student Thinking Assessment">
    </a>
  </div>
  <div class="card-text-space" data-action="reveal">
    <h1 class="card-title"><a href="<?php echo esc_url($link);?>" target="_blank" rel="noopener"><?php echo esc_html($title);?></a></h1>
    <svg
      viewBox="0 0 450 425"
      height="425"
      width="450"
      class="download-icon">
      <polygon
        points=" 165,400 45,400 45,0 366,0 405,50 405,400 285,400 315,350 355,350 355,100 305,100 305,50 95,50 95,350 135,350 "
        class="positive" />
      <polygon
        points=" 225,425 295,300 250,300 250,167 200,175 200,300 155,298 "
        class="positive"/>
    </svg>
  </div>
</article>
