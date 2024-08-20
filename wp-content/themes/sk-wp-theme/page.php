<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SK_WP_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if ( !is_home() && ! is_front_page() ) {?>
		<section class="inn-banner type-1 position-relative">
			<div class="bg-wrap">
				<img src="<?php echo home_url(); ?>/wp-content/uploads/2022/11/TEEPLegacybannervision.jpg" alt="" class="bg-img">
				<div class="bg-overly" style="background-color: #007CC3; opacity: 1;"></div>
			</div>
			<div class="banner-content position-relative">
				<h1 class="fs-55 fw-700"><span><?php echo get_the_title(); ?></span></h1>
			</div>
		</section>
		<?php } ?>
		<section class="section">
			<div class="container" style="z-index:9;">
				<div class="row">
					<div class="col-sm-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
