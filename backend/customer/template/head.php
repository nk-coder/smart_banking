<?php 

  include_once("../../dbcon.php");
  if(isset($_SESSION['user_id']) && $_SESSION['user_type']=='customer'){
    $customerLoggedIn = $_SESSION['user_id'];
    //get customer details
    $customer_details_query = mysqli_query($con, "SELECT * FROM customers WHERE id = '$customerLoggedIn'");
    $customer = mysqli_fetch_array($customer_details_query);

    //get customer account details
    $customer_account_query = mysqli_query($con,"SELECT * FROM accounts WHERE customer_id='$customerLoggedIn'");
    $customer_account = mysqli_fetch_array($customer_account_query);
  }else{
    header("Location: customerLogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Smart Banking</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  
</head>