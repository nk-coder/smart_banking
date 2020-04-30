<?php
include_once('template/header.php');
//include_once('template/nav.php');



    $query = mysqli_query($con,"SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'customers' AND COLUMN_NAME = 'serial_number'");
    $q = mysqli_fetch_array($query);
    //echo $q;

    $today = time();
    $months = 1;
$twoMonthsLater = strtotime("+$months years", $today);
echo  date('d-m-Y',$twoMonthsLater); echo "</br>";
echo 'Two months later will be : ' . date('m-d-Y', $twoMonthsLater);

$customers = mysqli_query($con,"SELECT customers.id, customers.first_name, customers.email, loan_requests.pay_time FROM customers JOIN loan_requests ON loan_requests.customer_id=customers.id WHERE loan_requests.id =1");
	$customer = mysqli_fetch_array($customers);
	echo "</br>";
	echo $customer['id'];echo "</br>";
	echo $customer['first_name'];echo "</br>";
	echo $customer['email'];echo "</br>";
	echo $customer['pay_time'];echo "</br>";

	$interestRate =7;
	$interestRate = ($interestRate/100)/12;
	//echo $interestRate;
	$principal = 450000;
	$terms = 24*12;
	$result= $principal * (($interestRate* pow(1+$interestRate,$terms))/(pow(1+$interestRate,$terms)-1));
	echo "Monthly payment =".$result;
	echo "</br>";
	echo $result * $terms;
	echo "</br>";
	printf("Monthly pay is %.2f", $result); 
echo "</br>";
	$currentDate = date('d');
	echo $currentDate;
	

echo "</br>";
//$date = date();
	//$date = '2005/10/30';
 
$weekday = date('l', strtotime(date('Y-m-d'))); // note: first arg to date() is lower-case L
 
echo $weekday; 
?>