<!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="active" href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Customer</span>
              <?php 
                $new_customer_count = mysqli_query($con, "SELECT COUNT(*) as total FROM customers WHERE verified=1 AND approved='NO'"); 
                $cc = mysqli_fetch_assoc($new_customer_count);
                // $ca= $cc['total'];
              ?>
              <span class="label label-theme pull-right mail-info"><?php if ($cc['total'] > 0) {
                echo $cc['total'];;
              } ?></span>
              </a>
            <ul class="sub">
              <li><a href="newCustomers.php">New Customer</a></li>
              <li><a href="customerList">Customer List</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Loan Rules</span>
              </a>
            <ul class="sub">
              <li><a href="loanRules">List</a></li>
              <li><a href="loanRulesAdd">Add</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Loan Requests</span>
              </a>
            <ul class="sub">
              <li><a href="loanRequestsNew">New</a></li>
              <li><a href="loanRequestsApproved">Approved</a></li>
              <li><a href="loanRequestsReject">Reject</a></li>
            </ul>
          </li>
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->