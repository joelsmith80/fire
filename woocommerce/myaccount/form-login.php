<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div id="login-form-area" class="login-form-area u-column1 col-1">

<?php endif; ?>

		<h2><?php esc_html_e( 'Log In', 'woocommerce' ); ?> <a href="#" class="js-toggle-login-forms" data-action="switch-to-register"><?php echo _e("Sign Up","woocommerce");?></a></h2>

		<form method="post" class="woocommerce-form woocommerce-form-login login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		<div class="auth-form-footnotes">
			<p class="lost-password"><?php _e( 'Lost your password? ', 'woocommerce' ); ?><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php echo _e("Recover it here","woocommerce");?></a></p>
			<p class="not-a-member"><?php _e("Don't have an account? ","woocommerce");?><a href="#register-form-area" data-action="switch-to-register"><?php echo _e("Sign up now","woocommerce");?></a></p>
			<p class="joining-group"><?php _e("Joining a group subscription?","woocommerce");?><a href="/redeem-group-subscription" target="_blank" rel="noopener"><?php echo _e("Here's how to get in","woocommerce");?></a></p>
		</div>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div id="register-form-area" class="register-form-area u-column2 col-2">

		<h2><?php _e( 'Sign Up', 'woocommerce' ); ?> <a href="#" class="js-toggle-login-forms" data-action="switch-to-login"><?php echo _e("Log In","woocommerce");?></a></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password"/>
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

		<div class="auth-form-footnotes">
			<p class="group-subscriber"><?php _e("Claiming a group subscription? ","woocommerce");?><span><?php echo _e("Create an account now, and ","woocommerce");?><a href="/redeem-group-subscription" target="_blank" rel="noopener"><?php echo _e("follow the instructions here ","woocommerce");?></a></span></p>
			<p class="already-member"><?php _e("Already a member? ","woocommerce");?><a href="#login-form-area" data-action="switch-to-login"><?php echo _e("Log in now","woocommerce");?></a></p>
		</div>

	</div>

</div>

<div id="group-sub-login-help" class="group-sub-login-help">
	<div class="intro">
		<h3 class="title">Are you trying to join a Group Subscription?</h3>
		<p>We have <a href="/redeem-group-subscription" target="_blank" rel="noopener">a complete guide to redeeming group subscriptions</a> on the new site, but here's a quick primer:</p>
	</div>
	<ul class="list flexgrid t-three d-three w-three">
		<li class="step-1 step-item">
			<h4 class="title">Create your own user account</h4>
			<p>No more sharing one big group account. Create your own account, with your own username and password, on this page (click "Sign Up Now," above). Then use that username and password every time you log in here.</p>
		</li>
		<li class="step-2 step-item">
			<h4 class="title">Join your group</h4>
			<p>Once logged in with your own account, visit the Redeem Group Subscription link on your account dashboard and enter the Group Code and Group Password given to you by your administrator. <strong>Once you're in, you'll never need your group credentials again!</strong></p>
		</li>
		<li class="step-3 step-item">
			<h4 class="title">Keep coming back for more</h4>
			<p>Use your own username and password to log in, and continue to enjoy access to our curriculum and other goodies for as long as your administrator's subscription is active.</p>
		</li>
	</ul>
	<p class="help">Still having trouble? <a href="/contact">Contact us</a></p>
</div>


<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
