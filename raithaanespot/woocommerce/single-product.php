<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit;
}
get_header();
$product_id = get_the_ID();
$product = wc_get_product($product_id);
$product_details = $product->get_data();
$product_description = $product_details['description'];
$product_short_description = $product_details['short_description'];
$currency = get_woocommerce_currency_symbol();
$sales_price = $product->get_sale_price();
$regular_price = $product->get_regular_price();
$price_regular = 0;
$price_sales = 0;
if ($regular_price) {
    $price_regular = number_format((float) $regular_price, 2, '.', '');
}
if ($sales_price) {
    $price_sales = number_format((float) $sales_price, 2, '.', '');
}
$sku_id = $product->get_sku();
?>

<?php get_template_part('template-parts/common/banner-section'); ?>

<div class="section-seperator bg_light-1">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>

<div class="rts-chop-details-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="shopdetails-style-1-wrapper">
            <div class="row g-5">
                <div class="col-xl-8 col-lg-8 col-md-12">

                    <div class="product-details-popup-wrapper in-shopdetails">
                        <div
                            class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
                            <div class="product-details-popup">
                                <div class="details-product-area">
                                    <?php
                                    $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                                    $attachment_ids = $product->get_gallery_image_ids();
                                    if ($feat_image || $attachment_ids) {
                                        $hide = 'figure';
                                        $count = 1;
                                        ?>
                                        <div class="product-thumb-area">
                                            <div class="cursor"></div>

                                            <?php if ($feat_image) { ?>
                                                <div
                                                    class="thumb-wrapper <?php echo esc_attr($count); ?> filterd-items <?php echo esc_attr($hide); ?>">
                                                    <div class="product-thumb zoom" onmousemove="zoom(event)"
                                                        style="background-image: url('<?php echo esc_url($feat_image[0]); ?>');">
                                                        <img src="<?php echo esc_url($feat_image[0]); ?>"
                                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    </div>
                                                </div>
                                                <?php
                                                $hide = 'hide';
                                                $count++;
                                            }
                                            foreach ($attachment_ids as $attachment_id) {
                                                $image_url = wp_get_attachment_url($attachment_id);
                                                ?>
                                                <div
                                                    class="thumb-wrapper <?php echo esc_attr($count); ?> filterd-items <?php echo esc_attr($hide); ?>">
                                                    <div class="product-thumb zoom" onmousemove="zoom(event)"
                                                        style="background-image: url('<?php echo esc_url($image_url); ?>');">
                                                        <img src="<?php echo esc_url($image_url); ?>"
                                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    </div>
                                                </div>
                                                <?php
                                                $hide = ($hide == 'figure') ? 'hide' : $hide;
                                                $count++;
                                            }
                                            $active = 'active';
                                            $count = 1;
                                            ?>

                                            <div class="product-thumb-filter-group">
                                                <?php if ($feat_image) { ?>
                                                    <div class="thumb-filter filter-btn <?php echo esc_attr($active); ?>"
                                                        data-show=".<?php echo esc_attr($count); ?>">
                                                        <img src="<?php echo esc_url($feat_image[0]); ?>"
                                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    </div>
                                                    <?php
                                                    $active = '';
                                                    $count++;
                                                }
                                                foreach ($attachment_ids as $attachment_id) {
                                                    $image_url = wp_get_attachment_url($attachment_id);
                                                    ?>
                                                    <div class="thumb-filter filter-btn <?php echo esc_attr($active); ?>"
                                                        data-show=".<?php echo esc_attr($count); ?>">
                                                        <img src="<?php echo esc_url($image_url); ?>"
                                                            alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    </div>

                                                    <?php
                                                    $active = ($active == 'active') ? '' : $active;
                                                    $count++;
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    <?php } else { ?>
                                        <div class="product-thumb-area">
                                            <div class="cursor"></div>
                                            <div class="thumb-wrapper one filterd-items figure">
                                                <div class="product-thumb zoom" onmousemove="zoom(event)"
                                                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/default.svg)">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.svg"
                                                        alt="product-thumb">
                                                </div>
                                            </div>

                                            <div class="product-thumb-filter-group">
                                                <div class="thumb-filter filter-btn active" data-show=".one"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/default.svg"
                                                        alt="product-thumb-filter"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="contents">
                                        <h2 class="product-title"><?php the_title(); ?></h2>

                                        <?php if (the_content() != '') { ?>
                                            <p class="mt--20 mb--20">
                                                <?php the_content(); ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="mt--20 mb--20">
                                                <?php echo ''; ?>
                                            </p>
                                        <?php } ?>

                                        <span class="product-price mb--15 d-block"
                                            style="color: #DC2626; font-weight: 600;">
                                            <?php if ($sales_price): ?>
                                                <?php echo $currency; ?>     <?php echo $price_sales; ?>
                                                <span class="old-price ml--15"><?php echo $currency; ?>.
                                                    <?php echo $price_regular; ?></span>
                                            <?php else: ?>
                                                <?php echo $currency; ?>. <?php echo $price_regular; ?>
                                            <?php endif; ?>
                                        </span>
                                        <form action="<?php the_permalink(); ?>" class="variations_form cart wvs-loaded"
                                            method="post">
                                            <div class="product-bottom-action">
                                                <div class="cart-edits">
                                                    <div class="quantity-edit action-item">
                                                        <button type="button" class="button"><i
                                                                class="fal fa-minus minus"></i></button>
                                                        <input type="text" class="input input-text qty text"
                                                            name="quantity" value="01" />
                                                        <button type="button" class="button plus">+<i
                                                                class="fal fa-plus plus"></i></button>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="submit rts-btn btn-primary radious-sm with-icon">
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
                                            </div>
                                            <input type="hidden" name="add-to-cart" value="<?php echo $product_id; ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        </form>



                                        <div class="product-uniques">
                                            <?php if ($sku_id) { ?>
                                                <span class="sku product-unipue mb--10"><span
                                                        style="font-weight: 400; margin-right: 10px;">SKU: </span>
                                                    <?php echo $sku_id; ?></span>
                                                <?php
                                            }
                                            $terms = get_the_terms($product_id, 'product_cat');
                                            if ($terms) {
                                                $term_name = $terms[0]->name;
                                                ?>
                                                <span class="catagorys product-unipue mb--10"><span
                                                        style="font-weight: 400; margin-right: 10px;">Categories: </span>
                                                    <?php echo $term_name; ?></span>
                                                <?php
                                            }
                                            if ($product_weight = get_field('product_weight')): ?>
                                                <span class="tags product-unipue mb--10"><span
                                                        style="font-weight: 400; margin-right: 10px;">Weight: </span>
                                                    <?php echo esc_html($product_weight); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <form action="<?php echo esc_url(home_url()) . '/whole-sale-form/'; ?>"
                                            method="POST">
                                            <div class="buy-wholesale">
                                                <a href="#" id="buy-now-button"
                                                    class="rts-btn btn-primary radious-sm with-icon"
                                                    data-product-id="<?php echo esc_attr($product->get_id()); ?>"
                                                    data-quantity="<?php echo '1'; ?>">
                                                    <div class="btn-text">
                                                        Buy Now
                                                    </div>
                                                </a>
                                                <button type="submit" class="rts-btn btn-primary radious-sm with-icon"
                                                    style="background:#2359c1">
                                                    <input type="hidden" name="product_name"
                                                        value="<?php the_title(); ?>" />
                                                    <div class="btn-text">
                                                        For Wholesale
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-discription-tab-shop mt--50">

                        <?php
                        $active = 'active';
                        $wtn_faqs = get_field('faq_details');
                        ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php if ($product_short_description): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Product Details</button>
                                </li>
                                <?php
                                $active = '';
                            endif;
                            if ($wtn_faqs):
                                ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $active; ?>" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">FAQ's</button>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $active; ?>" id="enqury-tab" data-bs-toggle="tab"
                                    data-bs-target="#enqury-tab-pane" type="button" role="tab"
                                    aria-controls="enqury-tab-pane" aria-selected="false">Inquiry</button>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <?php
                            $active_show = 'show active';
                            if ($product_short_description) {
                                ?>
                                <div class="tab-pane fade <?php echo $active_show; ?>" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <?php echo $product_short_description; ?>
                                    </div>
                                </div>
                                <?php
                                $active_show = '';
                            }
                            if ($wtn_faqs) {
                                ?>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="single-tab-content-shop-details">
                                        <div class="accordion-main-area-wrapper-style-1">
                                            <div class="accordion" id="accordionExample">
                                                <?php
                                                $re_count = 1;
                                                foreach ($wtn_faqs as $wtn_faq) {
                                                    $que = $wtn_faq['faq_question'];
                                                    $ans = $wtn_faq['faq_answer'];
                                                    if ($que && $ans) {
                                                        ?>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button
                                                                    class="accordion-button <?php echo ($re_count == 1) ? '' : 'collapsed'; ?>"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse<?php echo $re_count; ?>"
                                                                    aria-expanded="<?php echo ($re_count == 1) ? 'true' : 'false'; ?>"
                                                                    aria-controls="collapse<?php echo $re_count; ?>">
                                                                    <?php echo esc_html($que); ?>
                                                                </button>
                                                            </h2>
                                                            <div id="collapse<?php echo $re_count; ?>"
                                                                class="accordion-collapse collapse <?php echo ($re_count == 1) ? 'show' : ''; ?>"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <?php echo esc_html($ans); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    $re_count++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="tab-pane fade" id="enqury-tab-pane" role="tabpanel" aria-labelledby="enqury-tab"
                                tabindex="0">
                                <div class="single-tab-content-shop-details">
                                    <?php echo do_shortcode('[contact-form-7 id="c1ae61b" title="Single Product Form" html_class="contact-form-1"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-4 col-md-12 offset-xl-1  rts-sticky-column-item">
                    <div class="theiaStickySidebar">
                        <?php if (have_rows('product_offer_details', 'options')): ?>

                            <div class="shop-sight-sticky-sidevbar  mb--20">
                                <h6 class="title">Available offers</h6>
                                <?php
                                while (have_rows('product_offer_details', 'options')):
                                    the_row();

                                    $offer_icon = get_sub_field('offer_icon', 'options');
                                    $offer_detail = get_sub_field('offer_description', 'options');
                                    ?>
                                    <div class="single-offer-area">
                                        <?php if ($offer_icon): ?>
                                            <div class="icon">
                                                <img src="<?php echo $offer_icon['url']; ?>" alt="offer icon">
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($offer_detail): ?>
                                            <div class="details">
                                                <p><?php echo $offer_detail; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        <?php endif; ?>
                        <?php if ($payment_images = get_field('payment_images', 'options')): ?>
                            <div class="our-payment-method">
                                <h5 class="title">Guaranteed Safe Checkout</h5>
                                <?php foreach ($payment_images as $image): ?>
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="Payment image">
                                <?php endforeach; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- rts grocery feature area start -->
<?php
$terms = get_the_terms(get_the_ID(), 'product_cat');
$slug = $terms[0]->slug;
$taxonomyArgs = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'post__not_in' => [$product_id],
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $slug,
        ),
    ),
);
$parentTaxonomy = get_posts($taxonomyArgs);
if ($parentTaxonomy):
    ?>
    <div class="shop-grid-sidebar-area rts-section-gap">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Related Product
                        </h2>
                        <!-- <div class="next-prev-swiper-wrapper">
                                    <div class="swiper-button-prev"><i class="fa-regular fa-chevron-left"></i></div>
                                    <div class="swiper-button-next"><i class="fa-regular fa-chevron-right"></i></div>
                                </div> -->
                    </div>
                </div>
                <div class="row g-4 mt--0">

                    <?php
                    foreach ($parentTaxonomy as $post):
                        setup_postdata($post);
                        $feat_img = get_the_post_thumbnail_url();
                        $prod_id = get_the_ID();
                        $product = wc_get_product($prod_id);
                        $reg_extra = $product->get_regular_price();
                        $sal_extra = $product->get_sale_price();
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                            <div class="single-shopping-card-one deals-of-day">
                                <?php if ($feat_img) { ?>
                                    <div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>"
                                            class="thumbnail-preview"> <img src="<?php echo $feat_img; ?>"
                                                alt="<?php the_title(); ?>"> </a>
                                    </div>
                                <?php } else { ?>

                                    <div class="image-and-action-area-wrapper"><a href="<?php the_permalink(); ?>"
                                            class="thumbnail-preview"> <img
                                                src="<?php echo get_template_directory_uri() . '/assets/images/default.svg'; ?>"
                                                alt="<?php the_title(); ?>"> </a>
                                    </div>

                                <?php } ?>
                                <div class="body-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4 class="title"><?php the_title(); ?></h4>
                                    </a>
                                    <?php
                                    $weight = $product->get_weight();
                                    if ($weight) {
                                        ?>
                                        <span class="availability"><?php echo $weight; ?> Kg</span>
                                    <?php } ?>
                                    <div class="price-area">
                                        <?php if ($sal_extra) { ?>
                                            <span class="current"><?php echo $currency; ?>
                                                <?php echo $sal_extra; ?></span>
                                            <div class="previous"><?php echo $currency; ?>
                                                <?php echo $reg_extra; ?>
                                            </div>
                                        <?php } else { ?>
                                            <span class="current"><?php echo $currency; ?>
                                                <?php echo $reg_extra; ?></span>
                                        <?php } ?>

                                    </div>
                                    <form action="<?php the_permalink(); ?>" class="variations_form cart wvs-loaded"
                                        method="post">
                                        <div class="cart-counter-action">
                                            <button type="submit" class="submit rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text">
                                                    Add To Cart
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-regular fa-cart-shopping"></i>
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-regular fa-cart-shopping"></i>
                                                </div>
                                            </button>
                                            <input type="hidden" class="input input-text qty text" name="quantity" value="1" />
                                            <input type="hidden" name="add-to-cart" value="<?php echo $prod_id; ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $prod_id; ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- rts grocery feature area end -->





<?php
get_footer();