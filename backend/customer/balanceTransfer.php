<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

$message_array = array();

if (isset($_POST['submit'])) {
	$receiver_account_no = $_POST['receiver_account_no'];
	$amount = $_POST['amount'];
  if ($amount<500) {
    array_push($message_array,"minimum amount 500");
  }

	$sender_acc = $customer_account['account_no'];
	$date = date('Y-m-d H:i:s');

	//Check Receiver Account is correct or not
	$find_receiver_acc = mysqli_query($con,"SELECT accounts.account_no, accounts.balance, customers.id, customers.first_name, customers.email FROM accounts JOIN customers ON accounts.customer_id=customers.id WHERE account_no='$receiver_account_no' AND customers.approved='YES'");
	$receiver_acc = mysqli_fetch_array($find_receiver_acc); //fetch in array
	if (mysqli_num_rows($find_receiver_acc) == 0) {
		array_push($message_array,"The Receiver Account was incorret");
	}

	//Check Balance is sufficient or not
	if ($customer_account['balance'] < $amount) {
		array_push($message_array,"Insufficient Balance");
	}

	// If no error send mail and than store the data
	if (empty($message_array)) {
		//send mail
		include '../../includes/mailSender.php';
		$mail->addAddress($customer['email'], $customer['first_name']);
    $mail->Subject = 'Fund Transfer';
    $mail->Body = '<b>Dear Sir,</b>Your A/C '.$customer_account['account_no'].' debited by BDT '.$amount.' on '.$date;

    if ($mail->send()){
      $mail->clearAddresses();
    	$deduct = $customer_account['balance'] - $amount; //deduct blance from sender account
			$add = $receiver_acc['balance'] + $amount; // Add balance into receiver account
			
		 	$transfer = mysqli_query($con,"INSERT INTO transactions VALUES('','$sender_acc','$receiver_account_no','$amount','$date','Balance_transfer') ");
			if ($transfer) {
				mysqli_query($con,"UPDATE accounts SET accounts.balance = '$deduct' WHERE accounts.account_no ='$sender_acc' ");
				mysqli_query($con,"UPDATE accounts SET accounts.balance = '$add' WHERE accounts.account_no ='$receiver_account_no' ");
				array_push($message_array,"Fund Transfered Successfully");

        //send mail to receiver
        //include '../../includes/mailSender.php';
        $mail->addAddress($receiver_acc['email'], $receiver_acc['first_name']);
        $mail->Subject = 'Fund Received';
        $mail->Body = '<b>Dear Sir,</b>Your A/C: '.$receiver_acc['account_no'].' has been received BDT '.$amount.' on '.$date. ' from A/C:'.$customer_account['account_no'];
        $mail->send();
			}
    }else{
    	array_push ($message_array,"Something wrong happened! Please try again!");
  	}
	}
}
?>
<section id="main-content">
      <section class="wrapper">
        <h3> Money Transfer</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-md-4 col-md-offset-4">
            <h4 class="title">Transfer</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="" method="POST">

              <div class="form-group">
                <input type="number"  name="receiver_account_no" class="form-control" id="contact-name" placeholder="Recever account Number" data-rule="minlen:4" >
              </div>
              <div class="form-group">
                <input type="number" name="amount" class="form-control" id="contact-email" placeholder="Balance" >
              </div>
              	<?php if(in_array("Insufficient Balance",$message_array)) echo "<div class='alert alert-danger'>Insufficient Balance</div> <br>";?>
              		<?php if(in_array("The Receiver Account was incorret",$message_array)) echo "<div class='alert alert-danger'>The Receiver Account was incorret</div> <br>";?>              
                  <?php if(in_array("minimum amount 500",$message_array)) echo "<div class='alert alert-danger'>Minimum Transfered amount is 500</div> <br>";?>              
              
              	<?php if(in_array("Fund Transfered Successfully",$message_array)) echo "<div class='alert alert-success'>Balance Transfered Successfully</div> <br>";?>
           
              <div class="form-send">
                <input type="submit" name="submit" class="btn btn-large btn-primary" value="Transfer">
              </div>

            </form>
          </div>

        </div>
        <!-- /row -->


        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>

<?php
include_once('template/footer.php');
include_once('template/script.php');

?>

