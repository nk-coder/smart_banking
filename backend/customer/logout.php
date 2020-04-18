<?php 
	session_start();
	$_SESSION["user_id"]= null;
	$_SESSION["username"]= null;
	session_destroy();
	header("Location: customerLogin");
?>