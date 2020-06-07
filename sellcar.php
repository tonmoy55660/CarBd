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
  <link rel="stylesheet" href="pace/themes/red/pace-theme-flash.css" />
	<script src="pace/pace.js"></script>
  <!-- Site Title -->
  <title>Car Rentals</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">


  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
  <?php include_once("include/navbar.php"); ?>
  <?php
  include_once 'dbCon.php';
  $conn= connect();
  if(isset($_POST['sold'])){
    $s_id = $_POST['sell_id'];
    $sql="UPDATE `sale_car_details` SET isSold = 1 WHERE car_id = '$s_id'";
    $conn->query($sql);
  }
  ?>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="about-content col-lg-12">
            <h1 class="text-white">
              Your cars for sale  </h1>
            <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-home.html"> Sale</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- Start blog-posts Area -->
    <section class="blog-posts-area section-gap">
      <div class="container" align="center" >
        <h2 class="pb-50">All Selling cars</h2>
        <a type="button" href="addsalecar" class="btn btn-success text-center text-uppercase " name="button">ADD NEW CAR FOR SALE</a>
        <table id="table_id" class="display">
          <thead>
              <tr>
                  <th>Car name</th>
                  <th>Price</th>
                  <th>Class</th>
                  <th>Fuel</th>
                  <th>Door</th>
                  <th>Gearbox</th>
                  <th>Kilometer Runnign</th>
                  <th>Registration Date</th>
                  <th>Image</th>
                  <th>Selling Info</th>
              </tr>
          </thead>
          <tbody>
            <?php
            include_once 'dbCon.php';
            $conn= connect();
            $id  = $_SESSION['cus_id'];
            $sql = "SELECT * FROM `sale_car_details` WHERE seller_id = '$id'";
              $resultData=$conn->query($sql);
            //print_r($resultData);
            if($resultData->num_rows > 0){
            foreach($resultData as $view){

             ?>
              <tr>
                  <td><?=$view['car_name']?></td>
                  <td><?=$view['price']?></td>
                  <td><?=$view['class']?></td>
                  <td><?=$view['fuel']?></td>
                  <td><?=$view['door']?></td>
                  <td><?=$view['gearbox']?></td>
                  <td><?=$view['kilo']?></td>
                  <td><?=$view['reg_date']?></td>
                  <td> <img src="img/<?=$view['img1']?>" alt="" height="80px" width="120px" ></td>
                  <td><?php  if(($view['isSold']) == 1){
                    echo 'SOLD';
                  }elseif(($view['isSold']) == 0){ ?>
                    <form method="post" >
                    <input type="hidden"  name="sell_id" value="<?=$view['car_id']?>">
                    <button type="submit"  name="sold"   class="btn btn-success btn-block">Sold</button>
                  </form>
                <?php } ?>
                </td>

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
  </body>
</html>
