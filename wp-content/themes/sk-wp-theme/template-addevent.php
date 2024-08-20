<?php 
	/* Template Name: My Account Event Add Page */ 
	get_header(); 
	
?>

<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/all.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/datepicker.css" >	
<link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" >
<section class="main-area edit-update-events">
	<div class="container">
	<div class="back-btn mb-3" style="position:relative;z-index:999">
		<a href="<?=home_url('/my-account/events')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
	  </div>
		<div class="row">
			
			<div class="col-lg-6">
				<div class="event-form-area">
					<div class="blue-heading">New Event</div>
					<div class="event-form-inner">
						<form method="post" class="" id="eventForm"  enctype="multipart/form-data" >
						  <div class="row">
							  <div class="col-12">
								  <div class="form-group">
									<label class="form-label">Name of Event</label>
									<input type="text" name="title" class="form-control" required>
								  </div>
							  </div>
						  </div>

						  <div class="row">
							  <div class="col-12">
								  <div class="form-group">
									<label class="form-label">Description</label>
									<textarea name="description" class="form-control"></textarea>
								  </div>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-6">
								  <div class="form-group">
									<label class="form-label">Event Date & Time</label>
									<input type="date" name="event_participation_period"  class="form-control inputdate" required>
								  </div>
							  </div>
							  <div class="col-6">
								  <div class="form-group align-content-ends">
									<div class="icon-form-group" style="margin-top: 10%;">
										<input type="time" name="event_participation_period_time" class="form-control">
									</div>
								  </div>
							  </div>
						  </div>

						  <div class="row">
							  <div class="col-6">
								  <div class="form-group">
								  <label class="form-label">Event Participation Period</label>
									<div class="icon-form-group">
										<!--<i><img src="<?=get_stylesheet_directory_uri()?>/assets/img/calendar-icon.svg" alt="" /></i>-->
											<input type="date"  name="startdate" class="form-control inputdate" placeholder="Select Date" required>
									</div>
								  </div>
							  </div>

							  <div class="col-6" style="display:none;">
								  <div class="form-group align-content-ends">
									<div class="icon-form-group">
										<!--<i><img src="<?=get_stylesheet_directory_uri()?>/assets/img/clock-icon.svg" alt="" /></i>-->
											<input type="time" name="starttime" class="form-control">
									</div>
								  </div>
							  </div>
							  
							  <div class="col-6">
								  <div class="form-group">
								  <label class="form-label">&nbsp;</label>
									<div class="icon-form-group">
										<input type="date" name="enddate" class="form-control inputdate" placeholder="Last to Apply">
									</div>
								  </div>
							  </div>
							  
						  </div>	

						  <div class="row">
							  
							  <div class="col-6">
								<div class="form-group">
									<label class="form-label">Participants</label>
									 <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Students" id="status3" name="participants[]" checked>
									  <label class="form-check-label" for="status3">
										Student
									  </label>
									</div>
								  </div>

								  <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Teachers" name="participants[]" id="status4">
									  <label class="form-check-label" for="status4">
										Teacher
									  </label>
									</div>
								  </div>

								  <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Principals" name="participants[]" id="status5">
									  <label class="form-check-label" for="status5">
										Principal
									  </label>
									</div>
								  </div>
								  </div>

							  </div>
							  
							  <div class="col-6">
								  <div class="form-group align-content-end without-icon-right">
									<label class="form-label">Mode</label>
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Offline" name="mode" id="flexCheckDefault">
									  <label class="form-check-label" for="flexCheckDefault">
										Offline
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Online" name="mode" id="status2">
									  <label class="form-check-label" for="status2">
										Online
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="Hybrid" name="mode" id="hybrid" >
									  <label class="form-check-label" for="hybrid">
										Hybrid
									  </label>
									</div>
								  </div>
							  </div>
						  </div>	

						  <div class="row">
								<div class="col-12">
								  <div class="form-group align-content-ends without-icon-rights">
									  <div class="upload-btn-wrapper">
										  <button class="btn">
											  <img src="<?=get_stylesheet_directory_uri()?>/assets/img/upload-icon.svg" alt="" />
											  <span>Upload Image</span>
										  </button>
										  <input type="file" name="myfile" />
									  </div>
									  <span class="img-size-lmt">(Maximum Image size &lt; 300kb, Format supported: JPEG, JPG, PNG)</span>
								  </div>
							  </div>
							  
						  </div>	

						  <div class="row">
							  <!--<div class="col-6">
								  <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="status3">
									  <label class="form-check-label" for="status3">
										Student
									  </label>
									</div>
								  </div>

								  <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="status4">
									  <label class="form-check-label" for="status4">
										Teacher
									  </label>
									</div>
								  </div>

								  <div class="form-group">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="status5">
									  <label class="form-check-label" for="status5">
										Principal
									  </label>
									</div>
								  </div>
							  </div>-->

							  
						  </div>	

						  <div class="row">
							  <div class="col-12">
								  <div class="form-action-btns">
									<ul>
										<li style="opacity:0">
											<button type="button" class="transparent-btn">
												<img src="<?=get_stylesheet_directory_uri()?>/assets/img/link-icon.svg" alt="">
												Create Link
											</button>
										</li>
										<li style="opacity:0">
											<button type="button" class="transparent-btn">
												<img src="<?=get_stylesheet_directory_uri()?>/assets/img/share-icon.svg" alt="">
												Share
											</button>
										</li>
										<li>
											<div class="form-check">
											  <input name="notify" class="form-check-input" type="checkbox" value="Yes" id="statusNotification">
											  <label class="form-check-label" for="statusNotification">
												Enable Notification
											  </label>
											</div>
										</li>									
									</ul>
								  </div>
							  </div>
						  </div>

						  <div class="mini-heading">Other Details</div>

						  <!--<div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Terms & Conditions</label>
									<textarea class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>-->
						  <div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Objective of Events</label>
									<textarea name="objective" class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Expected outcomes</label>
									<textarea name="eventdescription" class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>
						  
						 
						  <div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Event Links and Other Details</label>
									<textarea name="links" class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Protocols to follow</label>
									<textarea name="protocols" class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>
						  
						   <div class="row">
							  <div class="col-12">
								  <div class="form-group big-textarea mb-4">
									<label class="form-label">Terms & Conditions</label>
									<textarea name="terms" class="form-control" placeholder="Add text here"></textarea>
								  </div>
							  </div>
						  </div>
						  
							<div class="custom-massage rerror"></div>			
						  <div class="btn-center">
								<button type="submit" class="btn btn-warning eventadd">	  
									Publish
								</button>
						  </div>

							<input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>" />
						  <input type="hidden" name="action" value="add_event_data" />
						  <input type="hidden" name="redirect_url" id="redirect_url" value="<?=home_url('/my-account/events')?>" />
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="event-form-area scroll-event">
					<div class="blue-heading yellowBg theme-color">Event Preview</div>
					<div class="slider-area">
						<div class="slick-slider">
						  <div class="element element-1">
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<img id="displayimg" src="<?=get_stylesheet_directory_uri()?>/assets/img/teacher.png" alt="" />
									</div>
									<div class="event-scroll-content">
										<h3 class="evetitle">Good Practives Sharing Session</h3>
										<p class="evedesc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										<div class="btn-center mt-4">
												<!--<button type="button" class="btn btn-warning">	  
													Publish
												</button>-->
										  </div>
									</div>
								</div>
							</div>
						  </div>
							
						  <!--<div class="element element-1">
						  	<div class="event-scroll">
								<div class="event-scroll-inner">
									<div class="event-scroll-img">
										<img src="<?=get_stylesheet_directory_uri()?>/assets/img/teacher.png" alt="" />
									</div>
									<div class="event-scroll-content">
										<h3>Good Practives Sharing Session</h3>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										<div class="btn-center mt-4">
												<button type="button" class="btn btn-warning">	  
													Publish
												</button>
										  </div>
									</div>
								</div>
							</div>
						  </div>-->	
						</div>
						
					</div>
					
					<div class="practice-label">
						<div class="practice-inner">
							<span class="evetitle">Good Practice Sharing</span>
							<span class="evedate">10th April 2022</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>

<?php 
	get_footer(); 
?>