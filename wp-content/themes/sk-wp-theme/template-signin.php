<?php 
/* Template Name: Sign In Page */ 
get_header(); 

?> 

<section class="section custom-sign">
	<div class="bg-wrap">
		<img class="bg-img" src="<?=home_url()?>/wp-content/uploads/2022/07/login_bg_img_01.png" alt="">
		<div class="bg-overly bg-E2F5FF opacity-0p9"></div>
	</div>
	<!--Rahul sharma Ui Start-->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="custom-logo">
					<img src="<?=get_stylesheet_directory_uri()?>/assets/img/teeplogonew1.jpg" class="img-fluid">
				</div>
			</div>
			<div class="col-md-6">
				<div class="sign-in-form">
					<div class="custom-heading">
						<h5>Log in</h5>
					</div>
					<div class="custom-form-fields">
						<form method="post" class="custom-login-form" id="customloginform" style="display:block">
							<p>
								<label for="custom-user"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/user-ic.png" class="img-fluid"></label>
								<input type="text" name="custom_user" id="custom-user" placeholder="Email ID" required >
							</p>
							<p>
								<label for="custom-pass"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/pack-lock-ic.png" class="img-fluid"></label>
								<input type="password" name="custom_pass" id="custom_pass" placeholder="Password" required>
								<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
							</p>
							
							<p class="field-wrapper">
								<div id="google_recaptcha" style="margin-left:0px;"></div>
							</p>
							<div class="custom-rem-lost">
								<p>
									<label for="remember-me" data-dashlane-label="true">
									<input type="checkbox" name="remember_me" id="remember-me" >Remember Me </label>
								</p>
								<p>
									<a href="<?=home_url()?>/forgot-password/">Forgot Password</a>
								</p>
							</div>
							<div class="custom-massage rerror">
								<!--<p>Incorrect password</p>-->
							</div>
							<p>
								<input type="hidden" name="custom_login_nonce" value="<?php echo wp_create_nonce('custom-login-nonce'); ?>" />
								<input type="hidden" name="action" value="get_login_data" />
								<!-- <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/my-account')?>" /> -->
								<div class="custom-submit-btn">
								<input type="submit" name="submit_custom_login" class="submit_custom_login" value="Login" data-dashlane-rid="6232a12da16de1bd" data-form-type="action,login"data-kwimpalastatus="dead">
							</div>
							</p>
							<p>
								<div class="create-account">
									<a href="<?=home_url()?>/sign-up" class="create-account-link">Not registered? Create an account</a>
								</div>
							</p>
						</form>


						<form method="post" name="verifyotp_login" id="verifyotp_login" class="otp-form custom-login-varify" style="display:none">
    <p class="otp_field" style="margin-bottom: 30px;">
        <label for="custom-otp"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/pack-lock-ic.png" class="img-fluid"></label>
        <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
    </p>
    <div class="custom-massage rerror">
        <!--<p>Incorrect password</p>-->
    </div> 
    <p>
        <input type="hidden" name="custom_login_nonce" value="<?php echo wp_create_nonce('custom-login-nonce'); ?>" />
        <input type="hidden" name="action" value="get_login_data" />
        <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/my-account')?>" />
    </p>
    <div class="custom-submit-btn">
        <input type="submit" name="submit_custom_otp_login" class="submit_custom_otp_login" value="OTP Verify">
    </div>
    <div class="resend-wrond-number mt-5">
        <a href="javascript:void(0)" id="resendotp_login" class="resend-otp mb-2">Resend One-Time Password</a>
    </div>
</form>

					</div> 
				</div>
			</div>
		</div>
	</div>
	<!--Rahul sharma Ui End-->
</section>

<?php 
	get_footer();  
?>