<?php?>

<article>
  <div class="flag">Key Study</div>
  <h1><a href="#"><?php echo $doc['title'];?></a></h1>
  <?php if(get_field('vts_doc_author',$doc['id'])):?>
    <p class="author"><span>Author(s):</span> <?php the_field('vts_doc_author',$doc['id']);?></p>
  <?php endif;?>
  <p class="sub"><?php echo $doc['description'];?></p>
</article>

<?php ?>
