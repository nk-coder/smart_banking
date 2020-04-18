<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');
include_once('includes/loan_request_handler.php');

?>
<section id="main-content">
      <section class="wrapper">
        <h3> APPLY FOR LOAN</h3>
        
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4>Please fill-in the required information, so that our team can get in touch with you.</h4>
            <div class="form-panel">
              <div style="align-content: center;">
                <?php if(in_array("monthly income is incorret",$message_array)) echo "<span style='color: #e74c3c;'>Your monthly income must be $minimum_salary thousand or more</span> <br>";?>
                <?php if(in_array("age not matched",$message_array)) echo "<span style='color: #e74c3c;'>$minimum_age to $maximum_age aged people will be eligible for home loan</span> <br>";?>
                <?php if(in_array("loan amount not satisfied",$message_array)) echo "<span style='color: #e74c3c;'>You get $minimum_loan_amount BDT to $maximum_loan_amount BDT for home loan</span> <br>";?>
                <?php if(in_array("request submited",$message_array)) echo "<span style='color: #2ecc71;'><h3>Your request has been recorded. Our team will keep in touch with you</h3></span> <br>";?>
              </div>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
                  <div class="form-group ">
                    <label for="loanType" class="control-label col-lg-2">What type of loan do you need?</label>
                    <div class="col-lg-10">
                      <select class=" form-control" id="loanType" name="loanType" required>
                      	<option value="">--Select Option--</option>
                        <?php 
                          //find and show loan type form database using foreach one by one
                        $loans = mysqli_query($con, "SELECT * FROM loan_types ORDER BY id DESC");
                        foreach ($loans as $loan) {
                        ?>
                      	<option value="<?php echo  $loan['loan_type']?>"><?php echo $loan['loan_type']?> Loan</option>
                        <?php }
                         ?>
                      </select> 
                    </div>
                  </div>
                
                  <div class="form-group ">
                    <label for="income" class="control-label col-lg-2">Income</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="income" type="number" min="1" name="income" required />
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="loanAmount" class="control-label col-lg-2">Your desired loan amount in BDT</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="loanAmount" type="number" min="250000" name="loanAmount" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="paytime" class="control-label col-lg-2">Pay time (In Month)</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="paytime" type="number" min="1" name="paytime" required />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <input class="btn btn-theme" name="loan_request" type="submit" value="Submit" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
      </section>
      <!-- /wrapper -->
    </section>

<?php
include_once('template/footer.php');
include_once('template/script.php');

?>