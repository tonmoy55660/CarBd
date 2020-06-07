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
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $blog = $_POST['blog'];
    $date = date('d-M-Y');
    $cus_id = $_SESSION['cus_id'];
    $name = $_SESSION['name'];
    $sql="INSERT INTO `blog`( `title`, `blog`, `date`, `cus_id`,`name`)
      VALUES ('$title','$blog','$date','$cus_id','$name')";
    $conn->query($sql);
  }
  ?>
  <section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Blog Home
          </h1>
          <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-home.html"> Blog Home</a></p>
        </div>
      </div>
    </div>
  </section>
    <!-- End banner Area -->
    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
      <div class="container" align="center" >
        <h2 class="pb-50">Add Info</h2>
        <div class="row">
          <div class="col-lg-12">
          <form method="POST" action="insert_carsale.php" enctype="multipart/form-data" class="contact-form text-right">
              <div class="row">
                <div class="col-lg-6 form-group">
                  <input name="car_name" placeholder="Car Brand & Model No " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Car Brand & Model No'" class="common-input mb-20 form-control" required="" type="text">

                  <input name="price" placeholder="Price "  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" class="common-input mb-20 form-control" required="" type="number">

                  <input name="carinfo" placeholder="Additional Info " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Info '" class="common-input mb-20 form-control" required="" type="text">
                  <div class="row">
                    <div class="col-lg-6 form-group">
                  <div class="default-select"  id="default-select">
                  <select id="class" name="class"  class="common-input mb-20 form-control " >
                    <option selected disabled value="" >Select Car class</option>
                    <option>Compact</option>
                    <option>Supermini</option>
                    <option>Sedan</option>
                    <option>Minivan</option>
                  </select>
                  </div>
                </div>
          <div class="col-lg-6 form-group">
              <div class="default-select"  id="default-select">
              <select id="fuel" name="fuel" class="common-input mb-20 form-control " >
                <option selected disabled value="" >Select fuel type </option>
                <option>Petrol</option>
                <option>Diesel</option>
                <option>CNG</option>
              </select>
          </div>
              </div>
              </div>
                </div>
                <div class="col-lg-6 form-group">
                  <input name="kilo" placeholder="Kilometers Run  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kilometers Run '" class="common-input mb-20 form-control" required="" type="number">
                  <input name="reg" placeholder="Registration Year "  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Registration Year'" class="common-input mb-20 form-control" required="" type="date">
                  <input type="file"  name="imageup1" class="common-input mb-15 form-control" id="exampleInputFile">
                  <div class="row">
                    <div class="col-lg-6 form-group">
                  <div class="default-select"  id="default-select">
                  <select id="doors" name="doors"  class="common-input mb-20 form-control " >
                    <option selected disabled value="" >Select doors </option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                  </div>
                </div>
          <div class="col-lg-6 form-group">
              <div class="default-select"  id="default-select">
              <select id="gearbox" name="gearbox" class="common-input mb-20 form-control " >
                <option selected disabled value="" >Select gearbox</option>
                <option>Automatic</option>
                <option>Manual</option>
              </select>
          </div>
              </div>
              </div>
              <button class="btn btn-success" name="cardetails" >SAVE</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <?php include_once 'include/footer.php'; ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="js/easing.min.js"></script>
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
  </body>

    </script>
  </body>
</html>
