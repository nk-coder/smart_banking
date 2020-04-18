<?php
include_once('template/head.php');
include_once('template/header.php');
include_once('template/sidebar.php');

?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
            	<!--CUSTOM CHART START -->
	            <div class="border-head">
	                <h3>USER VISITS</h3>

	                
	            </div>
	            <div class="custom-bar-chart">
		                <ul class="y-axis">
			                <li><span>10.000</span></li>
			                <li><span>8.000</span></li>
			                <li><span>6.000</span></li>
			                <li><span>4.000</span></li>
			                <li><span>2.000</span></li>
			                <li><span>0</span></li>
		              	</ul>
	              	<div class="bar">
		                <div class="title">JAN</div>
		                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
	              	</div>
	              	<div class="bar ">
		                <div class="title">FEB</div>
		                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
	              	</div>
	              <div class="bar ">
	                <div class="title">MAR</div>
	                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
	              </div>
	              <div class="bar ">
	                <div class="title">APR</div>
	                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
	              </div>
	              <div class="bar">
	                <div class="title">MAY</div>
	                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
	              </div>
	              <div class="bar ">
	                <div class="title">JUN</div>
	                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
	              </div>
	              <div class="bar">
	                <div class="title">JUL</div>
	                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
	              </div>
	            </div>
            <!--custom chart end-->
            
            
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->

<?php
include_once('template/footer.php');
include_once('template/script.php');

?>