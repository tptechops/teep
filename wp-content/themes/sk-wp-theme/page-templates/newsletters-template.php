<?php
/* Template Name: Newsletters 
 * Template Post Type: asset_list
 * */
get_header();
?>

<main id="primary" class="site-main">

	<section class="inn-banner type-1 position-relative">
		<div class="bg-wrap">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/2022/11/TEEPLegacybannervision.jpg" alt="" class="bg-img">
			<div class="bg-overly" style="background-color: #007CC3; opacity: 1;"></div>
		</div>
		<div class="banner-content position-relative">
			<h1 class="fs-55 fw-700"><span><?php echo get_the_title(); ?></span></h1>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="section-title line-title" title="<?php echo get_the_title(); ?>">
				<h2 class="fs-50 fw-500"><?php echo get_the_title(); ?></h2>
			</div>
			
			<div class="row g-5 newsletter-list">
				
				<div class="col-md-4">
					<div class="nl-item">
						<h3 class="fs-36 fw-600">Excellence Ignite</h3>
						<h4 class="fs-14 fw-400 mt-3" style="color: #727272;">Apr 21 - Jun 21</h4>
						<p class="mt-4">Quarterly Newsletter from Tata Education Excellence Program (TEEP)</p>
						<a class="def-btn btn-1 mt-5" href="<?php echo home_url(); ?>/wp-content/uploads/2023/01/Excellence-Ignite_Vol.1.pdf" target="_blank">Download PDF</a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();