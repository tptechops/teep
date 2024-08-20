<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SK_WP_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<script type="text/javascript">
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var home_url = '<?php echo home_url(); ?>';
		</script>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.min.css"  />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
		<style>
		.swal2-container{
			z-index:9999 !important;
		}
		.swal2-popup {
		  font-size: 1.9rem !important;
		}
		.edit-update-events .container , .my-account-bg .container {
			z-index:99 !important;
		}
		header.sticky {
			position: fixed;
			width: 100%;
			z-index: 99999;
		}
		#login h1{
			display:none;
		}
		#loginform p label {
			font-size: 16px;
		}
		#loginform p.submit{
			margin-top:10px!important;
			margin-bottom:10px!important;
			text-align: center;
		} 
		#authcode{
			width:100%;
		}
		#loginform .2fa-email-resend{
			text-align: center;
		}
		#loginform .button {
			display: inline-block;
			font-weight: 400;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			border: 1px solid transparent;
			padding: 07px 08px;
			font-size: 16px;
			line-height: 1.5;
			border-radius: 2px;
			width: 100%;
			transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		}
		#loginform .button-primary{
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
		}
		#loginform #backtoblog{
			display:none!important;
		}


		@media only screen and (max-width: 768px) {
			.navbar-light .navbar-toggler {
    color: rgba(0, 0, 0, .55);
    border-color: rgba(0, 0, 0, .1);
    position: relative;
    top: -51px;
    left: 36px;
}

	}
	@media only screen and (min-width: 768px) and (max-width: 1024px) {
	.navbar-light .navbar-toggler {
    color: rgba(0, 0, 0, .55);
    border-color: rgba(0, 0, 0, .1);
    position: relative;
    top: -51px;
    left: 36px;
		}
	}

		</style>
	</head> 

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sk-wp-theme' ); ?></a>

			<header id="masthead" class="site-header">
				<div class="container-full">
					<div class="header-row">
						<div class="brand-area">
							<div class="site-branding">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
								$sk_wp_theme_description = get_bloginfo( 'description', 'display' );
								if ( $sk_wp_theme_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $sk_wp_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div><!-- .site-branding -->
							<img class="brand-logo" src="<?php echo home_url(); ?>/wp-content/uploads/2023/02/lokooo.jpg" alt="">
						</div>

						<div class="nav-area">
							<div class="hamburger-menu"></div>
						
							<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'header-menu',
										'container'		=> true,
										'menu_id'       => 'primary-menu',
										'menu_class' 	=> 'nav-menu',
										'walker'         => new WPSE_78121_Sublevel_Walker
									)
								);
								?>
							</nav><!-- #site-navigation -->
							<nav class="navbar navbar-expand-lg navbar-light ">
       
            <a href="#" class="navbar-brand disabled" style="visibility:hidden;">Brand</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
				
				<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Story</a>
                        <div class="dropdown-menu">
                              <a href="https://18.220.246.60/teep/about-us/" class="dropdown-item">About Us</a>
                            <a href="https://18.220.246.60/teep/teep-legacy/" class="dropdown-item">TEEP Legacy</a>
                            <a href="https://18.220.246.60/teep/governance/" class="dropdown-item">Governance</a>
                            <a href="https://18.220.246.60/teep/jjie-award/" class="dropdown-item">JJIE Award</a>
                        </div>
                    </div>
				
				<div class="nav-item dropdown">
                        <a href="https://18.220.246.60/teep/what-we-do/" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">What We Do</a>
                        <div class="dropdown-menu">
                              <a href="https://18.220.246.60/teep/what-we-do/" class="dropdown-item">What We Do</a>
                              <a href="https://18.220.246.60/teep/program-pillars-2/" class="dropdown-item">Program Pillars</a>
                        </div>
                    </div>
				
                    <a href="https://18.220.246.60/teep/resources-2/" class="nav-item nav-link">Resources</a>
                    <a href="https://18.220.246.60/teep/our-impact/" class="nav-item nav-link">Impact</a>
                    <a href="https://18.220.246.60/teep/my-account/" class="nav-item nav-link">My Account</a>
                  	
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="sign-in" class="nav-item nav-link">Login</a>
                </div>
            </div>
       
    </nav>
						
						</div>
					</div>
				</div>
			</header><!-- #masthead -->
