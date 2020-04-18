<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');
include_once('includes/loanRulesHandler.php');

?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div id="edit" class="tab-pane">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 detailed">
						<h4 class="mb">Add New Loan Type</h4>
							<?php if(in_array("All field must be filled out",$message_array)) echo "<span style='color: #e74c3c; text-align: center;'><h3>All field must be filled out</h3></span> <br>";?>
							<?php if(in_array("alredy added",$message_array)) echo "<span style='color: #e74c3c; text-align: center;'><h3>This Loan type alredy added</h3></span> <br>";?>
							<?php if(in_array("Loan Added Successfully",$message_array)) echo "<span style='color: #2ecc71; text-align: center;'><h3>Loan Added Successfully</h3></span> <br>";?>
						
						
						<form role="form" method='POST' action="" class="form-horizontal" >
							
							<div class="form-group">
								<label class="col-lg-2 control-label">Loan Type</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Loan Type" name="loanType" id="c-name" class="form-control" value="<?php if(isset($_SESSION['loanType'])){
										echo $_SESSION['loanType'];
									} ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Minimum Income</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Minimum Income" name="minimumIncome" id="lives-in" class="form-control">
								</div>
								<?php if(in_array("Minimum income should be numeric",$message_array)) echo "<span style='color: #e74c3c; text-align: center;'>Minimum income should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Minimum Age</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Minimum Age" name="minimumAge" id="country" class="form-control" >
								</div>
								<?php if(in_array("Minimum Age should be numeric",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Minimum Age should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Maximum Age</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Maximum Age" name="maximumAge" id="country" class="form-control" >
								</div>
								<?php if(in_array("Maximum Age should be numeric",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Maximum Age should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Minimum Loan Amount</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Minimum Loan Amount" name="minimumLoanAmount" id="country" class="form-control" >
								</div>
								<?php if(in_array("Minimum Loan Amount should be numeric",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Minimum Loan Amount should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Maximum Loan Amount</label>
								<div class="col-lg-6">
									<input type="text" placeholder="Maximum Loan Amount" name="maximumLoanAmount" id="country" class="form-control">
								</div>
								<?php if(in_array("Maximum Loan Amount should be numeric",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Maximum Loan Amount should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Interest Rate</label>
								<div class="col-lg-6">
									<input type="number" min="0" placeholder="Interest Rate" name="interestRate" id="country" class="form-control">
								</div>
								<?php if(in_array("Interest Rate should be numeric",$message_array)) echo "<span style='color: #e74c3c;'>Interest Rate should be numeric</span> <br>";?>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Maximum payable time (In Month)</label>
								<div class="col-lg-6">
									<input type="number" min="1" placeholder="maxtime" name="maxtime" id="country" class="form-control">
								</div>
								<?php if(in_array("Interest Rate should be numeric",$message_array)) echo "<span style='color: #e74c3c;'>Interest Rate should be numeric</span> <br>";?>
							</div>

							<div class="form-group">
								<label class="col-lg-2 control-label">Others</label>
								<div class="col-lg-6">
									<textarea  placeholder="Others" name="others" id="country" class="form-control"> </textarea>
								</div>
							</div>
							

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<input class="btn btn-theme" name="submit" type="submit" value="Submit" />
								</div>
							</div>
						</form>
					</div>
					<!-- /col-lg-8 -->
				</div>
				<!-- /row -->
			</div>
		</div>
	</section>
</section>
<?php
include_once('template/footer.php');
include_once('template/script.php');

?>