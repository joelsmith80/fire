<?php
// @params  $title
// @params  $content
// @params  $x (a counter for the appearance for this group of expando-boxes)
// @params  $c (a counter used for this particular expando box)
?>

<div class="expando-box">
  <h3 class="expando-box-title"><span><?php echo $title;?></span></h3>
  <input type="checkbox" id="expando-box-<?php echo intval($x) . '-' . intval($c);?>" class="expando-box-check">
  <label for="expando-box-<?php echo intval($x) . '-' . intval($c);?>" class="expando-box-label">Open</label>
  <div class="expando-box-content entry-content">
    <div class="expando-box-content-wrapper">
      <?php echo $content;?>
    </div>
  </div>
</div>
