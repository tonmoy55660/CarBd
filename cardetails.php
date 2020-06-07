<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Cardoor - Car Rental HTML Template</title>

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

<?php
include_once 'dbCon.php';
$conn= connect();
if (isset($_GET['id'])){
$id = $_GET['id'];
$sql = "select * from sale_car_details as s, renter_details as r WHERE s.renter_id=r.renter_id AND car_id='$id'";
$resultData=$conn->query($sql);
foreach($resultData as $view){
  $car_name = $view['car_name'];
  $price = $view['price'];
  $car_details = $view['car_details'];
  $class = $view['class'];
  $fuel = $view['fuel'];
  $door = $view['door'];
  $gearbox = $view['gearbox'];
  $img1 = $view['img1'];
  $img2 = $view['img2'];
  $img3 = $view['img3'];
  $kilo = $view['kilo'];
  $name = $view['name'];
  $email = $view['email'];
  $phone = $view['phone'];
}
}
?>
    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
              <!-- Car List Content Start -->
              <div class="col-lg-8">
                  <div class="car-details-content">
                      <h2><?=$car_name?> <span class="price">Price: <b><?=$price?>/-</b></span></h2>
                      <div class="car-preview">
                          <div class="single-car-preview">
                              <img src="admin/images/<?=$img1?>" alt="JSOFT">
                          </div>
                          
                      </div>
                      <div class="car-details-info">
                          <h4>Additional Info</h4>
                          <p><?=$car_details?></p>

                          <div class="technical-info">
                              <div class="row">
                                  <div class="col-lg-10">
                                      <div class="tech-info-table">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th>Class</th>
                                                  <td><?=$class?></td>
                                              </tr>
                                              <tr>
                                                  <th>Fuel</th>
                                                  <td><?=$fuel?></td>
                                              </tr>
                                              <tr>
                                                  <th>Doors</th>
                                                  <td><?=$door?></td>
                                              </tr>
                                              <tr>
                                                  <th>GearBox</th>
                                                  <td><?=$gearbox?></td>
                                              </tr>
                                              <tr>
                                                  <th>Kilometer running</th>
                                                  <td><?=$kilo?></td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Seller Informations</h3>

                            <div class="sidebar-body">
                              <p><i class="fa fa-user"></i><?=$name?> </p>
                                <p><i class="fa fa-mobile"></i> <?=$phone?></p>
                                <p><i class="fa fa-envelope"></i><?=$email?> </p>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
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
