<?php

// add_action('wp_footer', 'my_products_javascript');

// function my_products_javascript()
// { 
// }

add_action('wp_ajax_my_products', 'my_products');
add_action('wp_ajax_nopriv_my_products', 'my_products');

?>


<?php
function my_products()
{

    $order = $_POST['order'];
    $weight = $_POST['weight'];

    if( $order  || $weight ){
        $product_args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'paged' => $_POST['page'],
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
    
        switch($weight) {
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

    }else{
    $product_args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'paged' => $_POST['page'],
        'post_status' => 'publish',
        'order' => 'ASC'
    );
}

    $products_data = new WP_Query($product_args);

    if ($products_data->have_posts()):
        while ($products_data->have_posts()):
            $products_data->the_post();
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $weight = $product->get_weight();

            $sale_price = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            ?>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                <div class="single-shopping-card-one deals-of-day">
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
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/default.svg'; ?>"
                                     alt="<?php echo esc_attr(the_title()); ?>">
                            </a>
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
                                <span class="current">Rs. <?php echo ($sale_price) ? $sale_price : $regular_price; ?></span>
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
                            </button>
                            <input type="hidden" name="add-to-cart" value="<?php echo $product_id; ?>">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        </form>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;
    wp_reset_query();
    wp_die();
}
