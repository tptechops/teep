<?php
/* Template Name: What We Do */
get_header();
?>

<main id="primary" class="site-main">
	<section class="inn-banner type-1 what-we-do-banner bg-007CC3" style="background-image: url(https://18.220.246.60/teep/wp-content/uploads/2022/11/What-we-do-banner.jpg)">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>
	
	<section class="what-we-do py-5">
		<h2 class="shadow-title"><?php echo get_the_title(); ?></h2>
		<div class="container">
		
			<div class="section-title">
				<h2 class="fs-50 fw-500 title-border"><?php echo get_the_title(); ?></h2>
			</div>
			<div class="row wwd-content">
				<div class="col-6 col-md-6">
					<div class="content-dis">
						<div class="fs-28 fw-300"><?php echo get_the_content(); ?></div>
					</div>
				</div>
				<div class="col-6 col-md-6 what-we-do-ele">
					<div class="image-wrap">
						<img class="wwd-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="section pt-0 our-model">
		<div class="container">
<!-- 			<div class="section-title text-uppercase color-518ADA">
				<h1 class="fs-55 fw-700">Our Model</h1>
			</div> -->
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="content-wrap">
						<div class="fs-28 fw-300"><?php echo the_field('our_model_content'); ?></div>
					</div>
				</div>
				<div class="col-4 col-md-4 d-none">
					<div class="image-wrap">
						<img class="om-image" src="<?php echo the_field('our_model_image'); ?>" alt="">
					</div>
				</div>
			</div>

		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();