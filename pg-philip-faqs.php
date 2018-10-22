<?php get_header();?>

	<div id="content" class="site-content-space pg-philip-faqs sticky-menu-page">

        <?php if(have_posts()): while(have_posts()): the_post();?>

            <article>
                <div class="wrap">

                    <header class="page-header region">
                        <h1 class="page-title"><?php the_title();?></h1>
			            <div class="page-intro"><?php the_content();?></div>
                    </header>

                    <?php if(can_see_membership_stuff()):?>

                        
                        <?php
                        $page_id = get_the_ID();
                        $faq = new Vts_FAQ();
                        $groups = $faq->get_philip_faqs($page_id);
                        ?>

                        <?php if($groups):?>
                        <nav class="facilitating-menu-section region">
                            <ul id="sticky-menu" class="flexgrid card-set m1-one m2-two t-three d-three w-three">
                                <?php foreach($groups as $g):?>
                                <li class="card-set-item">
                                    <div class="card card-sticky-menu">
                                        <a href="#<?php echo $g['slug'];?>">
                                            <div class="card-text-space">
                                                <div class="title"><?php echo $g['title'];?></div>
                                                <div class="subtitle"><?php echo $g['subtitle'];?></div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </nav>

                        <?php foreach($groups as $g):?>
                        <section id="<?php echo $g['slug'];?>" class="sticky-step region entry-content">
                            <a href="#" class="js-close-link js-close-link-top">Close</a>
                            <header class="section-header">
                                <h2 class="section-title"><?php echo $g['title'];?></h2>
                                <h3 class="section-subtitle"><?php echo $g['subtitle'];?></h3>
                            </header>
                            <div class="main">
                                <?php if($g['intro']): echo $g['intro']; endif;
                                foreach($g['questions'] as $q):?>
                                <div class="pop-open dig-deeper">
                                    <h4 class="title dig-deeper-title trigger dig-deeper-trigger" data-action="trigger"><span><?php echo $q['title'];?></span></h4>
                                    <div class="dig-deeper-main" data-action="reveal">
                                        <?php echo $q['body'];?>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </section>
                        <?php endforeach;?>

                        <?php endif;?>

                    <?php else:?>
                        <div class="region">
                            <?php include(locate_template("templates/messages/not-allowed.php"));?>
                        </div>
                    <?php endif;?>

                </div>
            </article>

        <?php endwhile; else:?>
            <div class="wrap">
                <div class="region">
                    <?php none_found();?>
                </div>
            </div>
        <?php endif;?>

    </div>

<?php get_footer();?>