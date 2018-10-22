<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		$current_user->display_name,
		wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
	);

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
	?>
</p>

<div class="main">

	<?php
	// check if we need to show the group-membership prompt
	do_action('vts_check_for_redemption_prompt');

	$memberships = wc_memberships_get_user_memberships();
	$subscriptions = wcs_get_users_subscriptions();?>

	<div class="profile-memberships-subscriptions row">

		<div class="profile cell">
			<?php do_action('vts_my_account_profile');?>
		</div>

		<div class="memberships cell">
			<?php //do_action('woocommerce_before_my_account');
			// see class-wc-memberships-member-area.php->my_account_memberships() for guidance ?>
			<h2><?php echo __('My Memberships','woocommerce-memberships');?></h2>
			<?php if(!empty($memberships)):?>
				<ul>
					<?php foreach($memberships as $membership):?>
						<li>
							<h3><?php echo $membership->get_plan()->get_name();?></h3>
							<ul>
								<li><span>Status:</span> <?php echo esc_html( wc_memberships_get_user_membership_status_name( $membership->get_status() ) ); ?></li>
								<?php if ( $start_date = $membership->get_local_start_date( 'timestamp' ) ) : ?>
									<li><span>Member since:</span> <time datetime="<?php echo date( 'Y-m-d', $start_date ); ?>" title="<?php echo esc_attr( date_i18n( wc_date_format(), $start_date ) ); ?>"><?php echo date_i18n( wc_date_format(), $start_date ); ?></time></li>
								<?php else : ?>
									<li><span>Member since:</span> <?php esc_html_e( 'N/A', 'woocommerce-memberships' ); ?></li>
								<?php endif; ?>
							</ul>
						</li>
					<?php endforeach;?>
				</ul>
			<?php else:?>
				<p><?php echo __('None found','bonestheme');?></p>
			<?php endif;?>
		</div>

		<div class="subscriptions cell">
			<h2><?php echo __('My Subscriptions','woocommerce-subscriptions');?></h2>
			<?php if(!empty($subscriptions)):?>
				<ul>
					<?php foreach($subscriptions as $subscription):?>
						<li>
							<h3>
								<a href="<?php echo esc_url( $subscription->get_view_order_url() ); ?>">Subscription <?php echo esc_html( sprintf( _x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), $subscription->get_order_number() ) ); ?></a>
							</h3>
							<ul>
								<li><span>Status:</span> <?php echo esc_attr( wcs_get_subscription_status_name( $subscription->get_status() ) ); ?></li>
								<li><span>Next payment:</span>
									<?php echo esc_attr( $subscription->get_date_to_display( 'next_payment' ) ); ?>
									<?php if ( ! $subscription->is_manual() && $subscription->has_status( 'active' ) && $subscription->get_time( 'next_payment' ) > 0 ) : ?>
										<?php
										// translators: placeholder is the display name of a payment gateway a subscription was paid by
										$payment_method_to_display = sprintf( __( 'Via %s', 'woocommerce-subscriptions' ), $subscription->get_payment_method_to_display() );
										$payment_method_to_display = apply_filters( 'woocommerce_my_subscriptions_payment_method', $payment_method_to_display, $subscription );
										?>
									(<?php echo esc_attr( $payment_method_to_display ); ?>)
									<?php endif; ?>
								</li>
								<li><span>Total:</span> <?php echo wp_kses_post( $subscription->get_formatted_order_total() ); ?></li>
							</ul>
						</li>
					<?php endforeach;?>
				</ul>
			<?php else:?>
				<p><?php echo __('None found','bonestheme');?></p>
			<?php endif;?>
		</div>

	</div>





	<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

	<div class="recent-orders row">
		<div class="cell">
			<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
		</div>
	</div>

	<div class="payments-addresses row">
		<div class="payments cell">
			<?php do_action( 'woocommerce_after_my_account' ); ?>
		</div>
		<div class="addresses cell">
			<?php wc_get_template( 'myaccount/my-address.php' ); ?>
		</div>
	</div>


</div>
