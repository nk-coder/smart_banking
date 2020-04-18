<?php
session_start();

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("localhost", "root", "", "smart_banking"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>