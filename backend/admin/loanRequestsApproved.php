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
						<h4><i class="fa fa-user"></i> Approved Loan Requests</h4>
						<hr>
						<?php
							$loanRequests = mysqli_query($con,"SELECT *, customers.first_name,customers.last_name,accounts.account_no FROM `loan_requests` JOIN customers ON loan_requests.customer_id = customers.id JOIN accounts on accounts.customer_id=customers.id WHERE loan_requests.approved=1 ORDER BY loan_requests.id DESC ");
							if (mysqli_num_rows($loanRequests) == 0) {
								echo "<h3>No loan request approved till now</h3>";
							}else{

						?>
						<thead>
							<tr>
								<th>Customer Id</th>
								<th>Customer Name</th>
								<th>Customer Account</th>
								<th>Loan Type</th>
								<th>Customer Income</th>
								<th>Loan Amount</th>
								<th>Request Date</th>
								<th>Pay Time</th>
								<th>Approved date</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($loanRequests as $loan){ ?>
							<tr>
								<td><?php echo $loan['customer_id']; ?></td>
								<td><?php echo $loan['first_name']." ". $loan['last_name']; ?></td>
								<td><?php echo $loan['account_no']; ?></td>
								<td><?php echo $loan['loan_type']; ?></td>
								<td><?php echo $loan['customer_income']; ?></td>
								<td><?php echo $loan['loan_amount']; ?></td>
								<td><?php echo $loan['request_date']; ?></td>
								<td><?php echo $loan['pay_time']; ?></td>
								<td><?php echo $loan['approved_date']; ?></td>
								
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