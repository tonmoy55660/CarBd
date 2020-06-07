<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrental</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script type="text/javascript">

function salert(){
	swal({
		title: "Login Successfull",
		type: "success",
		timer: 1500,
		showCancelButton: false,
  	showConfirmButton: false,
		closeOnClickOutside: false,
		}, function() {
		window.location.href = "../index";
	});
}

function ealert(){
	swal({
		title: "Credential Not Matched",
		text: "Try Again!",
		type: "error",
		});
}
</script>
</head>
<body>
	<?php
				session_start();
				include_once '../dbCon.php';
				$conn = connect();
				if(isset($_POST['login'])){
					$mail 		= mysqli_real_escape_string($conn,$_POST['email']);
					$password 	= mysqli_real_escape_string($conn,md5($_POST['password']));
					$sql = "SELECT * FROM `user_details` WHERE `email`='$mail' AND `password`='$password'";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						$_SESSION['isLoggedIn'] = TRUE;
						foreach($result as $row){
								
								$_SESSION['cus_id']=$row['cus_id'];
								$_SESSION['name']=$row['name'];
								$_SESSION['email']=$row['email'];
								$_SESSION['phone']=$row['phone'];
								$_SESSION['address']=$row['address'];
	            }
	           echo "<script>salert();</script>";
	          } else {
	            echo "<script>ealert();</script>";
	          }
	        }

	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form method="POST"  class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32 text-center">
						Carrental Login
					</span>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" name="email" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" name="password" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="register.php" class="txt3">
								Not a member!Sign up now!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="btn btn-info btn-block" name="login" value="Log In">
						<a href="../index" class="btn btn-dark btn-block" >Back to site</a>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
