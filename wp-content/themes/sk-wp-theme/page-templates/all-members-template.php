<?php
/* Template Name: All Members */
get_header();
?>
<style>
.team-thumb-img {
	width: 275px;
	height: 275px;
	object-fit: cover;
}
</style>
<main id="primary" class="site-main">
	<section class="inn-banner our-team-bann">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
				<h3 class="fs-33 mt-3 d-none">TEEP follows a Governance committees & Structure for easy delegation and ownership of responsibilities.</h3>
				<h3 class="fs-33 mt-3">The programme is governed by Executive Committee comprising of members from Corporates, leaders from educational institutions and educationist for the purpose of:</h3>
				<p class="mt-3">1. Ensuring effective governance and management of the program<br/>
				   2. Making decisions that benefits the stakeholders<br/>
 				   3. Achieving the Vision, Mission and Objectives of the programme</p>
			</div>
		</div>
	</section>

	<section class="py-5">
		<h2 class="shadow-title">Committee</h2>
		<div class="container">
		<div class="section-title">
				<h2 class="fs-50 fw-500 title-border-pillers">Executive Committee</h2>
				
			</div>
			<div class="section-content">
				<div class="team-list-wrap">
					<div class="row justify-content-center team-list">

						<?php
						$args = array(
							'post_type' => 'team_members',
							'order' => 'DESC',
							'posts_per_page' => -1
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$mem_name = get_the_title();
						$mem_desig = get_field('designation');
						$mem_info = get_the_content();
						$mem_pp = get_field('profile_pic');
						$mem_role = get_field('team_role');

						echo '<div class="team-item col-lg-3 col-md-6 col-sm-6">
								<div class="team-item-inn">
									<img class="team-thumb-img" src="'.$mem_pp.'" alt="">
									<h3 class="fs-30 fw-700 mb-30">'.$mem_name.'</h3>
									<h4 class="fs-18">'.$mem_desig.'</h4>
									<h4 class="fs-18 fw-400 mt-2 d-none" style="color:#7e7e7e">'.$mem_role.'</h4>
								</div>
								
								<!-- popup -->
								<div class="popup-main">
									<div class="popup-container">
										<div class="popup-box-wrap">
											<div class="popup-box">
												<div class="close-btn btn-black popup-close"></div>
												<div class="wrap-pop">
													<div class="image-wrap">
														<img class="team-memb-thumb" src="'.$mem_pp.'" alt="">
													</div>
													<div class="team-memb-details">
														<h2 class="fs-40 fw-700 mb-2">'.$mem_name.'</h2>
														<h4 class="fs-28 mb-40">'.$mem_desig.'</h4>
														<h4 class="fs-18 fw-400 mt-2 mb-40 d-none" style="color:#7e7e7e">'.$mem_role.'</h4>
														<div class="fs-24 fw-300">'.wpautop($mem_info).'</div>
													</div>
												</div>
											</div>
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
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();