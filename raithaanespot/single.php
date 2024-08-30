<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Raithaanespot
 */

get_header();
?>

<?php $offer_image = get_field('offer_image', 'options'); ?>
<style>
	/*.related_img {*/
	/*	height: 34px;*/
	/*}*/

	.blog-sidebar-single-wized.with-add {
		background-image: url(<?php echo $offer_image ? $offer_image['url'] : get_template_directory_uri() . '/assets/images/blog/thumb/12.jpg'; ?>);
	}
</style>

<?php get_template_part('template-parts/common/banner-section'); ?>

<div class="section-seperator">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>


<!-- blog sidebar area start -->
<div class="blog-sidebar-area rts-section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-lg-1 order-md-2 order-sm-2 order-2">
				<div class="blog-details-area-1">
					<?php if (has_post_thumbnail()): ?>
						<div class="thumbnail">
							<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>">
						</div>
					<?php endif; ?>
					<div class="body-content-blog-details">
						<div class="top-tag-time">
							<div class="single">
								<i class="fa-solid fa-clock"></i>
								<span><?php echo get_the_date('j, M Y'); ?></span>
							</div>
						</div>
						<?php the_content(); ?>
						<div class="tag-social-share-wrapper-area-wrapper">
							<?php
							$tags = get_the_tags();
							if (!empty($tags)):
								?>
							
								<div class="tags-area">
									<span>Tags</span>
									<?php
									foreach ($tags as $tag):
										?>
										<button><?php echo $tag->name; ?></button>
									<?php endforeach; ?>

								</div>
								<?php
							endif
							?>
							<div class="social-icons">
								<span>Social Icon</span>
								<ul>
									<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div
				class="col-lg-4 pl--60 order-lg-2 order-md-1 order-sm-1 order-1 pl_md--10 pl_sm--10 rts-sticky-column-item">

				<?php
				$unique_id = get_the_ID();
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'post__not_in' => array($unique_id)
				);
				$related_posts = get_posts($args);
				if ($related_posts):
					?>
					<div class="blog-sidebar-single-wized with-title">
						<h4 class="title">Related Post</h4>
						<div class="latest-post-small-area-wrapper">
							<!-- single latest post -->
							<?php
							foreach ($related_posts as $post):
								setup_postdata($post);
								?>
								<div class="single-latest-post-area">
									<?php if ($image_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID))): ?>
										<a href="<?php echo get_the_permalink($post->ID); ?>" class="thumbnail">
											<img class="related_img" src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>">
										</a>
									<?php endif; ?>
									<div class="inner-content-area">
										<div class="icon-top-area">
											<i class="fa-light fa-clock"></i>
											<span><?php echo get_the_date('M j, Y'); ?></span>
										</div>
										<a href="<?php echo get_the_permalink($post->ID); ?>">
											<h5 class="title-sm-blog">
												<?php echo $post->post_title; ?>
											</h5>
										</a>
									</div>
								</div>
							<?php
							endforeach;
							wp_reset_postdata();
							?>

						</div>
					</div>
				<?php endif; ?>


				<div class="blog-sidebar-single-wized with-add bg_image">
					<div class="add-are-content">
						<?php if ($offer_details = get_field('offer_detail', 'options')): ?>
							<?php echo $offer_details; ?>
						<?php endif; ?>
						<a href="<?php echo site_url('shop'); ?>" class="shop-now-goshop-btn">
							<span class="text">Shop Now</span>
							<div class="plus-icon">
								<i class="fa-sharp fa-regular fa-plus"></i>
							</div>
							<div class="plus-icon">
								<i class="fa-sharp fa-regular fa-plus"></i>
							</div>
						</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
<!-- blog sidebar area ends -->
<?php
get_footer();
