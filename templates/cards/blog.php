<?php //
// CHANGE ALL THESE PARAMETERS
// @params  $title
// @params  $url
// @params  $img
// @params  $has_thumb
// @params  $date_pretty
// @params  $date_ugly
// @params  $author
// @params  $excerpt
// @params  $flag

?>

<article class="card card-blog has-action-tray has-expanding-excerpt">
  <div class="card-main-action">
    <?php if($has_thumb):?>
      <div class="card-image-space">
        <a href="<?php echo $url;?>">
          <img src="<?php echo $img;?>" alt="<?php echo $title;?>">
        </a>
      </div>
    <?php else:?>
      <div class="card-image-space card-image-space-no-thumb">
        <a href="<?php echo $url;?>"><span>Read More</span></a>
      </div>
    <?php endif;?>
    <div class="card-text-space">
      <?php if($flag):?><span class="card-flag"><?php echo $flag;?></span><?php endif;?>
      <h1 class="card-title"><a href="<?php echo $url;?>"><?php echo $title;?></a></h1>
      <h2 class="card-subtitle"><?php echo $date_pretty . " by " . $author;?></h2>
      <div class="card-body-text card-body-excerpt">
        <?php echo $excerpt;?>
      </div>
    </div>
  </div>
  <div class="card-action-tray">
    <a href="<?php echo $url;?>" class="card-action card-action-more" data-action="open-text"><span>Read More</span>
      <?php include(locate_template("templates/cards/flyout-arrow.php"));?>
    </a>
  </div>
</article>
