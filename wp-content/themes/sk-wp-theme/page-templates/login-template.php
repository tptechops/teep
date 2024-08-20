<?php
/* Template Name: Login */
session_start();
get_header();
$users = $_GET['user'];
?>

<?php
	if($_POST) {  
		global $wpdb;  

		//We shall SQL escape all inputs  
		$username = $wpdb->escape($_REQUEST['username']);  
		$password = $wpdb->escape($_REQUEST['password']);
		$users = $wpdb->escape($_REQUEST['users']);
		$remember = $wpdb->escape($_REQUEST['rememberme']);  

		if($remember) $remember = "true";  
		else $remember = "false";  

		$login_data = array();  
		$login_data['user_login'] = $username;  
		$login_data['user_password'] = $password;  
		$login_data['remember'] = $remember;  

		$user_verify = wp_signon( $login_data, false );

		if ( is_wp_error($user_verify)){  
			echo "Invalid login details";  
		} 

		wp_set_current_user($user_verify->ID);
     	wp_set_auth_cookie($user_verify->ID);

        $current_user = wp_get_current_user(); 
		$user_email = $current_user->user_email; 
		$_SESSION['userid'] = $user_email;
		if($users == 'students'){ echo "<script type='text/javascript'>window.location.href='". home_url() ."/students-dashboard/'</script>";}
		elseif($users == 'teacher'){ echo "<script type='text/javascript'>window.location.href='". home_url() ."/teacher-dashboard/'</script>"; }
		elseif($users == 'principal'){ echo "<script type='text/javascript'>window.location.href='". home_url() ."/principal-dashboard/'</script>"; }
		//echo "<script type='text/javascript'>window.location.href='". home_url() ."/students-dashboard/'</script>";  
		exit();  
	}else {
		// No login details entered - you should probably add some more user feedback here, but this does the bare minimum  

		//echo "Invalid login details";  

	}
?>

<main id="primary" class="site-main">
	<section class="section position-relative overflow-hidden login-section">
		<div class="bg-wrap">
			<img class="bg-img" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/login_bg_img_01.png" alt="">
			<div class="bg-overly bg-E2F5FF opacity-0p9"></div>
		</div>
		<div class="container position-relative">
			<div class="form-block-1 login-form-block">
				<div class="image-wrap">
					<img class="logo-img-1" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/brand_logo_04_login.png" alt="">
				</div>
				<div class="form-title">
					<h4 class="fs-40 fw-500 text-uppercase">Login</h4>
				</div>
				<form id="login1" name="form" action="<?php echo home_url(); ?>/login/" method="post">  
					<div class="form-wrap form-1 login-form">
						<div class="input-wrap">
							<input class="form-input" id="username" type="text" name="username" placeholder="User ID">
						</div>
						<div class="input-wrap">
							<input class="form-input" id="password" type="password" placeholder="Password" name="password">
							<input type="hidden" id="users" name="users" value="<?php echo $users; ?>">
						</div>

						<div class="rem-fgt-wrap">
							<div class="checkbox-wrap">
								<input class="checkbox-input" type="checkbox" id="login-remember-me" name="remember-me" value="">
								<label for="login-remember-me">Remember me</label>
							</div>
							<a class="forgot-pass" href="#">Forgot password</a>
						</div>

						<div class="submit-wrap">
							<input id="submit" type="submit" class="def-btn submit-btn" name="submit" value="Login"> 
						</div>
					</div>
				</form>   
				<?php 
					if($users == 'students'){ $url = home_url()."/registration/";}
					elseif($users == 'teacher'){ $url = home_url()."/teacher-registration/";}
					elseif($users == 'principal'){ $url = home_url()."/principal-registration/";}
				?>
				<div class="create-acc-wrap"><span>Not registered yet? <a class="create-acc-link" href="<?php echo $url; ?>">Create Account</a></span></div>
			</div>
			
		</div>
	</section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();