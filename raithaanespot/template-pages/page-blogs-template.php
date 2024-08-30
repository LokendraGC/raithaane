<?php 
get_header();
/* Template Name: Blogs */
?>

<!-- <style>
    .feature_img{
        height: 200px;
    }
</style> -->

 <?php get_template_part('template-parts/common/banner-section'); ?>

    <div class="section-seperator">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

    <?php 
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
    $post_data = new WP_Query( $args );
    if( $post_data->have_posts() ):
        ?>

    <div class="rts-blog-area rts-section-gap bg_white bg_gradient-tranding-items">
        <div class="container">
            <div class="row g-5">
                    <!-- single blog area start -->
                    <?php while( $post_data->have_posts() ): $post_data->the_post(); ?>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="single-blog-style-card-border">
                        <?php if( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                            <img class="feature_img" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>">
                        </a>
                    <?php endif; ?>
                        <div class="inner-content-body">
                            <div class="tag-area">
                                <div class="single">
                                    <i class="fa-light fa-clock"></i>
                                    <span><?php echo get_the_date('M j, Y'); ?></span>
                                </div>
                                
                            </div>
                            <a class="title-main" href="<?php the_permalink(); ?>">
                                <h3 class="title">
                                   <?php the_title(); ?>
                                </h3>
                            </a>
                            <div class="button-area">
                                <a href="<?php the_permalink(); ?>" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                       Read Details
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-solid fa-circle-plus"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-solid fa-circle-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                     ?>
                    <!-- single blog area end -->
        
            </div>
         <!--    <div class="row mt--50">
                <div class="col-lg-12">
                    <div class="pagination-area-main-wrappper">
                        <ul>
                            <li> <button class="active">01</button> </li>
                            <li> <button>02</button> </li>
                            <li> <button>03</button> </li>
                            <li> <button>04</button> </li>
                            <li> <button><i class="fa-regular fa-chevrons-right"></i></button> </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


<?php 
endif;
get_footer();