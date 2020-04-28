<?php
$message_array = array();
if (isset($_POST['loan_request'])) {
	$customerId = $customerLoggedIn; //get customer id form session at head.php
	$loanType = $_POST['loanType'];
	$_SESSION['loanType'] = $_POST['loanType'];

	$income = $_POST['income'];
	$_SESSION['income'] = $_POST['income'];

	$loanAmount = $_POST['loanAmount'];
	$_SESSION['loanAmount'] = $_POST['loanAmount'];

	$paytime = $_POST['paytime'];
	$_SESSION['paytime'] = $_POST['paytime'];

	$dob = $customer['dob'];

	$currentDate = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($currentDate)); // find difference between birth date and currtent date
	$age = $diff->format('%y'); // Format into year

	if (empty($_POST['loanType']) || empty($_POST['income']) || empty($_POST['loanAmount']) || empty($_POST['paytime']) ) {
      array_push ($message_array,"All field must be filled out");
    }

	//condition for home loan
	if ($loanType == "Home") {
		$homeLoans = mysqli_query($con,"SELECT * FROM loan_types WHERE loan_type='Home'");
		$homeLoan = mysqli_Fetch_array($homeLoans);
		$minimum_salary =  $homeLoan['minimum_salary'];
		$minimum_age =  $homeLoan['minimum_age'];
		$maximum_age =  $homeLoan['maximum_age'];
		$minimum_loan_amount =  $homeLoan['minimum_loan_amount'];
		$maximum_loan_amount =  $homeLoan['maximum_loan_amount'];

		//check income criteria
		if ($income < $minimum_salary) {
		array_push ($message_array,"monthly income is incorret");
		}
		//age confirmation
		if ($age <$minimum_age || $age >$maximum_age) {
			array_push ($message_array,"age not matched");
		}

		//check loan amount
		if ($loanAmount <$minimum_loan_amount || $loanAmount>$maximum_loan_amount) {
			array_push ($message_array,"loan amount not satisfied");
		}
	}	

	//condition for personal loan
	if ($loanType == "Personal") {
		$personalLoans = mysqli_query($con,"SELECT * FROM loan_types WHERE loan_type='Home'");
		$personalLoan = mysqli_Fetch_array($personalLoans);
		$minimum_salary =  $personalLoan['minimum_salary'];
		$minimum_age =  $personalLoan['minimum_age'];
		$maximum_age =  $personalLoan['maximum_age'];
		$minimum_loan_amount =  $personalLoan['minimum_loan_amount'];
		$maximum_loan_amount =  $personalLoan['maximum_loan_amount'];

		//check income criteria
		if ($income < $minimum_salary) {
		array_push ($message_array,"monthly income is incorret");
		}
		//age confirmation
		if ($age<$minimum_age || $age>$maximum_age) {
			array_push ($message_array,"age not matched");
		}

		//check loan amount
		if ($loanAmount <$minimum_loan_amount || $loanAmount>$maximum_loan_amount) {
			array_push ($message_array,"loan amount not satisfied");
		}
	}

	//condition for car loan
	if ($loanType == "Car") {
		$carLoans = mysqli_query($con,"SELECT * FROM loan_types WHERE loan_type='Car'");
		$carLoan = mysqli_Fetch_array($carLoans);
		$minimum_salary =  $carLoan['minimum_salary'];
		$minimum_age =  $carLoan['minimum_age'];
		$maximum_age =  $carLoan['maximum_age'];
		$minimum_loan_amount =  $carLoan['minimum_loan_amount'];
		$maximum_loan_amount =  $carLoan['maximum_loan_amount'];

		//check income criteria
		if ($income < $minimum_salary) {
		array_push ($message_array,"monthly income is incorret");
		}
		//age confirmation
		if ($age <$minimum_age || $age >$maximum_age) {
			array_push ($message_array,"age not matched");
		}

		//check loan amount
		if ($loanAmount <$minimum_loan_amount || $loanAmount>$maximum_loan_amount) {
			array_push ($message_array,"loan amount not satisfied");
		}
	}

	if (empty($message_array)) {
		 
		$insert_query = mysqli_query($con,"INSERT INTO loan_requests VALUES('','$customerId','','$loanType','$income','$loanAmount','$currentDate','$paytime','NO','NO','','','','','','','','') ");
		if ($insert_query) {
			array_push ($message_array,"request submited");
		}
	}
	
}
?>