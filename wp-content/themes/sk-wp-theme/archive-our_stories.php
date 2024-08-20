<?php
	get_header();
?>

<main id="primary" class="site-main">

	<section class="inn-banner type-1 bg-007CC3">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700 d-none"><?php echo post_type_archive_title(); ?></h1>
				<h1 class="fs-55 fw-700">School Journeys</h1>
			</div>
		</div>
	</section>

	<section class="section py-100">
		<div class="container">
			
			<div class="">
				<div class="row">
					
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
									<h3 class="fs-32 fw-600">'.$story_title.'</h3>
								</div>
							</a>
						</div>';

					endwhile;
					wp_reset_query();
					?>
					
				</div>
			</div>
			
		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();