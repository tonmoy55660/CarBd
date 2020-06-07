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
			  $id =  $_POST['id'];
			  $sql = "SELECT * FROM `blog` WHERE blog_id='$id' ";
			  $result = $conn->query($sql);
			  foreach($result as $row){
				$name = $row['name'];
				$title = $row['title'];
				$blog = $row['blog'];
				$date = $row['date'];
				$id = $row['blog_id'];

			}
			if (isset($_POST['submit'])){
			  $date = date('d-M-Y');
			  $comment = $_POST['comment'];
			  $cus_id = $_SESSION['cus_id'];
			  $name = $_SESSION['name'];
			  $sql = "INSERT INTO `blog_comments`(`blog_id`, `comment`, `date`, `cus_name`, `cus_id`)
					  VALUES ('$id','$comment','$date','$name','$cus_id')";
			  if($conn->query($sql)){
				echo '<script>alert("Comment Posted");</script>';
			  }

			}


			?>

            <!-- start banner Area -->
            <section class="banner-area relative" id="home">    
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white">
                                Blog Single               
                            </h1>   
                            <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="blog-single.html"> Blog Single</a></p>
                        </div>                                          
                    </div>
                </div>
            </section>
            <!-- End banner Area -->    
			
			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container" >
					<div class="row" >
						<div class="col-lg-12 post-list blog-post-list">
							<div class="single-post" >
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
							</div>

                            

                            <!-- Start comment-sec Area -->
                            <section class="comment-sec-area pt-80 pb-80">
                                <div class="container">
                                    <div class="row flex-column">
                                        <br>
                                        <div class="comment-list">
											<h3>All comments</h3></br>
										   <?php
											  include_once 'dbCon.php';
											  $conn= connect();
												$sql = "SELECT * FROM `blog_comments` WHERE blog_id ='$id'  ORDER BY date ASC ";
												$result = $conn->query($sql);
												foreach($result as $row){

											?>
                                            <div class="single-comment justify-content-between d-flex form-control">
                                                    <div class="desc">
                                                        <h5><a><?=$row['cus_name']?></a></h5></br>
                                                        <p style="color:red;font-weight:bold;"><?=$row['date']?> </p>
                                                        <p class="comment">
                                                          <span style="color:blue;" > Comment :</span> <?=$row['comment']?>
                                                        </p>
													</div>
                                             </div></br>
											  <?php } ?>
                                        </div>
                                     </div>
                                </div>
                                       
                            </section>
                            <!-- End comment-sec Area -->
                            
                            <!-- Start commentform Area -->
						
                            <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){ ?>
                            <section class="commentform-area pt-80">
                                <div class="container" align="center" >
                                    <h5 class="pb-50">Leave a Reply</h5>
                                    <form method="POST">
										<input type="hidden" name="id" value="<?=$id?>">
                                        <div class="col-lg-12 col-md-6">
											<textarea class="form-control mb-10" name="comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'write your comment'" placeholder="write your comment here....." required autofocus></textarea>
											<input type="submit" class="primary-btn mt-20" name="submit" value="Comment">
                                        </div>
									</form>
                                </div>    
                            </section>
                            <!-- End commentform Area -->
							<?php } ?>


							</div>																		
						
				</div>	
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

