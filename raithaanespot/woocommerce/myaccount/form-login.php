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
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<style>
	.input-wrapper{
		position: relative;
	}

	.password-icon{
		position: absolute;
		top: 50px;
		right: 20px;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<div class="registration-wrapper-1">
			<?php $logo = get_field('wtn_header_logo', 'options'); ?>
			<div class="logo-area mb--0">
				<img src="<?php echo ($logo) ? $logo['url'] : get_template_directory_uri() . '/assets/images/raithaane-logo.svg'; ?>" alt="<?php echo bloginfo('sitename'); ?>">
			</div>

		<h3 class="title"><?php esc_html_e( 'Login Into Your Account', 'woocommerce' ); ?></h3>

		<form class="woocommerce-form woocommerce-form-login login registration-form" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>
			<div class="input-wrapper">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>
			<div class="input-wrapper">				
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				<i class="fa-light fa-eye password-icon toggle-passwordd"></i>
			</div>
				
			<?php do_action( 'woocommerce_login_form' ); ?>

			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> rts-btn btn-primary" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>

			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<div class="another-way-to-registration">
				<div class="registradion-top-text">
					<span>Or Register</span>
				</div>
				<p>Create a Account.<a href="<?php the_permalink(226); ?>">Register</a></p>
			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		
	</div>
	</div>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>


<script>
	document.addEventListener('DOMContentLoaded', function() {
    // Select the toggle button
		const toggleButton = document.querySelector('.toggle-passwordd');
		
		if (toggleButton) {
			toggleButton.addEventListener('click', function() {
				const passwordField = document.querySelector('#password');

            // Log the password field to the console
				console.log('Password field:', passwordField);

				if (passwordField) {
					if (passwordField.type === "password") {
						passwordField.type = "text";
						this.classList.remove('fa-eye');
						this.classList.add('fa-eye-slash');
						console.log('Changed to text'); 
					} else {
						passwordField.type = "password";
						this.classList.remove('fa-eye-slash');
						this.classList.add('fa-eye');
						console.log('Changed to password'); 
					}
				} else {
					console.error('Password field not found.');
				}
			});
		} else {
			console.error('Toggle button not found.');
		}
	});

</script>
