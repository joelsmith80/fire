		<!-- THE FOOTER -->
		<footer class="site-footer">

			<!-- the cta strip -->
			<div class="site-footer-cta-strip">
	      <div class="wrap">
					<div class="region">
						<?php if(!is_user_logged_in()):?>
							<a href="/my-account"><?php babel("Log In");?></a>
						<?php else:?>
							<a href="/my-account"><?php babel("My Account");?></a>
						<?php endif;?>
					</div>
	      </div>
	    </div>

			<!-- the main footer grid -->
			<div class="site-footer-grid-wrap wrap">
				<div class="region">
					<ul class="site-footer-grid flexgrid m2-two t-three d-three w-three">
						<li class="site-footer-grid-box site-footer-grid-box-mission-statement">
		          <div class="inner">
								<h3><?php printf( esc_html__( '%s', 'focustheme' ), get_bloginfo ( 'description' ) ); ?></h3>
		          </div>
		        </li>
						<li class="site-footer-grid-box">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><?php babel("About VTS");?></h4>
								<?php if(has_nav_menu('footer-menu-about')){
									wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Footer - About Us', 'focustheme' ),
										'theme_location' => 'footer-menu-about'
									));
								}?>
		          </div>
		        </li>
		        <li class="site-footer-grid-box">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><?php babel("Join Us");?></h4>
								<?php if(has_nav_menu('footer-menu-join')){
									wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Footer - Join Us', 'focustheme' ),
										'theme_location' => 'footer-menu-join'
									));
								}?>
		          </div>
		        </li>
		        <li class="site-footer-grid-box">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><?php babel("Follow Us");?></h4>
								<?php if(has_nav_menu('footer-menu-follow')){
									wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Footer - Follow Us', 'focustheme' ),
										'menu_class' => 'footer-social-links',
										'theme_location' => 'footer-menu-follow'
									));
								}?>
		          </div>
		        </li>
		        <li class="site-footer-grid-box">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><?php babel("Contact Us");?></h4>
		            <ul>
		              <li><a href="/contact">Write to us</a></li>
		              <li>P.O. Box 316, Bolinas, CA 94924</li>
		              <li>Ph. 718-302-0232</li>
		              <li>Fax 718-302-0242</li>
		            </ul>
		          </div>
		        </li>
		        <li class="site-footer-grid-box site-footer-grid-box-newsletter">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><a href="/newsletter"><?php babel("Get the newsletter");?></a></h4>
								<p><a href="/newsletter">Stay current on VTS news and events</a></p>
		          </div>
		        </li>
		        <li class="site-footer-grid-box">
		          <div class="inner">
		            <h4 class="site-footer-grid-box-title"><?php babel("Fine Print");?></h4>
								<?php if(has_nav_menu('footer-menu-fine-print')){
									wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Footer - Fine Print', 'focustheme' ),
										'theme_location' => 'footer-menu-fine-print'
									));
								}?>
		          </div>
		        </li>
		        <li class="site-footer-grid-box site-footer-grid-box-cta">
		          <div class="inner">
		            <a href="/give" class="button">Give</a>
		          </div>
		        </li>
					</ul>
				</div>
			</div>

			<!-- the fine print at the bottom -->
			<div class="site-footer-fine-print-strip">
	      <div class="wrap">
					<div class="region">
	        	<span class="site-footer-copyright">Copyright © <?php echo date("Y"); ?> Visual Thinking Strategies</span>
	        	<span class="site-footer-credit">Site by <a href="http://smitharmyknife.com" target="_blank" rel="noopener">Joel Smith Media</a></span>
					</div>
	      </div>
	    </div>

		</footer>

		<?php wp_footer(); ?>

	</body>

</html>
