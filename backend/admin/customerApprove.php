<?php 
	include_once("../../dbcon.php");
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$account_no = rand(10000000,99999999);
		$update_sql = mysqli_query($con,"UPDATE customers SET approved='YES' WHERE id='$id'");
		$create_account = mysqli_query($con,"INSERT INTO accounts VALUES('','current','$account_no','$id','0') ");
		if ($update_sql){
		header('location:newCustomers.php');
		}else{

		}
	}
?>