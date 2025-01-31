<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

 defined( 'ABSPATH' ) || exit;

?>

<div class="cart_totals cart-total-area-start-right <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h5 class="title"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h5>

	<div class="subtotal">
		<span><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
		<h6 class="price"><?php wc_cart_totals_subtotal_html(); ?></h6>
	</div>
	<div class="shipping">
	<span><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></span>

	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

	<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

	<?php wc_cart_totals_shipping_html(); ?>

	<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

	<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

	
	<h6 class="price"><?php woocommerce_shipping_calculator(); ?></h6>
		<!-- <td class="cart_total_label"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></td>
		<td class="cart_total_amount" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><i class="ti-gift mr-5"></i><?php woocommerce_shipping_calculator(); ?></td> -->
	

	<?php endif; ?>
	</div>
	<div class="bottom">
		<div class="wrapper">
			<span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
			<h6 class="price"><?php wc_cart_totals_order_total_html(); ?></h6>
		</div>
		<div class="button-area">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>
	</div>
	
	

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
