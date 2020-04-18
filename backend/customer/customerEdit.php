<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');
include_once('includes/customer_profile_edit_handler.php');

if (!isset($_GET['customerId'])) {
	
}else{
?>	

<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div id="edit" class="tab-pane">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 detailed">
						<h4 class="mb">Edit Your Information</h4>
						<span class="subheading">
						    <?php if(in_array("Email already exist",$message_array)) echo "<span style='color: #e74c3c; text-align: center;'>Email already exist</span> <br>";?>
						    <?php if(in_array("Email Format is Invalid",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Email Format is Invalid</span> <br>";?>
						    <?php if(in_array("Emails don't match",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Emails don't match</span> <br>";?>
						    <?php if(in_array("Username already exist",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Username already exist</span> <br>";?>
						    <?php if(in_array("Your passwords dont match",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Your passwords dont match</span> <br>";?>
						    <?php if(in_array("Password should only contain english character or number",$message_array)) echo "<span style='color: #e74c3c;'>Password should only contain english character or number</span> <br>";?>
						    <?php if(in_array("Password must be more then 5 characters",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Password must be more then 5 characters</span> <br>";?>
						    <?php if(in_array("Username already",$message_array)) echo "<span style='color: #e74c3c;text-align: center;'>Username already exist</span> <br>";?>
						    <?php if(in_array("You have been registered! Please verify your email!",$message_array)) echo "<span style='color:#27ae60;text-align: center;'><h4>You have been registered! Please verify your email!</h4></span> <br>";?>
						    <?php if(in_array("Something wrong happened! Please try again!",$message_array)) echo "<span style='color:#e74c3c;text-align: center;'><h5>Something wrong happened! Please try again!</h5></span> <br>";?>
						</span>
						<form role="form" method='POST' action="" class="form-horizontal">
							
							<div class="form-group">
								<label class="col-lg-2 control-label">First Name</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="first_name" id="c-name" class="form-control" value="<?php echo $customer['first_name'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Last Name</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="last_name" id="lives-in" class="form-control" value="<?php echo $customer['last_name'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Date Of Birth</label>
								<div class="col-lg-6">
									<input type="date" placeholder=" " name="dob" id="country" class="form-control" value="<?php echo  $customer['dob'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Gender</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="gender" id="country" class="form-control" value="<?php echo $customer['gender'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Address</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="address" id="country" class="form-control" value="<?php echo $customer['address'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Postcode</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="postcode" id="country" class="form-control" value="<?php echo $customer['postcode']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Nationality</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="nationality" id="country" class="form-control" value="<?php echo $customer['nationality']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Occupation</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="occupation" id="country" class="form-control" value="<?php echo $customer['occupation']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Phone</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="phone" id="country" class="form-control" value="<?php echo $customer['phone']; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Email</label>
								<div class="col-lg-6">
									<input type="email" placeholder=" " name="email" id="country" class="form-control" value="<?php echo $customer['email']; ?>">
								</div>
							</div>
								<div class="form-group">
								<label class="col-lg-2 control-label">Username</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="username" id="country" class="form-control" value="<?php echo $customer['username']; ?>">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<input class="btn btn-theme" name="update_profile" type="submit" value="Update" />
								</div>
							</div>
						</form>
					</div>
					<!-- /col-lg-8 -->
				</div>
				<!-- /row -->
			</div>
		</div>
	</section>
</section>
<?php
}
include_once('template/footer.php');
include_once('template/script.php');

?>