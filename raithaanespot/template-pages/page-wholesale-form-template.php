<?php 
get_header();
/* Template Name: Whole Sale Form */
?>
<?php get_template_part('template-parts/common/banner-section'); ?>

<div class="section-seperator">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>


<div class="checkout-area rts-section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 pr--40 pr_md--5 pr_sm--5 order-2 order-xl-1 order-lg-2 order-md-2 order-sm-2 mt_md--30 mt_sm--30">
                

                <div class="rts-billing-details-area">
                    <h3 class="title">Please Fill The Form</h3>
                    <?php 
                    $shortcode = '[contact-form-7 id="76044f0" title="Whole Sale Form"]';
                    echo do_shortcode( $shortcode )
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
get_footer();