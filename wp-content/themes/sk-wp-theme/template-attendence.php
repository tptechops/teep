<?php 
	/* Template Name: My Account Event Attendance Page */ 
	get_header(); 
	
	$eventId  = base64_decode($_GET['ekey']);
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
		}elseif( in_array('principal', $u_data->roles) ){
			$principal += 1;
		}
		if( get_post_meta($ap->ID,'winners' ,true) =='Yes'){
			$winner += 1;
		}
	}

?> 
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/all.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/datepicker.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" >
<section class="main-area edit-update-events">
	<div class="container">
		<div class="back-btn mb-3">
		<a href="<?=home_url('/my-account/events')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
	  </div>
		<div class="row">
			<div class="col-md-6">
				<div class="event-form-area">
					<div class="blue-heading">Event/Activity Report</div>
					<div class="event-form-inner">
						<form method="post" class="" id="eventForm"  enctype="multipart/form-data" >			
							<div class="form-group">
								<label class="form-label">Name of Event</label>
								<input type="text" name="title" class="form-control" value="<?=$event->post_title?>" placeholder="Workshop for school leadership on strategic planning">
							</div>
														
							<div class="form-group">
								<label class="form-label">Description</label>
								<textarea class="form-control" name="description" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry..."><?=$event->post_content?></textarea>
							</div>
							
							<div class="event-register">
								<div class="t-register">
									<h3>total registration</h3>
								</div> 
								<div class="amount"> 
									<input type="number" class="form-control" value="<?=count($eventsAttendee)?>" name="total_registration" placeholder="Total registration Ex: 1020" readonly>
								</div>
							</div>

							<div class="event-register">
								<div class="t-register">
									<h3>actual participants</h3>
								</div> 
								<div class="amount"> 
									<input type="number" class="form-control" value="<?=get_post_meta($event->ID,'actual_participants',true)?>" name="ac_participants" placeholder="Actual participants Ex: 733">
								</div>
							</div>

							<div class="event-register">
								<div class="t-register">
									<h3>new participants</h3>
								</div> 
								<div class="amount"> 
									<input type="number" class="form-control" value="<?=get_post_meta($event->ID,'new_participants',true)?>" name="new_participants" placeholder="New participants Ex: 90">
								</div>
							</div>

							<div class="event-register">
								<div class="t-register">
									<h3>repeat participants</h3>
								</div> 
								<div class="amount"> 
									<input type="number" class="form-control" value="<?=get_post_meta($event->ID,'repeat_participants',true)?>" name="re_participants" placeholder="Repeat participants Ex: 643">
								</div>
							</div>

							<div class="event-register">
								<div class="t-register">
									<h3>winner</h3>
								</div> 
								<div class="amount"> 
									<input type="number" class="form-control" name="winner" value="<?=$winner?>" placeholder="Winner Ex: 83" readonly>
								</div>
							</div>	
								<input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
								<input type="hidden" name="action" value="update_attendance_data" />
								<input type="hidden" name="eventid" value="<?=$event->ID?>" />
								<input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/my-account/attendance/?ekey='.base64_encode($event->ID))?>" />
								<br>
								<div class="custom-massage rerror mt-3 mb-3"></div>
								<div class="upload_share">
									<div class="upload-btn-wrapper">
										<button type="submit" class="btn">
											<div class="upload-img"> <img src="<?=get_stylesheet_directory_uri()?>/assets/img/upload-icon.svg" alt=""></div>
											<span>Update Report</span>
										</button>
										,<!--<input type="file" name="myfile">-->
									</div>

									<div style="opacity:0">
										<button type="button" class="transparent-btn">
											<img src="images/share-icon.svg" alt="">
											Share Feedback
										</button>
									</div>
								</div>
							
						  
												  					
						</form>
					</div>
				</div>
			</div>
			<?php if(count($eventsAttendee)>0){?>
			<div class="col-md-6">
				<div class="stud-pie-chart">
					<div class="title">
						<h2>Workshop for school leadership on strategic planning</h2>
					</div>
					<div class="st-details mt-4">

						<div class="mtd charts">
							<div>
							  <canvas id="doughnut" width="800" height="600"></canvas>
							</div>
							<div id="chartjs-tooltip"></div>
							<div id="doughnut-legend" class="chart-legend"></div>
						  </div>

					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
	</div>
</section>



<?php 
	get_footer(); 
?>