<?php
	//connection variables
	$host = 'localhost';
	$user = 'root';
	$password = '';

	//create mysql connection
	$con = new mysqli($host,$user,$password);
	if ($con->connect_errno) {
	    printf("Connection failed: %s\n", $con->connect_error);
	    die();
	}

	//SQL to drop database;
	$sqlToDropDB = "DROP DATABASE IF EXISTS smart_banking;";
	if ($con->query($sqlToDropDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToDropDB . "<br>" . $con->error. "<br>";
	}

	//create the database
	if ( !$con->query('CREATE DATABASE smart_banking') ) {
	    printf("Errormessage: %s\n", $con->error);
	}

	//Creating connection object with database name;
	$sqlToUseDB = "USE smart_banking;";
	if ($con->query($sqlToUseDB) === TRUE) {
		echo "Database selected successfully<br>";
	} else {
		echo "Error: " . $sqlToUseDB . "<br>" . $con->error. "<br>";
	}

	$account_sql = "CREATE TABLE `accounts` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `account_type` varchar(50) NOT NULL,
	  `account_no` varchar(50) NOT NULL,
	  `customer_id` int(11) NOT NULL,
	  `balance` float(20,2) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8";

	if ($con->query($account_sql) === TRUE) {
		echo "accounts table created successfully<br>";
	} else {
		echo "Error: " . $account_sql . "<br>" . $con->error. "<br>";
	}

	//SQL to create table admin
	$admin_sql = "CREATE TABLE `admin` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `name` varchar(50) NOT NULL,
	  `username` varchar(30) NOT NULL,
	  `email` varchar(80) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `added_by` varchar(40) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;";



	if ($con->query($admin_sql) === TRUE) {
		echo "admin table created successfully<br>";
	} else {
		echo "Error: " . $admin_sql . "<br>" . $con->error. "<br>";
	}

	//insert admin
	$insert_admin = "INSERT INTO `smart_banking`.`admin`(`name`,`username`,`email`, `password`,`added_by`) VALUES ('Esha','esha','esha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','System');";

	if ($con->query($insert_admin) === TRUE) {
		echo "Admin created successfully<br>
		<b>username:esha<br>password:123456</b><br><br>";
	} else {
		echo "Error: " . $insert_admin . "<br>" . $con->error. "<br>";
	}


	$customers_sql = "CREATE TABLE `customers` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `serial_number` int(30) NOT NULL,
	  `first_name` varchar(25) NOT NULL,
	  `last_name` varchar(25) NOT NULL,
	  `dob` date NOT NULL,
	  `gender` varchar(7) NOT NULL,
	  `address` varchar(255) NOT NULL,
	  `postcode` varchar(50) NOT NULL,
	  `nationality` varchar(25) NOT NULL,
	  `occupation` varchar(50) NOT NULL,
	  `image` varchar(255) NOT NULL,
	  `phone` varchar(20) NOT NULL,
	  `email` varchar(80) NOT NULL,
	  `username` varchar(40) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  `verification_key` varchar(255) NOT NULL,
	  `verified` int(2) NOT NULL COMMENT '0-NO, 1-YES',
	  `approved` varchar(4) NOT NULL,
	  `approved_by` varchar(30) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($con->query($customers_sql) === TRUE) {
		echo "customers table created successfully<br>";
	} else {
		echo "Error: " . $customers_sql . "<br>" . $con->error. "<br>";
	}

	$transaction_sql = "CREATE TABLE `transactions` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `account_no` varchar(100) NOT NULL,
	  `receiver_account` varchar(100) NOT NULL,
	  `amount` int(11) NOT NULL,
	  `date` datetime NOT NULL,
	  `transaction_type` varchar(30) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($con->query($transaction_sql) === TRUE) {
		echo "transactions table created successfully<br>";
	} else {
		echo "Error: " . $transaction_sql . "<br>" . $con->error. "<br>";
	}

	$loan_types_sql = "CREATE TABLE `loan_types` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `loan_type` varchar(30) NOT NULL,
	  `minimum_age` int(3) NOT NULL,
	  `maximum_age` int(3) NOT NULL,
	  `minimum_salary` float(11,2) NOT NULL,
	  `minimum_loan_amount` float(11,2) NOT NULL,
	  `maximum_loan_amount` float(15,2) NOT NULL,
	  `interest_rate` float(3,2) NOT NULL,
	  `others` text NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($con->query($loan_types_sql) === TRUE) {
		echo "loan_types table created successfully<br>";
	} else {
		echo "Error: " . $loan_types_sql . "<br>" . $con->error. "<br>";
	}

	$loan_request_sql = "CREATE TABLE `loan_requests` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `customer_id` int(11) NOT NULL,
	  `token_no` varchar(50) NOT NULL,
	  `loan_type` varchar(30) NOT NULL,
	  `customer_income` float(11,2) NOT NULL,
	  `loan_amount` float(15,2) NOT NULL,
	  `request_date` date NOT NULL,
	  `pay_time` int(11) NOT NULL,
	  `checked` int(2) NOT NULL,
	  `approved` int(2) NOT NULL,
	  `approved_date` date NOT NULL,
	  `comments` text NOT NULL,
	  `approved_amount` float(15,3) NOT NULL,
	  `mature_date` date NOT NULL,
	  `monthly_payable` float(15,3) NOT NULL,
	  `total_payable` float(15,3) NOT NULL,
	  `total_paid` float(15,3) NOT NULL,
	  `remaining` float(15,3) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($con->query($loan_request_sql) === TRUE) {
		echo "loan_requests table created successfully<br>";
	} else {
		echo "Error: " . $loan_request_sql . "<br>" . $con->error. "<br>";
	}

	$loan_pay_sql = "CREATE TABLE `loan_pays` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `loan_request_id` int(11) NOT NULL,
	  `pay_date` date NOT NULL,
	  `amount` float(15,3) NOT NULL,
	  `total_paid` float(15,3) NOT NULL,
	  `remaining` float(15,3) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	if ($con->query($loan_pay_sql) === TRUE) {
		echo "loan_pays table created successfully<br>";
	} else {
		echo "Error: " . $loan_reloan_pay_sqlquest_sql . "<br>" . $con->error. "<br>";
	}

	?>