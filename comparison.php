<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title> Carrental</title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


    <!--== Page Title Area Start ==-->
   
                       
                    
    <!--== Page Title Area End ==-->

    <!--== Pricing Area Start ==-->
    <section id="pricing-page-area" class="section-padding">
        <div class="container">
			
            <div class="row">
                <!-- Pricing Content Start -->
				<div class="col-lg-12">
					 <h2 class="text-center" >Comparison with two different car</h2><hr>
					<div class="pricing-details-content">
						<div class="row">
              <?php
              include_once 'dbCon.php';
              $conn= connect();
              if (isset($_GET['comp1'])){
              $id = $_GET['comp1'];
              $sql = "select * from sale_car_details where car_id='$id'";
              $resultData=$conn->query($sql);
              foreach($resultData as $view){
                $car_name = $view['car_name'];
                $price = $view['price'];
                $car_details = $view['car_details'];
                $class = $view['class'];
                $fuel = $view['fuel'];
                $door = $view['door'];
                $gearbox = $view['gearbox'];
                $kilo = $view['kilo'];
                $reg = $view['reg_date'];
              }
              }
              ?>
							<!-- Single Pricing Table -->
							<div class="col-lg-6 col-md-6 text-center">
								<div class="single-pricing-table">
									<h3><?=$car_name?></h3>
									<h2>$<?=$price?> </h2>
									<h5>Class : <?=$class?></h5>
									<ul class="package-list">
										<li>Fuel type : <?=$fuel?></li>
										<li>Doors : <?=$door?></li>
										<li>Gear Box Type : <?=$gearbox?></li>
										<li>Kilometer Running : <?=$kilo?></li>
										<li>Ragistration Date : <?=$reg?></li>
									</ul>
								</div>
							</div>
							<!-- Single Pricing Table -->
              <?php
              include_once 'dbCon.php';
              $conn= connect();
              if (isset($_GET['comp2'])){
              $id = $_GET['comp2'];
              $sql = "select * from sale_car_details where car_id='$id'";
              $resultData=$conn->query($sql);
              foreach($resultData as $view){
                $car_name = $view['car_name'];
                $price = $view['price'];
                $class = $view['class'];
                $fuel = $view['fuel'];
                $door = $view['door'];
                $gearbox = $view['gearbox'];
                $kilo = $view['kilo'];
                $reg = $view['reg_date'];
              }
              }
              ?>
							<!-- Single Pricing Table -->
              <div class="col-lg-6 col-md-6 text-center">
								<div class="single-pricing-table">
									<h3><?=$car_name?></h3>
									<h2>$<?=$price?> </h2>
									<h5>class : <?=$class?></h5>
									<ul class="package-list">
										<li>Fuel type : <?=$fuel?></li>
										<li>Doors : <?=$door?></li>
										<li>Gear Box Type : <?=$gearbox?></li>
										<li>Kilometer Running : <?=$kilo?></li>
										<li>Ragistration Date : <?=$reg?></li>
									</ul>
								</div>
							</div>
							<!-- Single Pricing Table -->
						</div>
					</div>
				</div>
                <!-- Pricing Content End -->

            </div>
        </div>
    </section>
    <!--== FAQ Area End ==-->


    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>
