<?php get_header();

if (have_rows('r_slider_details')):

    ?>
    <div class="banner-three-swiper-main-wrapper">
        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
        "spaceBetween":0,
        "slidesPerView":1,
        "loop": true,
        "speed": 2000,
        "autoplay":{
            "delay":"4000"
        },
        "effect": "fade",
        "navigation":{
            "nextEl":".swiper-button-next",
            "prevEl":".swiper-button-prev"
        },
        "breakpoints":{
            "0":{
                "slidesPerView":1,
                "spaceBetween": 0},
                "320":{
                    "slidesPerView":1,
                    "spaceBetween":0},
                    "480":{
                        "slidesPerView":1,
                        "spaceBetween":0},
                        "640":{
                            "slidesPerView":1,
                            "spaceBetween":0},
                            "840":{
                                "slidesPerView":1,
                                "spaceBetween":0},
                                "1140":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                    "1540":{
                                        "slidesPerView":1,
                                        "spaceBetween":0},
                                        "1840":{
                                            "slidesPerView":1,
                                            "spaceBetween":0}
                                        }
                                    }'>
            <div class="swiper-wrapper swiper-button-between">

                <!-- single swiper start -->

                <?php
                $count = 1;
                while (have_rows('r_slider_details')):
                    the_row();

                    $discount_title = get_sub_field('discount_text');
                    $slider_title = get_sub_field('slider_title');
                    $slider_desc = get_sub_field('slider_description');
                    $slider_image = get_sub_field('slider_image');

                    // Determine the classes to be applied
                    $banner_class = 'banner-bg-full_1';
                    if ($count > 1) {
                        $banner_class .= ' img-two';
                    }

                    ?>
                    <div class="swiper-slide">
                        <!-- rts banner area start -->
                        <div class="rts-section-gap rts-banner-area-three <?php echo esc_attr($banner_class); ?>"
                            style="background-image: url(<?php echo esc_url($slider_image['url']); ?>);">
                            <div class="container-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner-inner-content-three">
                                            <span class="pre"><?php echo esc_html($discount_title); ?></span>
                                            <h2 class="title">
                                                <?php echo $slider_title; ?>
                                            </h2>
                                            <p class="dsicription">
                                                <?php echo $slider_desc; ?>
                                            </p>
                                            <a href="<?php echo site_url('products'); ?>" class="rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text">Shop Now</div>
                                                <div class="arrow-icon"><i class="fa-light fa-arrow-right"></i></div>
                                                <div class="arrow-icon"><i class="fa-light fa-arrow-right"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- rts banner area end -->
                    </div> <!-- single swiper start -->
                    <?php
                    $count++;
                endwhile;
                ?>

                <button class="swiper-button-next"><i class="fa-regular fa-arrow-right"></i>
                </button> <button class="swiper-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
            </div>
        </div>
    </div> <!-- rts banenr area start -->
<?php endif; ?>

<div class="rts-category-area rts-section-gap cover-card-main-over">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">

                    <?php if ($best_selling_products = get_field('choose_best_selling_products')): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-area-between">
                                    <h2 class="title-left mb--0">
                                        Best Selling Product
                                    </h2>
                                    <div class="next-prev-swiper-wrapper">
                                        <div class="swiper-button-prev"><i class="fa-regular fa-chevron-left"></i></div>
                                        <div class="swiper-button-next"><i class="fa-regular fa-chevron-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">

                        <?php if ($best_selling_products = get_field('choose_best_selling_products')): ?>
                            <div class="col-lg-12">
                                <!-- rts category area satart -->
                                <div class="rts-caregory-area-one ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="category-area-main-wrapper-one">
                                                <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                                                        "spaceBetween":15,
                                                                        "slidesPerView":8,
                                                                        "loop": true,
                                                                        "speed": 1000,
                                                                        "navigation":{
                                                                            "nextEl":".swiper-button-next",
                                                                            "prevEl":".swiper-button-prev"
                                                                        },
                                                                        "breakpoints":{
                                                                            "0":{
                                                                                "slidesPerView":1,
                                                                                "spaceBetween": 15},
                                                                                "340":{
                                                                                    "slidesPerView":2,
                                                                                    "spaceBetween":15},
                                                                                    "480":{
                                                                                        "slidesPerView":3,
                                                                                        "spaceBetween":15},
                                                                                        "640":{
                                                                                            "slidesPerView":4,
                                                                                            "spaceBetween":15},
                                                                                            "840":{
                                                                                                "slidesPerView":4,
                                                                                                "spaceBetween":15},
                                                                                                "1140":{
                                                                                                    "slidesPerView":6,
                                                                                                    "spaceBetween":15},
                                                                                                    "1740":{
                                                                                                        "slidesPerView":8,
                                                                                                        "spaceBetween":15}
                                                                                                    }
                                                                                                }'>
                                                    <div class="swiper-wrapper">
                                                        <!-- single swiper start -->
                                                        <?php
                                                        foreach ($best_selling_products as $product):
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id($product->ID));
                                                            ?>
                                                            <div class="swiper-slide">
                                                                <div class="single-category-one ">
                                                                    <a href="<?php echo get_the_permalink($product->ID); ?>">
                                                                        <img src="<?php echo ($image_url) ? $image_url : get_template_directory_uri(). '/assets/images/default.svg'; ?>"
                                                                            alt="<?php echo $product->post_title; ?>">
                                                                        <p>
                                                                            <?php echo $product->post_title; ?>
                                                                        </p>

                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <!-- single swiper start -->
                                                        <!-- single swiper start -->

                                                        <!-- single swiper start -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- rts category area end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<!-- rts banenr area start -->
<div class="rts-banner-area bg_light-1  d-flex align-items-center">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/organic-farm.svg" alt="">
</div>
<!-- rts banenr area ends -->


<!-- rts categorya area start -->

<!-- rts categorya area end -->

<?php if ($discounted_products = get_field('choose_discounted_products')): ?>
    <div class="category-feature-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left mb--0">
                            Discount Offers
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <?php
                foreach ($discounted_products as $product_data):
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id($product_data->ID));

                    $product = wc_get_product($product_data->ID);
                    $weight = $product->get_weight();
                    $sale_price = $product->get_sale_price();
                    $regular_price = $product->get_regular_price();
                    ?>
                    <div class="col-lg-3">
                        <div class="single-feature-card bg_image one" style="background-image:url(<?php echo ( $image_url ) ? $image_url : get_template_directory_uri(). '/assets/images/default.svg'; ?>);">
                            <div class="overlap"></div>
                            <div class="content-area">
                                <div class="body-content">

                                    <a href="<?php echo get_the_permalink($product_data->ID); ?>">
                                        <h4 class="title"><?php echo $product_data->post_title; ?></h4>
                                    </a>
                                    <span class="availability"><?php echo $weight; ?>
                                         Kg
                                    </span>
                                    <div class="price-area">
                                        <?php if ($sale_price || $regular_price): ?>
                                            <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($sale_price && $regular_price): ?>
                                            <div class="previous"><del>Rs. <?php echo $regular_price; ?></del></div>
                                        <?php endif; ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<!-- best selling groceris -->

<?php
$new_arrivals = get_field('choose_new_arrival_category');
if ($new_arrivals):
    ?>
    <div class="weekly-best-selling-area rts-section-gap rts-section-gap bg_light-1 cover-card-main-over">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title-area-between">
                                        <h2 class="title-left">
                                            New Arrivals
                                        </h2>

                                        <ul class="nav nav-tabs best-selling-grocery" id="myTab" role="tablist">
                                            <?php
                                            $count = 1;
                                            foreach ($new_arrivals as $arrival_cat):

                                                ?>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link <?php echo $count == 1 ? 'active' : ''; ?>"
                                                        id="home-tab<?php echo $count; ?>" data-bs-toggle="tab"
                                                        data-bs-target="#home<?php echo $count; ?>" type="button" role="tab"
                                                        aria-controls="home"
                                                        aria-selected="<?php echo $count == 1 ? 'true' : 'false'; ?>"><?php echo $arrival_cat->name; ?></button>
                                                </li>

                                                <?php
                                                $count++;
                                            endforeach;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="myTabContent">
                                        <!-- first tabs area start-->
                                        <?php
                                        $outer_count = 1;
                                        foreach ($new_arrivals as $arrival_cat):

                                            $product_arg = array(
                                                'post_type' => 'product',
                                                'posts_per_page' => -1,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'term_id',
                                                        'terms' => $arrival_cat->term_taxonomy_id
                                                    )
                                                )
                                            );

                                            $product_data = new WP_Query($product_arg);
                                            if ($product_data->have_posts()):
                                                ?>

                                                <div class="tab-pane fade <?php echo $outer_count == 1 ? 'show active' : ''; ?>"
                                                    id="home<?php echo $outer_count; ?>" role="tabpanel"
                                                    aria-labelledby="home-tab<?php echo $count; ?><?php echo $outer_count; ?>">
                                                    <div class="row g-4">
                                                        <?php
                                                        while ($product_data->have_posts()):
                                                            $product_data->the_post();

                                                            $product_id = get_the_ID();
                                                            $product = wc_get_product($product_id);
                                                            $sale_price = $product->get_sale_price();
                                                            $regular_price = $product->get_regular_price();
                                                            $weight = $product->get_weight();

                                                            ?>
                                                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                                                                <div class="single-shopping-card-one">
                                                                    <!-- iamge and sction area start -->
                                                                    <?php if (has_post_thumbnail()): ?>
                                                                        <div class="image-and-action-area-wrapper">
                                                                            <a href="<?php the_permalink(); ?>" class="thumbnail-preview">

                                                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                                                                    alt="<?php echo esc_attr(the_title()); ?>">
                                                                            </a>
                                                                        </div>
                                                                    <?php else: ?>
                                                                     <div class="image-and-action-area-wrapper">
                                                                            <a href="<?php the_permalink(); ?>" class="thumbnail-preview">

                                                                                <img src="<?php echo get_template_directory_uri(). '/assets/images/default.svg'; ?>"
                                                                                    alt="<?php echo esc_attr(the_title()); ?>">
                                                                            </a>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    <!-- iamge and sction area start -->
                                                                    <div class="body-content">

                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <h4 class="title"><?php the_title(); ?></h4>
                                                                        </a>
                                                                        <?php if ($weight): ?>
                                                                            <span class="availability"><?php echo $weight; ?> Kg</span>
                                                                        <?php endif; ?>
                                                                           <div class="price-area">
                                        <?php if ($sale_price || $regular_price): ?>
                                            <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($sale_price && $regular_price): ?>
                                            <div class="previous"><del>Rs. <?php echo $regular_price; ?></del></div>
                                        <?php endif; ?>
                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        endwhile;
                                                        wp_reset_postdata();
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                            endif;
                                            $outer_count++;
                                        endforeach;
                                        ?>
                                        <!-- first tabs area start-->



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- best selling groceris end -->
<div class="rts-banner-area   d-flex align-items-center bg_light-1 ">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/corn-fram.svg" alt="">
</div>

<!-- rts categorya area start -->

<?php if ($customer_fav = get_field('choose_customer_fav')): ?>
    <div class="rts-category-area rts-section-gap cover-card-main-over">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-area-between">
                                    <h2 class="title-left mb--0">
                                        Customer Favourites
                                    </h2>
                                    <div class="next-prev-swiper-wrapper d-sm-none">
                                        <div class="swiper-button-prevs"><i class="fa-regular fa-chevron-left"></i></div>
                                        <div class="swiper-button-nexts"><i class="fa-regular fa-chevron-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- rts category area satart -->
                                <div class="rts-caregory-area-one ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="category-area-main-wrapper-one">
                                                <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                                                        "spaceBetween":15,
                                                                        "slidesPerView":4,
                                                                        "loop": true,
                                                                        "speed": 1000,
                                                                        "navigation":{
                                                                            "nextEl":".swiper-button-nexts",
                                                                            "prevEl":".swiper-button-prevs"
                                                                        },
                                                                        "breakpoints":{
                                                                            "0":{
                                                                                "slidesPerView":1,
                                                                                "spaceBetween": 15},
                                                                                "320":{
                                                                                    "slidesPerView":1,
                                                                                    "spaceBetween":15},
                                                                                    "480":{
                                                                                        "slidesPerView":2,
                                                                                        "spaceBetween":15},
                                                                                        "640":{
                                                                                            "slidesPerView":2,
                                                                                            "spaceBetween":15
                                                                                        },
                                                                                        "840":{
                                                                                            "slidesPerView":3,
                                                                                            "spaceBetween":15},
                                                                                            "1140":{
                                                                                                "slidesPerView":4,
                                                                                                "spaceBetween":15}
                                                                                            }
                                                                                        }'>
                                                    <div class="swiper-wrapper">
                                                        <!-- single swiper start -->
                                                        <?php
                                                        foreach ($customer_fav as $fav_product):

                                                            $image_url = wp_get_attachment_url(get_post_thumbnail_id($fav_product->ID));

                                                            $product = wc_get_product($fav_product->ID);
                                                            $weight = $product->get_weight();
                                                            $sale_price = $product->get_sale_price();
                                                            $regular_price = $product->get_regular_price();

                                                            ?>
                                                            <div class="swiper-slide">
                                                                <div class="single-shopping-card-one tranding-product">
                                                                    <a href="<?php echo get_the_permalink($fav_product->ID); ?>" class="thumbnail-preview">
                                                                        <img src="<?php echo ($image_url) ? $image_url : get_template_directory_uri(). '/assets/images/default.svg'; ?>"
                                                                            alt="<?php echo $fav_product->post_title; ?>">
                                                                    </a>
                                                                    <div class="body-content">
                                                                        <a
                                                                            href="<?php echo get_the_permalink($fav_product->ID); ?>">
                                                                            <h4 class="title">
                                                                                <?php echo $fav_product->post_title; ?></h4>
                                                                        </a>
                                                                        <?php if( $weight ):?>
                                                                        <span class="availability"><?php echo $weight;?>
                                                                             Kg
                                                                        </span>
                                                                        <?php endif; ?>
                                                                          <div class="price-area">
                                        <?php if ($sale_price || $regular_price): ?>
                                            <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($sale_price && $regular_price): ?>
                                            <div class="previous"><del>Rs. <?php echo $regular_price; ?></del></div>
                                        <?php endif; ?>
                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <!-- single swiper start -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- rts category area end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- rts categorya area end -->




<?php $ppp = -1;
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => $ppp,
    'post_status' => 'publish'
);

$testi_data = get_posts($args);
if ($testi_data):
    ?>
    <!-- rts categorya area start -->
    <div class="rts-category-area rts-section-gap testimonials  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left mb--0">
                            What our Client says
                        </h2>
                        <div class="next-prev-swiper-wrapper">
                            <div class="swiper-button-prev"><i class="fa-regular fa-chevron-left"></i></div>
                            <div class="swiper-button-next"><i class="fa-regular fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cover-card-main-over bg-white">
                        <!-- rts category area satart -->
                        <div class="rts-caregory-area-one ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="category-area-main-wrapper-one">
                                            <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                                                                "spaceBetween":12,
                                                                                "slidesPerView":7,
                                                                                "loop": true,
                                                                                "speed": 1000,
                                                                                "navigation":{
                                                                                    "nextEl":".swiper-button-next",
                                                                                    "prevEl":".swiper-button-prev"
                                                                                },
                                                                                "breakpoints":{
                                                                                    "0":{
                                                                                        "slidesPerView":1,
                                                                                        "spaceBetween": 12},
                                                                                        "320":{
                                                                                            "slidesPerView":1,
                                                                                            "spaceBetween":12},
                                                                                            "480":{
                                                                                                "slidesPerView":1,
                                                                                                "spaceBetween":12},
                                                                                                "640":{
                                                                                                    "slidesPerView":2,
                                                                                                    "spaceBetween":12},
                                                                                                    "840":{
                                                                                                        "slidesPerView":2,
                                                                                                        "spaceBetween":12},
                                                                                                        "1140":{
                                                                                                            "slidesPerView":4,
                                                                                                            "spaceBetween":12}
                                                                                                        }
                                                                                                    }'>
                                                <div class="swiper-wrapper">
                                                    <!-- single swiper start -->
                                                    <?php foreach ($testi_data as $post):
                                                        setup_postdata($post);
                                                        ?>
                                                        <div class="swiper-slide">
                                                            <div class="blog-details-author mb-20">
                                                                <?php if ($image_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID))): ?>
                                                                    <div class="thumbnail">
                                                                        <img src="<?php echo $image_url; ?>"
                                                                            alt="<?php echo $post->post_title; ?>">
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ($rating = get_field('wtn_rating')): ?>
                                                                    <div class="author-information">

                                                                        <h5 class="title"><?php echo $post->post_title; ?></h5>
                                                                        <div class="stars">
                                                                            <?php for (
                                                                                $i = 1;
                                                                                $i <= $rating;
                                                                                $i++
                                                                            ) { ?>
                                                                                <i class="fa-solid fa-star"></i>
                                                                            <?php } ?>

                                                                        </div>
                                                                        <div class="content-area">
                                                                            <p>
                                                                                <?php echo $post->post_content; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    endforeach;
                                                    wp_reset_postdata();
                                                    ?>
                                                    <!-- single swiper start -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- rts category area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- rts categorya area end -->
<!-- rts categorya area start -->
<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
);
$post_data = new WP_Query($args);
if ($post_data->have_posts()):
    ?>
    <div class="rts-blog-area rts-section-gap cover-card-main-over ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-area-between">
                                    <h2 class="title-left mb--0">
                                        Latest Blog
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- rts category area satart -->
                                <div class="rts-caregory-area-one ">
                                    <div class="row">

                                        <!-- single swiper start -->
                                        <!-- single swiper start -->
                                        <?php
                                        while ($post_data->have_posts()):
                                            $post_data->the_post();
                                            ?>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <div class="single-blog-area-start">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                                                            <img class="front_feature_image"
                                                                src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                                                alt="<?php the_title(); ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="blog-body">
                                                        <div class="top-area">
                                                            <div class="single-meta">
                                                                <i class="fa-light fa-clock"></i>
                                                                <span><?php echo get_the_date('M j, Y'); ?></span>
                                                            </div>

                                                        </div>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <h4 class="title">
                                                                <?php the_title(); ?>
                                                            </h4>
                                                        </a>
                                                        <a href="<?php the_permalink(); ?>" class="shop-now-goshop-btn">
                                                            <span class="text">Read Details</span>
                                                            <div class="plus-icon">
                                                                <i class="fa-sharp fa-regular fa-plus"></i>
                                                            </div>
                                                            <div class="plus-icon">
                                                                <i class="fa-sharp fa-regular fa-plus"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>

                                    </div>
                                </div>
                                <!-- rts category area end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- rts categorya area end -->


    <?php
endif;
get_footer(); ?>