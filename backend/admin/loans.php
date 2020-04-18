<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

?>
<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-user"></i> Pending Loan Requests</h4>
						<hr>
						<?php
							$loanRequests = mysqli_query($con,"SELECT * FROM loan_requests WHERE approved='YES' ORDER BY id DESC ");
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
								<td><?php echo $loan['pay_time']; ?></td>
								
								<td>
								<a class="btn btn-success btn-xs" href="customerApprove.php?id=<?php echo $loan['id']; ?>" style="color:#fff; text-decoration:none"><i class="fa fa-check"></i></a>
								</td>
								<td>
								<a class="btn btn-success btn-xs" href="customerApprove.php?id=<?php echo $loan['id']; ?>" style="color:#fff; text-decoration:none"><i class="fa fa-check"></i></a>
								<a class="btn btn-danger btn-xs" href="customerApprove.php?id=<?php echo $loan['id']; ?>" style="color:#fff; text-decoration:none"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<?php } } //end foreach
                                   ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</section>
<?php
include_once('template/footer.php');
include_once('template/script.php');

?>