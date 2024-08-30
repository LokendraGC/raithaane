<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header();

?>

<input type="hidden" id="page_no" value="2" />

<!-- rts navigation bar area start -->
<div class="rts-navigation-area-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="navigator-breadcrumb-wrapper">
					<a href="index.html">Home</a>
					<i class="fa-regular fa-chevron-right"></i>
					<a class="current" href="#">All Products</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- rts navigation bar area end -->
<div class="section-seperator">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>

<!-- shop[ grid sidebar wrapper -->

<?php

$product_args = array(
	'post_type' => 'product',
	'posts_per_page' => 8,
	'post_status' => 'publish',
	'order' => 'ASC'
);

$products_data = new WP_Query($product_args);
$product_count = $products_data->found_posts;
$page_count = ceil($product_count / 8);

if ($products_data->have_posts()):
	?>
<input type="hidden" class="page_count" value="<?php echo $page_count; ?>">
	<div class="shop-grid-sidebar-area rts-section-gap">
		<div class="container">
			<div class="row g-0">

				<div class="col-xl-12 col-lg-12">
					<div class="filter-select-area">
						<div class="top-filter">
							<span>Showing <span id="product_count"><?php echo $product_count; ?></span> results</span>

						</div>
						<div class="nice-select-area-wrapper-and-button">
							<div class="nice-select-wrapper-1">
								<div class="single-select">
									<select class="price_by">
										<option data-display="Sort By" value="sort-by">Sort By </option>
										<option value="high_to_low">Price High to low</option>
										<option value="low_to_high">Price Low To high</option>
									</select>
								</div>
								<div class="single-select">
									<select class="weight_by">
										<option data-display="Filter By weight"> Filter By weight</option>
										<option value="below_10">Below 10 Kg</option>
										<option value="10_to_20">10 Kg to 20 Kg</option>
										<option value="20_to_30">20 Kg to 30 kg</option>
										<option value="above_30">Above 30 kg</option>
									</select>
								</div>

								<!--    <div class="single-select">
									<select>
										<option data-display="Product Status">Product Status</option>
										<option value="1">In Stock</option>
										<option value="2">New Arrivel</option>
									</select>
								</div> -->

							</div>
							<div class="button-area">
								<button class="rts-btn filter_product">Filter</button>
								<button class="rts-btn reset_filter">Reset Filter</button>
							</div>
						</div>

					</div>

					<div class="row g-4 mt--0" id="container">
						<?php
						while ($products_data->have_posts()):
							$products_data->the_post();

							$weight = $product->get_weight();

							$product_id = get_the_ID();
							$product = wc_get_product($post->ID);
							$sale_price = $product->get_sale_price();
							$regular_price = $product->get_regular_price();
							?>
							<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
								<div class="single-shopping-card-one deals-of-day">
									<?php
									if (has_post_thumbnail()):
										?>
										<div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>"
												class="thumbnail-preview"> <img
													src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
													alt="<?php echo esc_attr(the_title()); ?>"> </a>
										</div>
									<?php else: ?>
									    
									    	<div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>"
												class="thumbnail-preview"> <img src="<?php echo get_template_directory_uri(). '/assets/images/default.svg'; ?>"
													alt="<?php echo esc_attr(the_title()); ?>"> </a>
										</div>
									
									<?php endif; ?>
									<div class="body-content">
										<a href="<?php the_permalink(); ?>">
											<h4 class="title"><?php the_title(); ?></h4>
										</a>
										<?php if ($weight): ?>
											<span class="availability" data-weight='<?php echo $weight; ?>'><?php echo $weight; ?>
												Kg</span>
										<?php endif; ?>
										<div class="price-area">
											<?php if ($sale_price || $regular_price): ?>
												<span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?>
												</span>
											<?php endif; ?>
											<?php if ($sale_price && $regular_price): ?>
												<div class="previous">Rs. <?php echo $regular_price; ?></div>
											<?php endif; ?>
										</div>

										<form action="<?php echo site_url('shop'); ?>"
											class="variations_form cart wvs-loaded cart-counter-action" method="post">

											<button type="submit" class="submit rts-btn btn-primary radious-sm with-icon">
												<div class="btn-text added_to_cart">
													Add To Cart
												</div>
												<div class="arrow-icon">
													<i class="fa-regular fa-cart-shopping"></i>
												</div>
												<div class="arrow-icon">
													<i class="fa-regular fa-cart-shopping"></i>
												</div>

											</button>

											<input type="hidden" name="add-to-cart" value="<?php echo $product_id; ?>">
											<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
										</form>

									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>

					</div>
				</div>
			</div>
				
			<div class="text-center rainbow-load-more mt-5" id="load_more">
				<button 
					class="submit rts-btn btn-primary rounded-sm with-icon d-inline-flex align-items-center justify-content-center">
					<span>Load More<span class="icon">
							<i class="feather-loader ms-2"></i>
						</span></span>
				</button>
			</div>

		</div>
	</div>
<?php endif; ?>
<!-- shop[ grid sidebar wrapper end -->




<?php get_footer();