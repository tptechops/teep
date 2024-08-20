<?php 
	/* Template Name: My Account Applicants Page */ 
	get_header(); 
	
	$eventId = base64_decode($_GET['ekey']);
	$number   = 10;
	$paged    = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$offset   = ($paged - 1) * $number;
	
	$events   = get_posts('&numberposts=-1&post_type=applications&meta_key=event&meta_value='.$eventId);
	$query    = get_posts('&post_type=applications&meta_key=event&meta_value='.$eventId.'&offset='.$offset.'&numberposts='.$number);
	$total_events = count($events);
	$total_query = count($query);
	$total_pages = intval($total_events / $number) ;
	
	//template function
	include 'account-function.php';

?> 
<style>
.form-label {
    margin-bottom: 0.5em;
    font-size: 1.2em;
}
.modal-title {
    margin-bottom: 0;
    line-height: 1.5;
    font-size: 1.5em;
}
.modal-header .btn-close {
    padding: 0.5em 0.5em;
    margin: -0.5em -0.5em -0.5em auto;
	

}
.modal-header{
	border-bottom: none;
}
.modal-content{
	border-radius: 0.3em;
}
.btn-close{
	width: 2em;
	font-size: 11px;
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
					<a href="<?=home_url()?>/my-account/events"><button type="button" class="back-btn"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/back-btn.png" class="img-fluid"></button></a>
				  </div>
				</div>
				<div class="col-6">
				  <div class="add-btn text-end">
					<button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Upload Result</button>
					<a href="<?=get_stylesheet_directory_uri()?>/assets/WinningData.csv" class="custom-btn" title="Download sample file" ><i class="fa fa-download"></i></a>
				  </div>

				</div>
			  </div>
				<div class="students-table">
				<div class="table-heading">
						<h5>Applicants/Activity</h5>
					</div>
					<table class="table">
						<thead>
						  <tr>
							<th scope="col">#</th>
							<th scope="col">Applicant</th>
							<th scope="col">Role</th>
							<th scope="col">Applied On</th>
							<th scope="col">Is Winner?</th>
							<th scope="col"></th>
							<th scope="col">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php if($query){
							$i=1;foreach($query as $q){
								$u_data = get_user_by( 'id', get_post_meta($q->ID,'applicant' , true) );
								//print_r($q) 
						?>
						  <tr>
							<td><?php echo get_the_author_meta('school_uid', $u_data->ID);?></td>
							<td><?php echo $u_data->display_name;?></td>
							<td><?=ucfirst($u_data->roles[0]);?></td>
							<td><?=get_the_date( 'd F Y', $q->ID )?></td>
							<td>
							<?php //get_post_meta($q->ID,'winners' ,true)
							?>
							<div class="dropdown" >
								<button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20" style="font-size:17px;">
								  <?php if( get_post_meta($q->ID,'winners' ,true) == '' || get_post_meta($q->ID,'winners' ,true)=='No'){?>	No
								  <?php } else {?>
									Yes
								  <?php } ?>
								</button>
								<ul class="dropdown-menu" style="font-size:15px;" aria-labelledby="dropdownMenuOffset">
								  <li><a class="confirmIt dropdown-item" href="javascript:void(0)" data-href="<?=home_url()?>/my-account/applicants?key=<?=base64_encode($q->ID)?>&update=true&pa=<?=get_query_var('paged')?>&pastr=applicants&val=Yes&ekey=<?=base64_encode($eventId)?>">Yes</a></li>
								  <li><a class="confirmIt dropdown-item" href="javascript:void(0)" data-href="<?=home_url()?>/my-account/applicants?key=<?=base64_encode($q->ID)?>&update=true&pa=<?=get_query_var('paged')?>&pastr=applicants&val=No&ekey=<?=base64_encode($eventId)?>">No</a></li>
								</ul>
							</div>
							</td>
							<td>
								<div class="input-group col-md-4 mt-3 mb-3">
									<input id="inp<?=$q->ID?>" class="form-control py-2 border-right-0 border" value="<?=get_post_meta($q->ID, 'winning_status',true)?>" type="text" name="winning_status" placeholder="(winner/runner up/consolation etc..."  style="font-size:20px;padding:10px;">
									<span class="input-group-append"> 
									  <button data-id="<?=$q->ID?>" class="btn btn-outline-secondary border-left-0 border custom-btn exportbtn updateStatus"  type="button" style="font-size:20px;border-radius:0px;padding: 7px 50px;">
											<i class="fa fa-save"></i>
									  </button>
									</span>
								</div>
							</td>

							<td>
							<a  class="confirmIt text-danger mr-2" href="javascript:void(0)" data-href="<?=home_url()?>/my-account/applicants?key=<?=base64_encode($q->ID)?>&del=true&pa=<?=get_query_var('paged')?>&pastr=applicants&ekey=<?=base64_encode($eventId)?>"><i class="fas fa-trash"></i></a>

							
							</td>
						  </tr>
							<?php $i++;} } ?>
						 
						</tbody>
					</table>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content w-75">
            <div class="modal-header">
                <!--<h5 class="modal-title" id="exampleModalLabel1">Upload Data</h5>-->
                <button type="button" style="margin-top:5px;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form enctype="multipart/form-data" action="" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
						<label class="form-label" for="file">Select File (Only Csv - Comma Delimited)</label>
                        <input type="file" name="file" id="file" class="form-control"  accept=".csv"  style=" padding: 0.375em 0.75em; font-size: 1em;" required/>
                        <input type="hidden" name="eventid" value="<?=$eventId?>">
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="csvimp" class="custom-btn btn btn-primary btn-block mb-3 mt-3" style="font-size:16px;">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal --> 


<?php 
	get_footer(); 
?>