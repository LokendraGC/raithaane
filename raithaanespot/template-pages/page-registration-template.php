<?php
  /*
   * Template name: Registration Form
   */
?>

<?php if(is_user_logged_in()){
  wp_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
} ?>
<?php get_header();?>

<?php get_template_part('template-parts/common/banner-section'); ?>

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

<div class="section-seperator bg_light-1">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>  
<div class="rts-cart-area rts-section-gap bg_light-1">
	<div class="container">
	<div class="row">
	<div class="col-lg-12">
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="registration-wrapper-1">
<?php $logo = get_field('wtn_header_logo', 'options'); ?>
	<div class="logo-area mb--0">
		<img src="<?php echo ($logo) ? $logo['url'] : get_template_directory_uri() . '/assets/images/raithaane-logo.svg'; ?>" alt="<?php echo bloginfo('sitename'); ?>">
	</div>

	<h2><?php esc_html_e( 'Register Into Your Account', 'woocommerce' ); ?></h2>
		<form method="post" class="woocommerce-form woocommerce-form-register register registration-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
  						<?php do_action( 'woocommerce_register_form_start' ); ?>
  						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
  							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
  								<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
  								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
  							</p>
  						<?php endif; ?>
  						<div class="input-wrapper">
  							<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
  							<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
  						</div>
  						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
  							<div class="input-wrapper">
  								<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
  								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text password-field" name="password" id="reg_password" autocomplete="new-password" />
  								<!-- <button type="button" class="toggle-password">Show</button> -->
  								<i class="fa-light fa-eye password-icon toggle-password"></i>
  							</div>
  							<div class="input-wrapper">
  								<label for="reg_password_confirm"><?php esc_html_e( 'Confirm Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
  								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text password-field" name="password_confirm" id="reg_password_confirm" autocomplete="new-password" />
  								<!-- <button type="button" class="toggle-password">Show</button> -->
  								<i class="fa-light fa-eye password-icon toggle-password"></i>
  							</div>
  						<?php else : ?>
  							<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
  						<?php endif; ?>
  						<?php do_action( 'woocommerce_register_form' ); ?>
  						<p class="woocommerce-form-row form-row">
  							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
  							<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit rts-btn btn-primary" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" style="margin-top:20px;"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
  							<p class="alert-message"></p>
  						</p>
  						<?php do_action( 'woocommerce_register_form_end' ); ?>
  						<div class="another-way-to-registration">
  							<div class="registradion-top-text">
  								<span>Or Login</span>
  							</div>
  							<p>Already Have Account? <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Login</a></p>
  						</div>
  					</form>
</div>
</div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>
</div>

  <script>
  	document.addEventListener('DOMContentLoaded', function() {
    // Toggle Password Visibility
  		document.querySelectorAll('.toggle-password').forEach(function(toggleButton) {
  			toggleButton.addEventListener('click', function() {
  				let passwordField = this.previousElementSibling;
  				if (passwordField.type === "password") {
  					passwordField.type = "text";
  					this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
  					// this.textContent = "Hide";
  				} else {
  					passwordField.type = "password";
  					this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
  					// this.textContent = "Show";
  				}
  			});
  		});

    // Confirm Password Validation
  		const form = document.querySelector('.woocommerce-form-register');
  		form.addEventListener('submit', function(event) {
  			const password = document.getElementById('reg_password').value;
  			const confirmPassword = document.getElementById('reg_password_confirm').value;
        const alertMessage = document.querySelector('.alert-message');


  			if (password !== confirmPassword) {
  				
  				event.preventDefault();
  				alertMessage.textContent = 'Passwords do not match. Please try again.';
          alertMessage.style.color = 'red';

  			}else{
  				alertMessage.textContent = '';
  			}
  		});
  	});
  </script>

<?php get_footer();