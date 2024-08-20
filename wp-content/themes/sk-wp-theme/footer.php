<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SK_WP_Theme
 */

?>
<style>
	@media only screen and (max-width: 768px) {
	.scl-list {
        display: flex;
        align-items: center;
        margin: -44px -35px 80px -25px;
    }
a.def-btn.btn-3, .def-btn.btn-3{
margin-top: 90px;
margin-right: -42px;
}
	}
	</style>

<footer id="colophon" class="site-footer">
	<div class="container-full">
		
		<div class="footer-content-wrap">
			<div class="row">
				<div class="col-md-10 col-10">
					<div class="footer-inn-1">
						<div class="footer-menu-wrap">
							<?php 
							if(has_nav_menu('footer-menu-1')){
								wp_nav_menu(array(
									"theme_location" => "footer-menu-1",
									"container" => false,
									'menu_class' 	=> 'footer-menu menu-1',
								));
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-2">
					<div class="footer-inn-2">
						<div class="scl-list">
<!-- 							<a class="scl-item" href="#" taeget="_blank"><i class="fa-brands fa-facebook-f"></i></a>
							<a class="scl-item" href="#" taeget="_blank"><i class="fa-brands fa-instagram"></i></a>
							<a class="scl-item" href="#" taeget="_blank"><i class="fa-brands fa-twitter"></i></a>
							<a class="scl-item" href="#" taeget="_blank"><i class="fa-brands fa-youtube"></i></a> 
					                                                                                                 -->
							<a class="scl-item" href="//www.linkedin.com/company/tata-education-excellence-program/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
							<a class="scl-item" href="//mail.google.com/mail/?view=cm&fs=1&tf=1&to=teep@tatasteel.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
						</div>
						<div class="btn-wrap">
							<a class="def-btn btn-3" href="<?php echo home_url(); ?>/sign-in/">Login</a>
						</div>
					</div>
				</div>
			</div>
			
		<!-- Footer Bar -->
			<div class="footer-bar">
				<div class="copyright-area">
					<h4>Copyright &copy; <?php echo date('Y'); ?> <span><?php echo bloginfo('name'); ?></span></h4>
				</div>
				<div class="footer-bar-menu">
					<?php 
					if(has_nav_menu('footer-menu-2')){
						wp_nav_menu(array(
							"theme_location" => "footer-menu-2",
							"container" => false,
							'menu_class' 	=> 'footer-menu menu-2',
						));
					}
					?>
				</div>
			</div>
		</div>
		
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
