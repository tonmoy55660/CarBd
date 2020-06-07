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
			<!-- Start commentform Area -->
			 <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){ ?>
                            <section class="commentform-area pt-80">
                                <div class="container" align="center" >
                                    <h2 class="pb-50">Write your blog here:</h2>
									<form method="POST">
                                        <div class="col-lg-8 col-md-6">
                                            <input type="text" class="common-input mb-20 form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Write Blog Title here....'" name="title" placeholder="Write Blog Title...." required>
                                        </div>
                                        <div class="col-lg-8 col-md-6">
                                            <textarea class="form-control mb-10" name="blog" cols="140" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Write Blog Content here....'"  rows="5" placeholder="Write Blog Content here...." required></textarea>

											<input type="submit" class="primary-btn mt-20" name="submit" value="POST">
                                        </div>
                                    </div>
									</form>
                                </div>
                            </section>
            <!-- End commentform Area -->
			<?php } ?>
			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container" align="center" >
					<h2 class="pb-50">All Blogs</h2>
					<?php
					  $sql="select * from blog ORDER BY date ASC";
					  $result = $conn->query($sql);
					  foreach($result as $row){
						$name = $row['name'];
						$title = $row['title'];
						$blog = $row['blog'];
						$date = $row['date'];
						$id = $row['blog_id'];

					 ?>
						<div class="col-lg-12 post-list blog-post-list">
							<form method="POST" action="blogdetails.php">
								<input type="hidden" name="id" value="<?=$id?>">
									<div class="single-post">

										<ul class="tags">
											<li>Posted</li>
											<li>By</li>
											<li style="font-size:25px;color:#000;" ><?=$name?></li>
											<li>on</li>
											<li style="color:red;" ><?=$date?></li>
										</ul>
											<h1><?=$title?></h1>
											<p>
												<?=$blog?>
											</p>
										<div class="bottom-meta">
												<div class=" col-lg-6">
													<ul>
														<li style="font-size:20px;color:#000;" ><input type="submit" class="btn btn-default" value="Read More"></li>
													</ul>
											</div>
										</div>
									</div>
							</form>
								<hr>
						</div>
					<?php } ?>

			</section>
			<!-- End blog-posts Area -->


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
	</html>
