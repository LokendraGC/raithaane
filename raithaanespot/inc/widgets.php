<?php 


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raithaanespot_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'raithaanespot' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'raithaanespot' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu First', 'raithaanespot' ),
			'id'            => 'footer-menu-first',
			'description'   => esc_html__( 'Add widgets here.', 'raithaanespot' ),
			'before_widget' => '<div class="single-footer-wized"><div class="footer-nav">',
			'after_widget'  => '</div></div>',
			'before_title'  => ' <h3 class="footer-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu Second', 'raithaanespot' ),
			'id'            => 'footer-menu-second',
			'description'   => esc_html__( 'Add widgets here.', 'raithaanespot' ),
			'before_widget' => '<div class="single-footer-wized"><div class="footer-nav">',
			'after_widget'  => '</div></div>',
			'before_title'  => ' <h3 class="footer-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'raithaanespot_widgets_init' );
