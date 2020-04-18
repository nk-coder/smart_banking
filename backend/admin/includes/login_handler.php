<?php 
		if (isset($_POST["admin_login"])) {
		$username = mysqli_real_escape_string($con,$_POST["username"]);
		$_SESSION['username'] = $username; //store username into session variable
		$password = md5($_POST["password"]);
		
		
	
			if(empty($username) || empty($password)){
				$_SESSION["ErrorMessage"]="All Field must be filled out";
				Redirect_to("adminLogin.php");
			}else{
				$check_database_query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
				//var_dump($check_database_query); exit;
				$check_login_query = mysqli_num_rows($check_database_query);
				
				if($check_login_query == 1){
					$row = mysqli_fetch_array($check_database_query);
					$user_id = $row['id'];
					$username = $row['username'];
					
					$_SESSION['username'] = $username;
					$_SESSION['user_id'] = $user_id;
					header("location: index.php");
				}else{
					$_SESSION["ErrorMessage"]="Your password or username was incorrect";
					Redirect_to("login.php");
					}	
					
			}
		}
		
	?>