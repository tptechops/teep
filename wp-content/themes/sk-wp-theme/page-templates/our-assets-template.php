<?php
/* Template Name: Our Assets */
get_header();
?>

<main id="primary" class="site-main">
<section class="inn-banner type-1 what-we-do-banner bg-007CC3" style="background-image: url(https://18.220.246.60/teep/wp-content/uploads/2022/11/Our-Assets-Banner.jpg)">
		<div class="container">
			<div class="inn-bann-content">
				<h1 class="fs-55 fw-700"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section class="section our-assets">
		<div class="container">
			<div class="section-title line-title" title="<?php echo get_the_title(); ?>">
				<h2 class="fs-50 fw-500"><?php echo get_the_title(); ?></h2>
			</div>
			
			
			<div class="row justify-content-center asset-list">
			<?php 
				$taxonomy = 'asset_category'; // Replace with your custom taxonomy slug
				$terms = get_terms(array(
					'taxonomy' => $taxonomy,
					'hide_empty' => false,
					'exclude'  => array(12)
				));

				foreach ($terms as $term) {
					$ass_title = $term->name;
					$ass_link = get_term_link($term);
					$ass_thumb = get_field('thumbnail', $term);

					echo '<div class="col-md-6 col-6 asset-item">
							<div class="asset-item-inn">
								<img src="'.$ass_thumb.'" alt="">
								<div class="content-wrap">
									<h3 class="fs-32 fw-700 text-white">'.$ass_title.'</h3>
									<a href="'.$ass_link.'" class="def-btn btn-1">Read more</a>
								</div>
							</div>
						</div>';
				}


				

// 				// if (!empty($terms) && !is_wp_error($terms)) {
// 					foreach ($terms as $term) {
// 						$ass_title = $term->name;
// 						$ass_link = get_term_link($term);
// 						$ass_thumb = get_field('thumbnail', $term);

// 						echo '<div class="col-md-6 col-6 asset-item">
// 								<div class="asset-item-inn">
// 									<img src="'.$ass_thumb.'" alt="">
// 									<div class="content-wrap">
// 										<h3 class="fs-32 fw-700 text-white">'.$ass_title.'</h3>
// 										<a href="'.$ass_link.'" class="def-btn btn-1">Read more</a>
// 									</div>
// 								</div>
// 							</div>';
// 					}
// 				// }

				?>
			</div>

		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();