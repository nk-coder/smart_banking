<?php
include_once('template/header.php');
include_once('template/nav.php');
include_once('includes/account_request_handler.php');
?>

<section class="hero-wrap js-fullheight" style="background-image: url('resource/images/bg_1.jpg');" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Reputation, Respect, Result</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            
          </div>
        </div>
      </div>
    </section>

<section class="ftco-section contact-section ftco-no-pb bg-light" id="contact-section">
  <div class="overlay"></div>
  <div class="row justify-content-center pb-5">
    <div class="col-md-10 heading-section text-center ftco-animate">
      <h2 class="mb-4">Create An Account</h2>
      <p>Pleace give required information</p>
    </div>
    <span class="subheading">
    <?php if(in_array("All field must be filled out",$message_array)) echo "<span style='color: #e74c3c;'>All field must be filled out</span> <br>";?>
    <?php if(in_array("Invalid Number",$message_array)) echo "<span style='color: #e74c3c;'>Phone number is invalid. Please give a valid number</span> <br>";?>
    <?php if(in_array("Email already exist",$message_array)) echo "<span style='color: #e74c3c;'>Email already exist</span> <br>";?>
    <?php if(in_array("Email Format is Invalid",$message_array)) echo "<span style='color: #e74c3c;'>Email Format is Invalid</span> <br>";?>
    <?php if(in_array("Emails don't match",$message_array)) echo "<span style='color: #e74c3c;'>Emails don't match</span> <br>";?>
    <?php if(in_array("Username already exist",$message_array)) echo "<span style='color: #e74c3c;'>Username already exist</span> <br>";?>
    <?php if(in_array("Your passwords dont match",$message_array)) echo "<span style='color: #e74c3c;'>Your passwords dont match</span> <br>";?>
    <?php if(in_array("Password should only contain english character or number",$message_array)) echo "<span style='color: #e74c3c;'>Password should only contain english character or number</span> <br>";?>
    <?php if(in_array("Password must be more then 5 characters",$message_array)) echo "<span style='color: #e74c3c;'>Password must be more then 5 characters</span> <br>";?>
    <?php if(in_array("Username already",$message_array)) echo "<span style='color: #e74c3c;'>Username already exist</span> <br>";?>
    <?php if(in_array("You have been registered! Please verify your email!",$message_array)) echo "<span style='color: #2ecc71;'><h4>You have been registered! Please verify your email!</h4></span> <br>";?>
    <?php if(in_array("Something wrong happened! Please try again!",$message_array)) echo "<span style='color:#e74c3c;'><h4>Something wrong happened! Please try again!</h4></span> <br>";?>
    </span>
  </div>

  <div class="container">
    <div class="row no-gutters block-9">
      <div class="col-md-12 order-md-last d-flex">
        <form action="" class="bg-primary p-5 contact-form" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php if(isset($_SESSION['first_name'])) {
                echo $_SESSION['first_name'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php if(isset($_SESSION['last_name'])) {
                echo $_SESSION['last_name'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php if(isset($_SESSION['dob'])) {
                echo $_SESSION['dob'];
              }  ?>">
          </div>
          <div class="form-group">
              <select class="form-control" name="gender">
                
                <?php 
                  if (isset($_SESSION['gender']) && $_SESSION['gender']=='Male') {
                    echo "<option value='' style='color: black'>Select Gender</option>";
                    echo "<option selected='' value='Male' style='color:black'>Male</option>";
                    echo "<option value='Female' style='color:black'>Female</option>";
                  }elseif (isset($_SESSION['gender']) && $_SESSION['gender']=='Female') {
                    echo "<option value='' style='color: black'>Select Gender</option>";
                    echo "<option value='Female' style='color:black'>Male</option>";
                    echo "<option selected='' value='Female' style='color:black'>Female</option>";
                  }else{ ?>
                    <option value="" style="color: black">Select Gender</option>
                    <option value='Male' style='color:black'>Male</option>
                    <option value='Female' style='color:black'>Female</option>
                  <?php }
                ?>
              </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php if(isset($_SESSION['address'])) {
                echo $_SESSION['address'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="postcode" placeholder="Post Code" value="<?php if(isset($_SESSION['postcode'])) {
                echo $_SESSION['postcode'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nationality" placeholder="Nationality" value="<?php if(isset($_SESSION['nationality'])) {
                echo $_SESSION['nationality'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="<?php if(isset($_SESSION['occupation'])) {
                echo $_SESSION['occupation'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="image" placeholder="Image">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php if(isset($_SESSION['phone'])) {
                echo $_SESSION['phone'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Your Email" value="<?php if(isset($_SESSION['email'])) {
                echo $_SESSION['email'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['email2'])) {
                echo $_SESSION['email2'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($_SESSION['username'])) {
                echo $_SESSION['username'];
              }  ?>">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
          </div>
          
          <div class="form-group">
            <input type="submit" value="Send Request" name="account_request" class="btn btn-darken py-3 px-5">
          </div>
        </form>
      
      </div>
    </div>
  </div>
</section>

<?php
include_once('template/footer.php');
include_once('template/script.php');
?>

  </body>
</html>