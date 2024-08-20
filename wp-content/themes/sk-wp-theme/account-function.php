<?php

//user delete
if(isset($_GET['del']) && $_GET['del']==true){
	$user = wp_get_current_user();
	$roles = ( array ) $user->roles;
	$paged    = ($_GET['pa']) ? $_GET['pa'] : 1;
	$str    = ($_GET['pastr']) ? $_GET['pastr'] : 'students';
	if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
		//For wp_delete_user() function
		
		require_once(ABSPATH.'wp-admin/includes/user.php' );
		$user_id = base64_decode($_GET['key']);
		if($str=='events' || $str=='applicants'){
			$ins = wp_delete_post( $user_id , false );
			if( isset($_GET['key']) ){
				$ekey = '?ekey='.$_GET['key'];
			}else{
				$ekey = '?ekey='.$_GET['ekey'];
			}
			
		}else{
			$ins = wp_delete_user( $user_id );
			$ekey = '';
		}
		
		if(  $ins ){
			echo '<script>
				Swal.fire({
					title: "Success!",
					text: "Record deleted successfully!",
					type: "success"
				}).then(function() {
					window.location = "'.home_url('/my-account/'.$str.'/page/'.$paged.$ekey.'').'";
				});
			</script>';
		}else{
			echo '<script>
				Swal.fire({
					title: "Oops!",
					text: "There is a problem while deleting the record.!",
					type: "warning"
				}).then(function() {
					window.location = "'.home_url('/my-account/'.$str.'/page/'.$paged.$ekey.'').'";
				});
			</script>';
		}
		
		//header("Location: ".home_url('/my-account/students?action=true'));
	}else{
		echo '<script>
				Swal.fire({
					title: "Oops!",
					text: "Something went wrong try again leter!",
					type: "warning"
				}).then(function() {
					window.location = "'.home_url('/my-account/'.$str.'/page/'.$paged.$ekey.'').'";
				});
			</script>';
		//header("Location: ".home_url('/my-account/students?action=fail'));
	}
	die;
}
if(isset($_GET['update']) && $_GET['update']==true){
	$applicantsId = base64_decode($_GET['key']);
	$ekey = '?ekey='.$_GET['ekey'];
	$user = wp_get_current_user();
	$roles = ( array ) $user->roles;
	$paged    = ($_GET['pa']) ? $_GET['pa'] : 1;
	$str    = ($_GET['pastr']) ? $_GET['pastr'] : 'applicants';
	if( current_user_can( 'administrator' ) || in_array( 'event-manager' , $roles )){
		$val = ($_GET['val']=='Yes') ? 'Yes' : 'No';
		$ins = update_post_meta($applicantsId,'winners',$val);
		if(  $ins ){
			echo '<script>
				Swal.fire({
					title: "Success!",
					text: "Record updated successfully!",
					type: "success"
				}).then(function() {
					window.location = "'.home_url('/my-account/'.$str.'/page/'.$paged.$ekey.'').'";
				});
			</script>';
		}else{
			echo '<script>
				Swal.fire({
					title: "Oops!",
					text: "There is a problem while updating the record.!",
					type: "warning"
				}).then(function() {
					window.location = "'.home_url('/my-account/'.$str.'/page/'.$paged.$ekey.'').'";
				});
			</script>';
		}
	}
	die;
}
if(isset($_POST['csvimp']) && $_POST['eventid']!=''){
	
	$fileName = $_FILES["file"]["tmp_name"];
	$eventId = $_POST['eventid'];
	/*$applicants   = get_posts('&numberposts=-1&post_type=applications&meta_key=event&meta_value='.$eventId);
	$applicatsArr = [];
	if($applicants){
		foreach($applicants as $a){
			$u_data = get_user_by( 'id', get_post_meta($q->ID,'applicant' , true) );
			$applicatsArr[$a->ID] = get_the_author_meta('school_uid', $u_data->ID);
		}
	}*/
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($fileName, "r");
		$importCount = 0;
		$i = 0;
		while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			if (! empty($column) && is_array($column) && $i>0) { 
				
				if (isset($column[0], $column[1])) {
					$userName = $column[0];
					$isWinner = $column[1];
					$winningStatus = $column[2];
					$user = get_users(array(
						'meta_key' => 'school_uid',
						'meta_value' => $userName
					));
					$args = array(
						'meta_query' => array(
							array(
								'key' => 'applicant',
								'value' => $user[0]->ID
							)
						),
						'post_type' => 'applications',
						'posts_per_page' => -1
					);
					$applyposts = get_posts($args);
					//print_r($applyposts);die;
					if($applyposts){
						$val = ($isWinner=='Yes') ? 'Yes' : 'No';
						foreach($applyposts as $apply){
							update_post_meta( $apply->ID, 'winning_status', $winningStatus);
							update_post_meta($apply->ID,'winners',$val);
							$importCount++;
						}
					}
					
				}
			} 
			$i++;
		}
		/*if ($importCount == 0) {
			$output["type"] = "error";
			$output["message"] = "Duplicate data found.";
		}*/
		if ($importCount > 0) {
			echo '<script>
				Swal.fire({
					title: "Success!",
					text: "Record uploaded successfully!",
					type: "success"
				}).then(function() {
					window.location = "'.home_url('/my-account/applicants/?ekey='.base64_encode($eventId)).'";
				});
			</script>';
		}else{
			echo '<script>
				Swal.fire({
					title: "Oops!",
					text: "There is a problem while uploading the record.!",
					type: "warning"
				}).then(function() {
					window.location = "'.home_url('/my-account/applicants/?ekey='.base64_encode($eventId)).'";
				});
			</script>';
		}
		die;
	}
		
}
?>