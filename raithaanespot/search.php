<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Raithaanespot
 */

get_header();
?>
<?php
$search_text = $_GET['s']; 

// 1. Query for products
$product_args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => -1, 
	's' => $search_text,
	'search_columns' => array('post_title', 'post_content'),
);

$product_query = new WP_Query($product_args);
$product_count = $product_query->found_posts;

// 2. Query for categories
$category_args = array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'name__like' => $search_text, 
);

$categories = get_terms($category_args);
$category_count = count($categories);

// 3. Determine whether the search is more likely for products or categories
if ($product_count > 0) {
	// Display product results if found
	?>
	<div class="row">
		<div class="col-lg-12">
			<div class="tab-content" id="myTabContent">
				<!-- first tabs area start-->
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row g-4">
						<?php
						while ($product_query->have_posts()) {
							$product_query->the_post();

							$product_id = get_the_ID();
							$product = wc_get_product($product_id);
							$sale_price = $product->get_sale_price();
							$regular_price = $product->get_regular_price();
							$weight = get_field('product_weight', $product_id);
							$image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

							?>
							<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
								<div class="single-shopping-card-one">
									<!-- iamge and sction area start -->
									<div class="image-and-action-area-wrapper">
										<a href="<?php the_permalink(); ?>" class="thumbnail-preview">

											<img src="<?php echo ($image_url) ? $image_url : get_template_directory_uri(). '/assets/images/default.svg'; ?>" alt="<?php the_title(); ?>">

										</a>

									</div>
									<!-- iamge and sction area start -->
									<div class="body-content">

										<a href="<?php the_permalink(); ?>">
											<h4 class="title"><?php the_title(); ?></h4>
										</a>
										<?php if ($weight): ?>
											<span class="availability"><?php echo $weight; ?></span>
										<?php endif; ?>
										<?php if ($sale_price || $regular_price): ?>
										                                    <div class="price-area">
                                        <?php if ($sale_price || $regular_price): ?>
                                            <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($sale_price && $regular_price): ?>
                                            <div class="previous"><del>Rs. <?php echo $regular_price; ?></del></div>
                                        <?php endif; ?>
                                    </div>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php } ?>

					</div>
				</div>
				<!-- first tabs area start-->
			</div>

			<?php
} elseif ($category_count > 0) {
	// If no products are found but categories are, display the categories
	?>

			<div class="row">
				<div class="col-lg-12">
					<div class="tab-content" id="myTabContent">
						<!-- first tabs area start-->
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row g-4">

								<?php
								foreach ($categories as $category) {
									$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);

									// Get the URL of the image
									$image_url = wp_get_attachment_url($thumbnail_id);
									?>

									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
										<div class="single-shopping-card-one">
											<!-- iamge and sction area start -->
											<?php if ($image_url): ?>
												<div class="image-and-action-area-wrapper">
													<a href="<?php echo get_term_link($category); ?>" class="thumbnail-preview">
														<img src="<?php echo ($image_url) ? $image_url : get_template_directory_uri(). '/assets/images/default.svg'; ?>" alt="<?php echo $category->name; ?>">
													</a>
												</div>
											<?php endif; ?>
											<!-- iamge and sction area start -->
											<div class="body-content">

												<a href="<?php echo get_term_link($category); ?>">
													<h4 class="title"><?php echo $category->name; ?></h4>
												</a>

											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<!-- first tabs area start-->
					</div>
				</div>
			</div>

			<?php
} else {
	// Display a message if no products or categories are found
	echo '<h4 class="title text-center mt-5 mb-5">No products or categories found matching your search.</h4>';
}

// Reset post data after the product query
wp_reset_postdata();
?>

<?php
get_footer();
