<?php
  $first_name = "";
  $last_name = "";
  $gender = "";
  $DoB = "";
  $address = "";
  $postcode= "";
  $nationality = "";
  $occupation = "";
  $image = "";
  $phone = "";
  $email = "";
  $email2 = "";
  $username = "";
  $password = "";
  $password2 = "";
  $date = "";
  $message_array = array();

  if (isset($_POST['account_request']) && !empty($_POST['account_request'])) {
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

    //image
    //$image = $_POST['image'];
    $image = "resource/images/uploads/customers/".basename($_FILES["image"]["name"]);

    //phone
    $phone = str_replace(' ', '',$_POST['phone']);
    $_SESSION['phone'] = $phone; // Store first name into session variable.

    //Email
    $email = strip_tags($_POST['email']); 
    $email = str_replace(' ', '', $email); 
    $email = lcfirst(strtolower($email)); 
    $_SESSION['email'] = $email; 

    //Email
    $email2 = strip_tags($_POST['email2']); 
    $email2 = str_replace(' ', '', $email2); 
    $email2 = lcfirst(strtolower($email2)); 
    $_SESSION['email2'] = $email2; 

    if($email == $email2){
      //check if email is in valid format 
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        //Check if email already exist or not
        $email_check = mysqli_query($con, "SELECT email FROM customers WHERE email = '$email'");
        //Count the number of rows returned
        
        $num_row = mysqli_num_rows($email_check);
        
        if($num_row > 0){
          array_push ($message_array,"Email already exist");
        }
      }else{
        array_push ($message_array,"Email Format is Invalid");
      }
    }else{
      array_push ($message_array,"Emails don't match");
    }

    //username
    $username = strip_tags($_POST['username']); 
    $username = str_replace(' ', '', $username);  
    $_SESSION['username'] = $username; 

    //Check if username already exist or not
    $username_check = mysqli_query($con, "SELECT username FROM customers WHERE username = '$username'");
    $num_row_username = mysqli_num_rows($username_check);
    if($num_row_username > 0){
      array_push ($message_array,"Username already exist");
    }

    //password
    $password = strip_tags($_POST['password']); 
    $password2 = strip_tags($_POST['password2']);

    if($password != $password2){
      array_push ($message_array,"Your passwords dont match");
    }else{
      if(preg_match('/[^A-Za-z0-9]/',$password)){
        array_push ($message_array,"Password should only contain english character or number");
      }
    }
    if(strlen($password) < 5 ){
      array_push ($message_array,"Password must be more then 5 characters");
    }

    if(empty($message_array)){
      //generate serial number
      $lastSerialNumberQuery = mysqli_query($con,"SELECT serial_number FROM customers ORDER BY ID DESC LIMIT 1"); //get last inserted serial number

      if (mysqli_num_rows($lastSerialNumberQuery) == 0){
        $serialNumber = 401; //check if table is empty then add default one 
      }else{
        $lastSerialNumber = mysqli_fetch_array($lastSerialNumberQuery); //fectch the query
        $serialNumber= $lastSerialNumber['serial_number']+1; //else increment the last serial number by 1
      }
      
      
      $verification_key = md5(time().$username); //generate the varification key

      $password = md5($password); //encrypt password using md5 algorithm

      //start the process of mail sending
      include 'mailSender.php';
      $mail->addAddress($email, $first_name);
      $mail->Subject = 'Account varification';
      $mail->Body = "<html>
                    <head>
                      <style>
                        a{
                          background-color: #4CAEC8;
                          border: none;
                          color: white !important;
                          padding: 15px 32px;
                          text-align: center;
                          text-decoration: none;
                          display: inline-block;
                          font-size: 16px;
                          border-radius: 5px;
                        }
                      </style>
                    </head>
                    <body>
                      <h2>You are almost done. Please click on the link below to complete your reigstration for opening bank account:</h2><br>
                      
                      <a href='http://localhost:8080/smart_banking/includes/email_confirm.php?email=$email&verification_key=$verification_key'>Click Here</a>
                      <p>
                        <h4>Your Serial Number is:<b>$serialNumber</b>. Please contact at your nearest branch with this Serial Number. Please ensure you confirm your email before going to the bank. Thanks </h4>
                      </p>
                    </body>
                    </html>";

      if ($mail->send()){
        //echo "hoiche"; exit();
        $insert_query = mysqli_query($con, "INSERT INTO customers VALUES('','$serialNumber','$first_name','$last_name','$DoB','$gender','$address','$postcode','$nationality','$occupation','$image','$phone','$email','$username','$password','$date','$verification_key',0,'NO','')");
        move_uploaded_file($_FILES["image"]["tmp_name"],$image);// save image on upload folder

        array_push ($message_array,"You have been registered! Please verify your email!");
      }else{
        //echo "hoy nai "; exit();
        array_push ($message_array,"Something wrong happened! Please try again!");
      }
    }
  }
?>
