<?php
/* Template Name: Principal Registration */
session_start();
$_SESSION['role'] = "principal";
get_header();
?>

<main id="primary" class="site-main">
	<section class="section position-relative overflow-hidden registration-section">
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
					<h4 class="fs-40 fw-500 text-uppercase">CREATE ACCOUNT</h4>
				</div>
				<!--form name="form" method="post">
					<div class="form-wrap form-1 registration-form">
						<div class="input-wrap">
							<input class="form-input" id="first-name" type="text" name="first-name" placeholder="First Name">
						</div>
						<div class="input-wrap">
							<input class="form-input" id="middle-name" type="text" name="middle-name" placeholder="Middle Name">
						</div>
						<div class="input-wrap">
							<input class="form-input" id="last-name" type="text" name="last-name" placeholder="Last Name">
						</div>

						<div class="select-wrap gender-block">
							<select class="form-select" name="gender" id="gender-type">
								<option value="">Gender</option>
								<option value="Female">Female</option>
								<option value="Male">Male</option>
							</select>
						</div>
						
						<div class="blank-div"></div>
						<div class="blank-div"></div>

						<div class="input-wrap">
							<input class="form-input" id="school-name" type="text" name="school-name" placeholder="School Name">
						</div>

						<div class="select-wrap">
							<select class="form-select" name="class-name" id="class-name">
								<option value="">Class</option>
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</div>

						<div class="select-wrap">
							<select class="form-select" name="section-name" id="section-name">
								<option value="">Section</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
						</div>

						<div class="input-wrap">
							<input class="form-input" id="email-id" type="email" name="email-id" placeholder="Email ID">
						</div>

						<div class="input-wrap">
							<input class="form-input" id="contact-number" type="text" name="contact-number" placeholder="Contact Number">
						</div>

						<div class="input-wrap">
							<input class="form-input" id="alt-contact-number" type="text" name="alt-contact-number" placeholder="Alternate Contact Number">
						</div>
						
						<div class="upload-wrap upload-block">
							<input class="d-none" id="upload-profile-pic" name="upload-profile-pic" type="file"  value="">
							<label class="form-upload-file" for="upload-profile-pic">
								<span>Upload Profile Picture</span>
								<span class="form-file-upload-btn">Upload<i class="fa-solid fa-arrow-up-from-bracket"></i></span>
							</label>
						</div>
						
						<div class="blank-div"></div>
						
						<div class="submit-wrap">
							<input id="submit" type="submit" class="def-btn submit-btn" name="submit" value="CREATE ACCOUNT"> 
						</div>
						
						<div class="google-captcha">
							<img src="https://18.220.246.60/teep/wp-content/uploads/2022/09/captcha_01.png">
						</div>
					</div>
				</form --> 
				<?php echo do_shortcode("[user_registration_form id='535']"); ?>
				<div class="create-acc-wrap"><span>Once registered <a class="create-acc-link" href="https://18.220.246.60/teep/login/?user=principal&dashboard=principal-dashboard">Click here to login</a></span></div>
			</div>
		</div>
	</section>


	<?php /***  echo do_shortcode('[user_registration_form id="417"]');  **/ ?>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();