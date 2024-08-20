<?php
/* Template Name: Our Impact */
get_header();
?>
<style>
img.oi-image-1 {
    padding: 50px 50px 50px 41px !important;
    height: 58rem !important;
    position: relative;
    left: -43px;
    top: -33px;
}
.our-impact-acc .content-dis {
    padding: 11px 100px 60px 0;
    position: relative;
    left: 52px;
}
@media only screen and (max-width: 768px) {
img.oi-image-1 {
		padding: 50px 50px 50px 41px !important;
        height: 77rem !important;
        margin-top: 13rem;
        position: relative;
        left: -2px;
        top: -63px;
		}
	.image-wrap.ourimpac-ele {
        margin-left: 1rem;
        position: relative;
        top: 21px;
}
.col-6 {
        flex: 0 0 auto;
        width: 100%;
 }
}
	</style>
<main id="primary" class="site-main">
<section class="inn-banner type-1 what-we-do-banner bg-007CC3" style="background-image: url(https://18.220.246.60/teep/wp-content/uploads/2022/11/Our-impact-banner.jpg)">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section class="our-impact-acc py-5">
		<h2 class="shadow-title"><?php echo get_the_title(); ?></h2>
		<div class="container g-0">
			<!-- <div class="section-title text-uppercase color-518ADA mb-100">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div> -->
			<div class="section-title">
			
				<h2 class="fs-50 fw-500 title-border"><?php echo get_the_title(); ?></h2>
				
			</div>
			<div class="row oi-content">
				<div class="col-6 col-md-6">
					<div class="content-wrap oi-content-wrap-1">
						<div class="oi-content-1">
							<?php echo the_field('content_2'); ?>
						</div>
						<div class="image-wrap ourimpac-ele">
							<img class="oi-image-1" style="border-radius: 0px" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-6">
					<div class="content-wrap oi-content-wrap-2 content-dis">
						<div class="oi-content-2">
							<?php echo get_the_content(); ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="teep-impact py-5 mobiletest">
		<div class="container">
			<div class="section-title text-left text-uppercase color-518ADA">
				<h2 class="fs-50 fw-600">the impact of teep Since 2010</h2>
			</div>
			<div class="section-content">
				<div class="row">
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">900</span>+</h2>
							<div class="count-text">Improvements</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">3600</span>+</h2>
							<div class="count-text">Teachers & Student Engaged</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">1150</span>+</h2>
							<div class="count-text">Best practices identified in schools</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">6600</span>+</h2>
							<div class="count-text">Teachers trained in workshops & seminars</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">2000</span>+</h2>
							<div class="count-text">Principals and teachers trained on the fundamentals of Quality in Education</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	
	
		<section class="teep-impact py-5 desktop">
		<div class="container">
			<div class="section-title text-left text-uppercase color-518ADA">
				<h2 class="fs-50 fw-600">the impact of teep Since 2010</h2>
			</div>
			<div class="section-content">
				<div class="row">
					<div class="col-md-4 col-4">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">900</span>+</h2>
							<div class="count-text">Improvements</div>
						</div>
					</div>
					<div class="col-md-4 col-4">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">3600</span>+</h2>
							<div class="count-text">Teachers & Student Engaged</div>
						</div>
					</div>
					<div class="col-md-4 col-4">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">1150</span>+</h2>
							<div class="count-text">Best practices identified in schools</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">6600</span>+</h2>
							<div class="count-text">Teachers trained in workshops & seminars</div>
						</div>
					</div>
					<div class="col-md-6 col-6">
						<div class="count-div">
							<h2 class="fs-64 fw-600 color-FD9F00 count-number"><span class="count-digit">2000</span>+</h2>
							<div class="count-text">Principals and teachers trained on the fundamentals of Quality in Education</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	
	
	
	<section class="py-5 our-stories-section">
		<h2 class="shadow-title">Journeys</h2>
		<div class="container">
			<div class="section-title  text-uppercase color-518ADA">
				<h2 class="fs-55 fw-700">School Journeys</h2>
			</div>
			
			<div class="section-content d-none">

				<?php
				$args = array(
					'post_type' => 'our_stories',
					'order' => 'ASC',
					'posts_per_page' => 1
				);

				$query = new  WP_Query( $args );
				while ( $query->have_posts() ) : $query->the_post();

				$story_title = get_the_title();
				$school_name = get_field('school_name');
				$principal_name	= get_field('principal_name');

				$story_content	 = get_field('content');

				$story_main_image = get_field('main_image');
				$story_before_image = get_field('before_image');
				$story_after_image = get_field('after_image');


				echo '<div class="row">
					<div class="col-md-6 col-6 pr-40">
						<div class="story-image-list">
							<div class="image-wrap story-image-wrap">
								<img class="" src="'.$story_main_image.'" alt="">
							</div>
							<div class="story-trans-wrap">
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
					<div class="col-md-6 col-6 ps-0">
						<div class="story-content-block">
							<div class="story-title-wrap">
								<h4 class="fs-24 fw-600">Title: <span>'.$story_title.'</span></h4>
								<h4 class="fs-24 fw-600">School Name: <span>'.$school_name.'</span></h4>
								<h4 class="fs-24 fw-600">Principal Name: <span>'.$principal_name.'</span></h4>
							</div>
							<div class="content-wrap story-content-wrap">'.$story_content.'</div>
						</div>
					</div>
				</div>';

				endwhile;
				wp_reset_query();
				?>


				<div class="btn-wrap right mt-5">
					<a class="read-more type-2" href="<?php echo home_url(); ?>/our_stories">Read more</a>
				</div>
				<div class="other-story-wrap d-none">
					<div class="other-story-list owl-carousel">
						<?php
						$args = array(
							'post_type' => 'our_stories',
							'order' => 'ASC',
							'posts_per_page' => -1
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$story_title = get_the_title();
						$story_main_image = get_field('main_image');


						echo '<div class="stoy-item">
								<div class="story-item-inn">
									<img src="'.$story_main_image.'" alt="">
									<h3 class="fs-32 fw-600">'.$story_title.'</h3>
								</div>
							</div>';

						endwhile;
						wp_reset_query();
						?>
					</div>
				</div>
			</div>

			<div class="section-content">
				<div class="row mb-5">

					<?php
					$args = array(
						'post_type' => 'our_stories',
						'order' => 'ASC',
						'posts_per_page' => -1
					);

					$query = new  WP_Query( $args );
					while ( $query->have_posts() ) : $query->the_post();

					$story_title = get_the_title();
					$story_main_image = get_field('main_image');
					$curr_link = get_permalink();


					echo '<div class="stoy-item col-md-4 px-4">
							<a href="'.$curr_link.'">
								<div class="story-item-inn">
									<img src="'.$story_main_image.'" alt="">
									<h3 class="fs-24 fw-600">'.$story_title.'</h3>
								</div>
							</a>
						</div>';

					endwhile;
					wp_reset_query();
					?>

				</div>

				<div class="btn-wrap right mt-5 d-none">
					<a class="read-more type-2" href="<?php echo home_url(); ?>/our_stories">Read more</a>
				</div>
			</div>

		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();