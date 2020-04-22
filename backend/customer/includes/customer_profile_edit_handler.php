//operation for changing password
<?php 
// $customers = mysqli_query($con, "SELECT * FROM customers WHERE id='$customerLoggedIn'");
// $cs = mysqli_fetch_array($customers);

$message_array = array();
if(isset($_POST['change_password'])){

	$old_password = strip_tags($_POST['old_password']);
	$new_password_1 = strip_tags($_POST['new_password_1']);
	$new_password_2 = strip_tags($_POST['new_password_2']);

	$db_password = $customer['password'];
	

	if (md5($old_password) == $db_password) {
		if ($new_password_1 == $new_password_2) {
			if (strlen($new_password_1 <=5)) {
				array_push($message_array,"Sorry, your password must be greater than 6 characters");
			}else{
				$new_password_md5 = md5($new_password_1);
				$password_query = mysqli_query($con, "UPDATE customers SET password='$new_password_md5' WHERE id='$userLoggedIn'");
				if ($password_query) {
					array_push ($message_array,"Password has been changed");
				}
			}
		}else{
			array_push($message_array,"Passwords are not matched");
		}
	}else{
		array_push($message_array,"Old Password was wrong");
	}
}
?>

//operation for editing customer profile
<?php
  $first_name = "";
  $last_name = "";
  $gender = "";
  $DoB = "";
  $address = "";
  $postcode= "";
  $nationality = "";
  $occupation = "";
  $phone = "";
  $email = "";
  $email2 = "";
  $username = "";
  $password = "";
  $password2 = "";
  $date = "";
  $message_array = array();

  if (isset($_POST['update_profile']) && !empty($_POST['update_profile'])) {
    $date = date("Y-m-d");

    //var_dump($_POST['account_request']); exit();

    //First name
    $first_name = strip_tags($_POST['first_name']);//Remove html tags
    $first_name = str_replace(' ', '',$_POST['first_name']);//remove spaces
    $first_name = ucfirst(strtolower($_POST['first_name']));// uppercase first letter
    $_SESSION['first_name'] = $first_name; // Store first name into session variable.

    //last name
    $last_name = strip_tags($_POST['last_name']);
    $last_name = str_replace(' ', '',$_POST['last_name']);
    $last_name = ucfirst(strtolower($_POST['last_name']));
    $_SESSION['last_name'] = $last_name; 

    //date of barth
    $DoB = $_POST['dob'];

    //last name
    $gender = strip_tags($_POST['gender']);
    $gender = str_replace(' ', '',$_POST['gender']);
    $gender = ucfirst(strtolower($_POST['gender']));
    $_SESSION['gender'] = $gender; 

    //address
    $address = strip_tags($_POST['address']);
    $_SESSION['address'] = $address; 

    //postcode
    $postcode = strip_tags($_POST['postcode']);
    $postcode = str_replace(' ', '',$_POST['postcode']);
    $_SESSION['postcode'] = $postcode; 

    //nationality
    $nationality = strip_tags($_POST['nationality']);
    $nationality = str_replace(' ', '',$_POST['nationality']);
    $nationality = ucfirst(strtolower($_POST['nationality']));
    $_SESSION['nationality'] = $nationality; 

    //occupation
    $occupation = strip_tags($_POST['occupation']);
    $occupation = str_replace(' ', '',$_POST['occupation']);
    $occupation = ucfirst(strtolower($_POST['occupation']));
    $_SESSION['occupation'] = $occupation; 

    //phone
    $phone = str_replace(' ', '',$_POST['phone']);
    $_SESSION['phone'] = $phone; // Store first name into session variable.

    //Email
    $email = strip_tags($_POST['email']); 
    $email = str_replace(' ', '', $email); 
    $email = lcfirst(strtolower($email)); 
    $_SESSION['email'] = $email; 

    
    //check if email is in valid format 
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		
		if ($email != $customer['email']) {
			//Check if email already exist or not
			$email_check = mysqli_query($con, "SELECT email FROM customers WHERE email = '$email'");
			//Count the number of rows returned

			$num_row = mysqli_num_rows($email_check);

			if($num_row > 0){
				array_push ($message_array,"Email already exist");
			}
		}
		
	}else{
		array_push ($message_array,"Email Format is Invalid");
	}
    
    //username
    $username = strip_tags($_POST['username']); 
    $username = str_replace(' ', '', $username);  
    $_SESSION['username'] = $username; 

    if ($username != $customer['username']) {
    	//Check if username already exist or not
	    $username_check = mysqli_query($con, "SELECT username FROM customers WHERE username = '$username'");
	    $num_row_username = mysqli_num_rows($username_check);
	    if($num_row_username > 0){
	      array_push ($message_array,"Username already exist");
	    }
    }

    if(empty($message_array)){
    	
        	mysqli_query($con, "UPDATE customers SET first_name='$first_name',last_name='$last_name',gender='$gender',DoB='$DoB',address='$address',postcode='$postcode',nationality='$nationality',occupation='$occupation',phone='$phone',email='$email',username='$username' WHERE id='$customerLoggedIn' ");
        	
    }
  }
?>
