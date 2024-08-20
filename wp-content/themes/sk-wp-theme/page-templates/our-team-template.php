<?php
/* Template Name: Our Team */
get_header();
?>

<main id="primary" class="site-main">
	<section class="inn-banner bg-FD9F00 our-team-banner">
		<div class="container-md">

			<div class="banner-content">
				<div class="bann-title text-uppercase">
					<h1 class="h1-55-700">Our Team</h1>
				</div>

				<div class="row">
					<div class="col-md-5 col-5">
						<div class="innbann-content-wrap">
							<div class="inn-bann-content">
								<h2 class="h2-45-700">TEEP follows a Governance Committees & Structure</h2>
								<h2 class="h2-36-500">for easy delegation and ownership of responsibilities.</h2>
							</div>

							<div class="team-sld-controls">
								<div class="tsld-arr tsld-left-arr"><img src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/left_arr_02.png" alt=""></div>
								<div class="tsld-arr tsld-right-arr"><img src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/right_arr_02.png" alt=""></div>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-7">
						<div class="team-sld-wrap">
							<div class="team-sld-list">

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
									$mem_pp = get_field('profile_pic');
									$mem_role = get_field('team_role');

									echo '<div class="team-sld-item">
										<div class="ts-item-inn">
											<img class="team-sld-img" src="'.$mem_pp.'" alt="">
											<h4 class="h4-28-700">'.$mem_name.'</h4>
											<h4 class="h4-18-400">'.$mem_desig.'</h4>
											<h4 class="h4-18-400">'.$mem_role.'</h4>
										</div>
									</div>';

									endwhile;
									wp_reset_query();
								?>

							</div>
						</div>

						<div class="team-all-link-wrap"><a class="read-more type-3" href="#">View all</a></div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="section afe-section">
		<div class="container">
			<div class="section-title text-left mb-100">
				<h2 class="h2-50-500">Dr J.J. Irani Award for Excellence</h2>
			</div>
			<div class="section-content afe-section-content">
				<div class="row mb-72 align-items-center">
					<div class="col-md-7 col-7">
						<div class="image-wrap pr-90">
							<img class="" src="<?php the_field('afe_image_1'); ?>" alt="">
						</div>
					</div>
					<div class="col-md-5 col-5">
						<div class="content-wrap"><?php the_field('afe_content_1'); ?></div>
					</div>
				</div>
				<div class="row mb-72 align-items-center">
					<div class="col-md-7 col-7">
						<div class="content-wrap pr-90"><?php the_field('afe_content_2'); ?></div>
					</div>
					<div class="col-md-5 col-5">
						<div class="image-wrap">
							<img class="" src="<?php the_field('afe_image_2'); ?>" alt="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 col-11">
						<div class="content-wrap"><?php the_field('afe_content_3'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();