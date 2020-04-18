<?php 
$message_array = array();
//update database table wehen admin comfirm loan is checked
if (isset($_GET['checkRequest'])) {
	$requestId = $_GET['checkRequest'];
	$update_sql = mysqli_query($con,"UPDATE loan_requests SET checked=1 WHERE id='$requestId'");
	if ($update_sql) {
		array_push($message_array, "checked");
	}else{
		array_push($message_array, "something went wrong");
	}
}

//loan approved
//update database table wehen admin approve the loan and send the main
if (isset($_POST['approveRequest'])) {
	$currentDate = date('Y-m-d'); //get current date
	$currentTime = time(); //get current time
	$requestId = $_POST['id'];
	$approvedAmount = $_POST['approvedAmount'];
	$comment = $_POST['comment'];

	//get customer data for sendin mail to the customer who send loan request
	$customers = mysqli_query($con,"SELECT customers.id, customers.first_name, customers.email, loan_requests.pay_time, loan_types.interest_rate FROM customers JOIN loan_requests ON loan_requests.customer_id=customers.id JOIN loan_types ON loan_types.loan_type = loan_requests.loan_type WHERE loan_requests.id ='$requestId'");
	$customer = mysqli_fetch_array($customers);

	//get data from query
	$customerId = $customer['id'];
	$customerName = $customer['first_name'];
	$customerEmail = $customer['email'];
	$pay_time = $customer['pay_time'];
	$interest_rate = $customer['interest_rate'];

	$finalDateForPay = strtotime("+$pay_time years", $currentTime); //find the date by adding months with currentTime
	$matureDate = date('Y-m-d',$finalDateForPay); //convert the time into date
	$token_no = md5(time()."Loan"); //generate token number

	// procssing for claculate total payable amount and mothly payble amount with interest
	$interestRate = ($interest_rate/100)/12; //convert form % divide by 100 and divide by 12 for months
	$principal = $approvedAmount;
	$months = $pay_time * 12; //convert year to months
	$monthlyPayable= $principal * (($interestRate* pow(1+$interestRate,$months))/(pow(1+$interestRate,$months)-1)); //apply claculation formula
	$totalPayable = $monthlyPayable * $months; // Total payable amount
	//star sending mail
	include '../../includes/mailSender.php';
	$mail->addAddress($customer['email'], $customer['first_name']);
	$mail->Subject = 'Loan Confirmation';
	$mail->Body = "<html>
	            <head>
	            </head>
	            <body>
	              <h2>Dear valuable customer $customer[first_name],</br>Your loan request has been accepted.</h2>
	              	<p>
                        Your Token Number is:<b>$token_no</b>. Please contact at your nearest branch with this Token Number. Please ensure you confirm your email before going to the bank. </br>Thanks
                    </p>
	              
	            </body>
	            </html>";

	if ($mail->send()) {
		$update_sql = mysqli_query($con,"UPDATE loan_requests SET approved=1, approved_date='$currentDate', token_no='$token_no', comments='$comment', approved_amount='$approvedAmount', mature_date='$matureDate', monthly_payable='$monthlyPayable', total_payable='$totalPayable',total_paid=0, remaining='$totalPayable' WHERE id='$requestId'");
		//insert data into loans table
		if ($update_sql) {
			array_push($message_array, "approved");
		}else{
			array_push($message_array, "something went wrong");
		}	
	}else{
		array_push($message_array, "Mail not sent");
	}
	
}

//loan reject
//updata database table when admin reject the loan request and send mail
if (isset($_POST['reject'])) {
	$loan_request_id = $_POST['id']; 
	$comment = $_POST['comment']; 

	//get customer data for sending mail to the customer who send loan request
	$customers = mysqli_query($con,"SELECT * FROM customers JOIN loan_requests ON loan_requests.customer_id=customers.id WHERE loan_requests.id = '$loan_request_id'");
	$customer = mysqli_fetch_array($customers);
	include '../../includes/mailSender.php';
	$mail->addAddress($customer['email'], $customer['first_name']);
	$mail->Subject = 'Loan Confirmation';
	$mail->Body = "<html>
	            <head>
	            </head>
	            <body>
	              <h2>Dear valuable customer $customer[first_name]</h2>
	              	<p>
                        We are very sorry that we can't accept your loan request because of </br>
                        $comment</br></br>
                        Please feel free to contact with your nearest branch for further inquiry.</br>
                        Thanks.
                    </p>
	              
	            </body>
	            </html>";
	
	if ($mail->send()){           
		$update_sql = mysqli_query($con,"UPDATE loan_requests SET approved=2, comments='$comment' WHERE id='$loan_request_id'");
		if ($update_sql) {
			array_push($message_array, "rejected");
		}else{
			array_push($message_array, "something went wrong");
		}
	}else{
			array_push($message_array, "Mail not sent");
	}
}

?>