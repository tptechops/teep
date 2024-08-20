<?php
	get_header();
	global $post;
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
		'orderby' => 'meta_value_num',
		'order' => 'ASC'
	);
	$eventsApply = get_posts($appliyargs);
	$eventIdArr = array();
	if($eventsApply){
		foreach($eventsApply as $ev){
			$eventIdArr[] = get_post_meta($ev->ID,'event',true);
		}
	}

?>


<!------ Include the above in your HEAD tag ---------->
<style>

.container-narrow > hr {
margin: 2rem 0;
}

/* Main marketing message and sign up button */
.jumbotron {

border-bottom: .05rem solid #e5e5e5;
}
.jumbotron .btn {
padding: .25em 1.3em;
font-size: 1.5em;
}

/* Supporting marketing content */
.marketing {
margin: 1em 0;
}
.marketing p + h4 {
margin-top: 1.5em;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 48em) {
/* Remove the padding we set earlier */
.header,
.marketing,
.footer {
padding-right: 0;
padding-left: 0;
}
/* Space out the masthead */
.header {
margin-bottom: 2em;
}
/* Remove the bottom border on the jumbotron for visual effect */
.jumbotron {
border-bottom: 0;
}
}

.display-3 {
font-size: 2.7em;
font-weight: 600;
line-height: 1.2;
margin-bottom:10px;
}
.lead {
font-size: 1.15em;
font-weight: 650;
color: #0000007d;
padding-right: 15px;
margin-bottom:10px;
}
.container {
/*max-width: 46em;*/
background-color: #fff;
z-index:0;
}
.jumbotron {
padding: 2em 1em;
margin-bottom: 2em;
background-color: #e9ecef;
border-radius: 0.3em;
/* padding-top: 15px; */
margin-top: 2%;
}
ul.b {list-style-type: square;font-weight: 600;font-size: 18px;}
li.listtxt {
font-size: 22px;
}
p.paratxt {
font-weight: 450;
}
.clearfix {
overflow: auto;
}
.img2 {
float: right;
max-height:250px;

}
</style>
</head>
<body>
<div class="container">
  

  <div class="row">
  
	   <div class="col-lg-12" >
		<div class="back-btn mb-3 mt-3" style="position: relative;z-index:999">
		<a href="<?=home_url('/my-account')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
	  </div>
		   <div class="jumbotron row">
			    <div class="col-lg-6" >
					<h1 class="display-3"><?=the_title()?></h1>
					<?php if( get_post_meta($post->ID,'particpants',true) ){?>
					<p class="lead">Event Date:<span style="color:red;"> <?=date('dS F Y',strtotime(get_post_meta($post->ID,'event_participation_period',true)))?>, <?=date('h:i A',strtotime(get_post_meta($post->ID,'event_participation_period_time',true)))?> </span></p>
					<p class="lead">Mode of Event:<span span style="color:#000;"> <?=get_post_meta($post->ID,'event_mode',true)?></span></p>
					
					<p class="lead">Who Can Participate? :<span span style="color:#000;"> <?=implode(', ',get_post_meta($post->ID,'particpants',true))?></span></p>
					
					<p class="lead">Participation: <span span style="color:#000;"><?=date('dS F Y',strtotime(get_post_meta($post->ID,'start_date',true)))?> to <?=date('dS F Y',strtotime(get_post_meta($post->ID,'end_date',true)))?> </span></p>
					<?php } ?>
			    </div>
			   <div class="col-lg-6" ><img alt="<?=$post->post_title?>" src="<?=get_the_post_thumbnail_url($post->ID,'full')?>" class="img2"></div>
			   <?php if( get_post_meta($post->ID,'particpants',true) && get_post_meta($post->ID,'event_participation_period',true) > date('Ymd') ){?>
			   <?php if(!in_array($post->ID,$eventIdArr)){ ?>
				<div class="col-lg-12">
					<button type="button" class="btn btn-primary ParticipateBtn" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">
						PARTICIPATE NOW
					</button>
				</div>
			   <?php }else{ ?>
			   <div class="col-lg-12">
					<button type="button" class="btn btn-primary" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">
						CONCLUDED NOW
					</button>
				</div>
			   <?php } } else { ?>
				<div class="col-lg-12">
					<button type="button" class="btn btn-primary" data-id="<?=$e->ID?>" data-url="<?=home_url()?>/my-account">
						CONCLUDED NOW
					</button>
				</div>
			   <?php }  ?>
			</div>
		</div>
	</div>

  <div class="row marketing">
	<div class="col-lg-12">
	  <ul class="b">
	  <li class="listtxt">Objectives of Events:</li>
	   <p class="paratxt"><?=get_post_meta($post->ID,'objective_of_events',true)?></p>
	  </ul>
	 

	 
	</div>

	 <div class="col-lg-12">
	  <ul class="b">
	  <li class="listtxt">Expected outcomes:</li>
	   <p class="paratxt"><?=get_post_meta($post->ID,'expected_outcomes',true)?></p>
	  </ul>
	 

	 
	</div>

	<div class="col-lg-12">
	  <ul class="b">
	  <li class="listtxt">Event Links and Other Details:</li>
	   <p class="paratxt"><?=get_post_meta($post->ID,'event_links',true)?></p>
	  </ul>
	 

	 
	</div>

	<div class="col-lg-12">
	  <ul class="b">
	  <li class="listtxt">Protocols to follow:</li>
	   <p class="paratxt"><?=get_post_meta($post->ID,'protocols_to_follow',true)?></p>
	  </ul>
	 

	 
	</div>
	
	<div class="col-lg-12">
	  <ul class="b">
	  <li class="listtxt">Terms & Conditions:</li>
	   <p class="paratxt"><?=get_post_meta($post->ID,'terms_and_conditions',true)?></p>
	  </ul>
	 

	 
	</div>

  </div>



</div> <!-- /container -->

<?php
get_footer();
?>
