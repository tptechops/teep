<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SK_WP_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if ( is_home() && ! is_front_page() ) {?>
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
			<div class="container">
		<?php
		if ( have_posts() ) :

			

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
