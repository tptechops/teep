<?php
/* Template Name: Our Story */
get_header();
?>
<style>
@media only screen and (max-width: 690px) {
    .mr-content-wrap .image-wrap {
		bottom: 0;
		margin: 0;
	}
	img.mr-image {
        max-width: 100%;
        margin: 20px 0;
        width: 100%;
    }
}
</style>

<main id="primary" class="site-main">

	<section class="inn-banner type-1" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2022/11/TEEPLegacybannervision.jpg)">
		<div class="banner-content">
			<h1 class="fs-55 fw-700"><span><?php echo get_the_title(); ?></span></h1>
		</div>
	</section>
	<section class="py-5">
		<div class="container g-0">
			<div class="row justify-content-end">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<h2 class="shadow-title">Mission</h2>
					<div class="content-wrap mission-content-wrap">
						<div class="fs-20 fw-300 mission-content" style="position: relative;">
							<span class="icon_title" style="float: left;position: relative; top: 11px;">
								<img src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/Vector.png" alt=""></span><?php echo get_the_content(); ?>
						</div>
						
						<div class="btn-wrap">
						<!-- mission-readmore-btn -->
							<a href="javascript:void(0)" class="def-btn btn-1 mission-readmore-btn">
								<span>Read more</span>
								<i class="fa-solid fa-angle-down"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="image-wrap mission-element">
						<img class="mission-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="100%" style="padding: 0px !important; width: 100%;">
					</div>
				</div>
			</div>


		</div>
	</section>
<section class="py-5 mission-readmore" style="display:none;">
	<div class="container">
				
				<div class="content-wrap mr-content-wrap">
					<div class="row py-5">
						<div class="col-md-6 col-sm-6 col-lg-6">
							<div class="image-wrap">
								<img class="mr-image" src="<?php echo the_field('readmore_image'); ?>" alt="" >
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6">
							<div class="fs-20 fw-300 mr-content">
								<?php echo the_field('readmore_content'); ?>
							</div>
						</div>
					</div>
					<div class="row py-5">
						
						<div class="col-md-6 col-sm-6 col-lg-6">
							<div class="fs-20 fw-300 mr-content">
								<?php echo the_field('readmore_content_2'); ?>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6">
							<div class="image-wrap">
								<img class="mr-image" src="<?php echo the_field('readmore_image_2'); ?>" alt="" width="100%">
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		
</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();