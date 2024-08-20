<?php 
	/* Template Name: My Account Certificate Page */ 
	get_header(); 
	$eventId  = base64_decode($_GET['key']);
	$certType  = base64_decode($_GET['type']);
	$event   = get_post( $eventId );
	$user = wp_get_current_user();
	//print_r($event);die;
	//echo get_post_meta($event->ID,'end_date',true);
?> 
<style>
@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
<!--
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');

.bold {
  font-weight: bold;
}

.block {
    display: block;
    color: #008b9f;
    font-size: 18px;
    margin-left: 15px;}

.underline {
  padding: 5px;
    text-align: center;
  margin-bottom: 15px;
  width: 670px !important;
}
h2{

    color: #0070C0;
    font-size: 40px;

}
.margin-0 {
  margin: 0;
}

.padding-0 {
  padding: 0;
}

.pm-empty-space {
  height: 40px;
  width: 100%;
}


.pm-certificate-container {
  position: relative;
  height: 600px;
  padding: 1px;
  color: #333;
  font-family: 'Open Sans', sans-serif;
  /*background: -webkit-repeating-linear-gradient(
    45deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );
  background: repeating-linear-gradient(
    90deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );*/
  
  .outer-border {

      width: 1000px;
    height: 800px;
    position: absolute;
    left: 50%;
    margin-left: -397px;
    top: 50%;
    margin-top: -297px;
    border: 10px solid #ffcd00;

  }
  
  .inner-border {
    width: 730px;
    height: 530px;
    position: absolute;
    left: 50%;
    margin-left: -365px;
    top: 50%;
    margin-top:-265px;
    border: 2px solid #fff;
  }

  .pm-certificate-border {
    position: relative;
    width: 945px;
    height: 740px;
    padding: 0;
    border: 10px solid #ffcd00;
    background-color: rgba(255, 255, 255, 1);
    background-image: none;
    left: 50%;
    margin-left: -368px;
    top: 50%;
    margin-top: -268px;
}

    .pm-certificate-block {
      width: 650px;
      height: 200px;
      position: relative;
      left: 50%;
      margin-left: -325px;
      margin-top: 0;
    }

    .pm-certificate-header {
      margin-bottom: 10px;
    }

    .pm-certificate-title {
      top: 40px;
	  text-align:center;

      h2 {
        font-size: 34px !important;
      }
    }

    .pm-certificate-body {

      .pm-name-text {
        font-size: 20px;
      }
    }

    .pm-earned {
      margin: 15px 0 20px;
      .pm-earned-text {
        font-size: 20px;
      }
      .pm-credits-text {
        font-size: 15px;
      }
    }

    .pm-course-title {
      .pm-earned-text {
        font-size: 20px;
      }
      .pm-credits-text {
        font-size: 15px;
      }
    }

    .pm-certified {
      font-size: 12px;

      .underline {
        margin-bottom: 5px;
      }
    }

 
  }
}

.marfooter
{
    float: right;
    margin-top: -23px;
    margin-right: 15px;
	font-size: 14px;
	}
	.ptext
	{
	    margin-top: -24px;
    font-weight: 900;
    font-size: 22px;
	}
		.margintop
{
    margin-top: 15px;
}

.pm-name-text::after {
       content: '';
    display: block;
    position: absolute;
    background-color: #7D7465;
    height: 1px;
    width: 77%;
    margin-left: 93px;
    margin-right: 62px;
}
</style>
-->
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');
.bold {
  font-weight: bold;
}

.block {
    display: block;
    color: #008b9f;
    font-size: 15px;
    margin-left: 0px;
}

.underline {
  padding: 5px;
  text-align: center;
  margin-bottom: 15px;
  width: 670px !important;
}
.margintop {
    margin-top: 15px;
}
.margin-0 {
    margin: 0;
}
.border-bottom{
	border-bottom: 1px solid #000!important;
}
#section-to-print{
	font-family: 'Open Sans', sans-serif;
}
#section-to-print h2{
	color: #0070C0;
    font-size: 35px;
}
.ptext {
    font-weight: 800;
    font-size: 22px;
    margin-top: 12px
}
.pm-name-text {
    font-size: 20px;
}

/*.pm-name-text::after {
    content: '';
    display: block;
    position: absolute;
    background-color: #7D7465;
    height: 1px;
    width: 77%;
    margin-left: 93px;
    margin-right: 62px;
}*/


.pm-empty-space {
  height: 40px;
  width: 100%;
}
.pm-certificate-block {
	width: 650px;
    height: 200px;
    position: relative;
    left: 50%;
    margin-left: -325px;
    margin-top: 20px;
}


</style>
<section class="user-certificate" >
<div class="back-btn mb-3" style="margin-left: 17%;">
		<a href="<?=home_url('/my-account')?>"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
	  </div>
	<div class="user-cer-div" id="section-to-print">
		<div class="certificate-inner">
			<img src="<?=get_stylesheet_directory_uri()?>/assets/img/TATA.png" style=" width: 20%;padding-top: 12px;padding-left: 20px;">
			<img src="<?=get_stylesheet_directory_uri()?>/assets/img/tata1.png" style=" width: 20%;float: right;">
			<div class="pm-certificate-header">
			  <div class="pm-certificate-title cursive col-xs-12 text-center">
				<img src="<?=get_stylesheet_directory_uri()?>/assets/img/tata2.png" style="width: 25%; margin-left: 15%;">
				<?php if($certType!='winner'){?>
				<h2>CERTIFICATE OF PARTICIPATION</h2>
				<?php } else{?>
				<h2>CERTIFICATE OF ACHIEVEMENT</h2>
				<?php } ?>
				<p class="ptext">This certificate is presented to</p>
			  </div>
			</div>
			<div class="pm-certificate-block">
				<div class="row">
					<div class="pm-certificate-name underline margin-0 col-xs-8 text-center border-bottom" >
					  <span class="pm-name-text bold">
						<?php if(get_user_meta($user->ID, 'middle_name', true)!=''){
							echo $user->first_name.' '.get_user_meta($user->ID, 'middle_name', true).' '.$user->last_name;
						}else{
							echo $user->first_name.' '.$user->last_name;
						}?>
					  </span>
					</div>
					<div class="margintop" style="margin-left: 40px;">
					  <span>from the school</span>
					  <span class="pm-certificate-name underline margin-0 col-xs-8 text-center border-bottom">
						<span class="pm-name-text bold">
							<?php if(get_user_meta( $user->ID, 'school', true)!='others'){
									echo (get_user_meta( $user->ID, 'school', true)) ? get_the_title(get_user_meta( $user->ID, 'school', true)) : 'N/A';
								}else{
									echo (get_user_meta( $user->ID, 'other_school_name', true)) ? get_user_meta( $user->ID, 'other_school_name', true) : 'N/A';
								}
								?>
						</span>
					  </span>
					</div>
					<?php if($certType=='winner' && ( isset($_GET['status']) && base64_decode($_GET['status'])!='') ) {?>
					<div class="margintop" style="margin-left: 40px;">
					  <span>for holding</span>
					  <span class="pm-certificate-name underline margin-0 col-xs-8 text-center border-bottom">
						<span class="pm-name-text bold">
							<?php if(isset($_GET['status'] )){
									echo base64_decode($_GET['status']);
								}else{
									echo 'Winner';
								}
								?>
						</span>
					  </span>
					  <span>position</span>
					</div>
					<?php } ?>
					<div class="margintop" style=" margin-left: 85px;">
					  <span><?php if($certType=='winner'){?> in the event <?php } else {?> for participating in <?php } ?></span>
					  <span class="pm-certificate-name underline margin-0 col-xs-8 text-center border-bottom">
						<span class="pm-name-text bold"><?=$event->post_title?></span>
					  </span>
					</div>
					<div class="margintop" style="margin-left: 90px;">
					  <span>organised on</span>
					  <span class="pm-certificate-name underline margin-0 col-xs-8 text-center border-bottom">
						<span class="pm-name-text bold"><?=date('F d,Y',strtotime( get_post_meta($eventId,'end_date',true) ))?></span>
					  </span>
					</div>
					
				</div>
			</div>
			<div class="" style=" margin-top: 30px;">
				<div class="row">
				  <div class="col-xs-4 pm-certified col-xs-4  text-start">
					<span class="pm-credits-text block sans">Issued by: </span>
				  </div>
				  <div class="pm-certificate-footer">
					<div class="col-xs-4 pm-certified col-xs-4 text-start">
					  <span class="bold block">TATA EDUCATION EXCELLENCE PROGRAMME </span>
					  <span class="marfooter" style=" float: right;margin-top: -23px;margin-right: 15px;font-size: 13px;">This is system generated certificate and doesn’t require signature </span>
					</div>
				  </div>
				</div>
			  </div>
		</div>
	</div>
	</section>
	<div class="row text-center user-certificate">
	<div class="col-sm-4"></div>
	<div class="col-sm-4"><button type="button" class="printMe btn-certificate mb-3">Download Certificate</button></div>
	<div class="col-sm-4"></div>
	</div>

<?php 
	get_footer(); 
?>