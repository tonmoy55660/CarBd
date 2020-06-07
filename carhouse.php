	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<link rel="stylesheet" href="pace/themes/red/pace-theme-flash.css" />
		<script src="pace/pace.js"></script>
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
		<link rel="stylesheet" href="pace/themes/red/pace-theme-flash.css" />
		<script src="pace/pace.js"></script>

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
			<!-- start banner Area -->
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

			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 post-list blog-post-list">
					<?php
						  include_once 'dbCon.php';
						  $conn= connect();
						  $resultData='';
						  if (isset($_POST['search'])){
							$class=$_POST['class'];
							$price = $_POST['price'];
							$sql = "select * from sale_car_details WHERE class='$class' AND price < '$price' AND isSold = 0";
							$resultData=$conn->query($sql);
							  }else if(!isset($_POST['search'])){
						  $sql = "select * from sale_car_details WHERE isSold = 0";
						  $resultData=$conn->query($sql);
						  }
						  if($resultData->num_rows > 0){
						  foreach($resultData as $view){
					?>
							<div class="single-post" align="center">
								<img class="img-fluid" height="500px" width="600px" src="img/<?=$view['img1']?>" alt="">
								<div class="row">
									<div class="col-lg-6">
										<h1><?=$view['car_name']?></h1>
									</div>
									<div class="col-lg-6">
										<h1>$<?=$view['price']?></h1>
									</div>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">class</th>
											<th scope="col">fuel</th>
											<th scope="col">door</th>
											<th scope="col">gearbox</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td scope="row"><?=$view['class']?></td>
											<td><?=$view['fuel']?></td>
											<td><?=$view['door']?></td>
											<td><?=$view['gearbox']?></td>
										</tr>

									</tbody>
								</table>



							<div class="row" align="center">
							<?php if (!isset($_GET['comp1'])){ ?>
								<div class="col-lg-6 text-left">
									<a href="carhouse.php?comp1=<?=$view['car_id']?>">
										<button type="button" class="btn btn-outline-success btn-block">Click to compare</button>
									</a>
								</div>
								<div class="col-lg-6 ">
									<a target="_blank" href="cardetails.php?id=<?=$view['car_id']?>">
										<button type="button" class="btn btn-outline-dark btn-block">see details</button>
									</a>
									</br>
								</div>
							<?php }
								else
								{
								?>
								<div class="col-lg-4">
									<a target="_blank" href="comparison.php?comp1=<?=$_GET['comp1']?>&&comp2=<?=$view['car_id']?>">
										<button type="button" class="btn btn-outline-success btn-block">compare with pre</button>
									</a>
								</div>
								<div class="col-lg-4">
									<a target="_blank" href="cardetails.php?id=<?=$view['car_id']?>">
										<button type="button" class="btn btn-outline-dark btn-block">see details</button>
									</a>
									</br>
								</div>

							<div class="col-lg-4">
								<a href="carhouse.php">
									<button type="button" name="book" class="btn btn-outline-danger btn-block">cancel comparison</button>
								</a>
								</br>
							</div>
							<?php } ?>
						</div>
					</div>
						<?php }} else {?>
						<div class="alert alert-danger" role="alert">
							<h3>No result found ! try again!</h3>
						</div>
						<?php } ?>
					</div>
					<div class="col-lg-4 sidebar">
						<div class="single-widget" style="margin:auto;max-width:300px;background-color:#b7a5bf;">
							<form method="POST" onsubmit=" return myfn()" class="example">
								<div class="form-label">
									<h5>Select Car Class :</h5>
									<br>
								</div>
								<div class="form-group">
									<div class="default-select" id="default-select">
										<select class=" form-control" id="default-select" name="class">
											<option>SELECT FROM HERE</option>
											<option>Compact</option>
											<option>Supermini</option>
											<option>Sedan</option>
											<option>Minivan</option>
										</select>
									</div>
								</div>
								<div class="form-label">
									<h5>Select Price Range :</h5>
									<br>
								</div>
								<div class="form-group">
									<div class="default-select" id="default-select">

										<select class="form-control" id="price" name="price">
											<option value="1">Select from here</option>
											<option value="500000">Below 5 lakh</option>
											<option value="1000000">Below 10 lakh</option>
											<option value="1500000">Below 15 lakh</option>
											<option value="1500000">Below 20 lakh</option>
											<option value="1500000">Below 25 lakh</option>
											<option value="1500000">Below 30 lakh</option>
										</select>
									</div>
								</div>
								<div class="book-button text-center">
									<input type="submit" name="search" id="search" class="primary-btn mt-20" value="Search">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </section>
			<!-- End blog-posts Area -->


			<?php include_once ('include/footer.php'); ?>

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
	</html>
