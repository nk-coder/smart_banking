<!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="index"><img src="<?php echo "../../".$customer['image']; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $customer['first_name']." ".$customer['last_name']; ?></h5>
          <li class="mt">
            <a class="" href="index">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li>
            <a href="profile">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
          </li>

          <li>
            <a href="balanceTransfer">
              <i class="fa fa-money"></i>
              <span>Transfer Balance</span>
              </a>
          </li>

          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Loan Section</span>
              </a>
            <ul class="sub">
              <li><a href="loanRequest">Apply for Loan</a></li>
              <li><a href="loanRules">Loan Rules</a></li>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->