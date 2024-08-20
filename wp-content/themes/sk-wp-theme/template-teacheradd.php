<?php 
	/* Template Name: My Account Teacher Add Page */ 
	get_header(); 
	
	$schools = get_posts([
	  'post_type' => 'schools',
	  'post_status' => 'publish',
	  'numberposts' => -1,
	  'orderby'=> 'title', 
	  'order'    => 'ASC'
	]);

	$class = get_posts([
	  'post_type' => 'classes',
	  'post_status' => 'publish',
	  'numberposts' => -1,
	  'orderby'=> 'title', 
	  'order'    => 'ASC'
	]);
?> 
<section class="section my-account-bg add-drtails-main">
    <!--Rahul sharma Ui Start-->
    <div class="container">
      <div class="row add-drtails">
        <div class="col-lg-8 col-md-10 col-sm-12">
          <div class="back-btn mb-3">
            <a href="<?=home_url('/my-account/teachers')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
          </div>
          <div class="custom-form-fields custom-sign-up">
            <form method="post" class="custom-reg-form custom-add-form-inner" id="customregform"  enctype="multipart/form-data" >
              <div class="custom-form-logo-tital">
                <!--<div class="custom-form-logo">
                  <img src="<?=get_stylesheet_directory_uri()?>/assets/img/site-logo-1.png" class="img-fluid">
                </div>-->
                <div class="custom-form-tital edit-std">
                  <h4>Add Teacher</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_fname" id="custom_fname" onkeydown="return /[a-z]/i.test(event.key)" placeholder="First Name" required>
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_mname" id="custom_mname" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Middle Name">
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_lname" id="custom_lname" onkeydown="return /[a-z]/i.test(event.key)" placeholder="Last Name" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <select name="gender" required>
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
					<option value="Do Not Wish To Disclose">Do Not Wish To Disclose</option>
                </select>
                </div>
				<div class="col-sm-4 mb-3">
                    <input type="password" name="custom_pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" id="custom_pass" placeholder="password" required>
					<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;    margin-top: 10px;    position: absolute;"></i>
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="password" name="custom_pass_confirm"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" id="custom_pass_confirm" placeholder="Confirm Your Password" required>
					<i class="far fa-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer;    margin-top: 10px;    position: absolute;"></i>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <select name="school_id" id="school_id" required>
                    <option value="">School</option>
					<?php if($schools){ 
					foreach($schools as $sc){
					?>
                    <option value="<?=$sc->ID?>"><?=$sc->post_title?></option>
					<?php } }?>
					<option value="others" >Others</option>
                  </select>
                </div>
				<div class="col-sm-4 mb-3" id="odiv"  style="display:none;"  >
                  <input type="text"  id="other_school_name"  name="other_school_name" value="" placeholder="School Name">
                </div>
                <!--<div class="col-sm-4 mb-3">
                  <select name="class_id" required>
                    <option value="">Class</option>
                    <?php if($class){ 
					foreach($class as $cl){
					?>
                    <option value="<?=$cl->ID?>"><?=$cl->post_title?></option>
					<?php } }?>
                  </select>
                </div>
                <div class="col-sm-4 mb-3">
                  <select name="section" required>
                    <option value="">Section</option>
                    <option value="section A">Section A</option>
                    <option value="section B">Section B</option>
                    <option value="section C">Section C</option>
                    <option value="section D">Section D</option>
                  </select>
                </div>
				
				<div class="col-sm-4 mb-3" >
                  <input type="text" name="school_id" id="School"  placeholder="School" >
                </div>-->
                <div class="col-sm-4 mb-3" style="display:none">
                  <input type="number" id="class_id" min="1" max="12"  name="class_id" placeholder="Class">
                </div>
                <div class="col-sm-4 mb-3" style="display:none">
                  <input type="text" id="section"  onkeydown="return /[a-z]/i.test(event.key)" name="section" placeholder="Section">
                </div>
				
                <div class="col-sm-4 mb-3">
                  <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Email ID" required>
                </div>
				<div class="col-sm-4 mb-3">
					<input type="email" name="aternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com" id="aternate_email" placeholder="Alternate Email ID">
				</div>
                <div class="col-sm-6 mb-3">
                  <input type="tel" id="phone1"  name="phone_number" placeholder="Contact number" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                </div>
                <div class="col-sm-6 mb-3"> 
                  <input type="tel" id="phone2"  name="alter_phone_number" placeholder="Alternate Contact Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                </div>

                <div class="col-sm-8 mb-3">
                  <div class="input-group custom-file-button custom-create-profile">
                    <input type="file" name="profile_picture" class="form-control" id="inputGroupFile">
                    <label class="input-group-text" for="inputGroupFile">Upload Profile Pic</label>
                  </div>
                  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
                </div>
              </div>
			  <input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
			  <input type="hidden" name="action" value="add_reg_data" />
			  <input type="hidden" name="register_as" value="teacher" />
			  <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/my-account/teachers')?>" />
			  <div class="custom-massage rerror"></div>			
              <div class="custom-submit-btn mt-5">
                <button type="submit" class="submit_custom_reg">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Rahul sharma Ui End-->
  </section>
<?php 
	get_footer(); 
?>