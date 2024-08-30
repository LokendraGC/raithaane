<?php 
get_header();
/* Template Name: About Us */
?>


<?php $about_banner = get_field('about_banner_image'); 

if( $about_banner ):
    ?>
    <style type="text/css">
        .about-banner-area-bg  {
            background-image: url('<?php echo $about_banner['url']; ?>');
        }
    </style>
<?php else: ?>
    <style type="text/css">
        .about-banner-area-bg  {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about/01.jpg');
        }
    </style>
<?php endif; ?>

<style>
	ul li {
		list-style: none;
	}
</style>


<!-- rts banner area about -->
<?php if( $about_banner_description = get_field('rs_banner_details') ): ?>
<div class="about-banner-area-bg rts-section-gap bg_iamge">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="inner-content-about-area">
				<?php echo $about_banner_description; ?>
				<?php if( $contact_btn = get_field('rs_button') ): ?>
					<a href="<?php echo $contact_btn['url']; ?>" class="rts-btn btn-primary"><?php echo $contact_btn['title']; ?></a>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<!-- rts banner area about end -->
<!-- rts counter area start -->
<?php if( have_rows('rs_fact_details') ): ?>
<div class="rts-counter-area">
	<div class="container-3">
		<div class="row">
			<div class="col-lg-12">
				<div class="counter-area-main-wrapper">
					<?php
					 while( have_rows('rs_fact_details') ):the_row();
					 		$fact_title = get_sub_field('fact_title');
					 		$fact_number = get_sub_field('fact_number');
					 		$fact_range = get_sub_field('rs_range');
					 ?>
					<div class="single-counter-area">
						<?php if( $fact_title ): ?>
						<h2 class="title"><span class="counter"><?php echo $fact_number; ?></span><?php echo $fact_range; ?></h2>
						<p>
							<?php echo $fact_title; ?>
						</p>
					<?php endif; ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- rts counter area end -->

<!-- about area start -->
<div class="rts-about-area rts-section-gap2">
	<div class="container-3">
		<div class="row align-items-center">
			<?php if( has_post_thumbnail() ): ?>
			<div class="col-lg-4">
				<div class="thumbnail-left">
					<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); 'image' ?>">
				</div>
			</div>
		<?php endif; ?>
			<?php if( have_posts() ): ?>
			<div class="col-lg-8 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
				<div class="about-content-area-1">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<!-- about area end -->

<!-- section-seperator start -->
<div class="section-seperator">
	<div class="container-3">
		<hr class="section-seperator">
	</div>
</div>
<!-- section-seperator start -->

<!-- choosing reason service area start -->
<?php if( $wh_header_content = get_field('why_us_header') ): ?>
<div class="rts-service-area rts-section-gap2 bg_light-1">
	<div class="container-3">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-center-area-main">
					<?php echo $wh_header_content; ?>
				</div>
			</div>
		</div>
	<?php endif; 

	 if( have_rows('why_us_details') ): ?>
		<div class="row mt--30 g-5">
			
			<?php
			$count = 1;
			 while( have_rows('why_us_details') ): the_row(); 

			 		$wh_title = get_sub_field('wh_us_title');
			 		$wh_desc = get_sub_field('wh_us_description');
			 		$wh_image = get_sub_field('wh_us_image');
			 		if( $wh_title ):
			 ?>
			<div class="col-lg-4 col-md-6 col-sm-12 col-12">
				<div class="single-service-area-style-one">
					<?php if( $wh_image ): ?>
					<div class="icon-area">
						<span class="bg-text">0<?php echo $count; ?></span>
						<img src="<?php echo $wh_image['url']; ?>" alt="<?php echo $wh_title; ?>">
					</div>
				<?php endif; ?>
					<div class="bottom-content">
						<h3 class="title">
							<?php echo $wh_title; ?>
						</h3>
						<?php if( $wh_desc ): ?>
						<p class="disc">
							<?php echo $wh_desc; ?>
						</p>
					<?php endif; ?>
					</div>
				</div>
			</div>
		<?php 
	endif;
		$count++;
	endwhile; 
	?>
		</div>
	<?php endif; ?>
	</div>
</div>
<!-- choosing reason service area end -->



<?php 
get_footer();