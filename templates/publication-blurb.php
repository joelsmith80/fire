<?php

if(get_field('vts_publication_link',$doc->ID)){
  $link = get_field('vts_publication_link',$doc->ID);
} elseif(get_field('vts_publication_file',$doc->ID)){
  $link = get_field('vts_publication_file',$doc->ID);
} else {
  $link= "#";
}?>

<article>
  <h1><a href="<?php echo $link;?>"><?php echo $doc->post_title;?></a></h1>
  <?php if(get_field('vts_publication_author',$doc->ID)):?>
    <p class="author"><span>Author(s):</span> <?php the_field('vts_publication_author',$doc->ID);?></p>
  <?php endif;?>
  <p class="sub"><?php echo $doc->post_content;?></p>
</article>

<?php ?>
