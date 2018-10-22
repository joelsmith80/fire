<?php
/*
 Template Name: My Account
*/
?>

<?php get_header();

// redeeming a group subscription redirects you to the My Account page, passing along a variable with the ID
// of the membership you just created. we want a user to see a confirmation of their membership when they arrive,
// so we check if the variable has been passed, then check to make sure they're a subscriber and they haven't already
// seen the message. if any of those is untrue, the message doesn't display.
$message = (isset($_GET['welcome']) && intval($_GET['welcome'])) ? "Welcome to your new membership. You now have access to all VTS curriculum and subscriber-only materials, and will continue to enjoy this access for as long as the subscription sponsoring you remains active."  : null;

if($message){
	$membership_id = $_GET['welcome'];
	$current_user = wp_get_current_user();
	$is_subscriber = is_sponsored_member();
	$has_seen_message = (get_user_meta($current_user->ID,'welcomed_to_plan',true) && get_user_meta($current_user->ID,'welcomed_to_plan',true) == $membership_id) ? true : false;
	if($membership_id && $is_subscriber && !$has_seen_message){
		update_user_meta($current_user->ID,'welcomed_to_plan',$membership_id);
	}
} else {
	$membership_id = null;
	$current_user = null;
	$is_subscriber = false;
	$has_seen_message = false;
}?>

		<div id="content" class="site-content-space page-with-no-sidebar">
			<div class="wrap">
				<main class="region my-account">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<header class="page-header">
							<h1 class="page-title"><?php the_title();?></h1>
						</header>

						<div class="my-account-message-section">

							<?php
							// show the 'welcome to your new subscription' message, if that's relevant
							if($message && $is_subscriber && !$has_seen_message){
								echo "<p class='focus-wc-notification sponsored-member-welcome'>" . __($message,"woocommerce") . "</p>";
							}


							// show the 'looking for a group subscription?' message, if that's relevant
							global $wp;
							if(is_user_logged_in() && !isset($wp->query_vars['customer-logout']) && ((!is_group_member() && !is_sponsored_member()) OR current_user_can('administrator'))){
								echo "<p class='focus-wc-notification sponsored-member-welcome'>" . __("Looking to join a group subscription? ","woocommerce") . "<a href='" . get_page_link(4975) . "' target='_blank' rel='noopener'>" . __("Here's how.","woocommerce") . "</a></p>";
							}?>

						</div>

						<div class="my-account-content-section">

							<?php
							// do the content
							the_content();?>

						</div>

					<?php endwhile; else:
						include(locate_template("templates/messages/none-found.php"));
					endif;?>

				</main>
			</div> <!-- // .wrap -->
		</div> <!-- // .site-content-space -->

<?php get_footer(); ?>
