<?php
get_header();
?>

<main id="primary" class="site-main">

	<section class="inn-banner type-1 position-relative">
		<div class="bg-wrap">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/2022/11/TEEPLegacybannervision.jpg" alt="" class="bg-img">
			<div class="bg-overly" style="background-color: #007CC3; opacity: 1;"></div>
		</div>
		<div class="banner-content position-relative">
			<h1 class="fs-55 fw-700"><span><?php echo single_term_title(); ?></span></h1>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="section-title line-title" title="<?php echo single_term_title(); ?>">
				<h2 class="fs-50 fw-500"><?php echo single_term_title(); ?></h2>
			</div>
			
			<div class="row gx-5 gy-5 newsletter-list">
				
				<?php
					// Check if we are on a single taxonomy page
					if (is_tax()) {
						// Get the current taxonomy term
						$current_term = get_queried_object();

						// Retrieve the current taxonomy and term information
						$taxonomy = $current_term->taxonomy;
						$term_slug = $current_term->slug;

						// Set up the query arguments
						$args = array(
							'post_type' => 'asset_list',
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $term_slug,
								),
							),
						);

						// Create a new instance of WP_Query
						$query = new WP_Query($args);

						// Check if there are posts
						if ($query->have_posts()) {
							// Start the loop
							while ($query->have_posts()) {
								$query->the_post();

								$ass_title = get_the_title();
								$ass_date = get_field("date");
								$ass_date = $ass_date ? 
									'<h4 class="fs-14 fw-400 mt-3" style="color: #727272;">'.$ass_date.'</h4>' : '';
								
								$ass_details = get_field("details");
								$ass_details = $ass_details ? '<p class="mt-4">'.$ass_details.'</p>' : '';
								
								$ass_pdf = get_field("pdf");
								$ass_pdf = $ass_pdf ? '<a class="def-btn btn-1 mt-5 mr-5" href="'.$ass_pdf.'" target="_blank">Download PDF</a>' : '';
								
								$external_link = get_field("news_external_link");
								$external_link = $external_link ? '<a class="def-btn btn-1 mt-5" href="'.$external_link.'" target="_blank">Read More</a>' : '';

								$ass_data = $ass_date . $ass_details . $ass_pdf . $external_link;
								
								echo '<div class="col-md-4">
										<div class="nl-item">
											<h3 class="fs-36 fw-600">'.$ass_title.'</h3>
											'.$ass_data.'
										</div>
									</div>';
								
							}
							// Reset the post data
							wp_reset_postdata();
						} else {
							// No posts found
							echo 'No posts found.';
						}
					}
				?>
				
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();