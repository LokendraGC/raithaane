<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Raithaanespot
 */

get_header();
?>
<style>
	#shipping_method {
		padding: 0;
		margin: 0;
		list-style: none;
	}
</style>
<?php 
		if( is_account_page() || is_checkout()) {
			$bg_light = '';
		}else{
			$bg_light = 'bg_light-1';
		}
		?>
<div class="rts-navigation-area-breadcrumb <?php echo $bg_light; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="navigator-breadcrumb-wrapper">
					<a href="<?php echo esc_url( home_url() ); ?>">Home</a>
					<i class="fa-regular fa-chevron-right"></i>
					<?php the_title(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-seperator <?php echo $bg_light; ?>">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>  
<div class="rts-cart-area rts-section-gap <?php echo $bg_light; ?>">
	<div class="container">
	<?php 
		if( is_account_page() ) {
			echo '<div class="row">';
		}
		?>
		<?php the_content(); ?>
	<?php 
		if( is_account_page() ) {
			echo '</div>';
		}
		?>
	</div>
</div>
<?php 
	if( is_account_page() || is_checkout() ) {
	?>
	<script>
	const firstWoocommerceDiv = document.querySelector('div.woocommerce');
	if (firstWoocommerceDiv) {
		firstWoocommerceDiv.classList.add('row');
	}
	</script>
<?php
}
?>
<?php
get_footer();