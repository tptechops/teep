<?php
/* Template Name: Our Legacy */
get_header();
?>
<style>
@media only screen and (max-width: 690px) {
    .lag-item:not(:last-child):after {
        content: "";
        position: absolute;
        width: 0;
        height: 94%;
        border-left: 2px dashed #fd9f00;
        top: 0;
        left: 50%;
        z-index: -1;
    }

    .lag-item {
        position: relative;
    }
}
</style>
<main>
    <section class="inn-banner our-team-bann">
        <div class="container">
            <div class="inn-bann-content">
                <h1 class="fs-55 fw-700 mb-4"><?php echo get_the_title(); ?></h1>
                <h3 class="fs-33 mt-3">TEEP is a story of deep impact and successful history</h3>
            </div>
        </div>
    </section>
    <section class="section lag-section">
        <div class="container">
            <div class="section-title line-title" title="<?php echo get_the_title(); ?>">
                <h2 class="fs-50 fw-500"><?php echo get_the_title(); ?></h2>
                <h4 class="fs-28 fw-400 mt-4">A legacy synonymous with change, empowerment, and excellence for all</h4>
            </div>
        </div>
        <div class="lag-list-wrap">
            <div class="container">
                <div class="row g-5 lag-list">

                    <?php
						$args = array(
							'post_type' => 'legacy_list',
							'order' => 'ASC',
							'posts_per_page' => -1,
						);

						$query = new  WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post();

						$lag_title = get_the_title();
						$lag_content = get_the_content();
						$arr_icon = home_url()."/wp-content/uploads/2023/01/down_arr_lag_01.png";

						echo '<div class="col-md-4 lag-item">
								<div class="lag-item-inn">
									<div class="lag-arr"><img class="lag-down-arr" src="'.$arr_icon.'" alt=""></div>
									<div class="lag-year-circle"><h4 class="fs-50 fw-600">'.$lag_title.'</h4></div>
									<div class="lag-content fs-18">'.$lag_content.'</div>
								</div>
							</div>';

						endwhile;
						wp_reset_query();
						?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
// get_sidebar();
get_footer();