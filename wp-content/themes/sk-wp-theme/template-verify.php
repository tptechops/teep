<?php 
ob_start();
session_start();
/* Template Name: Verify Account test 2 fsafPage */ 
get_header();

//print_r($_SESSION);
?>
<section class="section my-account-bg add-drtails-main vr-account">
    <!--Rahul sharma Ui Start-->
    <div class="container">
      <div class="row add-drtails">
        <div class="col-lg-8 col-md-10 col-sm-12">
          <div class="back-btn mb-3">
            <a href="<?=home_url('/sign-in')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
          </div>
          <div class="custom-form-fields custom-sign-up">
            <div class="custom-reg-form custom-add-form-inner">
              <div class="custom-form-logo-tital">
                <div class="custom-form-logo">
                  <img src="<?=get_stylesheet_directory_uri()?>/assets/img/site-logo-1.png" class="img-fluid">
                </div>
                <div class="custom-form-tital">
                  <h4>OTP Verification</h4>
                  <h5>Please enter the One-Time Password to verify your account</h5>
                  <p>A One-Time Password has been sent to <?=(isset($_SESSION['form_data'])) ? $_SESSION['form_data']['email'] : ''?></p>
                </div>
                <form method="post" name="verifyotp" id="verifyotp" class="otp-form custom-varify">
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required>
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required> 
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required>
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required>
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required>
                  <input class="otp-field" type="text" name="opt-field[]" maxlength=1 required>
      
                  <!-- Store OTP Value -->
				  <div class="field-wrapper">
					<div id="google_recaptcha" style="margin-left: 27%;margin-top: 20px;"></div>
				  </div>
				  
                  <input class="otp-value" type="hidden" name="opt-value">
				  <div class="custom-massage rerror mb-3 mt-4"></div>	
                  <div class="custom-submit-btn">
                    <button type="submit" class="submit_custom_reg">Validate</button>
                  </div>
				  <input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
				  <input type="hidden" name="action" value="match_otp_data" />
				  <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/sign-in')?>" />
                  <div class="resend-wrond-number mt-5">
                    <a href="javascript:void(0)" id="resendotp" class="resend-otp mb-2">Resend One-Time Password</a>
                    <a href="<?=home_url('/sign-up')?>" class="wrong-number">Entered a Wrong Email?</a>
                  </div>
                </form>
              </div>
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
