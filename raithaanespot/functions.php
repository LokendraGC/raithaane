<?php

/**
 * Load All Required Files
 */

$files_loader = array(
    'inc/setup.php',
    'inc/navwalker-menu.php',
    'inc/widgets.php',
    'inc/assets.php',
    'inc/custom-header.php',
    'inc/template-tags.php',
    'inc/template-functions.php',
    'inc/customizer.php',
    'inc/breadcrumb.php',
    'inc/helper.php',
    'inc/ajax-functions.php',
    'inc/breadcrumb.php'
);

/**
 * Load The File
 */
foreach ( $files_loader as $file ) 
{
    if ( file_exists( get_template_directory() . '/' . $file ) ) 
    {
        locate_template( $file, true, true );
    }
}
unset( $file );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
