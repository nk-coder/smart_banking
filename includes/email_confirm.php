<?php
	function redirect() {
		header('Location: ../account_request.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['verification_key'])) {
		redirect();
	} else {
		$con = new mysqli('localhost', 'root', '', 'smart_banking');

		$email = $con->real_escape_string($_GET['email']);
		$verification_key = $con->real_escape_string($_GET['verification_key']);

		$sql = $con->query("SELECT id FROM customers WHERE email='$email' AND verification_key='$verification_key' AND verified=0");

		if ($sql->num_rows > 0) {
			$con->query("UPDATE customers SET verified=1, verification_key='' WHERE email='$email'");
			echo "Your email has been verified! You can log in now! <a type='button' class='btn btn-primary' href='http://localhost:8080/smart_banking/backend/customer/customerLogin.php'>Login</a>";
		}else
			echo 'something went wrong';
	}
?>