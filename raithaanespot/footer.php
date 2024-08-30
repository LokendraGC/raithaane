<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Raithaanespot
 */

?>

<?php if( have_rows('service_details','options') ): ?>
<div class="rts-shorts-service-area rts-section-gap bg_primary">
    <div class="container">
        <div class="row g-5">
           
            <?php
             while( have_rows('service_details','options') ):the_row();
                    $service_image = get_sub_field('service_image','options');
                    $service_title = get_sub_field('Service_Title','options');
             ?>
            <div class="col-lg-3">
                <!-- single service area start -->
                <?php if( $service_title ): ?>
                <div class="single-short-service-area-start">
                    <?php if( $service_image ): ?>
                    <div class="icon-area">
                        <img src="<?php echo $service_image['url']; ?>" alt="<?php echo $service_title; ?>">                                
                    </div>
                <?php endif; ?>
                    <div class="information">
                        <h4 class="title"><?php echo $service_title; ?></h4>
                        
                    </div>
                </div>
            <?php endif; ?>
                <!-- single service area end -->
            </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>
<?php endif; ?>

<!-- rts footer one area start -->
<div class="rts-footer-area pt--80 bg_light-1" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/footer.svg);    background-position: bottom;
background-repeat: no-repeat;
background-size: cover;">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="footer-main-content-wrapper pb--70">
                <!-- single footer area wrapper -->
                <div class="single-footer-wized">
                    <h3 class="footer-title">Contact Us</h3>
                        <?php if( $phone = get_field('wtn_phone_number','options') ): ?>
                    <div class="call-area">
                        <div class="icon">
                            <i class="fa-solid fa-phone-rotary"></i>
                        </div>
                        <div class="info">
                            <span>Call Us</span>
                            <a href="tel:<?php echo $phone; ?>" class="number"><?php echo $phone; ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if( $mail = get_field('wtn_email_address','options') ): ?>
                    <div class="call-area">
                        <div class="icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="info">
                            <span>Mail Us</span>
                            <a href="mailto:<?php echo $mail; ?>" class="number"><?php echo $mail; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <!-- single footer area wrapper -->
                <!-- single footer area wrapper -->
              
              <?php if(is_active_sidebar('footer-menu-first')): ?>
                <?php dynamic_sidebar('footer-menu-first'); ?>
              <?php endif; ?>

                <!-- single footer area wrapper -->
                <!-- single footer area wrapper -->
               <?php if(is_active_sidebar('footer-menu-second')): ?>
                <?php dynamic_sidebar('footer-menu-second'); ?>
              <?php endif; ?>
                <!-- single footer area wrapper -->
                <!-- single footer area wrapper -->
                
                <!-- single footer area wrapper -->
                <!-- single footer area wrapper -->
                <div class="single-footer-wized">
                    <h3 class="footer-title">Our Newsletter</h3>
                    <?php if( $news_info_first = get_field('newsletter_description_above','options') ): ?>
                    <p class="disc-news-letter">
                        <?php echo $news_info_first; ?>
                    </p>
                <?php endif; ?>
                    <form class="footersubscribe-form" action="#">
                        <input type="email" placeholder="Your email address" required>
                        <button class="rts-btn btn-primary">Subscribe</button>
                    </form>
                    <?php if( $news_info_second = get_field('newsletter_description_below','options')): ?>
                    <p class="dsic">
                        <?php echo $news_info_second; ?>
                    </p>
                <?php endif; ?>
                </div>
                <!-- single footer area wrapper -->
            </div>
            <div class="social-and-payment-area-wrapper">
                <?php if( have_rows('wtn_social_media','options') ): ?>
                <div class="social-one-wrapper">
                    <span>Follow Us:</span>
                    <ul>
                        <?php 
                        while( have_rows( 'wtn_social_media','options' ) ):
                            the_row();

                            $media_icon = get_sub_field('wtn_media','options');
                            $media_link = get_sub_field('wtn_link','options');

                            if( $media_link ){
                                $media = $media_link;
                                $target_to = '_blank';
                            }else{
                                $media = '#';
                                $target_to = '_self';
                            }
                         ?>
                        <li><a href="<?php echo $media; ?>" target="<?php echo $target_to; ?>" ><i class="fa-brands <?php echo $media_icon; ?>"></i></a></li>

                    <?php 
                    wp_reset_query();
                endwhile; 
                ?>
                      
                    </ul>
                </div>
            <?php endif; ?>
                <div class="copyright text-center">
                    <p class="disc">
                        Copyright <?php echo Date('Y'); ?> <a href="<?php echo site_url('/'); ?>">©<?php echo bloginfo('sitename'); ?></a>. All rights reserved.
                    </p>
                </div>
                <?php if( $gallery_images = get_field('payment_images','options') ): ?>
                <div class="payment-access">
                    <span>Payment Accepts:</span>
                    <?php foreach( $gallery_images as $gallery_image ): ?>
                    <img src="<?php echo $gallery_image['sizes']['large']; ?>" alt="payment accept">
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</div>
<!-- rts footer one area end -->
        
        <div class="product-details-popup-wrapper">
            <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
                <div class="product-details-popup">
                    <button class="product-details-close-btn"><i class="fal fa-times"></i></button>
                    <div class="details-product-area">
                        <div class="product-thumb-area">
                            <div class="cursor"></div>
                            <div class="thumb-wrapper one filterd-items figure">
                                <div class="product-thumb zoom" onmousemove="zoom(event)"
                                style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/products/product-details.jpg)"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-details.jpg" alt="product-thumb">
                            </div>
                        </div>
                        <div class="thumb-wrapper two filterd-items hide">
                            <div class="product-thumb zoom" onmousemove="zoom(event)"
                            style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt2.jpg)"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt2.jpg" alt="product-thumb">
                        </div>
                    </div>
                    <div class="thumb-wrapper three filterd-items hide">
                        <div class="product-thumb zoom" onmousemove="zoom(event)"
                        style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt3.jpg)"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt3.jpg" alt="product-thumb">
                    </div>
                </div>
                <div class="product-thumb-filter-group">
                    <div class="thumb-filter filter-btn active" data-show=".one"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt1.jpg" alt="product-thumb-filter"></div>
                        <div class="thumb-filter filter-btn" data-show=".two"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt2.jpg" alt="product-thumb-filter"></div>
                            <div class="thumb-filter filter-btn" data-show=".three"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/products/product-filt3.jpg" alt="product-thumb-filter"></div>
                            </div>
                        </div>
                        <div class="contents">
                            <div class="product-status">
                                <span class="product-catagory">Dress</span>
                                <div class="rating-stars-group">
                                    <div class="rating-star"><i class="fas fa-star"></i></div>
                                    <div class="rating-star"><i class="fas fa-star"></i></div>
                                    <div class="rating-star"><i class="fas fa-star-half-alt"></i></div>
                                    <span>10 Reviews</span>
                                </div>
                            </div>
                            <h2 class="product-title">Wide Cotton Tunic Dress <span class="stock">In Stock</span></h2>
                            <span class="product-price"><span class="old-price">$9.35</span> $7.25</span>
                            <p>
                                Priyoshop has brought to you the Hijab 3 Pieces Combo Pack PS23. It is a
                                completely modern design and you feel comfortable to put on this hijab.
                                Buy it at the best price.
                            </p>
                            <div class="product-bottom-action">
                                <div class="cart-edit">
                                    <div class="quantity-edit action-item">
                                        <button class="button"><i class="fal fa-minus minus"></i></button>
                                        <input type="text" class="input" value="01" />
                                        <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                                    </div>
                                </div>
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Add To Cart
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="rts-btn btn-primary ml--20"><i class="fa-light fa-heart"></i></a>
                            </div>
                            <div class="product-uniques">
                                <span class="sku product-unipue"><span>SKU: </span> BO1D0MX8SJ</span>
                                <span class="catagorys product-unipue"><span>Categories: </span> T-Shirts, Tops, Mens</span>
                                <span class="tags product-unipue"><span>Tags: </span> fashion, t-shirts, Men</span>
                            </div>
                            <div class="share-social">
                                <span>Share:</span>
                                <a class="platform" href="http://facebook.com" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                                    <a class="platform" href="http://twitter.com" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                        <a class="platform" href="http://behance.com" target="_blank"><i
                                            class="fab fa-behance"></i></a>
                                            <a class="platform" href="http://youtube.com" target="_blank"><i
                                                class="fab fa-youtube"></i></a>
                                                <a class="platform" href="http://linkedin.com" target="_blank"><i
                                                    class="fab fa-linkedin"></i></a>
                                                    <a class="platform" href="#"><i class="fa-brands fa-youtube"></i></a>
                                                    <a class="platform"  href="#"><i class="fa-brands fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- successfully add in wishlist -->
                            <div class="successfully-addedin-wishlist">
                                <div class="d-flex" style="align-items: center; gap: 15px;">
                                    <i class="fa-regular fa-check"></i>
                                    <p>Your item has already added in wishlist successfully</p>
                                </div>
                            </div>
                            <!-- successfully add in wishlist end -->

                            
                            
                            <!-- Modal -->
                            <div class="modal modal-compare-area-start fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Products Compare</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="compare-main-wrapper-body">
                                        <div class="single-compare-elements name">Preview</div>
                                        <div class="single-compare-elements">
                                            <div class="thumbnail-preview">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/grocery/01.jpg" alt="grocery">
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="thumbnail-preview">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/grocery/02.jpg" alt="grocery">
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="thumbnail-preview">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/grocery/03.jpg" alt="grocery">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname spacifiq">
                                        <div class="single-compare-elements name">Name</div>
                                        <div class="single-compare-elements">
                                            <p>J.Crew Mercantile Women's Short</p>
                                        </div>
                                        <div class="single-compare-elements">
                                            <p>Amazon Essentials Women's Tanks</p>
                                        </div>
                                        <div class="single-compare-elements">
                                            <p>Amazon Brand - Daily Ritual Wom</p>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Price</div>
                                        <div class="single-compare-elements price">
                                            <p>$25.00</p>
                                        </div>
                                        <div class="single-compare-elements price">
                                            <p>$39.25</p>
                                        </div>
                                        <div class="single-compare-elements price">
                                            <p>$12.00</p>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Description</div>
                                        <div class="single-compare-elements discription">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                        </div>
                                        <div class="single-compare-elements discription">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                        </div>
                                        <div class="single-compare-elements discription">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Rating</div>
                                        <div class="single-compare-elements">
                                            <div class="rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span>(25)</span>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span>(19)</span>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <span>(120)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Weight</div>
                                        <div class="single-compare-elements">
                                            <div class="rating">
                                                <p>320 gram</p>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <p>370 gram</p>
                                        </div>
                                        <div class="single-compare-elements">
                                            <p>380 gram</p>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Stock status</div>
                                        <div class="single-compare-elements">
                                            <div class="instocks">
                                                <span>In Stock</span>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="outstocks">
                                                <span class="out-stock">Out Of Stock</span>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="instocks">
                                                <span>In Stock</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compare-main-wrapper-body productname">
                                        <div class="single-compare-elements name">Buy Now</div>
                                        <div class="single-compare-elements">
                                            <div class="cart-counter-action">
                                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text">
                                                        Add To Cart
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="cart-counter-action">
                                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text">
                                                        Add To Cart
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-compare-elements">
                                            <div class="cart-counter-action">
                                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                                    <div class="btn-text">
                                                        Add To Cart
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                    <div class="arrow-icon">
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!--================= Preloader Section Start Here =================-->
<!-- <div id="weiboo-load">
    <div class="preloader-new">
        <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
            viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                    <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                    <circle cx="43" cy="111" r="13" />
                    <circle cx="102" cy="111" r="13" />
                </g>
                <g class="cart__lines" stroke="currentColor">
                    <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                        stroke-dasharray="338 338" stroke-dashoffset="-338" />
                    <g class="cart__wheel1" transform="rotate(-90,43,111)">
                        <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                    <g class="cart__wheel2" transform="rotate(90,102,111)">
                        <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                </g>
            </g>
        </svg>
    </div>
</div> -->
<!--================= Preloader End Here =================-->

<?php if( wp_is_mobile() ): ?>
<div class="search-input-area">
    <form method="GET" action="<?php echo site_url('/'); ?>" class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <input id="searchInput1" name="s" class="search-input" type="text" placeholder="Search by keyword or #">
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </div>
    </form>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<div id="anywhere-home" class="anywere"></div>
<!-- progress area start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>
<?php endif; ?>
<!-- progress area end -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<?php wp_footer(); ?>

</body>
</html>