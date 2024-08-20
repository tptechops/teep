<?php 
	/* Template Name: My Account Events Page */ 
	get_header(); 
	
	$number   = 10;
	$paged    = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$offset   = ($paged - 1) * $number;
	//$events   = wp_count_posts( 'events' )->publish;
	$events   = get_posts('&post_type=events&numberposts=-1');
	$query    = get_posts('&post_type=events&offset='.$offset.'&numberposts='.$number);
	$total_events = count($events);
	$total_query = count($query);
	$total_pages = ceil($total_events / $number) ;
	
	//template function
	include 'account-function.php';

?>
<style>
.my-account-bg{
	z-index:1;
}
</style> 
<section class="section my-account-bg">
	<!--Rahul sharma Ui Start-->
	<div class="container">
	  
		<div class="row students-table-main">
			<div class="col-12">
			  <div class="row mb-3">
				<div class="col-6">
				  <div class="back-btn">
					<a href="<?=home_url()?>/my-account"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
				  </div>
				</div>
				<div class="col-6">
				  <div class="add-btn text-end">
					<a href="<?=home_url()?>/my-account/add-event"><button type="button" class="custom-btn">Add Event</button></a>
					<a href="<?=home_url()?>/my-account/students?events_export_csv=true"><button type="button" class="custom-btn exportbtn">Export All</button></a>
				</div>
				</div>
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>Events/Activity</h5>
					</div>
					<div class="table-layout-event">
						<table class="table">
							<thead>
							  <tr>
								<th scope="col">S.NO</th>
								<th scope="col">Title</th>
								<th scope="col">Total <br>Applied</th>
								<th scope="col">Principal<br>Applied</th>
								<th scope="col">Teachers <br>Applied</th>
								<th scope="col">Students <br>Participated</th>
								<th scope="col">Winners</th>
								<th scope="col">Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php if($query){
								$i=1;foreach($query as $q){
									//print_r($q) 
									$applicants   = get_posts('&post_type=applications&meta_key=event&meta_value='.$q->ID);
									$principal = 0;
									$teacher = 0;
									$student = 0;
									$winner = 0;
									foreach($applicants as $ap){
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
							  <tr>
								<td><?=$i?></td>
								<td><p style="width:200px;"><a href="<?php echo esc_url( get_permalink($q->ID) ); ?>"><?php echo $q->post_title;?></a></p></td>
								<td><p style="width:60px;"><?=count($applicants)?></p></td>
								<td><p style="width:60px;"><?=$principal?></p></td>
								<td><p style="width:60px;"><?=$teacher?></p></td>
								<td><p style="width:60px;"><?=$student?></p></td>
								<td><p style="width:60px;"><?=$winner?></p></td>

								<td>

								<a style="margin-left:8px;" href="<?=home_url()?>/my-account/edit-event?key=<?=base64_encode($q->ID)?>" data-bs-toggle="tooltip" data-bs-container="body" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
								<a style="margin-left:8px;"class="text-success mr-2" href="<?=home_url()?>/my-account/attendance?ekey=<?=base64_encode($q->ID)?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"><i class="fas fa-eye"></i></a>
								<a style="margin-left:8px;"class="text-warning mr-2" href="<?=home_url()?>/my-account/applicants?ekey=<?=base64_encode($q->ID)?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Applicants"><i class="fas fa-user"></i></a>							
								<a  style="margin-left:8px;" class="confirmIt text-danger mr-2" href="javascript:void(0)" data-href="<?=home_url()?>/my-account/events?key=<?=base64_encode($q->ID)?>&del=true&pa=<?=get_query_var('paged')?>&pastr=events" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
								</td>
							  </tr>
								<?php $i++;} } ?>
							 
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		
		</div>
		
		<?php
			if ($total_events > $total_query) {
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