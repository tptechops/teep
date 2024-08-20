if(jQuery('#google_recaptcha').length>0){
	var onloadCallback = function() {
		grecaptcha.render('google_recaptcha', {
		  'sitekey' : '6LdLiUAnAAAAAH815gAfE8nlRrbW4Fbu5eZYiW12'
		});
	};
}
jQuery(function($){
// know more form name field validation
$('#contact-form-name').attr('pattern', '[A-Za-z ]{1,32}');

// know more form telephone field validation
$('#contact-form-phone').attr('pattern', '[0-9]{10}');

$(document).ready(function () {
	$(".team-item .team-item-inn").click(function () {
		$('body').css('overflow', 'hidden');  //ADD THIS
	});
	$(document).on('click', '.close-btn', function () {
		$('body').css('overflow', 'auto');  //ADD THIS
	});
});

//Login function
	$('#customloginform').on('submit', function(e) {
		e.preventDefault();
		var rcres = grecaptcha.getResponse();
		if (rcres.length) {
			// Validate the login credentials via AJAX
			// If login is successful, show the OTP verification form
			$.ajax({
				type: "post",
				dataType: "json",
				url: my_ajax_object.ajax_url,
				data: new FormData($(this)[0]),
				cache: false,
				processData: false,
				contentType: false,
				success: function(msg) {
					console.log(msg);
					$('.submit_custom_login').val('Login');
					$('.submit_custom_reg1').val('Login');
					if (msg == 5) {
						// Login success, show OTP verification form
						$('.rerror').html('<p style="color:green">Login Success!! Please check your email for the OTP.</p>');	
						$('.custom-login-form').hide();
						$('.custom-login-varify').show();
					} else if (msg == 2 || msg == 3 || msg == 4) {
						// Handle other responses accordingly
						$('.rerror').html('<p style="color:red">Error message here</p>');
						setTimeout(function() {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 8){
						$('.rerror').html('<p style="color:red">You reached the limit of max allowed otp. Try after 30 minutes later.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}
				},
				error: function(data) {
					// Handle AJAX errors
					console.log(data.status);
					if (data.status == 304 || data.responseText.includes('Configure 2FA')) {
						location.reload();
						return;
					}
					$('.submit_custom_login').val('Login');
					$('.submit_custom_reg1').val('Login');
					if (data.responseText.includes('html')) {
						$('.sign-in-form').html(data.responseText);
					} else {
						$('.rerror').html('<p style="color:red;font-weight:900;">' + data.responseText + '</p>');
					}
					setTimeout(function() {
						$('.rerror').empty('');
					}, 3000);
				}
			});
		} else {
			$('.rerror').html('<p style="color:red;font-weight:900;">Security captcha not validated!!</p>');
			setTimeout(function() {
				$('.rerror').empty('');
			}, 3000);
		}
	});

	$('#resendotp_login').on('click', function(e) {
        e.preventDefault(); 
        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'resend_otp_login'
            },
			success: function(response) {
				console.log(response);
				if (response === 5) {
					$('.rerror').html('<p>OTP has been resent successfully.</p>');
				} else if (response === 6) {
					$('.rerror').html('<p style="color:red">Failed to resend OTP. Please try again later.</p>');
				} else if (response === 7) {
					$('.rerror').html('<p style="color:red">User not found. Please try logging in again.</p>');
				} else if (response === 8) { 
					$('.rerror').html('<p style="color:red">Session data not found. Please try logging in again.</p>');
				} else if (response === 12) { 
					$('.rerror').html('<p style="color:red">You reached the limit of max allowed OTPs. Try again after 30 minutes.</p>');
				} else {
					$('.rerror').html('<p style="color:red">Unexpected response from the server.</p>');
				}
			},
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing your request. Please try again later.');
            }
        });
    });
	
	
	$('#verifyotp_login').on('submit', function(e) {
    e.preventDefault();
    var otp = $('#otp').val();
    $.ajax({
        type: "post",
        dataType: "json",
        url: my_ajax_object.ajax_url,
        data: {
            action: 'verify_otp',
            otp: otp
        },
        success: function(response) {
            console.log(response);
            if (response == 1) {
                // OTP verification successful, redirect to my-account
                window.location.href = $('#redirect_url').val();
            } else if (response == 0) {
                // OTP verification failed, display error message
                $('.rerror').html('<p style="color:red">Incorrect OTP. Please try again.</p>');
            } else {
                // Handle other response codes here if needed
                console.log('Unexpected response: ' + response);
            }
        },
        error: function(xhr, status, error) {
            console.log('Error occurred:', error);
            // Handle AJAX error here
        }
    });
});


	
	// user registration
	$('#customregform').on('submit',function(e){
		e.preventDefault();
// 		var rcres = grecaptcha.getResponse();
// 		if(rcres.length){
			$('.submit_custom_reg').val('Wait...');
			$('.submit_custom_reg1').text('Wait...');
			var newCustomerForm = new FormData($(this)[0]);
			$.ajax({
				type: "post",
				dataType: "json",
				url: my_ajax_object.ajax_url,
				data: newCustomerForm,
				cache: false,
				processData: false, 
				contentType: false,
				success: function(msg){
					//console.log(data);
					console.log(msg);
					$('.submit_custom_reg').val('Register');
					$('.submit_custom_reg1').text('Update');
					if(msg==1){
						if($('input[name="action"]').val()=='edit_reg_data'){
							$('.rerror').html('<p style="color:green">Record update Successfully!!</p>');
						}else{
							$('.rerror').html('<p style="color:green">Registration Success!!</p>');
						}
						
						setTimeout(function () {
							window.location.href = $('#redirect_url').val();
						}, 3000);
						//window.location.href = $('#redirect_url').val();
					}else if(msg == 2){
						$('.rerror').html('<p style="color:red">The password and confirm password you entered is incorrect.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 3){
						$('.rerror').html('<p style="color:red">The username you entered is already exist.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 4){
						$('.rerror').html('<p style="color:red">The email you entered is already exist.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 5){
						$('.rerror').html('<p style="color:red">The security toke mis matched.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 6){
						$('.rerror').html('<p style="color:red">Something wen wrong.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if( msg == 7 ){
						$('#otpdiv').show();
						$('#otp').attr('required',true);
						$('.rerror').html('<p style="color:green">An otp send to your registered email address.Please enter otp to continue.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3500);
					}else if( msg == 8 ){
						$('#otpdiv').show();
						$('#otp').attr('required',true);
						$('.rerror').html('<p style="color:red">Otp not match.Please enter correct otp.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3500);
					}else if( msg == 9 ){
						$('#otpdiv').show();
						$('#otp').attr('required',true);
						$('.rerror').html('<p style="color:red">Enter otp to continue.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3500); 
					}else if(msg == 11 || msg == 12 ){
						$('.rerror').html('<p style="color:red">You reached the limit of max allowed otp. Try after 30 minutes later.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}
				}, error: function(data){
					console.log(data);
					$('.submit_custom_reg').val('Register');
					$('.rerror').html('<p style="color:red;font-weight:900;">Something went wrong on our end!!</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}
			});
// 		}else{
// 			$('.rerror').html('<p style="color:red;font-weight:900;">Security captcha not validated!!</p>');
// 			setTimeout(function () {
// 				$('.rerror').empty('');
// 			}, 3000);
// 		}

	});
	
	// verify otp
	$('#verifyotp').on('submit',function(e){
		e.preventDefault();
		var rcres = grecaptcha.getResponse();
		if(rcres.length){
			grecaptcha.reset();
			$('.submit_custom_reg').text('Wait...');
			var newCustomerForm = new FormData($(this)[0]);
			$.ajax({
				type: "post",
				dataType: "json",
				url: my_ajax_object.ajax_url,
				data: newCustomerForm,
				cache: false,
				processData: false, 
				contentType: false,
				success: function(msg){
					console.log(my_ajax_object.ajax_url); 
					console.log(msg);
					$('.submit_custom_reg').text('Validate');
					if(msg==1){
						$('.rerror').html('<p style="color:green;font-weight:900;">Registration Success!!</p>');
						setTimeout(function () {
							window.location.href = $('#redirect_url').val();
						}, 3000);
						window.location.href = $('#redirect_url').val();
					}else if(msg == 2){
						$('.rerror').html('<p style="color:red;font-weight:900">Something wen wrong.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else if(msg == 11){
						$('.rerror').html('<p style="color:red">Request limit exceeded due to incorrect OTP attempts. Retry in 30 minutes.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}else{
						$('.rerror').html('<p style="color:red;font-weight:900">Otp you entered is incorrect.</p>');
						setTimeout(function () {
							$('.rerror').empty('');
						}, 3000);
					}
				}, error: function(data){
					console.log(data);
					$('.submit_custom_reg').text('Validate');
					$('.rerror').html('<p style="color:red;font-weight:900;">Something went wrong on our end!!</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}
			});
		}else{
			$('.rerror').html('<p style="color:red;font-weight:900;">Security captcha not validated!!</p>');
			setTimeout(function () {
				$('.rerror').empty('');
			}, 3000);
		}

	});
	
	$('#resendotp').on('click',function(e){
		e.preventDefault();
		$('.submit_custom_reg').text('Wait...');
		$.ajax({
			type: "post",
			dataType: "json",
			url: my_ajax_object.ajax_url,
			data: {action:'resend_otp'},
			success: function(msg){
				console.log(msg);
				$('.submit_custom_reg').text('Validate');
				if(msg==1){
					$('.rerror').html('<p style="color:green;font-weight:900;">Otp resent Successfully!!</p>');
					setTimeout(function () {
						//window.location.href = $('#redirect_url').val();
					}, 3000);
					//window.location.href = $('#redirect_url').val();
				}else if(msg==2 || msg==4 || msg ==11 || msg ==12) {
					$('.rerror').html('<p style="color:red;font-weight:900">You reached the maximum otp resend limit. Please try after 30 minutes!!</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}else{
					$('.rerror').html('<p style="color:red;font-weight:900">Something went wrong!!</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}
			}, error: function(data){
				console.log(data);
				$('.submit_custom_reg').text('Validate');
				$('.rerror').html('<p style="color:red;font-weight:900;">Something went wrong on our end!!</p>');
				setTimeout(function () {
					$('.rerror').empty('');
				}, 3000);
			}
		});

	});
	
	$('.updateStatus').on('click',function(e){
		e.preventDefault();
		//alert();
		$(this).find('i').removeClass('fa-save').addClass('fa-spinner');
		var btn = $(this);
		var thiId = $(this).attr('data-id');
		var inpval = $('#inp'+thiId).val();
		$.ajax({
			type: "post",
			dataType: "json",
			url: my_ajax_object.ajax_url,
			data: {action:'update_status' , aid:thiId , inpval:inpval},
			success: function(msg){
				console.log(msg);
				btn.find('i').removeClass('fa-spinner').addClass('fa-save');
			}, error: function(data){
				btn.find('i').removeClass('fa-spinner').addClass('fa-save');
			}
		});

	});
	
	$('.ParticipateBtn').on('click',function(e){
		e.preventDefault();
		var btn = $(this);
		$(this).text('Wait...');
		$(this).attr('disabled',true);
		$(this).removeClass('ParticipateBtn');
		var reurl = $(this).attr('data-url');
		var eid = $(this).attr('data-id');
		$.ajax({
			type: "post",
			dataType: "json",
			url: my_ajax_object.ajax_url,
			data: {action:'participate_now' , 'eid' : eid},
			success: function(msg){
				console.log(msg);
				btn.text('Participate');
				if(msg==1){
					$('.merror').html('<p style="color:green;font-weight:900;padding-bottom:20px;">Partcipated Successfully!!</p>');
					setTimeout(function () {
						window.location.href = reurl;
					}, 1200);

				}else{
					$('.merror').html('<p style="color:red;font-weight:900;padding-bottom:20px;">Something went wrong!!</p>');
					setTimeout(function () {
						$('.merror').empty('');
					}, 3000);
				}
			}, error: function(data){
				console.log(data);
				btn.text('Participate');
				$('.merror').html('<p style="color:red;font-weight:900;padding-bottom:20px;">Something went wrong on our end!!</p>');
				setTimeout(function () {
					$('.merror').empty('');
				}, 3000);
			}
		});
 
	});
	
	//add event
	// verify otp
	$('#eventForm').on('submit',function(e){
		e.preventDefault();
		$('.eventadd').text('Wait...');
		var newCustomerForm = new FormData($(this)[0]);
		$.ajax({
			type: "post",
			dataType: "json",
			url: my_ajax_object.ajax_url,
			data: newCustomerForm,
			cache: false,
            processData: false, 
            contentType: false,
			success: function(msg){
				console.log(msg);
				$('.eventadd').text('Publish');
				if(msg==1){
					$('.rerror').html('<p style="color:green;font-weight:900;">Event Added Successfully!!</p>');
					setTimeout(function () {
						window.location.href = $('#redirect_url').val();
					}, 3000);
					window.location.href = $('#redirect_url').val();
				}else if(msg == 12){
					$('.rerror').html('<p style="color:green;font-weight:900">Event Update Successfully!!</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}else if(msg == 123){
					$('.rerror').html('<p style="color:green;font-weight:900">Event Attendance Updated Successfully!!</p>');
					setTimeout(function () {
						window.location.href = $('#redirect_url').val();
					}, 3000);
				}else if(msg == 2){
					$('.rerror').html('<p style="color:red;font-weight:900">Something wen wrong.</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}else{
					$('.rerror').html('<p style="color:red;font-weight:900">Something wen wrong.</p>');
					setTimeout(function () {
						$('.rerror').empty('');
					}, 3000);
				}
			}, error: function(data){
				console.log(data);
				$('.eventadd').text('Publish');
				$('.rerror').html('<p style="color:red;font-weight:900;">Something went wrong on our end!!</p>');
				setTimeout(function () {
					$('.rerror').empty('');
				}, 3000);
			}
		});

	});
	
	//delete confirm
	$('.confirmIt').on('click',function(){
		var uri = $(this).attr('data-href');
		
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, do it!'
  
		  /*title: 'Are you sure?',
		  icon: 'question',
		  //showDenyButton: true,
		  showCancelButton: true,
		  confirmButtonText: 'Yes',
		  //denyButtonText: `Don't save`,*/
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
			//Swal.fire('Saved!', '', 'success');
			window.location.href = uri;
		  } else if (result.isDenied) {
			Swal.fire('Changes are not saved', '', 'info')
		  } 
		})
	});
	
	if($('#register_as').length>0){
		$('#register_as').on('change',function(){
			//alert();
			var userType = $(this).val();
			if(userType=='student' || userType=='' ){
				$('.rremove').show();
				//$('#phone1').attr('placeholder','Contact Number');
				//$('#email').attr('placeholder','Email ID *');
			}else if(userType=='teacher'){
				$('.rremove').hide();
				//$('#phone1').attr('placeholder','Mob. No');
				//$('#email').attr('placeholder','Email ID');
			}else if(userType=='principal'){
				$('.rremove').hide();
				//$('#phone1').attr('placeholder','Mob. No');
				//$('#email').attr('placeholder','Email ID');
				
			}
		});
		
	}
	if($('#school_id').length>0){
		$('#school_id').on('change',function(){
			var schoolType = $(this).val();
			if(schoolType=='others' ){
				$('#odiv').show();
				$('#other_school_name').val('');
				$('#other_school_name').attr('required',true);
			}else {
				$('#odiv').hide();
				$('#other_school_name').val('');
				$('#other_school_name').removeAttr('required');
			}
		});
		
	}
	if( $('#togglePassword1').length>0 || $('#togglePassword').length>0 ){
		if( $('#togglePassword').length>0){
			const togglePassword = document.querySelector('#togglePassword');
			  const password = document.querySelector('#custom_pass');

			  togglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});
		}
		if( $('#togglePassword1').length>0){
			const togglePassword1 = document.querySelector('#togglePassword1');
			  const password1 = document.querySelector('#custom_pass_confirm');

			  togglePassword1.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
				password1.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});
		}
	}

	
	if( $('.inputdate').length>0){
		var dtToday = new Date();
	 
		var month = dtToday.getMonth() + 1;
		var day = dtToday.getDate();
		var year = dtToday.getFullYear();
		if(month < 10)
			month = '0' + month.toString();
		if(day < 10)
		 day = '0' + day.toString();
		var maxDate = year + '-' + month + '-' + day;
		$('.inputdate').attr('min', maxDate);
	}
	
	$('.printMe').click(function(){
		window.print();
	});

	if($('.slick-slider').length>0){
		$('.datepicker').datepicker({
			autoclose: true
		});
		
		  $(".slick-slider").slick({
		   slidesToShow: 1,
		   infinite:false,
		   slidesToScroll: 1,
		   autoplay: true,
		   autoplaySpeed: 2000,
		   prevArrow:"<img class='slider-leftBtn control-c prev slick-prev' src='"+my_ajax_object.siteurl+"/assets/img/left-arrow.svg'>",
		   nextArrow:"<img class='slider-rightBtn control-c next slick-next' src='"+my_ajax_object.siteurl+"/assets/img/right-arrow.svg'>"

		});
		
		$('input[name="mode"]').on('change', function() {
		   $('input[name="mode"]').not(this).prop('checked', false);
		});
		$('input[name="title"]').on('input', function() {
		   $('.evetitle').text($(this).val());
		});
		$('textarea[name="description"]').on('input', function() {
		   $('.evedesc').text($(this).val());
		});
		$('input[name="event_participation_period"]').on('input', function() {
			let objectDate = new Date($(this).val());
			let day = objectDate.getDate();
			console.log(day); // 23

			//let month = objectDate.getMonth();
			//console.log(month + 1); // 8
			const month = objectDate.toLocaleString('default', { month: 'long' });

			let year = objectDate.getFullYear();
			console.log(year); // 2022
		   $('.evedate').text(day+' '+month+' '+year);
		});
		
		$('input[name="myfile"]').change(function(){
			const file = this.files[0];
			console.log(file);
			if (file){
			  let reader = new FileReader();
			  reader.onload = function(event){
				console.log(event.target.result);
				$('#displayimg').attr('src', event.target.result);
			  }
			  reader.readAsDataURL(file);
			}
		  });

	}
	if( $('#doughnut').length>0 ){ 
		var totalapplied = $('input[name="total_registration"]').val();
		var ac_participants = $('input[name="ac_participants"]').val();
		var new_participants = $('input[name="new_participants"]').val();
		var re_participants = $('input[name="re_participants"]').val();
		var winner = $('input[name="winner"]').val();
		
		var chartOptions = {
		  tooltipTemplate: "<%= value %>% ",
		  onAnimationComplete: function() {
			this.showTooltip(this.segments, true);
		  },
		  customTooltips: function(tooltip) {
			// Tooltip Element
			var tooltipEl = $('#chartjs-tooltip');
			// Hide if no tooltip
			if (!tooltip) {
			  tooltipEl.css({
				opacity: 1
			  });
			  return;
			}
			// Set caret Position
			tooltipEl.removeClass('above below');
			tooltipEl.addClass(tooltip.yAlign);
			tooltipEl.addClass(tooltip.xAlign);
			// Set Text
			tooltipEl.html(tooltip.text);
			// Find Y Location on page
			var top;
			if (tooltip.yAlign == 'above') {
			  top = tooltip.y - tooltip.caretHeight - tooltip.caretPadding;
			} else {
			  top = tooltip.y + tooltip.caretHeight + tooltip.caretPadding;
			}
			// Display, position, and set styles for font
			tooltipEl.css({
			  opacity: 1,
			  left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
			  top: tooltip.chart.canvas.offsetTop + top + 'px',
			  fontFamily: tooltip.fontFamily,
			  fontSize: tooltip.fontSize,
			  fontStyle: tooltip.fontStyle,
			  xOffset: tooltip.xOffset,
			});
		  },
		  // tooltipEvents: [],
		  tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
		  tooltipFillColor: "rgba(0,0,0,0.0)",
		  tooltipFontColor: "#505050",
		  tooltipFontSize: 34,
		  tooltipXOffset: 0,
		  tooltipXPadding: 0,
		  tooltipYPadding: 0,
		  legends: true,
		  // showTooltips: true,
		  segmentShowStroke: false,
		  percentageInnerCutout: 65,
		  animationEasing: "easeInOutQuart"
		}

		var data = [
			/*{
			value: Math.round(totalapplied/totalapplied*100),
				color: "#4771c4",
				label: "Total Participants"
			}, */{
				value: Math.round(ac_participants/totalapplied*100),
				color: "#ed7d34",
				label: "Actual Participants"
			}, {
				value: Math.round(new_participants/totalapplied*100),
				color: "#a5a5a5",
				label: "New Participants"
			}, {
				value: Math.round(re_participants/totalapplied*100),
				color: "#fdc100",
				label: "Repeat Participants"
			}, {
				value: Math.round(winner/totalapplied*100),
				color: "#5b9ad4",
				label: "Winner"
			}, ];
		//var doughnutChart = new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(data, chartOptions);
		//document.getElementById('doughnut-legend').innerHTML = doughnutChart.generateLegend();
		
		var ctx = document.getElementById("doughnut");
		var myChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
			labels: ['Participants'],
			datasets: [
				{
				  label: 'Total',
				  backgroundColor: "#4771c4",
				  data: [totalapplied]
				}, 
				{
				  label: 'Actual',
				  backgroundColor: "#ed7d34",
				  data: [ac_participants]
				}, 
				{
				  label: 'New',
				  backgroundColor: "#a5a5a5",
				  data: [new_participants]
				}, 
				{
				  label: 'Repeat',
				  backgroundColor: "#fdc100",
				  data: [re_participants]
				}, 
				{
				  label: 'Winner',
				  backgroundColor: "#5b9ad4",
				  data: [winner]
				}
			]
		  },

		  options: {
			legend: {
			  display: true,
			  position: 'bottom',
			  labels: {
				fontColor: "#000080",
			  }
			},
			scales: {
			  yAxes: [{
				ticks: {
				  beginAtZero: true
				}
			  }]
			}
		  }
		});
		document.getElementById('doughnut-legend').innerHTML = myChart.generateLegend();
		
	}
	//My account 
	if($('#calendar').length>0){
		let currentDate = dayjs();
		let daysInMonth = dayjs().daysInMonth();
		let firstDayPosition = dayjs().startOf("month").day();
		let monthNames = [
		  "January",
		  "February",
		  "March",
		  "April",
		  "May",
		  "June",
		  "July",
		  "August",
		  "September",
		  "October",
		  "November",
		  "December"
		];
		let dateElement = document.querySelector("#calendar .calendar-dates");
		let calendarTitle = document.querySelector(".calendar-title-text");
		let newMonth = null;

		function plotDays() {
		  count = 1;
		  dateElement.innerHTML = "";
		  console.log(daysInMonth);
		  for (let i = 0; i < daysInMonth; i++) {
			if (i < firstDayPosition) {
			  dateElement.innerHTML += `<button class="calendar-dates-day-empty"></button>`;
			} else {
			  dateElement.innerHTML += `<button class="calendar-dates-day">${count++}</button>`;
			}
		  }
		  for (let j = 0; j < firstDayPosition; j++) {
			dateElement.innerHTML += `<button class="calendar-dates-day">${count++}</button>`;
		  }
		  calendarTitle.innerHTML = `${
			monthNames[currentDate.month()]
		  } - ${currentDate.year()}`;
		}

		function highlightCurrentDate() {
		  console.log(currentDate.$D);
		  let dateElements = document.querySelectorAll(".calendar-dates-day");
		  if (dateElement) {
			for (i = 0; i <= dateElements.length; i++) {
			  if (i === currentDate.$D) {
				dateElements[i - 1].classList.add("today-date");
			  }
			}
		  }
		}
		
		function highlightFixDate( d ) {
		  //console.log(d);
		  let dateElements = document.querySelectorAll(".calendar-dates-day");
		  if (dateElement) {
			//for (i = 0; i <= dateElements.length; i++) {
				//console.log(i+' - '+ d.indexOf(i-1));
				console.log(d[0]+' comes'+'-'+dateElements.length)
				//if ( d.indexOf(i)> -1  ) {
				//if ( d.includes(i)  ) {
					//console.log(d+' comes'+'-'+i)
					//if(i>0){
						//d = (d==31) ? 31 : d;
						//dateElements[i].classList.add("today-date");
					//}else{
						//dateElements[i].classList.add("today-date");
					//}
					//dateElements[i - 1].classList.add("today-date");
				//}
			//}
			for (i = 0; i <= d.length; i++) {
				dateElements[d[i]-1].classList.add("today-date");
			}
		  } 
		}

		plotDays();
		setTimeout(function () {
		  //highlightCurrentDate();
		  daysarr = JSON.parse(daysarr);
		  //console.log(daysarr[curmonth]);
		  let myArray = daysarr[curmonth].split(",");
		  if(Array.isArray(myArray)){
			  myArray = myArray;
		  }else{
			  myArray = [myArray];
		  }
		  //for (i = 0; i <= myArray.length; i++) {
			highlightFixDate(myArray);
			//}
		  //highlightFixDate(daysarr[curmonth]);
		}, 50); 

		document.querySelector("#nextMonth").addEventListener("click", function () {
		  newMonth = currentDate.add(1, "month").startOf("month");
		  setSelectedMonth();
		});

		document.querySelector("#prevMonth").addEventListener("click", function () {
		  newMonth = currentDate.subtract(1, "month").startOf("month");
		  setSelectedMonth();
		});

		document.querySelector("#today").addEventListener("click", function () {
		  console.log(dayjs());
		  newMonth = dayjs();
		  setSelectedMonth();
		  setTimeout(function () {
			highlightCurrentDate();
		  }, 50);
		});

		function setSelectedMonth() {
			//console.log(monthNames[newMonth.month()]);
				
			daysInMonth = newMonth.daysInMonth();
			firstDayPosition = newMonth.startOf("month").day();
			currentDate = newMonth;
			plotDays();
			if( daysarr[monthNames[newMonth.month()]] ){
				let myArray = daysarr[monthNames[newMonth.month()]].split(",");
				if(Array.isArray(myArray)){
					  myArray = myArray;
				}else{
					myArray = [myArray];
				}
				console.log(myArray);
				
				highlightFixDate(myArray);
			} 
		}
	}
	
	
});

//sticky header
$(window).scroll(function() {
	if ($(this).scrollTop() > 0){  
		$('header').addClass("sticky");
	}else{
		$('header').removeClass("sticky");
	}
});
	
$(document).ready(function () {
$(".otp-form *:input[type!=hidden]:first").focus();
let otp_fields = $(".otp-form .otp-field"),
	otp_value_field = $(".otp-form .otp-value");
otp_fields
	.on("input", function (e) {
		$(this).val(
			$(this)
				.val()
				.replace(/[^0-9]/g, "")
		);
		let opt_value = "";
		otp_fields.each(function () {
			let field_value = $(this).val();
			if (field_value != "") opt_value += field_value;
		});
		otp_value_field.val(opt_value);
	})
	.on("keyup", function (e) {
		let key = e.keyCode || e.charCode;
		if (key == 8 || key == 46 || key == 37 || key == 40) {
			// Backspace or Delete or Left Arrow or Down Arrow
			$(this).prev().focus();
		} else if (key == 38 || key == 39 || $(this).val() != "") {
			// Right Arrow or Top Arrow or Value not empty
			$(this).next().focus();
		}
	})
	.on("paste", function (e) {
		let paste_data = e.originalEvent.clipboardData.getData("text");
		let paste_data_splitted = paste_data.split("");
		$.each(paste_data_splitted, function (index, value) {
			otp_fields.eq(index).val(value);
		});
	});
});


// Plans tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
