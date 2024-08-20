<?php
/* Template Name: Homepage */
get_header();
?>
<style>
@media screen and (max-device-width: 640px) {
    .event-content-wrap > .evnt-cont {
        margin-bottom: 40px;
        margin-left: 0rem !important;
    }
	.event-content-wrap h2.fs-40 {
		font-size: 8rem;
		margin-top: 30px;
	}
}

@media only screen and (max-width: 768px) {
    img.event-img {
        width: 95%;
        padding-left: 15px;
    }
	.event-content-wrap{
          width: 100%;
      /* margin-left: 100px; */
}
a.def-btn.btn-1{
	margin-right:26rem;
}
    img.edu-ex-img.img-responsive {
		width: 100%;
        position: relative;
        top: 103px;
       
    }
	.homban-sld-inn {
	min-height: 192px;
	width:100%;
	}
	.homban-sld-item .homban-sld-content-wrap {
    position: relative;
    top: 51px;
}
a.def-btn.btn-1, .def-btn.btn-1 {
color: #FD9F00;
	background: transparent;
	border: 1px solid #FD9F00;
	padding: 0;
	min-width: 120px;
	line-height: 0;
	min-height: 35px;
	border-radius: 5px;
	font-size: 15px;
	margin-left: 11px;
	position: relative;
    top: 5px;
	}
	.lag-item-inn {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    min-height: 336px;
}
}





	</style>

<main id="primary" class="site-main">

	<section class="home-banner">
		<div class="banner-content">
			<div class="home-bann-slider">

				<div class="homban-sld-list">

					<?php
					$args = array(
						'post_type' => 'home_banner_slider',
						'order' => 'ASC',
						'posts_per_page' => -1
					);

					$query = new  WP_Query( $args );
					while ( $query->have_posts() ) : $query->the_post();

					$slider_img = get_the_post_thumbnail_url();
					$slider_content = get_the_content();
					$know_more_link = get_field('know_more_button');
					$button_text = get_field('button_text') ?? 'Know More';
					$know_more = '';
					if($know_more_link){
						$know_more = '<a href="'.$know_more.'" class="know-more-btn">'.$button_text.'</a>';
					}

					echo '<div class="homban-sld-item">
								<div class="homban-sld-inn">
									<div class="homban-img-wrap">
										<img class="homban-sld-img" src="'.$slider_img.'" alt="">
									</div>
									<div class="homban-sld-content-wrap">
										<div class="homban-sld-cont">'.$slider_content.'</div>
										<div class="btn-wrap">'.$know_more.'</div>
									</div>
								</div>
							</div>';

					endwhile;
					wp_reset_query();
					?>

				</div>
			</div>
		</div>
	</section>

	<section class="section edu-ex back-element">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="content-wrap edu-ex-content">
						<h2 class="fs-50 fw-500 color-518ADA mb-30"><span class="icon_title"><img src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/Group.png" alt=""></span><?php echo the_field('ee_title'); ?></h2>
						<p class="fs-28 fw-300 mb-30"><?php echo the_field('ee_content'); ?></p>
						<div class="">
							<a href="<?php echo home_url(); ?>/education-excellence/" class="def-btn btn-1">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="image-wrap">
						<img class="edu-ex-img img-responsive" src="<?php echo the_field('ee_image'); ?>" alt="" >
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section position-relative" style="background: linear-gradient(180deg, #1B69B3 0.11%, #217DFF 58.24%, #71ACFF 100%); color: #fff;">
		<div class="bg-imgs">
			<img class="msg-bg-left" src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/HOBNOB-Presentation-25-1.png" alt="">
			<img class="msg-bg-right" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/tree_img_02.png" alt="">
		</div>
		<div class="container position-relative">
			<div class="col-md-8 mx-auto">
				<div class="section-title mb-5">
					<h2 class="fs-50 fw-500 text-white">Our Mission</h2>
				</div>
				<div class="content-wrap msn-content">
					<div class="fs-28"><?php echo the_field('our_mission_content'); ?></div>
					<div class="text-center mt-5">
						<a href="<?php echo home_url(); ?>/about-us" class="def-btn btn-5">Know more</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section" style="background-color: #EFEFEF;"> <!-- section on visible desktop -->
		<div class="container">
			<div class="section-title line-title" title="Teep Legacy">
				<h2 class="fs-50 fw-500">Teep Legacy</h2>
			</div>
			<div class="content-wrap pt-5">
				<div class="lgcy-wrap">

					<div class="row gx-0 lgcy-list">

						<!-- items -->
						<div class="col-lg-3 col-md-6">
							<div class="lgcy-item">
								<div class="lgcy-item-inn">
									<div class="lgcy-crcl">
										<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/teep_leg_icon_01.png" alt="">
									</div>
									<h4 class="fs-16 fw-400 lh-1p5 lgcy-title" style="color: #706D6D;">
										Tata Steel announced The Tata Education Excellence Programme (TEEP) for English medium schools The Award was named after Dr. J.J. Irani in 2003
										<span></span>
									</h4>
								</div>
							</div>					
						</div>

						<div class="col-lg-3 col-md-6">
							<div class="lgcy-item">
								<div class="lgcy-item-inn">
									<div class="lgcy-crcl">
										<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/teep_leg_icon_02.png" alt="">
									</div>
									<h4 class="fs-16 fw-400 lh-1p5 lgcy-title" style="color: #706D6D;">
										1st Assessor training program – Around 50 principals participated in 2005
										<span></span>
									</h4>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6">
							<div class="lgcy-item">
								<div class="lgcy-item-inn">
									<div class="lgcy-crcl">
										<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/teep_leg_icon_03.png" alt="">
									</div>
									<h4 class="fs-16 fw-400 lh-1p5 lgcy-title" style="color: #706D6D;">
										TEEP BASIC Assessment Criteria was announced BEJ school won the Dr J.J. Irani Award for Excellence in Education(2011-2012)
										<span></span>
									</h4>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6">
							<div class="lgcy-item">
								<div class="lgcy-item-inn">
									<div class="lgcy-crcl">
										<img class="lgcy-icon" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/teep_leg_icon_04.png" alt="">
									</div>
									<h4 class="fs-16 fw-400 lh-1p5 lgcy-title" style="color: #706D6D;">
										Relaunch of BASIC & SARAL TEEP Assessments after a period of 3 years in 2022
										<span></span>
									</h4>
								</div>
							</div>
						</div>

						<!-- end items -->
					</div>
				</div>
				<div class="d-flex justify-content-center mt-5">
					<a href="<?php echo home_url(); ?>/teep-legacy" class="def-btn btn-6">Know more</a>
				</div>
			</div>
		</div>
	</section>

	<section class="section overflow-hidden">
		<div class="">
			<div class="section-title line-title" title="Upcoming Events">
				<h2 class="fs-50 fw-500">Upcoming Events</h2>
			</div>

			<div class="container">
				<div class="event-wrap">
					<div class="event-list">

						<?php
						$args = array(
							'post_type' => 'events',
							'category_name' => 'coming-up-events',
							'order' => 'ASC',
							'posts_per_page' => -1
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$event_title = get_the_title();
						$event_content = get_the_content();
						$event_thumb = get_the_post_thumbnail_url();

						echo '<div class="event-item" style="height: auto">
								<div class="event-item-inn">
									<div class="event-img-wrap">
										<img class="event-img" src="'.$event_thumb.'" alt="" width="100%">
									</div>
									<div class="event-content-wrap" style="padding: 0 30px">
										<h2 class="fs-40 fw-600 mb-30">'.$event_title.'</h2>
										<div class="fs-24 evnt-cont">'.$event_content.'</div>
										<div class="btn-wrap">
											<a href="https://18.220.246.60/teep/sign-in/" class="def-btn btn-1">Participate Now</a>
										</div>
									</div>
								</div>
							</div>';

						endwhile;
						wp_reset_query();
						?>

					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section d-none">
		<h2 class="shadow-title">CONCLUDED EVENTS</h2>	
		<div class="container">
			<div class="section-title">
				<h2 class="fs-50 fw-500 title-border-events">Concluded Events</h2>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="py-0">
						<div class="row">
							<div class="col-6 align-self-center px-0">
								<!-- Image -->
								<div class="ratio ratio-1x1">
									<img class="object-fit-cover" src="https://18.220.246.60/teep/wp-content/uploads/2022/09/Upcoming-events.jpg" alt="...">
								</div>
							</div>
							<div class="col-md-6 bgCE">
								<!-- Text -->
								<p class="mb-0 CEminheight">
									Workshop for School Leadership on Strategic Planning for School with Mr. Kalyan Bhaskar (XLRI)
								</p>
								<p>
									<a href="#">Read More &#x2192;</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="py-0">
						<div class="row">
							<div class="col-md-6 align-self-center px-0">
								<!-- Image -->
								<div class="ratio ratio-1x1">
									<img class="object-fit-cover" src="https://18.220.246.60/teep/wp-content/uploads/2022/09/Upcoming-events.jpg" alt="...">
								</div>
							</div>
							<div class="col-md-6 bgCE">
								<!-- Text -->
								<p class="mb-0 CEminheight">
									Session on Use of Storytelling & Digital Technology for Education – with Mr. Balaji Jadhav
								</p>
								<p>
									<a href="#">Read More &#x2192;</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="py-0">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 bgCE">
								<!-- Text -->
								<p class="mb-0 CEminheight">
									Webinar on importance of School in Career Counselling with IC3 Institute
								</p>
								<p>
									<a href="#">Read More &#x2192;</a>
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 align-self-center px-0">
								<!-- Image -->
								<div class="ratio ratio-1x1">
									<img class="object-fit-cover" src="https://18.220.246.60/teep/wp-content/uploads/2022/09/Upcoming-events.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="py-0">
						<div class="row">
							<div class="col-6 bgCE">
								<!-- Text -->
								<p class="mb-0 CEminheight">
									Train The Trainer- workshop for teachers on teaching in online environment with Tata Management Development Centre
								</p>
								<p>
									<a href="#">Read More &#x2192;</a>
								</p>
							</div>
							<div class="col-6 align-self-center px-0">
								<!-- Image -->
								<div class="ratio ratio-1x1">
									<img class="object-fit-cover" src="https://18.220.246.60/teep/wp-content/uploads/2022/09/Upcoming-events.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>







	<section class="section">
		<div class="container">
			<div class="section-title line-title" title="Concluded Events">
				<h2 class="fs-50 fw-500">Concluded Events</h2>
			</div>

			<div class="content-wrap">
				<div class="con-event-wrap">
					<div class="con-event-list row g-0">

						<?php
						function getCat($slug){
							$cat = get_category_by_slug($slug); 
							return $catID = $cat->term_id;
						}
						$coming_up_events = getCat('coming-up-events');

						/*$args = array(
							'post_type' => 'events',
							'order' => 'ASC',
							'posts_per_page' => 12,
							'category__not_in' => array( $coming_up_events )
						);*/
						$today = date('Ymd');
						$oldargs = array(
							'post_type' => 'events',
							//'numberposts ' => -1,
							'posts_per_page' => 999999,
							'meta_key' => 'event_participation_period',
							'meta_query' => array(
								array(
									'key' => 'event_participation_period',
									'value' => $today,
									'compare' => '<'
								)
							),
							'orderby' => 'meta_value_num',
							'order' => 'ASC'
						);
						//$oldevents = get_posts($oldargs);

						$i = 1;
						$output = '';
						$main_output = '';

						$mquery = new  WP_Query( $oldargs );
						while ( $mquery->have_posts() ) : $mquery->the_post();

						$con_event_content = get_the_content();
						$con_event_thumb = get_the_post_thumbnail_url();
						$con_event_short = get_field('event_short_details');

						$output .= '<div class="ce-group-item col-12 col-md-6">
										<div class="py-0">
											<div class="row g-0 ce-inn-row">
												<div class="col-6 align-self-center px-0">
													<div class="ratio ratio-1x1">
														<img class="object-fit-cover" src="'.$con_event_thumb.'" alt="...">
													</div>
												</div>
												<div class="col-6 bgCE">
													<div class="mb-0 CEminheight short-content-upev">'.$con_event_short.'</div>
													<div class="readmore-wrap"><a href="'. esc_url( get_permalink(get_the_ID()) ).'">Read More →</a></div>
												</div>
											</div>
										</div>
									</div>';

						if(($i % 4) == 0) {
							$main_output .= '<div class="ce-item"><div class="ce-group g-0 row">'.$output.'</div></div>';
							$output = '';
						}
						$i += 1;
						endwhile;

						if($output !== '') {
							$main_output .= '<div class="ce-item"><div class="ce-group g-0 row">'.$output.'</div></div>';
						}
						//wp_reset_query();

						echo $main_output;
						?>

					</div>

				</div>
			</div>
		</div>
	</section>







	<section class="section overflow-hidden">
		<div class="container">
			<div class="section-title line-title" title="Resources">
				<h2 class="fs-50 fw-500">Resources</h2>
			</div>

			<div class="content-wrap">
				<div class="resrc-wrap">
					<div class="resrc-list owl-carousel">

						<?php 
						$taxonomy = 'asset_category'; // Replace with your custom taxonomy slug
						$terms = get_terms(array(
							'taxonomy' => $taxonomy,
							'hide_empty' => false,
						));

						foreach ($terms as $term) {
							$asset_title = $term->name;
							$page_link = get_term_link($term);
							$asset_icon = get_field('asset_icon', $term);
							// $ass_thumb = get_field('thumbnail', $term);

							echo '<div class="resrc-item">
										<div class="resrc-item-inn">
											<img class="resrc-icon" src="'.$asset_icon.'" alt="">
											<h4 class="fs-28 fw-400 mb-0" style="color: #1B69B3;">'.$asset_title.'</h4>
											<a href="'.$page_link.'" class="def-btn btn-2 mt-5">Read more</a>
										</div>
									</div>';
						}
						?>


					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section overflow-hidden">
		<div class="container-fluid">
			<div class="section-title line-title" title="Impact">
				<h2 class="fs-50 fw-500">Impact</h2>
			</div>

			<div class="content-wrap">
				<div class="impact-wrap">
					<div class="impact-list">

						<?php
						$args = array(
							'post_type' => 'our_impact',
							'order' => 'ASC',
							'posts_per_page' => -6
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$user_impact = get_the_content();
						$user_name = get_field('name');
						$user_designation = get_field('designation');

						echo '<div class="impact-item">
									<div class="impact-item-inn">
										<div class="user-impact">
											<div class="fs-20 impact-text">'.$user_impact.'</div>
										</div>
										<div class="impact-info">
											<div class="impact-qt-crcl"></div>
											<h3 class="fs-35 fw-700 user-name">'.$user_name.'</h3>
											<h4 class="fs-18 fw-300 user-desig">'.$user_designation.'</h4>
										</div>
									</div>
								</div>';

						endwhile;
						wp_reset_query();
						?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section overflow-hidden">
		<!-- 		<h2 class="shadow-title">GALLERY</h2> -->
		<div class="container">
			<!-- 			<div class="section-title">
<h2 class="fs-50 fw-500 title-border">Gallery</h2>
</div> -->

			<div class="section-title line-title" title="Gallery">
				<h2 class="fs-50 fw-500">Gallery</h2>
			</div>

			<div class="content-wrap">
				<div class="gallery-wrap">
					<div class="gallery-list owl-carousel">

						<?php
						$args = array(
							'post_type' => 'gallery',
							'order' => 'ASC',
							'posts_per_page' => -1
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$gallery_image = get_the_post_thumbnail_url();

						echo '<div class="gallery-item">
										<div class="gallery-item-inn">
											<img class="gallery-img" src="'.$gallery_image.'" alt="">
										</div>
									</div>';

						endwhile;
						wp_reset_query();
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