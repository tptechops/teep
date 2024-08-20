<?php
/* Template Name: JJIE Award */
get_header();
?>
<style>
	img.cup-icon {
    height: 48px;
    margin-bottom: 18px;
    margin-top: 20px;
}
.w-100 {
    width: 100% !important;
    margin-bottom: 11rem;
	margin-top: -1rem;
}
@media only screen and (max-width: 768px) {
	.w-100 {
    width: 100% !important;
    margin-bottom: -29rem;
    margin-top: 36rem;
}
}
 </style>

<main id="primary" class="site-main">
	<section class="inn-banner type-1 award-page-banner bg-007CC3" style="background-image: url(<?php echo get_the_post_thumbnail_url() ;?>)">
		<div class="inn-bann-content">
			<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
		</div>
	</section>

	<section class="section afe-section award-page-content">
		<div class="container">

			<div class="section-title text-center">
				<h2 class="fs-50 fw-500">
					<?php the_field('award_section_title'); ?>
				</h2>
			</div>

			<div class="section-content afe-section-content-1">
				<div class="row gx-5 gy-5">
					<div class="col-lg-7">
						<div class="image-wrap">
							<img class="w-100" src="<?php the_field('afe_image_1'); ?>" alt="">
						</div>
					</div>
					<div class="col-lg-5">
						<div class="content-wrap">
							<img class="cup-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/Group-1.png" alt="">
							<?php the_field('afe_content_1'); ?>
							<!-- <h2 class="shadow-title">Awards</h2> -->
						</div>
					</div>

					<div class="col-lg-7">
						<div class="content-wrap"><?php the_field('afe_content_2'); ?></div>
					</div>
					<div class="col-lg-5">
						<div class="image-wrap">
							<img class="w-100" src="<?php the_field('afe_image_2'); ?>" alt="" width="100%">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="content-wrap">
							<?php the_field('afe_content_3'); ?>
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