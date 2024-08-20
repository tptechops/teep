<?php
/* Template Name: Dashboard */
session_start();
get_header();
global $wpdb;
$user_email = $_SESSION['userid'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
parse_str($parts['query'], $query);
$postId = $query['post-id'];


if($user_email)
{
	if(isset($_POST['updateSubmit'])) {  
		global $wpdb;  

		//We shall SQL escape all inputs  
		$firstname = $wpdb->escape($_REQUEST['first-name']);  
		$mname = $wpdb->escape($_REQUEST['middle-name']);  
		$lname = $wpdb->escape($_REQUEST['last-name']);  
		$school = $wpdb->escape($_REQUEST['school-name']);
		$class = $wpdb->escape($_REQUEST['class-name']);
		$sec = $wpdb->escape($_REQUEST['section-name']);
		$phn = $wpdb->escape($_REQUEST['phone']);

		$tablename=$wpdb->prefix.'wpsp_student';

		$data=array(
			's_fname' => $firstname,
			's_mname' => $mname,
			's_lname' => $lname,
			'p_phone' => $phn, 
			's_school_name' => $school, 
			's_section' => $sec,
			's_class_name' => $class);

			$wherecondition=array(
				    				's_email'=>$user_email
				    			);
				$execut= $wpdb->update($tablename, $data, $wherecondition);
		var_dump($execut);

	}


$tablename = $wpdb->prefix.'wpsp_student';

$results = $wpdb->get_results( "SELECT * FROM $tablename WHERE s_email='".$user_email."'"); // Query to fetch data from database table and storing in $results

foreach($results as $row){   
    $userName = $row->s_fname;
    $gender = $row->s_gender;
    $phone = $row->p_phone;
    $email = $row->s_email;
    $schoolName = $row->s_school_name;
    $className = $row->s_class_name;
    $middleName = $row->s_mname;
    $lastname = $row->s_lname;
    $section = $row->s_section;
}

if($query['post-id']){
	$tablename = 'student_events';
	$results = $wpdb->get_results( "SELECT * FROM $tablename WHERE post_id=$postId AND  s_email='".$user_email."'");
	$postCount = count($results);
	if($postCount == 0){
		$data=array(
        'post_id' => $query['post-id'],
        's_email' => $user_email);
     	$wpdb->insert( $tablename, $data);
	}
}

?>

<main id="primary" class="site-main">

    <section class="section bg-e4f5ff">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-12">
                    <div class="dash-col user-info">
                        <div class="cover-area">
                            <img class="user-cover-img"
                                src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/cover_bg_01.jpg"
                                alt="cover-image">
                            <h3 class="fs-40 fw-700 text-uppercase color-1B69B3 position-relative mb-5">Student</h3>
                            <img class="pp-img" src="<?php //echo the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class="update-area">
                            <form name="form" action="<?php echo home_url(); ?>/students-dashboard/" method="post">
                                <div class="form-wrap form-1 update-form">
                                    <div class="input-wrap">
                                        <input class="form-input" id="first-name" type="text" name="first-name"
                                            placeholder="First Name" value="<?php echo $userName; ?>">
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input" id="middle-name" type="text" name="middle-name"
                                            placeholder="Middle Name" value="<?php echo $middleName; ?>">
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input" id="last-name" type="text" name="last-name"
                                            placeholder="Last Name" value="<?php echo $lastname; ?>">
                                    </div>
                                    <!--<div class="input-wrap">
										<input class="form-input" id="student-id" type="text" name="student-id" placeholder="Student ID">
									</div>-->

                                    <div class="input-wrap">
                                        <input class="form-input" id="email-id" type="email" name="email-id" readonly
                                            placeholder="Email ID" value="<?php echo $email; ?>">
                                    </div>

                                    <div class="blank-div"></div>

                                    <div class="input-wrap">
                                        <input class="form-input" id="phone" type="number" name="phone"
                                            placeholder="Phone" value="<?php echo $phone; ?>">
                                    </div>

                                    <div class="input-wrap">
                                        <input class="form-input" id="school-name" type="text" name="school-name"
                                            placeholder="School Name" value="<?php echo $schoolName; ?>">
                                    </div>

                                    <div class="input-wrap">
                                        <input class="form-input" id="class-name" type="text" name="class-name"
                                            placeholder="Class Name" value="<?php echo $className; ?>">
                                    </div>
                                    <div class="input-wrap">
                                        <input class="form-input" id="section-name" type="text" name="section-name"
                                            placeholder="Section Name" value="<?php echo $section; ?>">
                                    </div>

                                    <div class="submit-wrap download-upload">
                                        <!--<a href="#" class="def-btn btn-4 download-btn">DOWNLOAD</a>-->
                                        <input id="submit" type="submit" class="def-btn submit-btn update-btn"
                                            name="updateSubmit" value="update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="dash-col upcom-event">
                        <img class="upcom-bg"
                            src="<?php echo home_url(); ?>/wp-content/uploads/2022/09/bg_img_upev_01.jpg"
                            alt="cover-image">
                        <h3 class="fs-40 fw-700 text-uppercase color-1B69B3 position-relative mb-5">UPCOMING EVENTS</h3>

                        <div class="dash-event-wrap">
                            <div class="dash-event-list">

                                <?php 
								$args = array( 'post_type' => 'events', 'posts_per_page' => 10 );
								$the_query = new WP_Query( $args );
								$current_post_id = $post->ID;	
								$user_ID = get_current_user_id();								

								if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
								?>

                                <div class="dash-event-item">
                                    <div class="dash-event-inn">
                                        <div class="image-wrap de-img-wrap">
                                            <img class="de-img" src="<?php the_post_thumbnail_url('de-img'); ?>" alt="">
                                        </div>
                                        <div class="de-content-wrap">
                                            <h4 class="fs-32 fw-600 mb-5"><?php the_title(); ?></h4>
                                            <div class="fs-16 lh-1p4 event-short-details">
                                                <?php the_field('event_short_details'); ?>
                                            </div>
                                            <div class="btn-wrap event-btn-wrap">
                                                <?php 
													$currentPost = get_the_ID();
													$tablename = 'student_events';

													$results = $wpdb->get_results( "SELECT * FROM student_events WHERE post_id=$currentPost AND s_email='".$user_email."'"); // Query to fetch data from database table and storing in $results
													foreach($results as $row){   
													    $participantId = $row->post_id;
													}
												?>
                                                <?php if($participantId == $currentPost) { ?>
                                                <a href="#" class="def-btn btn-3 event-btn">PARTICIPATED</a>
                                                <?php } else{ ?>
                                                <a href="?post-id=<?php echo get_the_ID(); ?>"
                                                    class="def-btn btn-3 event-btn">PARTICIPATE NOW</a>
                                                <?php }
												?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
								endwhile;
								wp_reset_postdata();  
								endif; 
								?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- MY PROGRESS -->
            <div class="progress-area">
                <h3 class="fs-30 text-upppercase mb-5">MY PROGRESS</h3>
                <?php
					$tablename = 'student_events';
					$results = $wpdb->get_results( "SELECT * FROM $tablename WHERE s_email='".$user_email."'");
					$praticipateCount = count($results);
					if($praticipateCount == 0){
						
				?>
                <div class="progress-table-wrap">
                    <p>
                        You are yet to participate in any event
                    </p>
                </div>
                <?php }
	
					else{
				?>
                <div class="progress-table-wrap">
                    <table class="progress-table">
                        <thead>
                            <tr>
                                <th>EVENTS NAME</th>
                                <th>COMPETITION DATE</th>
                                <th>DETAILS</th>
                                <th>MODE OF EVENT</th>
                                <th>EVENT TYPE</th>
                                <th>STATUS</th>
                                <th>Download</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
								$tablename = 'student_events';

								$results = $wpdb->get_results( "SELECT * FROM $tablename WHERE s_email='".$user_email."'"); // Query to fetch data from database table and storing in $results
								foreach($results as $row){   
								    $participantId = $row->post_id;
								    $content_post = get_post_field('post_content', $participantId);
								    $title = get_post_field('post_title', $participantId);
							?>
                            <tr>
                                <td><?php echo $title; ?></td>
                                <td>08-2022</td>
                                <td><?php echo substr($content_post, 0, 150); ?></td>
                                <td>Offline</td>
                                <td> - </td>
                                <td>Winner</td>
                                <td><a href="#" class="def-btn btn-3 table-btn">DOWNLOAD CERTIFICATE</a></td>
                            </tr>
                            <?php
								}
							?>

                        </tbody>

                    </table>

                    <div class="btn-wtap">
                        <a href="#" class="def-btn btn-4">DOWNLOAD PROFILE</a>
                    </div>

                </div>
                <?php } ?>
            </div>

							</div>
    </section>
	



<?php }
else{
	echo "<script type='text/javascript'>window.location.href='". home_url() ."/'</script>";
	exit();
}
?>




	</main>

<?php get_footer(); 
