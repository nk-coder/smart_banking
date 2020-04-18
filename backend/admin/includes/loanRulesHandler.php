<?php
$message_array = array();
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	
	$loanType = $_POST['loanType'];
	$loanType = ucfirst(strtolower($loanType)); // uppercase first letter
	$minimumIncome = $_POST['minimumIncome'];
	$minimumAge = $_POST['minimumAge'];
	$maximumAge = $_POST['maximumAge'];
	$minimumLoanAmount = $_POST['minimumLoanAmount'];
	$maximumLoanAmount = $_POST['maximumLoanAmount'];
	$interestRate = $_POST['interestRate'];
	$others = $_POST['others'];

	// get loan type is already added in database or not
	$getLoans = mysqli_query($con,"SELECT loan_type FROM laons WHERE loan_type='$loanType' ");

	//check all field is empty or not
	if (empty($loanType) || empty($minimumIncome) || empty($minimumAge) || empty($maximumAge) || empty($minimumLoanAmount) || empty($maximumLoanAmount) || empty($interestRate) || empty($others)) {
		array_push ($message_array,"All field must be filled out");
	}else if (mysqli_num_rows($getLoans)>0) {
		array_push ($message_array,"already added");
	}else{
		//check minimum income
		if (!is_numeric($minimumIncome)) {
		array_push ($message_array,"Minimum income should be numeric");
		}

		//check minimum Age
		if (!is_numeric($minimumAge)) {
			array_push ($message_array,"Minimum Age should be numeric");
		}

		//check maximum Age
		if (!is_numeric($maximumAge)) {
			array_push ($message_array,"Maximum Age should be numeric");
		}

		//check minimum Loan Amount
		if (!is_numeric($minimumLoanAmount)) {
			array_push ($message_array,"Minimum Loan Amount should be numeric");
		}

		//check maximum Loan Amount
		if (!is_numeric($maximumLoanAmount)) {
			array_push ($message_array,"Maximum Loan Amount should be numeric");
		}
		//check interest Rate 
		if (!is_numeric($interestRate)) {
			array_push ($message_array,"Interest Rate should be numeric");
		}
		
		
	}
	
	if (empty($message_array)) {
		
		$insert_query = mysqli_query($con, "INSERT INTO loans VALUES('','$loanType','$minimumAge','$maximumAge','$minimumIncome','$minimumLoanAmount','$maximumLoanAmount','$interestRate','$others')");
		if ($insert_query) {
			array_push ($message_array,"Loan Added Successfully");
		}
	}
}

?>