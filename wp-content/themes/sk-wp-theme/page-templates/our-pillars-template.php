<?php
/* Template Name: Our Pillars */
get_header();
?>

<style>
	@media only screen and (max-width: 768px) {
		.afe-section-content-1 .image-wrap {
    bottom: 0px !important;
}
}
	</style>
<main id="primary" class="site-main">
<section class="inn-banner type-1 what-we-do-banner bg-007CC3 mb-5" style="background-image: url(https://18.220.246.60/teep/wp-content/uploads/2022/11/Our-Pillars-banner.jpg)">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section class="our-pillars py-5">
		
		<div class="container">
		<div class="section-title align_center">
				
				<h2 class="fs-50 fw-500 title-border"><?php echo get_the_title(); ?></h2>
			</div>
			<div class="content-wrap pillers-wrap">
				<div class="lgcy-wrap">
					<div class="lgcy-list lgcy-list-piller">

						<!-- items -->
						<div class="lgcy-item lgcy-list-pillars">
							
							<div class="lgcy-item-inn">
								<div class="lgcy-crcl our-piller-circle">
									<img class="lgcy-icon" src="https://18.220.246.60/teep/wp-content/uploads/2022/09/Frame.png" alt="">
								</div>
								<h4 class="fs-28 fw-500 lgcy-title">
								ENGAGEMENT
									<span></span>
								</h4>
							</div>
						</div>

						<div class="lgcy-item lgcy-list-pillars">
							<div class="lgcy-item-inn">
								<div class="lgcy-crcl our-piller-circle">
									<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/Vector-1.png" alt="">
								</div>
								<h4 class="fs-28 fw-500 lgcy-title">
								IMPROVEMENT
								</h4>
							</div>
						</div>

						<div class="lgcy-item lgcy-list-pillars">
							<div class="lgcy-item-inn">
								<div class="lgcy-crcl our-piller-circle">
									<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/Group-2.png" alt="">
								</div>
								<h4 class="fs-28 fw-500 lgcy-title">
								ASSESSMENT
								</h4>
							</div>
						</div>

						<!-- end items -->
					</div>
				</div>
				
			</div>
			<!-- <div class="op-map-wrap">
				<div class="op-map">
					<div class="op-map-item">
						<a class="map-link" href="#<?php str_replace(' ', '-', the_field('op_title_1')); ?>"><?php the_field('op_title_1'); ?></a>
					</div>
					<div class="op-map-item">
						<a class="map-link" href="#<?php str_replace(' ', '-', the_field('op_title_2')); ?>"><?php the_field('op_title_2'); ?></a>
					</div>
					<div class="op-map-item">
						<a class="map-link" href="#<?php str_replace(' ', '-', the_field('op_title_3')); ?>"><?php the_field('op_title_3'); ?></a>
					</div>
				</div>
			</div> -->

			<section class="section afe-section award-page-content">
		<div class="container">

			<div class="section-title text-center">
				<h2 class="fs-50 fw-500">
				<?php the_field('op_title_1'); ?>
				</h2>
						</div>

			<div class="section-content afe-section-content-1">
				<div class="row gx-5 gy-5">
					<div class="col-lg-6">
						<div class="image-wrap">
						<img class="op-img" src="<?php echo the_field('op_image_1'); ?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="content-wrap">
						<div class="op-cont fs-28 fw-300"><?php the_field('op_content_1'); ?></div>

						</div>
					</div>

					<div class="section-title text-center">
				<h2 class="fs-50 fw-500">
				<?php the_field('op_title_2'); ?>
				</h2>
					</div>
					<div class="col-lg-6">
					<div class="op-cont fs-28 fw-300 mar-btn"><?php the_field('op_content_2'); ?></div>
					</div>
					<div class="col-lg-6">
						<div class="image-wrap">
						<img class="op-img" src="<?php echo the_field('op_image_2'); ?>" alt="" width="100%">
						</div>
					</div>

					<div class="section-title text-center">
				<h2 class="fs-50 fw-500">
				<?php the_field('op_title_3'); ?>
				</h2>
					</div>

					<div class="col-lg-6">
					<img class="op-img" src="<?php echo the_field('op_image_3'); ?>">
					</div>
					<div class="col-lg-6">
					<div class="content-wrap">
						<div class="op-cont fs-28 fw-300 mar-btn"><?php the_field('op_content_3'); ?></div>
						</div>
</div>
				</div>
			</div>
		</div>
	</section>
		 <!-- <div class="op-cont-row">
				
				<div class="scroll-to" id="<?php str_replace(' ', '-', the_field('op_title_1')); ?>"></div>
				<h2 class="fs-48 fw-700 color-518ADA text-center pillars-title"><?php the_field('op_title_1'); ?></h2>
				<div class="op-cont-wrap op-cont-1">
					<h2 class="shadow-title pb-5">Engagement</h2>
					<img class="op-img" src="<?php echo the_field('op_image_1'); ?>">
					<div class="op-cont fs-28 fw-300"><?php the_field('op_content_1'); ?></div>
					<div class="clear-both"></div>
				</div>
			</div> 

			<div class="op-cont-row">
				<div class="scroll-to" id="<?php str_replace(' ', '-', the_field('op_title_2')); ?>"></div>
				<h2 class="fs-48 fw-700 color-518ADA text-center pillars-title"><?php the_field('op_title_2'); ?></h2>
				<div class="op-cont-wrap op-cont-2">
					<h2 class="shadow-title pb-5">Improvement</h2>
					<img class="op-img" src="<?php echo the_field('op_image_2'); ?>">
					<div class="op-cont fs-28 fw-300 mar-btn"><?php the_field('op_content_2'); ?></div>
					<div class="clear-both"></div>
				</div>
			</div>

			<div class="op-cont-row pb-100">
				<div class="scroll-to" id="<?php str_replace(' ', '-', the_field('op_title_3')); ?>"></div>
				<h2 class="fs-48 fw-700 color-518ADA pillars-title text-center"><?php the_field('op_title_3'); ?></h2>
				<div class="op-cont-wrap op-cont-3">
					<h2 class="shadow-title pb-5">Assessment</h2>
					<img class="op-img" src="<?php echo the_field('op_image_3'); ?>">
					<div class="op-cont fs-28 fw-300 mar-btn"><?php the_field('op_content_3'); ?></div>
					<div class="clear-both"></div>
				</div> -->

				<div class="op-tab">
					<div class="nav-tabs-wrap">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php
								for ($i = 1; $i <= 4; $i++) {
									$tab_title = get_field('cont_3_tab_title_'.$i);
									$active_class = ($i == 1) ? "active" : "";
									$area_selected = ($i == 1) ? "true" : "false";

									if($tab_title){
										echo '<li class="nav-item" role="presentation">
												<div class="nav-link '.$active_class.'" id="tab-title-'.$i.'" data-bs-toggle="tab" data-bs-target="#tab-cont-'.$i.'" type="button" role="tab" 
												aria-controls="tab-cont-'.$i.'" aria-selected="'.$area_selected.'">
													'.$tab_title.'
												</div>
											</li>';
									}
								}
							?>
						</ul>
					</div>

					<div class="tab-content" id="myTabContent">
						<?php
							for ($i = 1; $i <= 4; $i++) {
								$tab_title = get_field('cont_3_tab_title_'.$i);
								$tab_content = get_field('cont_3_tab_content_'.$i);
								$active_class = ($i == 1) ? "active" : "";

								if($tab_title){
								echo '<div class="fs-28 fw-300 tab-pane fade show '.$active_class.'" id="tab-cont-'.$i.'" role="tabpanel" aria-labelledby="tab-title-'.$i.'">
										'.$tab_content.'
									</div>';
								}
							}
						?>
					</div>
				</div>
			</div>

		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();