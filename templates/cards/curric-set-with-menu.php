<article class="card card-curriculum-menu-item has-grade-level-menu">
  <div class="card-image-space">
    <a href="<?php echo esc_url($link);?>" data-action="open-text" data-parent="card">
      <?php echo get_the_post_thumbnail($id,"square-375");?>
    </a>
  </div>
  <div class="card-text-space">
    <h1 class="card-title">
      <a href="<?php echo esc_url($link);?>" data-action="open-text" data-parent="card">
        <?php
        echo esc_html($title);
        include(locate_template("templates/cards/flyout-arrow.php"));?>
      </a>
    </h1>
  </div>

  <?php
  // need to try to guess how many lines the title is going to take up, at various sizes
  $len = strlen(trim(esc_html($title)));
  $ddClasses = array();
  if($len > 14){
    $ddClasses[] = "double-decker-2";
    $ddClasses[] = "double-decker-3";
  }
  if($len > 19){
    $ddClasses[] = "double-decker-4";
  }
  if($len > 20){
    $ddClasses[] = "double-decker-1";
  }
  if($len > 24){
    $ddClasses[] = "double-decker-5";
  }
  $doubleDeckerRules = implode(" ",$ddClasses);
  ?>

  <ul class="card-grade-level-menu <?php echo $doubleDeckerRules;?>">
    <?php for($i=0; $i < $relatedSets; $i++):?>
      <li>
        <?php $referred = get_post_meta($id,"vts_related_curriculum_sets_" . $i . "_vts_related_curriculum_sets_menu_ref",true);
        $link = get_the_permalink($referred[0]);?>
        <a href="<?php echo esc_url($link);?>"><?php echo esc_html(get_post_meta($id,"vts_related_curriculum_sets_" . $i . "_vts_related_curriculum_sets_menu_title",true ));?></a>
      </li>
    <?php endfor;?>
  </ul>
</article>
