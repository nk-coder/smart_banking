<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="col-lg-12">
				<div class="row content-panel">
					<div class="col-md-4 profile-text mt mb centered">
						<div class="right-divider hidden-sm hidden-xs">
							<h4>Account No</h4>
							<h5><?php echo $customer_account['account_no'];?></h5>
							
						</div>
					</div>
					<!-- /col-md-4 -->
					<div class="col-md-4 profile-text">
						<h3>
							<?php echo $customer['first_name']." ".$customer['last_name']; ?>
						</h3>
						<br>
						<p></p>
					</div>
					<!-- /col-md-4 -->
					<div class="col-md-4 centered">
						<div class="profile-pic">
							<p><img src="<?php echo "../../".$customer['image']; ?>" class="img-circle"></p>
							<p>
			                    <a href="customerEdit?customerId=<?php echo $customerLoggedIn;?>" class="btn btn-theme"><i class="fa fa-pencil"></i> Edit Profile</a>
			                    <a href="changePassword" class="btn btn-theme02">Change Password</a>
			                  </p>
						</div>
					</div><!-- /col-md-4 -->
				</div><!-- /row -->
			</div><!-- /col-lg-12 -->
			
		</div>
		<!-- /container -->	
	</section>
	<!-- /wrapper -->
</section>

<?php
include_once('template/footer.php');
include_once('template/script.php');

?>