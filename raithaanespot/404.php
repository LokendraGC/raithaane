<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Raithaanespot
 */

get_header();
?>

	<main id="primary" class="site-main">

    <div class="error-area-main-wrapper rts-section-gap2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-main-wrapper">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/01.png" alt="error">
                        </div>
                        <div class="content-main">
                            <h2 class="title">This Page Can’t Be Found</h2>
                            <p>Sorry, we couldn't find the page you where looking for. We suggest that you return to homepage.</p>
                            <a href="<?php echo site_url('/'); ?>" class="rts-btn btn-primary">Back To Homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	</main><!-- #main -->

<?php
get_footer();
