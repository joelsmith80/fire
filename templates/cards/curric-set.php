<article class="card card-curriculum-menu-item">
  <div class="card-image-space">
    <a href="<?php echo esc_url($link);?>">
      <?php echo get_the_post_thumbnail($id,"square-375");?>
    </a>
  </div>
  <div class="card-text-space">
    <h1 class="card-title">
      <a href="<?php echo esc_url($link);?>"><?php echo esc_html($title);?></a>
    </h1>
  </div>
</article>
