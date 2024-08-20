<?php 
/* Template Name: My Account Page */ 
get_header(); 

//get upcoming events
$today = date('Ymd');
$args = array(
    'post_type' => 'events',
    'numberposts ' => 2,
    'posts_per_page ' => '2',
    'meta_key' => 'event_participation_period',
    'meta_query' => array(
        array(
            'key' => 'event_participation_period',
            'value' => $today,
            'compare' => '>'
        )
    ),
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
);
$events = get_posts($args);

$oldargs = array(
    'post_type' => 'events',
    'numberposts ' => 5,
    'posts_per_page ' => '5',
    'meta_key' => 'event_participation_period',
    'meta_query' => array(
        array(
            'key' => 'event_participation_period',
            'value' => $today,
            'compare' => '<'
        )
    ),
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
);
$oldevents = get_posts($oldargs);

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
	
$user = wp_get_current_user();
$roles = ( array ) $user->roles;

$appliyargs = array(
    'post_type' => 'applications',
    'numberposts ' => -1,
    'meta_key' => 'applicant',
    'meta_query' => array(
        array(
            'key' => 'applicant',
            'value' => $user->ID,
            'compare' => '='
        )
    ),
    'orderby' => 'id',
    'order' => 'DESC'
);
$eventsApply = get_posts($appliyargs);
$eventIdArr = array();
if($eventsApply){
	foreach($eventsApply as $ev){
		$eventIdArr[] = get_post_meta($ev->ID,'event',true);
	}
}

if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
?>

<section class="section my-account-bg">
	<!--Rahul sharma Ui Start-->
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-8">
				<!-- <div class="custom_gallery">
					<div class="gallery_heading">
						<h4>Gallery</h4>
					</div>
					<div class="row gallery-img mt-3 mb-3">
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
						<div class="col-2">
							<div class="custom-img">
								<img src="<?=get_stylesheet_directory_uri()?>/assets/img/Partner-Enablement-img-1.jpg" class="img-fluid">
							</div>
						</div>
					</div>
					<div class="gallery-input">
						<div class="file-input">
							<input type="file" name="file-input" id="file-input" class="file-input__input" />
							<label class="file-input__label" for="file-input">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload"
									class="svg-inline--fa fa-upload fa-w-16" role="img"
									xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor"
										d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
									</path>
								</svg>
								<span>Chooes File</span></label>
						</div>
						<div class="img-upload-btn">
							<button type="button" class="upload-btn">Upload</button>
						</div>
					</div>
				</div> -->

				<div class="row account-info-txt">
					<div class="col-sm-3 col-6">
						<div class="ic-text-bx">
							<a href="<?=home_url()?>/my-accounts/students">
								<div class="bx-icon">
									<img src="<?=get_stylesheet_directory_uri()?>/assets/img/student-ic.jpg" class="img-fluid">
								</div>
								<div class="bx-content">
									<h5>Students</h5>
									<h6><?=count( get_users( array( 'role' => 'student' ) ) )?></h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="ic-text-bx">
							<a href="<?=home_url()?>/my-accounts/teachers">
								<div class="bx-icon">
									<img src="<?=get_stylesheet_directory_uri()?>/assets/img/teachers-ic.jpg" class="img-fluid">
								</div>
								<div class="bx-content">
									<h5>Teachers</h5>
									<h6><?=count( get_users( array( 'role' => 'teacher' ) ) )?></h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="ic-text-bx">
							<a href="<?=home_url()?>/my-accounts/principals">
								<div class="bx-icon">
									<img src="<?=get_stylesheet_directory_uri()?>/assets/img/pricipal-ic.jpg" class="img-fluid">
								</div>
								<div class="bx-content">
									<h5>Principals</h5>
									<h6><?=count( get_users( array( 'role' => 'principal' ) ) )?></h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3 col-6">
						<div class="ic-text-bx">
							<a href="<?=home_url()?>/my-accounts/events">
								<div class="bx-icon">
									<img src="<?=get_stylesheet_directory_uri()?>/assets/img/pricipal-ic.jpg" class="img-fluid">
								</div>
								<div class="bx-content">
									<h5>Events</h5>
									<h6><?=wp_count_posts( 'events' )->publish?></h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-6 mt-2"></div>
					<div class="col-sm-5 col-6 mt-2"></div>
					<div class="col-sm-3 col-6 mt-2">
						<div class="ic-text-bx" style="background: #faa61a;">
							<a href="<?=home_url()?>/my-accounts/add-event">
								<div class="bx-icon" >
									<!--<img src="<?=get_stylesheet_directory_uri()?>/assets/img/pricipal-ic.jpg" class="img-fluid">-->
								</div>
								<div class="bx-content">
									<h5 class="text-white">Create Event</h5>
								</div>
							</a>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-4">
				<div id="calendar" class="calendar">
					<div class="calendar-title">
						<div class="calendar-title-text"></div>
						<div class="calendar-button-group">
							<button id="prevMonth">&lt;</button>
							<button id="today">Today</button>
							<button id="nextMonth">&gt;</button>
						</div>
					</div>
					<div class="calendar-day-name">
						<div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thu</div>
						<div>Fri</div>
						<div>Sat</div>
					</div>
					<div class="calendar-dates"></div>
				</div>
			</div>
		</div>
		<div class="row mb_2">
			<!-- <div class="col-2">
				<div class="ic-text-bx">
					<a href="<?=home_url()?>/my-accounts/students">
						<div class="bx-icon">
							<img src="<?=get_stylesheet_directory_uri()?>/assets/img/student-ic.jpg" class="img-fluid">
						</div>
						<div class="bx-content">
							<h5>Students</h5>
							<h6><?=count( get_users( array( 'role' => 'student' ) ) )?></h6>
						</div>
					</a>
				</div>
			</div>
			<div class="col-2">
				<div class="ic-text-bx">
					<a href="<?=home_url()?>/my-accounts/teachers">
						<div class="bx-icon">
							<img src="<?=get_stylesheet_directory_uri()?>/assets/img/teachers-ic.jpg" class="img-fluid">
						</div>
						<div class="bx-content">
							<h5>Teachers</h5>
							<h6><?=count( get_users( array( 'role' => 'teacher' ) ) )?></h6>
						</div>
					</a>
				</div>
			</div>
			<div class="col-2">
				<div class="ic-text-bx">
					<a href="<?=home_url()?>/my-accounts/principals">
						<div class="bx-icon">
							<img src="<?=get_stylesheet_directory_uri()?>/assets/img/pricipal-ic.jpg" class="img-fluid">
						</div>
						<div class="bx-content">
							<h5>Principals</h5>
							<h6><?=count( get_users( array( 'role' => 'principal' ) ) )?></h6>
						</div>
					</a>
				</div>
			</div>
			<div class="col-2">
				<div class="ic-text-bx">
					<a href="<?=home_url()?>/my-accounts/events">
						<div class="bx-icon">
							<img src="<?=get_stylesheet_directory_uri()?>/assets/img/pricipal-ic.jpg" class="img-fluid">
						</div>
						<div class="bx-content">
							<h5>Events</h5>
							<h6><?=wp_count_posts( 'events' )->publish?></h6>
						</div>
					</a>
				</div>
			</div> -->
			<?php if($events){ ?>
			<div class="col-md-8">
				<div class="students-table">
					<div class="table-heading">
						<h5> Upcoming Event </h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Event/Activity</th>
								<th scope="col">Date</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($events as $ev){?>
								<tr>
									<td><?=$i?></td>
									<td><a href="<?php echo esc_url( get_permalink($ev->ID) ); ?>"><?=$ev->post_title?></a></td>
									<td><?=date('d',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?><sup><?=date('S',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?></sup> <?=date('F',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?> <?=date('Y',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?></td>

							  </tr>
							<?php $i++; } ?>
			 
							</tbody>
						  </table> 
					  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="upcoming-events">
					<div class="up-heading">
						<h4>Upcoming Events</h4>
					</div>
					<div class="events-date">
						<?php $dayArr = [];
						foreach($events as $ev){
							$dayArr[date('F',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))][] = (int)date('d',strtotime(get_post_meta($ev->ID,'event_participation_period',true)));
						?>
						<h3><?=date('d',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?><sup><?=date('S',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?></sup> <?=date('F',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?>: <span>XXXXXXXXXX</span></h3>
						<?php }
						?>
						<!--<h3>21<sup>th</sup> April: <span>XXXXXXXXXXXXXXXXXXXXX</span></h3>-->
					</div>
				</div>
			</div> 
			<?php } ?>
		</div>

		<div>
			<div class="students-table">
					<div class="table-heading">
						<h5> Previous  Event </h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Event/Activity</th>
								<th scope="col">Date</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($oldevents as $ev){?>
								<tr>
									<td><?=$i?></td>
									<td><a href="<?php echo esc_url( get_permalink($ev->ID) ); ?>"><?=$ev->post_title?></a></td>
									<td><?=date('d',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?><sup><?=date('S',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?></sup> <?=date('F',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?> <?=date('Y',strtotime(get_post_meta($ev->ID,'event_participation_period',true)))?></td>

							  </tr>
							<?php $i++; } ?>
																					 
							</tbody>
						  </table> 
					  </div>
				</div>
		</div>

	</div>
	<!--Rahul sharma Ui End-->
</section>
<?php if(!empty($dayArr)){
	foreach($dayArr as $d=>$k){
		if(is_array($k)){
			$dayArr[$d] = implode(',',$k);
		}
	}
	?>
	<script>
		var daysarr = '<?=json_encode(array_unique($dayArr));?>';
		var curmonth = '<?=date("F")?>';
	</script>
<?php } ?>
<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>

<?php } elseif( in_array( 'student' , $roles ) ){
		$user_info = get_userdata( get_current_user_id() );
		$today = date('Ymd');
		//print_r($eventIdArr);
		$eargs = array(
			'post_type' => 'events',
			'numberposts ' => -1,
			//'post__not_in' => $eventIdArr,
			'meta_key' => 'event_participation_period',
			'meta_query' => array(
				array(
					'key' => 'event_participation_period',
					'value' => $today,
					'compare' => '>'
				)/*,
				array(
					'key' => 'topics',
					'value' => array ( 'sports', 'nonprofit', 'community' ),
					'compare' => 'IN'
				)*/,
				array(
					'key' => 'particpants',
					'value' => sprintf(':"%s";', 'Students'),
					'compare' => 'LIKE'
				)
			),
			'orderby' => 'id',
			'order' => 'DESC'
		);
		$events = get_posts($eargs);

?>
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/all.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/datepicker.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" >
<section class="main-area edit-update-events">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="event-form-area">
					<div class="blue-heading">Student</div>
					

					<div class="event-form-inner custom-form-fields custom-sign-up">
						<div class="row d-flex justify-content-center align-items-center">
							<div class="col-md-4 text-center mb-5">
								<img src="<?=(get_user_meta($user_info->ID,'profile_pic',true)) ? wp_get_attachment_url( get_user_meta($user_info->ID,'profile_pic',true) ) : home_url().'/wp-content/uploads/2023/02/user-avatar.png'?>"
										alt="Avatar" class="img-fluid my-2" style="width: 100px;" />
							</div>
						</div>


						<form method="post" class="custom-reg-form custom-add-form-inner" id="customregform"  enctype="multipart/form-data" >
							<input type="hidden" name="old_fname" value="<?=$user_info->first_name?>">
							<input type="hidden" name="old_lname" value="<?=$user_info->last_name?>">
							<input type="hidden" name="old_gender" value="<?=get_user_meta($user_info->ID,'gender',true)?>">
							<input type="hidden" name="old_school" value="<?=get_user_meta($user_info->ID,'school',true) ?>">
							<input type="hidden" name="old_contact" value="<?=get_user_meta($user_info->ID,'contact_number',true) ?>">
							<div class="row">
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_fname" id="custom_fname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->first_name?>" placeholder="First Name" required>
								</div>
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_mname" id="custom_mname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=get_user_meta($user_info->ID,'middle_name',true)?>" placeholder="Middle Name">
								</div>
								<div class="col-sm-4 mb_2 ">
									<input type="text" name="custom_lname" id="custom_lname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->last_name?>" placeholder="Last Name" required>
								</div>
							</div>
							  
							  <div class="row">
								<div class="col-sm-4 mb_2">
									<input type="password" name="custom_pass"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" id="custom_pass" placeholder="******">
								</div>
								<div class="col-sm-4 mb_2">
									
									<input type="text" name="school_uid"  size="40" class="form-control" value="<?=get_user_meta($user_info->ID,'school_uid',true)?>" placeholder="Student ID" readonly>
									
								</div>
							
								<div class="col-sm-4 mb_2">
								  <select name="gender" required>
									<option value="">Gender</option>
									<option value="male" <?=(get_user_meta($user_info->ID,'gender',true)=='male') ? 'selected="selected"' : '' ?>>Male</option>
									<option value="female" <?=(get_user_meta($user_info->ID,'gender',true)=='female') ? 'selected="selected"' : '' ?>>Female</option>
									<option value="Do Not Wish To Disclose" <?=(get_user_meta($user_info->ID,'gender',true)=='Do Not Wish To Disclose') ? 'selected="selected"' : '' ?>>Do Not Wish To Disclose</option>
								</select>
								</div>
								

							  </div>
							  <div class="row">
								<!--<div class="col-sm-4 mb-3">
								  <input type="text" name="school_id" id="School" value="<?=get_user_meta($user_info->ID,'school',true)?>" placeholder="School" >
								</div>-->
								<div class="col-sm-6 mb_2">
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
								<div class="col-sm-6 mb-3" id="odiv" <?php if(!get_user_meta($user_info->ID,'other_school_name',true)) { ?> style="display:none;" <?php } ?> >
								  <input type="text"  id="other_school_name"  name="other_school_name" value="<?=get_user_meta($user_info->ID,'other_school_name',true)?>" placeholder="School Name">
								</div>
								<div class="col-sm-6 mb-3">
								  <input type="number" id="class_id"  min="1"  max="12" name="class_id" value="<?=get_user_meta($user_info->ID,'class_id',true)?>" placeholder="Class">
								</div>
								<div class="col-sm-6 mb-3">
								  <input type="text" id="section"  onkeydown="return /[a-z]/i.test(event.key)" name="section" value="<?=get_user_meta($user_info->ID,'section',true)?>" placeholder="Section">
								</div>
					
							  <!--<div class="row">
								
								<div class="col-sm-4 mb_2">
								  <select name="class_id" required>
									<option value="">Class</option>
									<?php if($class){ 
									foreach($class as $cl){
									?>
									<option value="<?=$cl->ID?>" <?=(get_user_meta($user_info->ID,'class_id',true)==$cl->ID) ? 'selected="selected"' : '' ?>><?=$cl->post_title?></option>
									<?php } }?>
								  </select>
								</div>
								<div class="col-sm-4 mb_2">
								  <select name="section" required>
									<option value="">Section</option>
									<option value="section A" <?=(get_user_meta($user_info->ID,'section',true)=='section A') ? 'selected="selected"' : '' ?>>Section A</option>
									<option value="section B" <?=(get_user_meta($user_info->ID,'section',true)=='section B') ? 'selected="selected"' : '' ?>>Section B</option>
									<option value="section C" <?=(get_user_meta($user_info->ID,'section',true)=='section C') ? 'selected="selected"' : '' ?>>Section C</option>
									<option value="section D" <?=(get_user_meta($user_info->ID,'section',true)=='section D') ? 'selected="selected"' : '' ?>>Section D</option>
								  </select>
								</div>
							</div>-->
					
								<div class="col-sm-6 mb_2">
								  <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Email ID" value="<?=$user_info->user_email?>" required>
								</div>
								
								
								<div class="col-sm-6 mb-3">
								  <input type="email" name="aternate_email" id="aternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Alternate Email ID" value="<?=$user_info->aternate_email?>" >
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone1"  name="phone_number" placeholder="Contact Number" value="<?=get_user_meta($user_info->ID,'contact_number',true)?>" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone2"  name="alter_phone_number" value="<?=get_user_meta($user_info->ID,'alternate_contact_number',true)?>"  placeholder="Alternate Contact Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								
								<div class="col-sm-6 mb_2">
								  <input type="email" name="newemail" id="newemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Change Primary Email ID" value="" >
								</div>
								<div class="col-sm-6 mb_2" id="otpdiv" style="display:none;">
								  <input type="text" maxlength="6" name="otp" id="otp" pattern="\d{6,6}" title="Enter OTP ex:123456"  placeholder="Enter OTP ex:123456" value="" >
								</div>
								
							</div> 
							<div class="row">
								

								<div class="col-sm-12 mb_2">
								  <div class="input-group custom-file-button custom-create-profile">
									<input type="file" name="profile_picture" class="form-control" id="inputGroupFile">
									<label class="input-group-text" for="inputGroupFile">Upload Profile Pic</label>
								  </div>
								  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
								</div>
							</div>

						<div class="custom-massage rerror mt-2 mb-3"></div>	
						<div class="row">
								<!--<div class="col-lg-6">
									<button type="button" class="btn btn-primary">	  
										Publish
									</button>
								</div>-->

								<div class="col-lg-12 text-center">
									<button type="submit" class="btn btn-warning float-right1 submit_custom_reg1">	  
										Update
									</button>
								</div>
						</div>
						<input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom_register_nonce'); ?>" />	
						<input type="hidden" name="action" value="edit_reg_data" />
						<input type="hidden" name="ID" value="<?=$user_info->ID?>" />
						<input type="hidden" name="old_profile" value="<?=get_user_meta($user_info->ID,'profile_pic',true)?>" />
						<input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url()?>/my-account" />
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<?php if($events){?>
				<div class="event-form-area scroll-event">
					<div class="blue-heading yellowBg theme-color">Upcoming Events</div>
					<div class="slider-area">
						<div class="slick-slider">
						<?php $i=1; foreach($events as $e) { ?>
						  <div class="element element-<?=$i?>" data-id="<?=$e->ID?>" >
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><img src="<?=get_the_post_thumbnail_url($e->ID,'full')?>" alt="<?=$e->post_title?>" /></a>
									</div>
									<div class="event-scroll-content">
										<h3><a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><?=$e->post_title?></a></h3>
										<p><?=wp_trim_words($e->post_content,25,'...')?></p>
										<?php if( !in_array($e->ID,$eventIdArr) ){ ?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning ParticipateBtn" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participate Now
											</button>
										</div>
										<?php } else {?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning disabled " disabled data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participated
											</button>
										</div>
										<?php }?>
									</div>
									
								</div>
							</div>
						  </div>
						<?php } ?>
							
						 <!--<div class="element element-1">
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<img src="<?=get_stylesheet_directory_uri()?>/assets/img/female-teacher.png" alt="" />
									</div>
									<div class="event-scroll-content">
										<h3>Good Practives Sharing Session</h3>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										<div class="mt-auto">
												<button type="button" class="btn btn-warning">	  
													Publish
												</button>
										</div>
									</div>
								</div>
							</div>
						  </div>-->	
						</div>
					<div class="merror text-center mb-3" style="position:relative;margin-bottom:10px;" ></div>	
					</div>
					
				</div>
				
				<?php } ?>
			</div>
		</div>
		<?php //if($eventsApply){ 
		?>
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>My Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Date</th>
								<th scope="col">Mode Of Event</th>
								<th scope="col">Participated</th>
								<th scope="col">Won</th>
								<th scope="col">Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventStatus = get_post_meta($evap->ID,'winning_status',true);
								?>
							  <tr>
								<td><?=$i?></td>
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title(get_post_meta($evap->ID,'event',true));?></a></td>
								<td><?=get_the_date( 'dS M Y', $evap->ID )?></td>
								<td><?=get_post_meta(get_post_meta($evap->ID,'event',true) , 'event_mode' , true);?></td>
								<td>Y</td>
								<td><?= (get_post_meta($evap->ID,'winners',true)=='Yes') ? 'Y' : 'N';?></td>
								<td>
									<?php if( get_post_meta($eventId,'event_participation_period',true) < date('Ymd')){
										if(get_post_meta($evap->ID,'winners',true)=='Yes'){?>
										<a href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('winner')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Winning Certificate</button></a>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } else{?>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } } else { ?>
										N/A
									<?php } ?>
								</td>
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		<?php //} 
		?>
		
	</div>
</section>

<?php } elseif( in_array( 'teacher' , $roles ) ){
		$user_info = get_userdata( get_current_user_id() );
		$today = date('Ymd');
		//print_r($eventIdArr);
		$eargs = array(
			'post_type' => 'events',
			'numberposts ' => -1,
			//'post__not_in' => $eventIdArr,
			'meta_key' => 'event_participation_period',
			'meta_query' => array(
				array(
					'key' => 'event_participation_period',
					'value' => $today,
					'compare' => '>'
				),/*,
				array(
					'key' => 'topics',
					'value' => array ( 'sports', 'nonprofit', 'community' ),
					'compare' => 'IN'
				)*/
				array(
					'key' => 'particpants',
					'value' => sprintf(':"%s";', 'Teachers'),
					'compare' => 'LIKE'
				)
			),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$events = get_posts($eargs);

?>
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/all.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/datepicker.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" >
<section class="main-area edit-update-events">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="event-form-area">
					<div class="blue-heading">Teacher</div>
					

					<div class="event-form-inner custom-form-fields custom-sign-up">
						<div class="row d-flex justify-content-center align-items-center">
							<div class="col-md-4 text-center mb-5">
									<img src="<?=(get_user_meta($user_info->ID,'profile_pic',true)) ? wp_get_attachment_url( get_user_meta($user_info->ID,'profile_pic',true) ) : home_url().'/wp-content/uploads/2023/02/user-avatar.png'?>"
										alt="Avatar" class="img-fluid my-2" style="width: 100px;" />
							</div>
						</div>


						<form method="post" class="custom-reg-form custom-add-form-inner" id="customregform"  enctype="multipart/form-data" >
							<input type="hidden" name="old_fname" value="<?=$user_info->first_name?>">
							<input type="hidden" name="old_lname" value="<?=$user_info->last_name?>">
							<input type="hidden" name="old_gender" value="<?=get_user_meta($user_info->ID,'gender',true)?>">
							<input type="hidden" name="old_school" value="<?=get_user_meta($user_info->ID,'school',true) ?>">
							<input type="hidden" name="old_contact" value="<?=get_user_meta($user_info->ID,'contact_number',true) ?>">
							<div class="row">
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_fname" id="custom_fname" onkeydown="return /[a-z]/i.test(event.key)"  value="<?=$user_info->first_name?>" placeholder="First Name" required>
								</div>
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_mname" id="custom_mname" onkeydown="return /[a-z]/i.test(event.key)"  value="<?=get_user_meta($user_info->ID,'middle_name',true)?>" placeholder="Middle Name">
								</div>
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_lname" id="custom_lname" onkeydown="return /[a-z]/i.test(event.key)"  value="<?=$user_info->last_name?>" placeholder="Last Name" required>
								</div>
							  </div>
							  
							  <div class="row">
								
								<div class="col-sm-4 mb_2">									
									<input type="text" name="school_uid" value="<?=get_user_meta($user_info->ID,'school_uid',true)?>"  size="40" class="form-control" placeholder="Teacher ID" readonly>									
								</div>
								
								<div class="col-sm-4 mb_2" >
								  <select name="gender" required>
									<option value="">Gender</option>
									<option value="male" <?=(get_user_meta($user_info->ID,'gender',true)=='male') ? 'selected="selected"' : '' ?>>Male</option>
									<option value="female" <?=(get_user_meta($user_info->ID,'gender',true)=='female') ? 'selected="selected"' : '' ?>>Female</option>
									<option value="Do Not Wish To Disclose" <?=(get_user_meta($user_info->ID,'gender',true)=='Do Not Wish To Disclose') ? 'selected="selected"' : '' ?>>Do Not Wish To Disclose</option>
								</select>
								</div>
								<!--<div class="col-sm-4 mb-3" >
								  <input type="text" name="school_id" id="School" value="<?=get_user_meta($user_info->ID,'school',true)?>" placeholder="School" >
								</div>-->
								<div class="col-sm-4 mb_2">
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
								<div class="col-sm-6 mb-3" id="odiv" <?php if(!get_user_meta($user_info->ID,'other_school_name',true)) { ?> style="display:none;" <?php } ?> >
								  <input type="text"  id="other_school_name"  name="other_school_name" value="<?=get_user_meta($user_info->ID,'other_school_name',true)?>" placeholder="School Name">
								</div>
								

							 
								<div class="col-sm-6 mb_2">
									<input type="password" name="custom_pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"  id="custom_pass" placeholder="******">
								</div>
								<div class="col-sm-4 mb-3" style="display:none">
								  <input type="hidden" min="1" max="12" id="class_id"  name="class_id" value="<?=get_user_meta($user_info->ID,'class_id',true)?>" placeholder="Class">
								</div>
								<div class="col-sm-4 mb-3" style="display:none">
								  <input type="hidden" id="section"  onkeydown="return /[a-z]/i.test(event.key)"  name="section" value="<?=get_user_meta($user_info->ID,'section',true)?>" placeholder="Section">
								</div>
				
							  <!--<div class="row">
								
								<div class="col-sm-4 mb_2">
								  <select name="class_id" required>
									<option value="">Class</option>
									<?php if($class){ 
									foreach($class as $cl){
									?>
									<option value="<?=$cl->ID?>" <?=(get_user_meta($user_info->ID,'class_id',true)==$cl->ID) ? 'selected="selected"' : '' ?>><?=$cl->post_title?></option>
									<?php } }?>
								  </select>
								</div>
								<div class="col-sm-4 mb_2">
								  <select name="section" required>
									<option value="">Section</option>
									<option value="section A" <?=(get_user_meta($user_info->ID,'section',true)=='section A') ? 'selected="selected"' : '' ?>>Section A</option>
									<option value="section B" <?=(get_user_meta($user_info->ID,'section',true)=='section B') ? 'selected="selected"' : '' ?>>Section B</option>
									<option value="section C" <?=(get_user_meta($user_info->ID,'section',true)=='section C') ? 'selected="selected"' : '' ?>>Section C</option>
									<option value="section D" <?=(get_user_meta($user_info->ID,'section',true)=='section D') ? 'selected="selected"' : '' ?>>Section D</option>
								  </select>
								</div>
							</div>-->
	
								<div class="col-sm-6 mb_2">
								  <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Email ID" value="<?=$user_info->user_email?>" required>
								</div>
								
								<div class="col-sm-6 mb-3">
								  <input type="email" name="aternate_email" id="aternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Alternate Email ID" value="<?=$user_info->aternate_email?>" >
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone1"  name="phone_number" placeholder="Contact number" value="<?=get_user_meta($user_info->ID,'contact_number',true)?>" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone2"  name="alter_phone_number" value="<?=get_user_meta($user_info->ID,'alternate_contact_number',true)?>"  placeholder="Alternate Contact Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								
								<div class="col-sm-6 mb_2">
								  <input type="email" name="newemail" id="newemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Change Primary Email ID" value="" >
								</div>
								<div class="col-sm-6 mb_2" id="otpdiv" style="display:none;">
								  <input type="text" maxlength="6" name="otp" id="otp" pattern="\d{6,6}" title="Enter OTP ex:123456"  placeholder="Enter OTP ex:123456" value="" >
								</div>
								
							</div>
							<div class="row">
								

								<div class="col-sm-12 mb_2">
								  <div class="input-group custom-file-button custom-create-profile">
									<input type="file" name="profile_picture" class="form-control" id="inputGroupFile">
									<label class="input-group-text" for="inputGroupFile">Upload Profile Pic</label>
								  </div>
								  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
								</div>
							</div>

						<div class="custom-massage rerror mt-2 mb-3"></div>	
						<div class="row">

								<div class="col-lg-12 text-center">
									<button type="submit" class="btn btn-warning float-right1 submit_custom_reg1">	  
										Update
									</button>
								</div>
						</div>
						<input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
						<input type="hidden" name="action" value="edit_reg_data" />
						<input type="hidden" name="ID" value="<?=$user_info->ID?>" />
						<input type="hidden" name="old_profile" value="<?=get_user_meta($user_info->ID,'profile_pic',true)?>" />
						<input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url()?>/my-account" />
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<?php if($events){?>
				<div class="event-form-area scroll-event">
					<div class="blue-heading yellowBg theme-color">Upcoming Event </div>
					<div class="slider-area">
						<div class="slick-slider">
						<?php $i=1; foreach($events as $e) { ?>
						  <div class="element element-<?=$i?>" data-id="<?=$e->ID?>" >
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><img src="<?=get_the_post_thumbnail_url($e->ID,'full')?>" alt="<?=$e->post_title?>" /></a>
									</div>
									<div class="event-scroll-content">
										<h3><a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><?=$e->post_title?></a></h3>
										<p><?=wp_trim_words($e->post_content,25,'...')?></p>
										
										<?php if( !in_array($e->ID,$eventIdArr) ){ ?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning ParticipateBtn" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participate Now
											</button>
										</div>
										<?php } else {?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning disabled " disabled data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participated
											</button>
										</div>
										<?php }?>
									</div>
									
								</div>
							</div>
						  </div>
						<?php } ?>
							
						</div>
					<div class="merror text-center mb-3" style="position:relative;margin-bottom:10px;" ></div>	
					</div>
					
				</div>
				
				<?php } ?>
			</div>
		</div>
		<?php //if($eventsApply){ 
		?>
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>My Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Date</th>
								<th scope="col">Mode Of Event</th>
								<th scope="col">Participated</th>
								<th scope="col">Won</th>
								<th scope="col">Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventStatus = get_post_meta($evap->ID,'winning_status',true);
								?>
							  <tr>
								<td><?=$i?></td> 
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title(get_post_meta($evap->ID,'event',true));?></a></td>
								<td><?=get_the_date( 'dS M Y', $evap->ID )?></td>
								<td><?=get_post_meta(get_post_meta($evap->ID,'event',true) , 'event_mode' , true);?></td>
								<td><?= (get_post_meta($evap->ID,'participated',true)=='Yes') ? 'Y' : 'Y';?></td>
								<td><?= (get_post_meta($evap->ID,'winners',true)=='Yes') ? 'Y' : 'N';?></td>
								<td>
									<?php if( get_post_meta($eventId,'event_participation_period',true) < date('Ymd')){
										if(get_post_meta($evap->ID,'winners',true)=='Yes'){?>
										<a href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('winner')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Winning Certificate</button></a>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } else{?>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } } else { ?>
										N/A
									<?php } ?>
								</td>
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>Students Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Student Applied</th>
								<th scope="col">Student Participated</th>
								<th scope="col">Winners</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventsAttendee   = get_posts('&post_type=applications&meta_key=event&meta_value='.$eventId);
								$event   = get_post( $eventId );
								$principal = 0;
								$teacher = 0;
								$student = 0;
								$winner = 0;
								foreach($eventsAttendee as $ap){
									$u_data = get_user_by( 'id', get_post_meta($ap->ID,'applicant' , true) );
									if( in_array('student', $u_data->roles) ){
										$student += 1;
										if( get_post_meta($ap->ID,'winners' ,true) =='Yes'){
											$winner += 1;
										}
									}elseif( in_array('teacher', $u_data->roles) ){
										$teacher += 1;
									}elseif( in_array('principal', $u_data->roles) ){
										$principal += 1;
									}
									
								}
								?>
							  <tr>
								<td><?=$i?></td>
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title($eventId);?></a></td>
								<td><?=$student;?></td>
								<td><?=get_post_meta($event->ID,'actual_participants',true)?></td>
								<td><?=$winner;?></td>
								
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		<?php //}
		?>
	</div>
</section>

<?php } elseif( in_array( 'principal' , $roles ) ){
		$user_info = get_userdata( get_current_user_id() );
		$today = date('Ymd');
		//print_r($eventIdArr);
		$eargs = array(
			'post_type' => 'events',
			'numberposts ' => -1,
			//'post__not_in' => $eventIdArr,
			'meta_key' => 'event_participation_period',
			'meta_query' => array(
				array(
					'key' => 'event_participation_period',
					'value' => $today,
					'compare' => '>'
				),
				array(
					'key' => 'particpants',
					'value' => sprintf(':"%s";', 'Principals'),
					'compare' => 'LIKE'
				)
			),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$events = get_posts($eargs);

?>
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/all.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/datepicker.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" >
<section class="main-area edit-update-events">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="event-form-area">
					<div class="blue-heading">Principal</div>
					

					<div class="event-form-inner custom-form-fields custom-sign-up">
						<div class="row d-flex justify-content-center align-items-center">
							<div class="col-md-4 text-center mb-5">
								<img src="<?=(get_user_meta($user_info->ID,'profile_pic',true)) ? wp_get_attachment_url( get_user_meta($user_info->ID,'profile_pic',true) ) : home_url().'/wp-content/uploads/2023/02/user-avatar.png'?>"
										alt="Avatar" class="img-fluid my-2" style="width: 100px;" />
							</div>
						</div>


						<form method="post" class="custom-reg-form custom-add-form-inner" id="customregform"  enctype="multipart/form-data" >
							<input type="hidden" name="old_fname" value="<?=$user_info->first_name?>">
							<input type="hidden" name="old_lname" value="<?=$user_info->last_name?>">
							<input type="hidden" name="old_gender" value="<?=get_user_meta($user_info->ID,'gender',true)?>">
							<input type="hidden" name="old_school" value="<?=get_user_meta($user_info->ID,'school',true) ?>">
							<input type="hidden" name="old_contact" value="<?=get_user_meta($user_info->ID,'contact_number',true) ?>">
							<div class="row">
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_fname" id="custom_fname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->first_name?>" placeholder="First Name" required>
								</div>
								<div class="col-sm-4 mb_2">
									<input type="text" name="custom_mname" id="custom_mname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=get_user_meta($user_info->ID,'middle_name',true)?>" placeholder="Middle Name">
								</div>
								<div class="col-sm-4 mb_2 ">
									<input type="text" name="custom_lname" id="custom_lname" onkeydown="return /[a-z]/i.test(event.key)" value="<?=$user_info->last_name?>" placeholder="Last Name" required >
								</div>
							  </div>
							  
							  <div class="row">
								
								<div class="col-sm-4 mb_2">
									<input type="text" name="school_uid" value="<?=get_user_meta($user_info->ID,'school_uid',true)?>"  size="40" class="form-control" placeholder="Principal ID" readonly >
									
								</div>
							
								<div class="col-sm-4 mb_2" >
								  <select name="gender" required>
									<option value="">Gender</option>
									<option value="male" <?=(get_user_meta($user_info->ID,'gender',true)=='male') ? 'selected="selected"' : '' ?>>Male</option>
									<option value="female" <?=(get_user_meta($user_info->ID,'gender',true)=='female') ? 'selected="selected"' : '' ?>>Female</option>
									<option value="Do Not Wish To Disclose" <?=(get_user_meta($user_info->ID,'gender',true)=='Do Not Wish To Disclose') ? 'selected="selected"' : '' ?>>Do Not Wish To Disclose</option>
								</select>
								</div>
								
								<!--<div class="col-sm-4 mb-3" >
								  <input type="text" name="school_id" id="School" value="<?=get_user_meta($user_info->ID,'school',true)?>" placeholder="School" >
								</div>-->
								<div class="col-sm-4 mb_2">
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
								<div class="col-sm-6 mb-3" id="odiv" <?php if(!get_user_meta($user_info->ID,'other_school_name',true)) { ?> style="display:none;" <?php } ?> >
								  <input type="text"  id="other_school_name"  name="other_school_name" value="<?=get_user_meta($user_info->ID,'other_school_name',true)?>" placeholder="School Name">
								</div>

								<div class="col-sm-6 mb_2">
									<input type="password" name="custom_pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
  title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" id="custom_pass" placeholder="******">
								</div>
								
								<div class="col-sm-4 mb-3" style="display:none">
								  <input type="hidden" min="1" max="12" id="class_id"  name="class_id" value="<?=get_user_meta($user_info->ID,'class_id',true)?>" placeholder="Class">
								</div>
								<div class="col-sm-4 mb-3" style="display:none">
								  <input type="hidden" id="section"  onkeydown="return /[a-z]/i.test(event.key)" name="section" value="<?=get_user_meta($user_info->ID,'section',true)?>" placeholder="Section">
								</div>

							  <!--<div class="row">
								<div class="col-sm-4 mb_2">
								  <select name="school_id" required>
									<option value="">School</option>
									<?php if($schools){ 
									foreach($schools as $sc){
									?>
									<option value="<?=$sc->ID?>" <?=(get_user_meta($user_info->ID,'school',true)==$sc->ID) ? 'selected="selected"' : '' ?>><?=$sc->post_title?></option>
									<?php } }?>
								  </select>
								</div>
								<div class="col-sm-4 mb_2">
								  <select name="class_id" required>
									<option value="">Class</option>
									<?php if($class){ 
									foreach($class as $cl){
									?>
									<option value="<?=$cl->ID?>" <?=(get_user_meta($user_info->ID,'class_id',true)==$cl->ID) ? 'selected="selected"' : '' ?>><?=$cl->post_title?></option>
									<?php } }?>
								  </select>
								</div>
								<div class="col-sm-4 mb_2">
								  <select name="section" required>
									<option value="">Section</option>
									<option value="section A" <?=(get_user_meta($user_info->ID,'section',true)=='section A') ? 'selected="selected"' : '' ?>>Section A</option>
									<option value="section B" <?=(get_user_meta($user_info->ID,'section',true)=='section B') ? 'selected="selected"' : '' ?>>Section B</option>
									<option value="section C" <?=(get_user_meta($user_info->ID,'section',true)=='section C') ? 'selected="selected"' : '' ?>>Section C</option>
									<option value="section D" <?=(get_user_meta($user_info->ID,'section',true)=='section D') ? 'selected="selected"' : '' ?>>Section D</option>
								  </select>
								</div>
							</div>-->

								<div class="col-sm-6 mb_2">
								  <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Email ID" value="<?=$user_info->user_email?>" required>
								</div>
								<div class="col-sm-6 mb-3">
								  <input type="email" name="aternate_email" id="aternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Alternate Email ID" value="<?=$user_info->aternate_email?>" >
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone1"  name="phone_number" placeholder="Contact number" value="<?=get_user_meta($user_info->ID,'contact_number',true)?>" required pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								<div class="col-sm-6 mb_2">
								  <input type="tel" id="phone2"  name="alter_phone_number" value="<?=get_user_meta($user_info->ID,'alternate_contact_number',true)?>"  placeholder="Alternate Contact Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number">
								</div>
								
								<div class="col-sm-6 mb_2">
								  <input type="email" name="newemail" id="newemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter valid email id ex: abc@example.com"  placeholder="Change Primary Email ID" value="" >
								</div>
								<div class="col-sm-6 mb_2" id="otpdiv" style="display:none;">
								  <input type="text" maxlength="6" name="otp" id="otp" pattern="\d{6,6}" title="Enter OTP ex:123456"  placeholder="Enter OTP ex:123456" value="" >
								</div>
								
							</div>
							<div class="row">
								

								<div class="col-sm-12 mb_2">
								  <div class="input-group custom-file-button custom-create-profile">
									<input type="file" name="profile_picture" class="form-control" id="inputGroupFile">
									<label class="input-group-text" for="inputGroupFile">Upload Profile Pic</label>
								  </div>
								  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
								</div>
							</div>

						<div class="custom-massage rerror mt-2 mb-3"></div>	
						<div class="row">

								<div class="col-lg-12 text-center">
									<button type="submit" class="btn btn-warning float-right1 submit_custom_reg1">	  
										Update
									</button>
								</div>
						</div>
						<input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
						<input type="hidden" name="action" value="edit_reg_data" />
						<input type="hidden" name="ID" value="<?=$user_info->ID?>" />
						<input type="hidden" name="old_profile" value="<?=get_user_meta($user_info->ID,'profile_pic',true)?>" />
						<input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url()?>/my-account" />
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<?php if($events){?>
				<div class="event-form-area scroll-event">
					<div class="blue-heading yellowBg theme-color">Upcoming Events</div>
					<div class="slider-area">
						<div class="slick-slider">
						<?php $i=1; foreach($events as $e) { ?>
						  <div class="element element-<?=$i?>" data-id="<?=$e->ID?>" >
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><img src="<?=get_the_post_thumbnail_url($e->ID,'full')?>" alt="<?=$e->ID?>" /></a>
									</div>
									<div class="event-scroll-content">
										<h3><a href="<?php echo esc_url( get_permalink($e->ID) ); ?>"><?=$e->post_title?></a></h3>
										<p><?=wp_trim_words($e->post_content,25,'...')?></p>
										
										<?php if( !in_array($e->ID,$eventIdArr) ){ ?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning ParticipateBtn" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participate Now
											</button>
										</div>
										<?php } else {?>
										<div class="mt_2">
											<button type="button" class="btn btn-warning disabled " disabled data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">	  
												Participated
											</button>
										</div>
										<?php }?>
									</div>
									
								</div>
							</div>
						  </div>
						<?php } ?>
							
						</div>
					<div class="merror text-center mb-3" style="position:relative;margin-bottom:10px;" ></div>	
					</div>
					
				</div>
				
				<?php } ?>
			</div>
		</div>
		<?php //if($eventsApply){ 
		?>
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>My Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Date</th>
								<th scope="col">Mode Of Event</th>
								<th scope="col">Participated</th>
								<th scope="col">Won</th>
								<th scope="col">Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventStatus = get_post_meta($evap->ID,'winning_status',true);
								?>
							  <tr>
								<td><?=$i?></td>
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title(get_post_meta($evap->ID,'event',true));?></a></td>
								<td><?=get_the_date( 'dS M Y', $evap->ID )?></td>
								<td><?=get_post_meta(get_post_meta($evap->ID,'event',true) , 'event_mode' , true);?></td>
								<td><?= (get_post_meta($evap->ID,'participated',true)=='Yes') ? 'Y' : 'Y';?></td>
								<td><?= (get_post_meta($evap->ID,'winners',true)=='Yes') ? 'Y' : 'N';?></td>
								<td>
									<?php if( get_post_meta($eventId,'event_participation_period',true) < date('Ymd')){
										if(get_post_meta($evap->ID,'winners',true)=='Yes'){?>
										<a href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('winner')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Winning Certificate</button></a>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } else{?>
										<a  href="<?=home_url()?>/my-account/generate-certificate?key=<?=base64_encode($eventId)?>&type=<?=base64_encode('participate')?>&status=<?=base64_encode($eventStatus)?>"><button type="button" class="btn-certificate">Participation Certificate</button></a>
										<?php } } else { ?>
										N/A
									<?php } ?>
								</td>
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>Teachers Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Teacher Applied</th>
								<th scope="col">Teacher Participated</th>
								<th scope="col">Winners</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventsAttendee   = get_posts('&post_type=applications&meta_key=event&meta_value='.$eventId);
								$event   = get_post( $eventId );
								$principal = 0;
								$teacher = 0;
								$student = 0;
								$winner = 0;
								foreach($eventsAttendee as $ap){
									$u_data = get_user_by( 'id', get_post_meta($ap->ID,'applicant' , true) );
									if( in_array('student', $u_data->roles) ){
										$student += 1;								
									}elseif( in_array('teacher', $u_data->roles) ){
										$teacher += 1;
										if( get_post_meta($ap->ID,'winners' ,true) =='Yes'){
											$winner += 1;
										}
									}elseif( in_array('principal', $u_data->roles) ){
										$principal += 1;
									}
									
								}
								?>
							  <tr>
								<td><?=$i?></td>
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title($eventId);?></a></td>
								<td><?=$teacher;?></td>
								<td><?=($teacher>=get_post_meta($event->ID,'actual_participants',true)) ? get_post_meta($event->ID,'actual_participants',true) : $teacher?></td>
								<td><?=$winner;?></td>
								
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		<div class="row students-table-main mt-5">
			<div class="col-12">
			  <div class="row mb-3">
		
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>Students Progress</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Events/Activity</th>
								<th scope="col">Student Applied</th>
								<th scope="col">Student Participated</th>
								<th scope="col">Winners</th>
							  </tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($eventsApply as $evap){
								$eventId = get_post_meta($evap->ID,'event',true);
								$eventsAttendee   = get_posts('&post_type=applications&meta_key=event&meta_value='.$eventId);
								$event   = get_post( $eventId );
								$principal = 0;
								$teacher = 0;
								$student = 0;
								$winner = 0;
								foreach($eventsAttendee as $ap){
									$u_data = get_user_by( 'id', get_post_meta($ap->ID,'applicant' , true) );
									if( in_array('student', $u_data->roles) ){
										$student += 1;
										if( get_post_meta($ap->ID,'winners' ,true) =='Yes'){
											$winner += 1;
										}
									}elseif( in_array('teacher', $u_data->roles) ){
										$teacher += 1;
									}elseif( in_array('principal', $u_data->roles) ){
										$principal += 1;
									}
									
								}
								?>
							  <tr>
								<td><?=$i?></td>
								<td><a href="<?php echo esc_url( get_permalink($eventId) ); ?>"><?=get_the_title($eventId);?></a></td>
								<td><?=$student;?></td>
								<td><?=get_post_meta($event->ID,'actual_participants',true)?></td>
								<td><?=$winner;?></td>
								
							  </tr>
							<?php $i++; } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		<?php //}
		?>
	</div>
</section>

<?php } ?>
<?php 
	get_footer(); 
?>