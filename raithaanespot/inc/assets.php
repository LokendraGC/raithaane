<?php 

/**
 * Enqueue scripts and styles.
 */
function raithaanespot_scripts() {
	wp_enqueue_style('raithane-plugincss',get_template_directory_uri(). '/assets/css/plugins.css');
	wp_enqueue_style('raithane-maincss',get_template_directory_uri(). '/assets/css/style.css');
	
	wp_enqueue_script('raithane-pluginjs',get_template_directory_uri().'/assets/js/plugins.js',array(),_S_VERSION,true);	
	wp_enqueue_script('raithane-mainjs',get_template_directory_uri().'/assets/js/main.js',array(),_S_VERSION,true);

	wp_localize_script( 'raithane-mainjs', 'RAITHAANEobj', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'token'  => wp_create_nonce( '%RAITHAANE%' ),
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'raithaanespot_scripts' );
