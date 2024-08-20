<?php
/* Template Name: Education Excellence */
get_header();
?>

<main id="primary" class="site-main">
	<section class="inn-banner type-1 award-page-banner bg-007CC3" style="background-image: url(<?php echo get_the_post_thumbnail_url() ;?>)">
		<div class="container-fluid">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>

	<section class="section afe-section">
		<div class="container-fluid">
			<div class="section-content afe-section-content">
			
				<div class="row align-items-center res_grid_sec">
					<div class="col-md-7 col-7 res_inner_grid">
						<div class="row">
							<div class="content-wrap"><?php the_field('afe_content_2'); ?></div>
						</div>
					</div>
					<div class="col-md-5 col-5 res_inner_grid">
						<div class="image-wrap">
							<img class="" src="<?php the_field('afe_image_2'); ?>" alt="" width="100%">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 col-11">
						<div class="content-wrap pr-30"><?php the_field('afe_content_3'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();