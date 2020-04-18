<?php 
require_once('../../dbcon.php'); 

  $message_array = array(); //array to keep messages

  if (isset($_POST["customer_login"])) {
  $username = mysqli_real_escape_string($con,$_POST["username"]); //Escape special characters in strings
  $_SESSION['username'] = $username; //store username into session variable
  $password = md5($_POST["password"]); //encript password by using md5 hasing algorithm
  

    if(empty($username) || empty($password)){
      array_push($message_array, "All Field must be filled out");
    }else{
      //Check account 
      $check_database_query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
      $check_login_query = mysqli_num_rows($check_database_query);
      
      if($check_login_query == 1){
        $row = mysqli_fetch_array($check_database_query);
        $user_id = $row['id'];
        $username = $row['username'];
        
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_type'] = "admin";
        header("location: index");
      }else{
        array_push ($message_array,"Email or Password was incorrect");
        
        } 
    }
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
  <title>Smart Banking-Admin Login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="POST">
        <h2 class="form-login-heading">sign in now</h2>
        <h4 style="text-align: center;">
          <?php if(in_array("Email or Password was incorrect",$message_array)) echo "<span style='color: #e74c3c;'>Email or password was incorrect</span> <br>";?>
          <?php if(in_array("All Field must be filled out",$message_array)) echo "<span style='color: #e74c3c;'>All Field must be filled out</span> <br>";?>
        </h4>

      

        <div class="login-wrap">
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
          <br>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <br>
          <button class="btn btn-theme btn-block" type="submit" name="customer_login"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  
</body>

</html>