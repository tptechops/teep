<?php
	get_header();
?>

<main id="primary" class="site-main">

	<section class="inn-banner type-1 bg-007CC3">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>

	
	<section class="section py-100">
		<div class="container">
			<div class="">
				
				<?php 
					$story_title = get_the_title();
					$school_name = get_field('school_name');
					$principal_name	= get_field('principal_name');

					$story_content	 = get_field('content');

					$story_main_image = get_field('main_image');
					$story_before_image = get_field('before_image');
					$story_after_image = get_field('after_image');

					echo '<div class="row">
							<div class="col-12">
								<div class="story-image-list">
									<div class="image-wrap story-image-wrap">
										<img class="" src="'.$story_main_image.'" alt="">
									</div>
									<div class="story-trans-wrap d-none">
										<h3 class="fs-24 fw-600 story-trans-title">Transformation</h3>
										<div class="row">
											<div class="col-md-6 col-6">
												<div class="aft-bef-wrap">
													<h4 class="fs-24 fw-600 aft-bef-text">Before</h4>
													<img class="aft-bef-img" src="'.$story_before_image.'" alt="">
												</div>
											</div>
											<div class="col-md-6 col-6">
												<div class="aft-bef-wrap">
													<h4 class="fs-24 fw-600 aft-bef-text">After</h4>
													<img class="aft-bef-img" src="'.$story_after_image.'" alt="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mt-5">
								<div class="story-content-block">
									<div class="story-title-wrap">
										<h4 class="fs-24 fw-600 d-none">Title: <span>'.$story_title.'</span></h4>
										<h4 class="fs-24 fw-600">School Name: <span>'.$school_name.'</span></h4>
										<h4 class="fs-24 fw-600">Principal Name: <span>'.$principal_name.'</span></h4>
									</div>
									<div class="content-wrap story-content-wrap">'.$story_content.'</div>
								</div>
							</div>
						</div>';
					?>

			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();