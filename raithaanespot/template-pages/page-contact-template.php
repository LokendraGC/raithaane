<?php 
get_header();
/* Template Name: Contact */
?>

<?php get_template_part('template-parts/common/banner-section'); ?>

<!-- rts contact main wrapper end -->
<div class="section-seperator">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>
<div class="rts-map-contact-area rts-section-gap2">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="contact-left-area-main-wrapper">
					<?php the_content(); ?>

					<?php if( $address = get_field('wtn_address','options') ): ?>
					<div class="location-single-card">
						<div class="icon">
							<i class="fa-light fa-location-dot"></i>
						</div>
						<div class="information">
							<h3 class="title"><?php echo $address; ?></h3>
						</div>
					</div>
				<?php endif; ?>
				<?php if( $phone = get_field('wtn_phone_number','options') ): ?>
					<div class="location-single-card">
						<div class="icon">
							<i class="fa-light fa-phone-rotary"></i>
						</div>
						<div class="information">
							<h3 class="title"><a href="tel:<?php echo $phone; ?>" target="_blank" ><?php echo $phone; ?></a></h3>
						</div>
					</div>
				<?php endif; ?>
				<?php if( $mail = get_field('wtn_email_address','options') ): ?>
					<div class="location-single-card">
						<div class="icon">
							<i class="fa-light fa-envelope"></i>
						</div>
						<div class="information">
							<h3 class="title"><a href="mailto:<?php echo $mail; ?>" 
								target="_blank "><?php echo $mail; ?></a></h3>
						</div>
					</div>
				<?php endif; ?>
				</div>
			</div>
			<?php if( $map_url = get_field('wtn_map_iframe_url','options') ): ?>
			<div class="col-lg-8 pl--50 pl_sm--5 pl_md--5">
				<?php echo $map_url; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>


<!-- rts contact-form area start -->
<div class="rts-contact-form-area rts-section-gapBottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bg_light-1 contact-form-wrapper-bg">
					<div class="row align-items-center">
						<div class="col-lg-7 pr--30 pr_md--10 pr_sm--5">
							<div class="contact-form-wrapper-1">
								<h3 class="title mb--50">Fill Up The Form If You Have Any Question</h3>
								<?php echo do_shortcode('[contact-form-7 id="9544339" title="Contact form" html_class = "contact-form-1"]') ?>
							</div>
						</div>
						<?php if( has_post_thumbnail() ): ?>
						<div class="col-lg-5 mt_md--30 mt_sm--30">
							<div class="thumbnail-area">
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="Contact Image">
							</div>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- rts contact-form area end -->



<?php 
get_footer();