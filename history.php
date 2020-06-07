<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/elements/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Car Rentals</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="pace/themes/red/pace-theme-flash.css" />
  	<script src="pace/pace.js"></script>
  </head>
  <body>
  <?php include_once("include/navbar.php"); ?>

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="about-content col-lg-12">
            <h1 class="text-white">
              Your Trip History
            </h1>
            <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-home.html"> History</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->
    <?php
    include_once 'dbCon.php';
    $conn= connect();
    $id  = $_SESSION['cus_id'];
    if(isset($_POST['cancel'])){
      $b_id = $_POST['cancel_id'];
    $sql = "UPDATE booking_details SET isCancel = 1 WHERE booking_id = '$b_id'";
    $conn->query($sql);
  }

     ?>

    <section class="blog-posts-area section-gap">
      <div class="container" align="center" >
        <h2 class="pb-50">All Trips</h2>
        <table id="table_id" class="display">
          <thead>
              <tr>
                  <th>Booking ID</th>
                  <th>Car Name</th>
                  <th>Car Class</th>
                  <th>Pick up Date</th>
                  <th>Drop off Date</th>
                  <th>Total Day</th>
                  <th>Total Price</th>
                  <th>Pick Up Location</th>
                  <th>Booking Date</th>
                  <th>Due</th>
                  <th>Rentar Company</th>
                  <th>Trip Status</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM `booking_details` as b , car_details as c , renter_details as r WHERE b.`car_id` = c.car_id AND c.renter_id = r.renter_id AND `cus_id`= '$id' AND `payment_status` ='VALID'";
            $resultData=$conn->query($sql);
            //print_r($resultData);
            if($resultData->num_rows > 0){
            foreach($resultData as $view){

             ?>
              <tr>
                  <td><?=$view['booking_id']?></td>
                  <td><?=$view['car_name']?></td>
                  <td><?=$view['class']?></td>
                  <td><?=$view['pick_date']?></td>
                  <td><?=$view['return_date']?></td>
                  <td><?=$view['total_day']?></td>
                  <td>৳ <?=$view['total_bill']?></td>
                  <td><?=$view['pickup_location']?></td>
                  <td><?=$view['booking_date']?></td>
                  <td>৳ <?php $a = ($view['total_bill'] - $view['advance_payment']); echo $a;?></td>
                  <td><?=$view['name']?></td>
                  <td><?php
                  $a = strtotime($view['pick_date']);
                  $b = strtotime(date('m/d/Y'));
                  $c = ($a - $b);
                  if($a < $b ){
                    echo 'Finished';
                  }elseif(($c > 2) && (($view['isCancel']) == 0) ){ ?>
                    <form method="post" >
                      <input type="hidden"  name="cancel_id" value="<?=$view['booking_id']?>">
                      <button type="submit"  name="cancel"   class="btn btn-danger btn-block">Cancel Trip</button>
                    </form>
                    <?php }elseif($c < 172800){
                    echo 'Upcoming';
                  }elseif(($view['isCancel']) == 1){
                  echo 'Cancelled';
                } ?></td>
              </tr>
            <?php } }else{
              echo "You don't have any trip history";
            } ?>
          </tbody>
          </table>
        <hr>

    </section>
    <!-- End blog-posts Area -->


    <?php include_once 'include/footer.php'; ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="js/easing.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">

    $(document).ready( function () {
    $('#table_id').DataTable();
} );

    </script>
    <script type="text/javascript">

    </script>
  </body>
</html>
