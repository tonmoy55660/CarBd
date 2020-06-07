<?php session_start();?>
<header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a class="active" href="index">Home</a></li>
				          <li><a href="cars">Our Cars</a></li>
									<?php if(isset($_SESSION['isLoggedIn'])){ ?>
				          <li><a href="carhouse">Car Sale</a></li>
				          <li><a href="history">Rent History</a></li>
									<?php } ?>
				          <li><a href="bloghome">Blog</a></li>
									<?php if(isset($_SESSION['isLoggedIn'])){ ?>
				          <li><a href="sellcar">sell-your-car</a></li>
									<?php } ?>
				          <?php if(isset($_SESSION['name'])){?>
                              <li style="color:#fff;" ><a><?php echo $_SESSION['name'];?></a>

                                  <li><a href="logout.php">Log Out</a></li>

                              </li>
                            <?php } else { ?>
                            <li><a href="auth/login.php">login</a>
                            </li>
                          <?php } ?>
				        </ul>
				      </nav><!-- #nav-menu-container -->
			    	</div>
			    </div>
			  </header><!-- #header -->
