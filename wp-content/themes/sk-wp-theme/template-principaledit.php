<?php 
	/* Template Name: My Account Principal Edit Page */ 
	get_header(); 
	$u_id = base64_decode($_GET['key']);
	$user_info = get_userdata( $u_id );
	
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
            <a href="<?=home_url('/my-account/principals')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
          </div>
          <div class="custom-form-fields custom-sign-up">
            <form method="post" class="custom-reg-form custom-add-form-inner" id="customregform"  enctype="multipart/form-data" >
              <div class="custom-form-logo-tital">
                <!--<div class="custom-form-logo">
                  <img src="<?=get_stylesheet_directory_uri()?>/assets/img/site-logo-1.png" class="img-fluid">
                </div>-->
                <div class="custom-form-tital edit-std">
                  <h4>Edit Principal</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_fname" id="custom_fname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->first_name?>" placeholder="First Name" required>
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_mname" id="custom_mname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=get_user_meta($user_info->ID,'middle_name',true)?>" placeholder="Middle Name">
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" name="custom_lname" id="custom_lname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->last_name?>" placeholder="Last Name" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <select name="gender" required>
                    <option value="">Gender</option>
                    <option value="male" <?=(get_user_meta($user_info->ID,'gender',true)=='male') ? 'selected="selected"' : '' ?>>Male</option>
                    <option value="female" <?=(get_user_meta($user_info->ID,'gender',true)=='female') ? 'selected="selected"' : '' ?>>Female</option>
					<option value="Do Not Wish To Disclose" <?=(get_user_meta($user_info->ID,'gender',true)=='Do Not Wish To Disclose') ? 'selected="selected"' : '' ?>>Do Not Wish To Disclose</option>
                </select>
                </div>
				<div class="col-sm-4 mb-3">
                    <input type="password" name="custom_pass"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"  id="custom_pass" placeholder="password">
					<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;    margin-top: 10px;    position: absolute;"></i>
                </div>

                <div class="col-sm-4 mb-3">
                  <select name="school_id" id="school_id" required>
                    <option value="">School</option>
					<?php if($schools){ 
					foreach($schools as $sc){
					?>
                    <option value="<?=$sc->ID?>" <?=(get_user_meta($user_info->ID,'school',true)==$sc->ID) ? 'selected="selected"' : '' ?>><?=$sc->post_title?></option>
					<?php } }?>
					<option value="others" <?=(get_user_meta($user_info->ID,'school',true)=='others') ? 'selected="selected"' : '' ?>>Others</option>
                  </select>
                </div>
				<div class="col-sm-4 mb-3" id="odiv" <?php if(!get_user_meta($user_info->ID,'other_school_name',true)) { ?> style="display:none;" <?php } ?> >
                  <input type="text"  id="other_school_name"  name="other_school_name" value="<?=get_user_meta($user_info->ID,'other_school_name',true)?>" placeholder="School Name">
                </div>
                <!--<div class="col-sm-4 mb-3">
                  <select name="class_id" required>
                    <option value="">Class</option>
                    <?php if($class){ 
					foreach($class as $cl){
					?>
                    <option value="<?=$cl->ID?>" <?=(get_user_meta($user_info->ID,'class_id',true)==$cl->ID) ? 'selected="selected"' : '' ?>><?=$cl->post_title?></option>
					<?php } }?>
                  </select>
                </div>
                <div class="col-sm-4 mb-3">
                  <select name="section" required>
                    <option value="">Section</option>
                    <option value="section A" <?=(get_user_meta($user_info->ID,'section',true)=='section A') ? 'selected="selected"' : '' ?>>Section A</option>
                    <option value="section B" <?=(get_user_meta($user_info->ID,'section',true)=='section B') ? 'selected="selected"' : '' ?>>Section B</option>
                    <option value="section C" <?=(get_user_meta($user_info->ID,'section',true)=='section C') ? 'selected="selected"' : '' ?>>Section C</option>
                    <option value="section D" <?=(get_user_meta($user_info->ID,'section',true)=='section D') ? 'selected="selected"' : '' ?>>Section D</option>
                  </select>
                </div>
				
				<div class="col-sm-4 mb-3" >
                  <input type="text" name="school_id" id="School" value="<?=get_user_meta($user_info->ID,'school',true)?>" placeholder="School" >
                </div>-->
                <div class="col-sm-4 mb-3" style="display:none">
                  <input type="hidden" max="12" min="1" id="class_id"  name="class_id" value="<?=get_user_meta($user_info->ID,'class_id',true)?>" placeholder="Class">
                </div>
                <div class="col-sm-4 mb-3" style="display:none">
                  <input type="hidden" id="section"  onkeydown="return /[a-z]/i.test(event.key)" name="section" value="<?=get_user_meta($user_info->ID,'section',true)?>" placeholder="Section">
                </div>
				
                <div class="col-sm-4 mb-3">
                  <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com" placeholder="Contact number" value="<?=$user_info->user_email?>" required>
                </div>
				<div class="col-sm-4 mb-3">
                  <input type="email" name="newemail" id="newemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com" placeholder="New Email ID" value="" >
                </div>
				<div class="col-sm-4 mb-3">
                  <input type="email" name="aternate_email" id="aternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com" placeholder="Alternate Email ID" value="<?=$user_info->aternate_email?>" >
                </div>
                <div class="col-sm-6 mb-3">
                  <input type="tel" id="phone1"  name="phone_number" placeholder="Mob. No" value="<?=get_user_meta($user_info->ID,'contact_number',true)?>" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                </div>
                <div class="col-sm-6 mb-3">
                  <input type="tel" id="phone2"  name="alter_phone_number" value="<?=get_user_meta($user_info->ID,'alternate_contact_number',true)?>"  placeholder="Alternate Contact Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number">
                </div>

                <div class="col-sm-8 mb-3">
                  <div class="input-group custom-file-button custom-create-profile">
                    <input type="file" name="profile_picture" class="form-control" id="inputGroupFile">
                    <label class="input-group-text" for="inputGroupFile">Upload Profile Pic</label>
                  </div>
                  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
				  <?php if( get_user_meta($user_info->ID,'profile_pic',true)  ){?>
				  <img class="mt-5" src="<?=wp_get_attachment_url( get_user_meta($user_info->ID,'profile_pic',true) )?>" height="100" width="100">
				  <?php } ?>
                </div>
              </div>
			  <input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
			  <input type="hidden" name="action" value="edit_reg_data" />
			  <input type="hidden" name="ID" value="<?=$user_info->ID?>" />
			  <input type="hidden" name="old_profile" value="<?=get_user_meta($user_info->ID,'profile_pic',true)?>" />
			  <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url()?>/my-account/edit-principal?key=<?=base64_encode($user_info->ID)?>" />
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