<?php
/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.5.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 /**
  * @hooked WC_Emails::email_header() Output the email header
  */
 do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

 <p><b>Order Number:</b> <?php echo $order->get_order_number();?></p>
 <p><b>Subscription Number:</b> <?php echo $subscription_id;?></p>

 <p>Thank you for purchasing a group subscription with Visual Thinking Strategies. With your purchase, you can offer access to VTS' library of image curricula and teaching resources for up to <?php echo $group_membership_limit;?> guests.</p>

 <h2>Getting Started</h2>

 <p>You may invite guests to share your group subscription by forwarding this email along.</p>

 <p>Individuals wishing to access VTS subscriber-only content under your group subscription can do so with these two simple steps:</p>

 <ol>
   <li>
     <h3>Create an account on the VTS website</h3>
     <p>Simply visit <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">the My Account page</a>, click "Sign up now," provide an email address, and a password of your choosing. You will then be taken to your user account area.</p>
   </li>
   <li>
     <h3>Redeem your group membership</h3>
     <p>In the user account account area, select "Redeem Group Membership" and enter the following information:</p>
     <ul>
       <li><b>Institutional code:</b> <pre><?php echo $inst_code;?></pre></li>
       <li><b>Institutional password:</b> <pre><?php echo $inst_pass;?></pre></li>
     </ul>
   </li>
 </ol>

 <p><i>Group Subscription Administrators:</i> You may <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>view-subscription/<?php echo esc_html($subscription_id);?>">manage this group subscription </a> on your My Accounts page, under Subscriptions.</p>

 <?php

 /**
  * @hooked WC_Emails::order_details() Shows the order details table.
  * @hooked WC_Emails::order_schema_markup() Adds Schema.org markup.
  * @since 2.5.0
  */
 // do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::order_meta() Shows order meta data.
  */
 // do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::customer_details() Shows customer details
  * @hooked WC_Emails::email_address() Shows email address
  */
 // do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::email_footer() Output the email footer
  */
 do_action( 'woocommerce_email_footer', $email );
