<article class="card single-curriculum-card">
  <div class="card-image-space">
    <a href="<?php echo esc_url($imgLink);?>" data-action="screenfull" data-src="<?php echo esc_url($imgLink);?>">
      <?php echo $img;?>
    </a>
  </div>
  <div class="card-text-space">
    <h1 class="card-title"><?php echo esc_html($title);?></h1>
    <p class="card-subtitle"><a href="<?php echo esc_url($contentLink);?>">Image <?php echo $i;?> info</a></p>
  </div>
</article>
