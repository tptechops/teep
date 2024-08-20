<?php
/* Template Name: otp */
get_header();
?>

<main id="primary" class="site-main">
	<section class="section position-relative overflow-hidden otp-section">
		<div class="bg-wrap">
			<img class="bg-img" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/login_bg_img_01.png" alt="">
			<div class="bg-overly bg-E2F5FF opacity-0p9"></div>
		</div>
		<div class="container position-relative">
			<div class="form-block-1">
				<div class="image-wrap">
					<img class="logo-img-1" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/brand_logo_04_login.png" alt="">
				</div>
				<div class="form-title">
					<h4 class="fs-40 fw-500 text-uppercase color-1B69B3 mb-4">OTP VERIFICATION</h4>
					<h4 class="fs-25 fw-600 mb-3">Please enter the One-Time Password to verify  your account</h4>
					<p class="fs-16 fw-300">A One-Time Password has been sent to <span>+91-9910335251</span></p>
				</div>
				<form id="login1" name="form" action="<?php echo home_url(); ?>/login/" method="post">
					<div class="form-wrap form-1 otp-form">
						
						<div class="otp-input-wrap">
							<input class="otp" type="text" maxlength=1>
							<input class="otp" type="text" maxlength=1>
							<input class="otp" type="text" maxlength=1>
							<input class="otp" type="text" maxlength=1>
							<input class="otp" type="text" maxlength=1>
							<input class="otp" type="text" maxlength=1>
						</div>
						<div class="submit-wrap">
							<input id="submit" type="submit" class="def-btn submit-btn" name="submit" value="VALIDATE"> 
						</div>
						
						<div class="otp-issue">
							<input type="submit" class="otp-resend" name="submit" value="Resend One-Time Password">
							<a class="wrong-num" href="">Entered a Wrong Number?</a>
						</div>
					</div>
				</form>   

			</div>
		</div>
	</section>


	<?php /***  echo do_shortcode('[user_registration_form id="417"]');  **/ ?>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();