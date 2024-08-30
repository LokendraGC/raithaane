<?php 
get_header();
/*Template Name: Privacy and Policy */
?>
<?php get_template_part('template-parts/common/banner-section'); ?>

<!-- rts navigation bar area end -->
<div class="section-seperator">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>


<!-- privacy policy area start -->
<div class="rts-pricavy-policy-area rts-section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="container-privacy-policy">
					<h1 class="title mb--40"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- privacy policy area end -->


<?php 
get_footer();
