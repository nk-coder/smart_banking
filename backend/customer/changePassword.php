<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');
include_once('includes/customer_profile_edit_handler.php');

?>	

<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div id="edit" class="tab-pane">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 detailed">
						<h4 class="mb">Change your password</h4>
						<div class="" style="text-align: center; font-size: 17px;">
							<?php if(in_array("Sorry, your password must be greater than 6 characters",$message_array)) echo "<span style='color: #e74c3c;'>Sorry, your password must be greater than 6 characters</span> <br>";?>
							<?php if(in_array("Password has been changed",$message_array)) echo "<span style='color: #e74c3c;'>Password has been changed</span> <br>";?>
							<?php if(in_array("Passwords are not matched",$message_array)) echo "<span style='color: #e74c3c;'>Passwords are not matched</span> <br>";?>
							<?php if(in_array("Old Password was wrong",$message_array)) echo "<span style='color: #e74c3c;'>Old Password was wrong</span> <br>";?>
							<?php if(in_array("Please fill all fields",$message_array)) echo "<span style='color: #e74c3c;'>Please fill all fields</span> <br>";?>
						</div>
						<form role="form" class="form-horizontal" action="" method="POST">
							<div class="form-group">
								<label class="col-lg-2 control-label">Old Password</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="old_password" id="addr1" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">New Password</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="new_password_1" id="addr2" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Confirm Password</label>
								<div class="col-lg-6">
									<input type="text" placeholder=" " name="new_password_2" id="phone" class="form-control">
								</div>
							</div>
						
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-theme" type="submit" name="change_password">Change Password</button>
									
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

include_once('template/footer.php');
include_once('template/script.php');

?>