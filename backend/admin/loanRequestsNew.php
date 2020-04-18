<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');
include_once('includes/loan_request_handler.php');


?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-user"></i> Pending Loan Requests</h4>
						<hr>
						<?php if(in_array("checked",$message_array)) echo "<span style='color: #27ae60;'><h4>Loan Checking Complete</h4></span> <br>";?>
						<?php if(in_array("approved",$message_array)) echo "<span style='color: #27ae60;'><h4>Loan approved</h4></span> <br>";?>
						<?php if(in_array("rejected",$message_array)) echo "<span style='color: #27ae60;'><h4>Loan Rejected Successfully</h4></span> <br>";?>
						<?php if(in_array("something went wrong",$message_array)) echo "<span style='color: #27ae60;'><h4>something went wrong</h4></span> <br>";?>
						<?php if(in_array("Mail not sent",$message_array)) echo "<span style='color: #27ae60;'><h4>Mail not sent</h4></span> <br>";?>
						<?php
							$loanRequests = mysqli_query($con,"SELECT * FROM loan_requests WHERE approved='NO' ORDER BY id DESC ");
							if (mysqli_num_rows($loanRequests) == 0) {
								echo "<h3>There is no request for laon</h3>";
							}else{

						?>
						<thead>
							<tr>
								<th>Customer Id</th>
								<th>Loan Type</th>
								<th>Customer Income</th>
								<th>Loan Amount</th>
								<th>Request Date</th>
								<th>Pay Time</th>
								<th>Checked</th>
								<th>Approved</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($loanRequests as $loan){ ?>
							<tr>
								<td><?php echo $loan['customer_id']; ?></td>
								<td><?php echo $loan['loan_type']; ?></td>
								<td><?php echo $loan['customer_income']; ?></td>
								<td><?php echo $loan['loan_amount']; ?></td>
								<td><?php echo $loan['request_date']; ?></td>
								<td><?php echo $loan['pay_time']; ?> Years</td>
								
								<td>
									<?php if ($loan['checked'] == 0) { ?>
										<a class="btn btn-success btn-xs" href="loanRequestsNew.php?checkRequest=<?php echo $loan['id']; ?>" style="color:#fff; text-decoration:none"><i class="fa fa-check"></i></a>
									<?php }else{echo "Checked";} ?>
								
								</td>
								<td>
								<!-- <a class="btn btn-success btn-xs" href="loanRequestsNew.php?approveRequest=<?php echo $loan['id']; ?>" style="color:#fff; text-d
								ecoration:none"><i class="fa fa-check"></i></a> -->
								<a class="btn btn-success btn-xs" data-toggle="modal" href="#apprvoeModel"  style="color:#fff; text-decoration:none "><i class="fa fa-check"></i></a>
								<a class="btn btn-danger btn-xs" data-toggle="modal" href="#rejectModal"  style="color:#fff; text-decoration:none "><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<?php } } //end foreach
                                   ?>

						</tbody>
					</table>
				</div>
				<!--approve Modal -->
		        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="apprvoeModel" class="modal fade">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Welcome Back</h4>
		              </div>
		              <form method="POST" action="">
			              <div class="modal-body">
			              	<input type="hidden" name="id" value="<?php echo $loan['id']; ?>" />
			                <label for="approve_money" class="control-label col-lg-2">Approve Money</label>
			                <input class="form-control placeholder-no-fix" id="approve_money" type="number" min="1" name="approvedAmount">
			                <label for="comment" class="control-label col-lg-2">Comment</label>
			                <textarea class="form-control placeholder-no-fix" id="comment" name="comment"></textarea>
			              </div>
			              <div class="modal-footer centered">
			                <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
			                <input class="btn btn-theme03" type="submit" value="Submit" name="approveRequest" />
			              </div>
		              </form>
		            </div>
		          </div>
		        </div>
		        <!-- modal -->

		        <!--Reject Modal -->
		        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="rejectModal" class="modal fade">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Welcome Back</h4>
		              </div>
		              <form method="POST" action="">
			              <div class="modal-body">
			              	<input type="hidden" name="id" value="<?php echo $loan['id']; ?>" />
			                <label for="cname" class="control-label col-lg-2">Comment</label>
			                <textarea class="form-control placeholder-no-fix" name="comment"></textarea>
			              </div>
			              <div class="modal-footer centered">
			                <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
			                <input class="btn btn-theme03" type="submit" value="Submit" name="reject" />
			              </div>
		              </form>
		            </div>
		          </div>
		        </div>
		        <!-- modal -->
			</div>
		</div>
	</section>
</section>
<?php
include_once('template/footer.php');
include_once('template/script.php');

?>