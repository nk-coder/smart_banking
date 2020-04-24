<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

$msg = array();
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$account_no = rand(10000000,99999999);
	$update_sql = mysqli_query($con,"UPDATE customers SET approved='YES' WHERE id='$id'");
	$create_account = mysqli_query($con,"INSERT INTO accounts VALUES('','current','$account_no','$id','5000') ");
	if ($update_sql){
	//header('location:newCustomers.php');
	array_push($msg, "Customer approved");
	//return $message;
	}else{

	}
}

?>

<section id="main-content">
	<section class="wrapper">
		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-user"></i> New Customers</h4>
						<hr>
						<?php
						if(in_array("Customer approved",$msg)) echo "<span style='color: #27ae60;'><h2>Customer account request approved</h2></span> <br>";
							$new_customer_request = mysqli_query($con,"SELECT * FROM customers WHERE verified=1 AND approved='NO' ORDER BY id DESC ");
							if (mysqli_num_rows($new_customer_request) == 0) {
								echo "<h3>There is no customer to approve</h3>";
							}else{

						?>
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>DoB</th>
								<th>Gender</th>
								<th>Postcode</th>
								<th>Address</th>
								<th>Nationality</th>
								<th>Occupation</th>
								<th>Image</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Created AT</th>
								<th>Approve</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($new_customer_request as $customer){ ?>
							<tr>
								<td><?php echo $customer['first_name']; ?></td>
								<td><?php echo $customer['last_name']; ?></td>
								<td><?php echo $customer['dob']; ?></td>
								<td><?php echo $customer['gender']; ?></td>
								<td><?php echo $customer['postcode']; ?></td>
								<td><?php echo $customer['address']; ?></td>
								<td><?php echo $customer['nationality']; ?></td>
								<td><?php echo $customer['occupation']; ?></td>
								<td ><img style="max-width: 45px; border-radius: 3px;" src="<?php echo "../../".$customer['image']; ?>"></td>
								<td><?php echo $customer['phone']; ?></td>
								<td><?php echo $customer['email']; ?></td>
								<td><?php echo $customer['created_at']; ?></td>
								<td>
								<a class="btn btn-success btn-xs" href="newCustomers.php?id=<?php echo $customer['id']; ?>" style="color:#fff; text-decoration:none"><i class="fa fa-check"></i></a>
								</td>
							</tr>
							<?php } } //end foreach
                                   ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</section>
<?php
include_once('template/footer.php');
include_once('template/script.php');

?>