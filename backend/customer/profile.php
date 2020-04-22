<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="row content-panel">
					<div class="col-md-4 profile-text mt mb centered">
						<div class="right-divider hidden-sm hidden-xs">
							<h4>Current Balance</h4>
							<h5><?php echo $customer_account['balance'];?></h5>
							
						</div>
					</div>
					<!-- /col-md-4 -->
					<div class="col-md-4 profile-text">
						<h3>
							<?php echo $customer['first_name']." ".$customer['last_name']; ?>
						</h3>
						<br>
						<p><button class="btn btn-theme"><i class="fa fa-paper-plane"></i> Transfer Balance</button></p>
					</div>
					<!-- /col-md-4 -->
					<div class="col-md-4 centered">
						<div class="profile-pic">
							<p><img src="<?php echo "../../".$customer['image']; ?>" class="img-circle"></p>
							<p>
			                    <a href="customerEdit?customerId=<?php echo $customerLoggedIn;?>" class="btn btn-theme"><i class="fa fa-pencil"></i> Edit Profile</a>
			                    <a href="changePassword" class="btn btn-theme02">Change Password</a>
			                  </p>
						</div>
					</div><!-- /col-md-4 -->
				</div><!-- /row -->
			</div><!-- /col-lg-12 -->
			<div class="col-lg-12 mt">
			<div class="row content-panel">
			<div class="panel-heading">
				<ul class="nav nav-tabs nav-justified">
					<li class="active">
					<a data-toggle="tab" href="#overview">Overview</a>
					</li>
					<li>
					<a data-toggle="tab" href="#edit" class="contact-map">Loan</a>
					</li>
					<li>
					<a data-toggle="tab" href="#transaction_history">Transaction History</a>
					</li>
				</ul>
			</div><!-- /panel-heading -->
			<div class="panel-body">
				<div class="tab-content">
					<div id="overview" class="tab-pane active">
						<div class="row">
							<div class="col-md-12 detailed">
								<h4>User Stats</h4>
								<div class="row centered mt mb">
									<div class="col-sm-4">
										<h1><i class="fa fa-money"></i></h1>
										<h3><?php echo $customer_account['balance'];?></h3>
										<h5>Current Balance</h5>
									</div>
									<div class="col-sm-4">
										<h1><i class="fa fa-trophy"></i></h1>
										<h3>37</h3>
										<h6>COMPLETED TASKS</h6>
									</div>
									<div class="col-sm-4">
										<h1><i class="fa fa-shopping-cart"></i></h1>
										<h3>1980</h3>
										<h6>ITEMS SOLD</h6>
									</div>
								</div>
								<!-- /row -->					
							</div><!-- /col-md-12 -->
						</div><!-- /row -->
					</div>
					
					<!-- /tab-pane -->
					<div id="edit" class="tab-pane">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2 detailed mt">
								<h4 class="mb">Loan</h4>
								<?php 
									$loan_requests = mysqli_query($con,"SELECT * FROM loan_requests WHERE customer_id='$customerLoggedIn' AND approved=1 ");
									if (mysqli_num_rows($loan_requests) == 0) {
										echo "<h3>There is no request for laon</h3>";
									}else{
								?>
								<table class="table table-striped table-advance table-hover">
									<thead>
										<tr>
											<th>Customer Id</th>
											<th>Loan Type</th>
											<th>Customer Income</th>
											<th>Loan Amount</th>
											<th>Request Date</th>
											<th>Pay Time</th>
											<th>Approved Date</th>
											<th>Comments</th>
											<th>Approved Amount</th>
											<th>Mature date</th>
											<th>Monthly Payable</th>
											<th>Total Payable</th>
											<th>Total Paid</th>
											<th>Remaining</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($loan_requests as $loan){ ?>
										<tr>
											<td><?php echo $loan['customer_id']; ?></td>
											<td><?php echo $loan['loan_type']; ?></td>
											<td><?php echo $loan['customer_income']; ?></td>
											<td><?php echo $loan['loan_amount']; ?></td>
											<td><?php echo $loan['request_date']; ?></td>
											<td><?php echo $loan['pay_time']; ?> Years</td>
											<td><?php echo $loan['approved_date']; ?></td>
											<td><?php echo $loan['approved_amount']; ?></td>
											<td><?php echo $loan['mature_date']; ?></td>
											<td><?php echo $loan['monthly_payable']; ?></td>
											<td><?php echo $loan['total_payable']; ?></td>
											<td><?php echo $loan['total_paid']; ?></td>
											<td><?php echo $loan['remaining']; ?></td>
											
										</tr>
										<?php } } //end foreach
			                                   ?>

									</tbody>
								</table>
								
							</div>
							<!-- /col-lg-8 -->
						</div>
						<!-- /row -->
					</div>
					<!-- /tab-pane -->

					<div id="transaction_history" class="tab-pane">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2 detailed mt">
								<h4 class="mb">Transaction</h4>
								<?php 
									$transactions = mysqli_query($con,"SELECT * FROM `transactions` JOIN accounts on transactions.account_no=accounts.account_no  WHERE accounts.customer_id='$customerLoggedIn' ");
									if (mysqli_num_rows($transactions) == 0) {
										echo "<h3>No transaction happend yet</h3>";
									}else{
								?>
								<table class="table table-striped table-advance table-hover">
									<thead>
										<tr>
											<th>Reciver Account</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Transaction Type</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($transactions as $transaction){ ?>
										<tr>
											<td><?php echo $transaction['receiver_account']; ?></td>
											<td><?php echo $transaction['amount']; ?></td>
											<td><?php echo $transaction['date']; ?></td>
											<td><?php echo $transaction['transaction_type']; ?></td>
											
											
										</tr>
										<?php } } //end foreach
			                                   ?>

									</tbody>
								</table>
								
							</div>
							<!-- /col-lg-8 -->
						</div>
						<!-- /row -->
					</div>
					<!-- /tab-pane -->
				</div>
				<!-- /tab-content -->
			</div>
			<!-- /panel-body -->
			</div>
			<!-- /col-lg-12 -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->	
	</section>
	<!-- /wrapper -->
</section>

<?php
include_once('template/footer.php');
include_once('template/script.php');

?>