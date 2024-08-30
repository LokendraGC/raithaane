<?php 

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

//classic editor enable
add_filter('use_block_editor_for_post', '__return_false', 10);

// allowed to upload svg file
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');


// remove default class and id from menu
add_filter('nav_menu_item_id', 'filter_menu_id');
function filter_menu_id(){
    return; 
}


//To remove p tag from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

//To remove span tag from contact form 7
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

add_action( 'wpcf7_init', 'custom_add_form_tag_service' );
function custom_add_form_tag_service() {
	wpcf7_add_form_tag( 'custom_product', 'product_handler' );
}
function product_handler( $tag ) {
    $html = '';
    if ($_REQUEST) {
        $product_name = isset($_REQUEST['product_name']) ? esc_attr($_REQUEST['product_name']) : '';
        $html .= '<div class="single-input">';
        $html .= '<label for="product_name">Product Name</label>';
        $html .= '<input name="product_name" readonly value="'.$product_name.'">'  ;
        $html .= '</div>';
        $html .= '<div class="single-input">';
        $html .= '<label for="quantity">Quantity</label>';
        $html .= '<input name="quantity" type="number" value="1">'  ;
        $html .= '</div>';
    }
return $html;
}