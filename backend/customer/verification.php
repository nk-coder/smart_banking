<?php
include_once('template/head.php');
if (isset($_POST['verify'])) {
	$varificationCode = $_POST['varification'];

	$db_varify_code = mysqli_query($con,"SELECT verification_key FROM customers WHERE id='$customerLoggedIn' ");
	$row = mysql_fetch_array($db_varify_code);

	if ($varificationCode == $row['verification_key']) {
		mysqli_query($con,"UPDATE customers SET verification_key='' ")
	}
}
?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<form method="POST" action="">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Varification</h4>
					</div>
					<div class="modal-body">
						<input type="text" name="varification" placeholder="Varification Code" autocomplete="off" class="form-control placeholder-no-fix">
					</div>
					<div class="modal-footer centered">
						<a href="index" class="btn btn-theme04" type="button">Cancel</a>
						<input class="btn btn-theme03" type="submit" name="verify"> 
					</div>
				</div>
			</div>
		</form>
	</section>
</section>
<?php

include_once('template/footer.php');
include_once('template/script.php');

?>