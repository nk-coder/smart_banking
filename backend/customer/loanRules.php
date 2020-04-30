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
						<h4> Loan Types</h4>
						<hr>
						<?php
							$loans = mysqli_query($con,"SELECT * FROM loan_types ORDER BY id DESC ");
							if (mysqli_num_rows($loans) == 0) {
								echo "<h3>No loan request approved till now</h3>";
							}else{

						?>
						<thead>
							<tr>
								<th>Loan Type</th>
								<th>Minimum Age</th>
								<th>Maximum Age</th>
								<th>Minimum Salary</th>
								<th>Minimum Loan Amount</th>
								<th>Maximum Loan Amount</th>
								<th>Interest Rate</th>
								<th>Maximum Pay Time</th>
								<th>Comments</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($loans as $loan){ ?>
							<tr>
								<td><?php echo $loan['loan_type']; ?></td>
								<td><?php echo $loan['minimum_age']; ?></td>
								<td><?php echo $loan['maximum_age']; ?></td>
								<td><?php echo $loan['minimum_salary']; ?></td>
								<td><?php echo $loan['minimum_loan_amount']; ?></td>
								<td><?php echo $loan['maximum_loan_amount']; ?></td>
								<td><?php echo $loan['interest_rate']; ?></td>
								<td><?php echo $loan['maximum_pay_time']; ?></td>
								<td><?php echo $loan['others']; ?></td>
								
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