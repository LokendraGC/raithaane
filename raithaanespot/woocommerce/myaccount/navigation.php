<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// do_action( 'woocommerce_before_account_navigation' );
	?>
<div class="col-lg-3 order-2 order-lg-1">
<div class="nav accout-dashborard-nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		<?php 
		foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
			$class = wc_get_account_menu_item_classes( $endpoint );
					$active_class = '';
					$link = get_the_permalink();
					if( is_wc_endpoint_url( $endpoint ) ){					
						$active_class = 'active';
					}					
					$icon = '';			
					switch ($endpoint) {
						case 'dashboard':
							$icon = '<i class="fa-regular fa-chart-line"></i>';
							$tab_aria_controls = 'dashboard';
							break;
						case 'orders':
							$icon = '<i class="fa-regular fa-bag-shopping"></i>';
							$tab_aria_controls = 'orders';
							break;
						case 'edit-address':
							$icon = '<i class="fa-sharp fa-regular fa-location-dot"></i>';
							$tab_aria_controls = 'account-detail';
							break;
						case 'edit-account':
							$icon = '<i class="fa-light fa-user"></i>';
							$tab_aria_controls = 'account-detail';
							break;
						case 'customer-logout':
							$icon = '<i class="fa-light fa-right-from-bracket"></i>';
							$tab_aria_controls = '';
							break;
						default:
							$icon = '';
							$tab_aria_controls = '';
							break;
					}
			?>			
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="nav-link <?php echo $active_class; ?>"><?php echo $icon . esc_html( $label ); ?></a>
		<?php endforeach; ?>
</div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
