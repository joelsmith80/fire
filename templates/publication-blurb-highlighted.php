<?php?>

<article>
  <div class="flag">Key Study</div>
  <h1><a href="#"><?php echo $doc->post_title;?></a></h1>
  <?php if(get_field('vts_publication_author',$doc->ID)):?>
    <p class="author"><span>Author(s):</span> <?php the_field('vts_publication_author',$doc->ID);?></p>
  <?php endif;?>
  <p class="sub"><?php echo $doc->post_content;?></p>
</article>

<?php ?>
