<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons//manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/favicon.ico">
		<![endif]-->

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>

		<script>
		jQuery(document).ready(function($){
  		$('.menu-item-search').addClass('search-bar-tucked');
		});
		</script>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<!-- THE MAIN SITE HEADER -->
	  <header class="site-header">
	    <div class="site-logo-wrap wrap">
				<div class="region">
		      <p class="site-logo" itemscope itemtype="http://schema.org/Organization">
		        <a href="/" rel="nofollow">
		          <img src="<?php echo get_stylesheet_directory_uri();?>/library/images/logo-white-no-descriptor.png" alt="VTS logo in white">
		          <span class="site-title">Visual Thinking Strategies</span>
		        </a>
		      </p>
				</div>
	    </div>

			<!-- THE MAIN MENU -->
	    <div class="main-site-nav-wrap wrap">
				<div class="region">
		      <input type="checkbox" id="main-menu-toggle" name="main-menu-toggle" class="main-menu-toggle mobile-toggle">
		      <label for="main-menu-toggle" class="mobile-toggle-label"><?php babel( "Main Menu" );?></label>
		      <nav class="main-site-nav">
		        <ul class="main-site-menu site-header-menu">
		          <li class="menu-item-search">
								<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
									<div>
								  	<label for="s" class="screen-reader-text"><?php babel("Search for:"); ?></label>
								    <input type="search" id="s" name="s" value="" class="search-field"/>
								    <button type="submit" id="searchsubmit" class="search-submit-button" ><?php babel("Go"); ?></button>
								  </div>
								</form>
		          </li>
							<?php if(has_nav_menu('main-nav')){
								wp_nav_menu(array(
									'container' => false,
									'menu' => __( "Main Menu", "focustheme" ),
									'items_wrap' => '%3$s',
									'theme_location' => 'main-nav'
								));
							}?>
		        </ul>
		      </nav>
				</div>
	    </div>

			<!-- THE ACCOUNT MENU -->
			<nav class="account-nav">
	      <div class="wrap">
					<div class="region">
						<input type="checkbox" id="account-menu-toggle" class="account-menu-toggle mobile-toggle" name="account-menu-toggle">
		        <label for="account-menu-toggle" class="mobile-toggle-label"><?php babel( "Account" );?></label>
		        <ul class="account-menu site-header-menu top-level hoverable">
		          <li class="desktop-js-search-prompt"></li>

							<?php

							// if user isn't logged in, show public account-menu
							if(!is_user_logged_in()){

								if(has_nav_menu('user-menu-public')){
									wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Member Menu', 'focustheme' ),
										'items_wrap' => '%3$s',
										'theme_location' => 'user-menu-public'
									));
								}

							}	
							
							else {

								// if they're a non-subscribing customer, show that menu
								if(is_simple_customer()){

									if(has_nav_menu('user-menu-customer')){
										wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'Customer Menu', 'focustheme' ),
											'items_wrap' => '%3$s',
											'theme_location' => 'user-menu-customer'
										));
									}

								}

								// else if they're a member, editor, or site admin, show member menu
								else {

									if(has_nav_menu('user-menu-member')){
										wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'Member Menu', 'focustheme' ),
											'items_wrap' => '%3$s',
											'theme_location' => 'user-menu-member'
										));
									}
								}
							}?>
		        </ul>
					</div>
	      </div>
	    </nav>
	  </header>
