<?php
add_action('wp_ajax_custom_buy_now', 'custom_buy_now');
add_action('wp_ajax_nopriv_custom_buy_now', 'custom_buy_now');
function custom_buy_now()
{
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    if ($product_id > 0) {
        $cart_item_key = WC()->cart->add_to_cart($product_id, $quantity);
        if ($cart_item_key) {
            wp_send_json_success(wc_get_checkout_url());
        } else {
            wp_send_json_error();
        }
    }
    wp_send_json_error();
}

// Action
add_action('wp_ajax_my_action', 'my_action');
add_action('wp_ajax_nopriv_my_action', 'my_action');

function my_action()
{
    ob_start();
    $order = $_POST['order'];
    $weight = $_POST['weight'];

    $product_args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_price',
                'compare' => 'EXISTS',
            ),
            array(
                'key' => '_weight',
                'compare' => 'EXISTS',
            ),
        ),
        'orderby' => 'meta_value_num',
        'order' => $order == 'low_to_high' ? 'ASC' : 'DESC',
        'meta_key' => '_price',
    );

    switch ($weight) {
        case 'below_10':
            $product_args['meta_query'][] = array(
                'key' => '_weight',
                'value' => 10,
                'type' => 'NUMERIC',
                'compare' => '<'
            );
            break;

        case '10_to_20':
            $product_args['meta_query'][] = array(
                'key' => '_weight',
                'value' => array(10, 20),
                'type' => 'NUMERIC',
                'compare' => 'BETWEEN'
            );
            break;

        case '20_to_30':
            $product_args['meta_query'][] = array(
                'key' => '_weight',
                'value' => array(20, 30),
                'type' => 'NUMERIC',
                'compare' => 'BETWEEN'
            );
            break;

        case 'above_30':
            $product_args['meta_query'][] = array(
                'key' => '_weight',
                'value' => 30,
                'type' => 'NUMERIC',
                'compare' => '>'
            );
            break;
    }



    $products_data = new WP_Query($product_args);

    if ($products_data->have_posts()) {

        while ($products_data->have_posts()):
            $products_data->the_post();

            $product = wc_get_product(get_the_ID());

            $weight = $product->get_weight();
            $product_id = get_the_ID();
            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            ?>

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                <div class="single-shopping-card-one deals-of-day">
                    <?php
                    if (has_post_thumbnail()):
                        ?>
                        <div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>" class="thumbnail-preview"> <img
                                    src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                    alt="<?php echo esc_attr(the_title()); ?>"> </a>
                        </div>
                    <?php else: ?>
                    
                       <div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>" class="thumbnail-preview"> <img
                                    src="<?php echo get_template_directory_uri(). '/assets/images/default.svg'; ?>"
                                    alt="<?php echo esc_attr(the_title()); ?>"> </a>
                        </div>
                    
                    <?php endif; ?>
                    <div class="body-content">
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                        </a>
                        <?php if ($weight): ?>
                            <span class="availability" data-weight='<?php echo $weight; ?>'><?php echo $weight; ?> Kg</span>
                        <?php endif; ?>
                        
                        <div class="price-area">
                            <?php if ($sale_price || $regular_price): ?>
                                <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?> </span>
                            <?php endif; ?>
                            <?php if ($sale_price && $regular_price): ?>
                                <div class="previous">Rs. <?php echo $regular_price; ?></div>
                            <?php endif; ?>
                        </div>

                        <form action="<?php echo site_url('shop'); ?>" class="variations_form cart wvs-loaded cart-counter-action"
                            method="post">

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
    } else {
        ?>

        <h1 class="text-center pt-[60px]">No Product Found</h1>

        <?php
    }
    $response = [
        'html' => ob_get_clean(),
        'product_count' => $products_data->found_posts
    ];
    wp_send_json_success($response);


    wp_die();
}


// reset filter

// Action
add_action('wp_ajax_reset_action', 'reset_action');
add_action('wp_ajax_nopriv_reset_action', 'reset_action');


function reset_action()
{
    ob_start();

    $product_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    $products_data = new WP_Query($product_args);

    if ($products_data->have_posts()) {

        while ($products_data->have_posts()):
            $products_data->the_post();

            $product = wc_get_product(get_the_ID());

            $weight = $product->get_weight();
            $product_id = get_the_ID();
            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            ?>

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                <div class="single-shopping-card-one deals-of-day">
                    <?php
                    if (has_post_thumbnail()):
                        ?>
                        <div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>" class="thumbnail-preview"> <img
                                    src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                    alt="<?php echo esc_attr(the_title()); ?>"> </a>
                        </div>
                   <?php else: ?>
                    
                       <div class="image-and-action-area-wrapper"> <a href="<?php the_permalink(); ?>" class="thumbnail-preview"> <img
                                    src="<?php echo get_template_directory_uri(). '/assets/images/default.svg'; ?>"
                                    alt="<?php echo esc_attr(the_title()); ?>"> </a>
                        </div>
                    
                    <?php endif; ?>
                    <div class="body-content">
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                        </a>
                        <?php if ($weight): ?>
                            <span class="availability" data-weight='<?php echo $weight; ?>'><?php echo $weight; ?> Kg</span>
                        <?php endif; ?>
                        
                        <div class="price-area">
                            <?php if ($sale_price || $regular_price): ?>
                                <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?> </span>
                            <?php endif; ?>
                            <?php if ($sale_price && $regular_price): ?>
                                <div class="previous">Rs. <?php echo $regular_price; ?></div>
                            <?php endif; ?>
                        </div>

                        <form action="<?php echo site_url('shop'); ?>" class="variations_form cart wvs-loaded cart-counter-action"
                            method="post">

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
    }
    $response = [
        'html' => ob_get_clean(),
        'product_count' => $products_data->found_posts,
        'page_count' => ceil( $products_data->found_posts  / 8)
    ];
    wp_send_json_success($response);


    wp_die();
}

add_action('wp_ajax_custom_remove', 'custom_remove');
add_action('wp_ajax_nopriv_custom_remove', 'custom_remove');

function custom_remove() {

    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_count = $cart_count - 1;
    wp_send_json_success(array('cart_count' => $cart_count));
    wp_die();
}