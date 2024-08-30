<?php 	
get_header();
/* Template Name: How We Work */
?>

<style>
	ul li {
		list-style: none;
	}
</style>

<?php get_template_part('template-parts/common/banner-section'); ?>

<!-- rts contact main wrapper end -->
<div class="section-seperator">
	<div class="container">
		<hr class="section-seperator">
	</div>
</div>

<!-- about area start -->
<div class="rts-about-area rts-section-gap">
	<div class="container-3">
		<div class="row align-items-center">
			<div class="col-lg-5">

				<div class="single-store-area-start">
					<?php if( $video_url = get_field('video_url_first') ): ?>
					<div class="video" data-video="<?php echo $video_url; ?>">
						<?php if( $background_img = get_field('video__background_image_first') ): ?>
						<img src="<?php echo $background_img['url']; ?>" alt="how we work image">
					<?php endif; ?>
						<div class="overlay"></div>
						<a href="javascript:void(0);">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="29" stroke="#fff" stroke-width="2" />
								<g clip-path="url(#clip0_79_4379)">
									<path d="M39.339 27.6922L27.5265 20.4107C26.6718 19.8846 25.6386 19.8627 24.7625 20.3522C23.8863 20.8416 23.3633 21.7331 23.3633 22.7366V37.2332C23.3633 38.7506 24.5859 39.9918 26.0887 40C26.0928 40 26.0969 40 26.1009 40C26.5705 40 27.0599 39.8528 27.517 39.5739C27.8847 39.3495 28.0009 38.8696 27.7765 38.502C27.5522 38.1342 27.0722 38.0181 26.7046 38.2424C26.4908 38.3728 26.282 38.4402 26.0971 38.4402C25.5301 38.4371 24.923 37.9514 24.923 37.2332V22.7367C24.923 22.3061 25.1474 21.9238 25.5232 21.7139C25.899 21.5039 26.3422 21.5133 26.7083 21.7387L38.5208 29.0202C38.8759 29.2388 39.0791 29.6033 39.0782 30.0202C39.0773 30.4371 38.8727 30.8008 38.5157 31.0187L29.9752 36.2479C29.6078 36.4728 29.4924 36.9529 29.7173 37.3202C29.9422 37.6876 30.4223 37.8031 30.7896 37.5781L39.3291 32.3495C40.1468 31.8507 40.636 30.9812 40.638 30.0234C40.64 29.0656 40.1542 28.1941 39.339 27.6922Z" fill="#fff" />
								</g>
								<defs>
									<clipPath id="clip0_79_4379">
										<rect width="20" height="20" fill="#fff" transform="translate(22 20)" />
									</clipPath>
								</defs>
							</svg>
						</a>
					</div>
				<?php endif; ?>
				</div>
			</div>
			<?php if( $first_content = get_field('content_first') ): ?>
			<div class="col-lg-7 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
				<div class="about-content-area-1">
					<?php echo $first_content; ?>
				</div>
			</div>
		<?php endif; ?>
		</div>
		<div class="row align-items-center innver-in-mobile">
			<div class="col-lg-7 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
				<?php if( $second_content = get_field('content_second') ): ?>
				<div class="about-content-area-1">
					<?php echo $second_content; ?>				</div>
			<?php endif; ?>
			</div>
			<div class="col-lg-5">

				<?php if( $sec_video_url = get_field('video_url_second') ): ?>
				<div class="single-store-area-start">
					<div class="video" data-video="<?php echo $sec_video_url; ?>">
						<?php if( $sec_img  = get_field('video__background_image_second') ): ?>
						<img src="<?php echo $sec_img['url']; ?>" alt="How we work image">
					<?php endif; ?>
						<div class="overlay"></div>
						<a href="javascript:void(0);">
							<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="30" cy="30" r="29" stroke="#fff" stroke-width="2" />
								<g clip-path="url(#clip0_79_4379)">
									<path d="M39.339 27.6922L27.5265 20.4107C26.6718 19.8846 25.6386 19.8627 24.7625 20.3522C23.8863 20.8416 23.3633 21.7331 23.3633 22.7366V37.2332C23.3633 38.7506 24.5859 39.9918 26.0887 40C26.0928 40 26.0969 40 26.1009 40C26.5705 40 27.0599 39.8528 27.517 39.5739C27.8847 39.3495 28.0009 38.8696 27.7765 38.502C27.5522 38.1342 27.0722 38.0181 26.7046 38.2424C26.4908 38.3728 26.282 38.4402 26.0971 38.4402C25.5301 38.4371 24.923 37.9514 24.923 37.2332V22.7367C24.923 22.3061 25.1474 21.9238 25.5232 21.7139C25.899 21.5039 26.3422 21.5133 26.7083 21.7387L38.5208 29.0202C38.8759 29.2388 39.0791 29.6033 39.0782 30.0202C39.0773 30.4371 38.8727 30.8008 38.5157 31.0187L29.9752 36.2479C29.6078 36.4728 29.4924 36.9529 29.7173 37.3202C29.9422 37.6876 30.4223 37.8031 30.7896 37.5781L39.3291 32.3495C40.1468 31.8507 40.636 30.9812 40.638 30.0234C40.64 29.0656 40.1542 28.1941 39.339 27.6922Z" fill="#fff" />
								</g>
								<defs>
									<clipPath id="clip0_79_4379">
										<rect width="20" height="20" fill="#fff" transform="translate(22 20)" />
									</clipPath>
								</defs>
							</svg>
						</a>
					</div>
				</div>
			<?php endif; ?>
			</div>

		</div>
	</div>
</div>
<!-- about area end -->
<!-- Modal -->
<div id="videoModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<iframe id="videoFrame" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</div>

<!-- JavaScript -->
<script>
    // Get modal element
	var modal = document.getElementById("videoModal");
	var videoFrame = document.getElementById("videoFrame");

    // Get close button
	var closeBtn = document.getElementsByClassName("close")[0];

    // Get video elements
	var videoElements = document.querySelectorAll('.video');

    // Add click event to video elements
	videoElements.forEach(function(videoElement) {
		videoElement.addEventListener('click', function() {
			var videoUrl = this.getAttribute('data-video');
			videoFrame.src = videoUrl;
			modal.style.display = "flex";
		});
	});

    // Close modal when the close button is clicked
	closeBtn.onclick = function() {
		modal.style.display = "none";
        videoFrame.src = ""; // Stop the video
    }

    // Close modal when clicking outside the modal content
    window.onclick = function(event) {
    	if (event.target == modal) {
    		modal.style.display = "none";
            videoFrame.src = ""; // Stop the video
        }
    }
</script>



<?php 
get_footer();