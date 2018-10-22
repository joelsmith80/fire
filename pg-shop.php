<?php get_header(); ?>

<div id="content" class="site-content-space layout-clear-hero shop-page">
  <?php if (have_posts()): while(have_posts()): the_post();?>
    <section class="hero-section shop-page-subscriptions">
      <div class="wrap">
        <header class="page-header region">
          <h1 class="page-title"><?php the_title();?></h1>
        </header>
        <aside class="region t-12 d-6 w-6">
          <?php the_post_thumbnail('max-natural');?>
        </aside>
        <div class="main region t-12 d-6 w-6">
          <?php the_content();?>
        </div>
      </div>
    </section>
    <section class="subscription-options-section">
      <div class="wrap">
        <div class="subscription-options region">
          <header class="section-subheader">
            <h3 class="section-subheader">Subscription Options</h3>
          </header>
          <ul class="card-set flexgrid m1-one m2-two t-two d-two w-two">
            <li class="card-set-item">
              <div class="card card-product has-action-tray">
                <div class="card-text-space">
                  <h4 class="card-title">For Groups</h4>
                  <div class="card-body-text">
                    <?php echo get_the_excerpt(2163);?>
                  </div>
                </div>
                <div class="card-action-tray">
                  <?php echo do_shortcode("[add_to_cart id='2163']");?>
                </div>
              </div>
            </li>
            <li class="card-set-item">
              <div class="card card-product has-action-tray">
                <div class="card-text-space">
                  <h4 class="card-title">For Individuals</h4>
                  <div class="card-body-text">
                    <?php echo get_the_excerpt(106);?>
                  </div>
                </div>
                <div class="card-action-tray">
                  <?php echo do_shortcode("[add_to_cart id='106']");?>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>

    
  <?php endwhile; else:?>
    <div class="wrap">
      <div class="region">
        <?php none_found();?>
      </div>
    </div>
  <?php endif;?>

</div>

<?php get_footer(); ?>
