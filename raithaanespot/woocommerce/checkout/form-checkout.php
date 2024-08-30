<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="rts-billing-details-area">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="row">
<div class="col-lg-8 pr--40 pr_md--5 pr_sm--5 order-2 order-xl-1 order-lg-2 order-md-2 order-sm-2 mt_md--30 mt_sm--30 order-2 order-lg-1">
	
		
		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				
			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		
		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

</div>
<div class="col-lg-4 order-1 order-xl-2 order-lg-1 order-md-1 order-sm-1 order-1 order-lg-2">

	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div class="right-card-sidebar-checkout">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>
</div>
</div>

</form>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
