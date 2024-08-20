<?php 
	ob_start();
	/* Template Name: My Account Student Page */ 
	get_header(); 
	
	global $current_user;
	global $wpdb;
	$user_roles = $current_user->roles;

	$number   = 10;
	$paged    = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$offset   = ($paged - 1) * $number;
	$users    = get_users( array( 'role' => 'student' ));
	$query    = get_users('&role=student&orderby=ID&order=desc&offset='.$offset.'&number='.$number);
	if(isset($_GET['q']) && $_GET['q']!=''){
		$users = get_users(
			array(
				'role' => 'student',
				'orderby' => 'ID',
				'order' => 'desc',
				'search' => '*' . $_GET['q'] . '*',
				'search_columns' => array(
					'user_login',
					'user_email',
					'display_name',
				),

			)
		);
		
		$query = get_users(
			array(
				'role' => 'student',
				'orderby' => 'ID',
				'order' => 'desc',
				'offset' => $offset,
				'number' => $number,
				'search' => '*' . $_GET['q'] . '*',
				'search_columns' => array(
					'user_login',
					'user_email',
					'display_name',
				),


			)
		);
		if(empty($query)){
			$users = get_users(
				array(
					'role' => 'student',
					'orderby' => 'ID',
					'order' => 'desc',
					'meta_query'  => array(
						'relation' => 'OR',
						array(
							'relation' => 'AND',
							array(
								'key'     => 'first_name',
								'value'   => $_GET['q'],
								'compare' => 'LIKE',
							),
						),
						array(
							'relation' => 'OR',
							array(
								'key'     => 'school_name',
								'value'   => $_GET['q'],
								'compare' => 'LIKE',
							),
						)
					),


				)
			);
		
			$query = get_users(
				array(
					'role' => 'student',
					'orderby' => 'ID',
					'order' => 'desc',
					'offset' => $offset,
					'number' => $number,
					'meta_query'  => array(
						'relation' => 'OR',
						array(
							'relation' => 'AND',
							array(
								'key'     => 'first_name',
								'value'   => $_GET['q'],
								'compare' => 'LIKE',
							),
						),
						array(
							'relation' => 'OR',
							array(
								'key'     => 'school_name',
								'value'   => $_GET['q'],
								'compare' => 'LIKE',
							),
						)
					),


				)
			);
		}

	}
	// Print last SQL query string
	//echo $wpdb->last_query;
	//print_r($query);
		
	$total_users = count($users);
	$total_query = count($query);
	$total_pages = ceil($total_users / $number);
	
	//template function
	include 'account-function.php';

?> 
<section class="section my-account-bg">
	<!--Rahul sharma Ui Start-->
	<div class="container">
	  
		<div class="row students-table-main">
			<div class="col-12">
			  <div class="row mb-3">
				<div class="col-sm-12 col-md-6">
				  <div class="back-btn">
					<a href="<?=home_url()?>/my-account"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
				  </div>
				</div>
				<div class="col-md-6 col-sm-12 " style="text-align:right">
				  <div class="add-btn text-end" style="display: inline-flex;">
					<a style="margin-right:10px;" href="<?=home_url()?>/my-account/add-student"><button type="button" class="custom-btn">Add Student</button></a>
					<a href="<?=home_url()?>/my-account/students?student_export_csv=true"><button type="button" class="custom-btn exportbtn">Export All</button></a>
				</div>
				</div>
				<div class="col-12">
					<form>
					<div class="input-group col-md-4 mt-3 mb-3">
						<input class="form-control py-2 border-right-0 border" value="<?=$_GET['q'] ?? ''?>" type="search" name="q" placeholder="search (Name,Email,School)" id="example-search-input" style="font-size:20px;padding:10px; ">
						<span class="input-group-append"> 
						  <button class="btn btn-outline-secondary border-left-0 border custom-btn exportbtn"  type="submit" style="font-size:20px;border-radius:0px;padding: 7px 50px;">
								<i class="fa fa-search"></i>
						  </button>
						</span>
					</div>
					</form>
				</div>
	 
			  </div>
				<div class="students-table">
					<div class="table-heading">
						<h5>Students</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">School</th>
								<th scope="col">Class</th>
								<th scope="col">Section</th>
								<th scope="col">Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php if($query){
								$i=1;foreach($query as $q){
									//print_r($q) 
							?>
							  <tr>
								<td><?php echo get_the_author_meta('school_uid', $q->ID);?></td>
								<td><?php echo get_the_author_meta('display_name', $q->ID);?></td>
								<td><?php echo $q->user_email;?></td>
								<td>
									<?php if(get_user_meta( $q->ID, 'school', true)!='others'){
										echo (get_user_meta( $q->ID, 'school', true)) ? get_the_title(get_user_meta( $q->ID, 'school', true)) : '---';
									}else{
										echo (get_user_meta( $q->ID, 'other_school_name', true)) ? get_user_meta( $q->ID, 'other_school_name', true) : '---';
									}
									?>
								</td>
								<td><?php echo (get_user_meta( $q->ID, 'class_id', true)) ? get_user_meta( $q->ID, 'class_id', true) : '--';?></td>
								<td><?php echo (get_user_meta($q->ID, 'section',  true)) ? get_user_meta($q->ID, 'section',  true) : '---';?></td>
								<td><a href="<?=home_url()?>/my-account/edit-student?key=<?=base64_encode($q->ID)?>"><i class="fas fa-edit"></i></a>
								<a class="confirmIt text-danger mr-2" href="javascript:void(0)" data-href="<?=home_url()?>/my-account/students?key=<?=base64_encode($q->ID)?>&del=true&pa=<?=get_query_var('paged')?>&pastr=students"><i class="fas fa-trash"></i></a></td>
							  </tr>
								<?php $i++;} } ?>
							 
							</tbody>
						  </table> 
					  </div>
				</div>
			</div>
			
		
		</div>
		
		<?php
			if ($total_users > $total_query) {
				echo '<div id="pagination" class="custom-pagination mt-5 clearfix">';
				echo '<span class="pages">Pages:</span>';
				  $current_page = max(1, get_query_var('paged'));
				  echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => 'page/%#%/',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_next'    => false,
					'type'         => 'list',
					));
				echo '</div>';
			}
		?>
			
		
	</div>
	<!--Rahul sharma Ui End-->
</section>

<?php 
	get_footer(); 
?>