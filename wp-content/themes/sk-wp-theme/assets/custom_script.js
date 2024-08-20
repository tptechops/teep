$(document).ready(function(){

	// 	When Scroll to Section Area
	function visible(partial) {
		var $t = partial,
			$w = jQuery(window),
			viewTop = $w.scrollTop(),
			viewBottom = viewTop + $w.height(),
			_top = $t.offset().top,
			_bottom = _top + $t.height(),
			compareTop = partial === true ? _bottom : _top,
			compareBottom = partial === true ? _top : _bottom;

		return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));
	}


	$(window).scroll(function() {
		if($('.count-digit').length ){
			if (visible($('.count-digit'))) {
				if ($('.count-digit').hasClass('counter-loaded')) return;
				$('.count-digit').addClass('counter-loaded');

				$('.count-digit').each(function() {
					var $this = $(this);
					jQuery({
						Counter: 0
					}).animate({
						Counter: $this.text()
					}, {
						duration: 3000,
						easing: 'swing',
						step: function() {
							$this.text(Math.ceil(this.Counter));
						}
					});
				});
			}
		}
	});





	// 	Slider Var
	var arr_left = '<img src="'+ home_url +'/wp-content/uploads/2022/09/Group-227-1.png">';
	var arr_right = '<img src="'+ home_url +'/wp-content/uploads/2022/09/Group-228.png">';
	var slick_arrow_left = '<div class="slick-prev sld-arr">'+ arr_left +'</div>';
	var slick_arrow_right = '<div class="slick-next sld-arr">'+ arr_right +'</div>';

	var owl_arrow_left = '<div class="prev-slide sld-arr">'+ arr_left +'</div>';
	var owl_arrow_right = '<div class="next-slide sld-arr">'+ arr_right +'</div>';


	// Home Banner - Slider
	$('.homban-sld-list').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows : false,
		dots: true,
		autoplay: true
	});


	// Our Impact - Slider
	$('.event-list, .con-event-list').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsiveClass: true,
		arrows : true,
		dots: false,
		autoplay: true,
		prevArrow: slick_arrow_left,
		nextArrow: slick_arrow_right
	});


	// Our Resources - Slider
	$('.resrc-list').owlCarousel({
		loop: true,
		margin: 75,
		items: 4,
		autoplay: true,
		singleItem:true,
		responsiveClass: true,
		responsive:{
			0:{
				items: 1,
				margin: 0,
			},
			768: {
				items: 1,
				margin: 0,
			},
			1280:{
				items: 4,
				margin: 40,
			},
			1600:{
				items: 4,
				margin: 75,
			}
		}
	});

	// Our Impact - Slider
	$('.impact-list').slick({
		infinite: true,
		loop: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		centerMode: true,
		responsiveClass: true,
		arrows : false,
		prevArrow: slick_arrow_left,
		nextArrow: slick_arrow_right,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}

		]
	});


	// 	Gallery - Slider
	$('.gallery-list').owlCarousel({
		loop: true,
		margin: 34,
		items: 4,
		slideBy: 1,
		responsiveClass: true,
		autoplay: true,
		responsiveClass: true,
		nav: true,
		navText: [owl_arrow_left, owl_arrow_right]
	})

	// 	Our Story Page
	// 	Mission
	$(".mission-readmore-btn").click(function(){
		$(this).toggleClass("active");
		$(".mission-readmore").slideToggle();
	});

	// 	Our Impact Page
	$(".story-readmore").click(function(){
		$(this).slideUp("100");
		$(".other-story-wrap").slideDown("600");
	});

	// 	Story Slider	
	$('.other-story-list').owlCarousel({
		loop: true,
		margin: 60,
		items: 2,
		slideBy: 1,
		autoplay: true,
		responsiveClass: true,
		nav: true,
		navText: [owl_arrow_left, owl_arrow_right]
	})

	// 	Our Team Page 
	$('.team-sld-list').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
	});

	function SldExtArr(ext_arr, sld_arr){
		$(ext_arr).click(function(){
			$(sld_arr).click();
		});
	}
	SldExtArr('.tsld-left-arr', '.team-sld-list .slick-prev');
	SldExtArr('.tsld-right-arr', '.team-sld-list .slick-next');


	// Our Team Page - Popup
	$(".team-item .team-item-inn").click(function(){
		$(this).next(".popup-main").fadeIn();
	});
	$(".popup-close").click(function(){
		$(".popup-main").fadeOut();
	});


	// Login Registration dashboard
	$('.dash-event-list').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows : true,
		dots: false,
		autoplay: true,
		prevArrow: slick_arrow_left,
		nextArrow: slick_arrow_right,
	});



	// 	$(".ptcpt-now-btn, .ptcpt-btn").click(function(){
	// 		var ptcpt_title = $(this).parent().siblings("h4").text();
	// 		var ptcpt_text = $(this).parent().siblings("p").text();

	// 		var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	// 		var today = new Date();
	// 		var dd = String(today.getDate()).padStart(2, '0');
	// 		var mm = months[today.getMonth()];
	// 		var yyyy = today.getFullYear();
	// 		today = dd + '-' + mm + '-' + yyyy;

	// 		var new_el =`<tr>
	// 						<td>${ptcpt_title}</td>
	// 						<td>${today}</td>
	// 						<td>Online</td>
	// 						<td></td>
	// 						<td></td>
	// 					</tr>`;

	// 		$(new_el).insertAfter(".event-ptcpt .prog-table tbody tr:last-child");
	// 		$(this).addClass("done");
	// 	});

	// 	// 	Login Fake
	// 	let login_url = $(".login-form .submit-btn").attr("href");
	// 	$(".login-form .submit-btn").attr("href", "javascript:void(0)");
	// 	$(".login-form .submit-btn").click(function(){
	// 		let user_id = $('.login-form input.form-input[name="user-id"]').val();
	// 		let user_pass = $('.login-form input.form-input[name="password"]').val();

	// 		if(user_id != "" || user_pass != ""){
	// 			$(this).attr("href", login_url);
	// 		}
	// 	});

	// 	// 	Print
	// 	$(".download-btn").click(function(){
	// 		$("header, footer, .cu-evnt, .pp-wrap, .title-bar, .acc-update .btn-wrap").addClass("d-none");
	// 		$(".prog-area").addClass("print");
	// 		window.print();
	// 		setTimeout(function() { 
	// 			$("header, footer, .cu-evnt, .pp-wrap, .title-bar, .acc-update .btn-wrap").removeClass("d-none");
	// 			$(".prog-area").removeClass("print");
	// 		}, 400);
	// 	});

});