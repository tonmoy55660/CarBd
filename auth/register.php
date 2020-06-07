<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrental Login</title>
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
		title: "Registered Succesfully",
		type: "success",
		confirmButtonClass: "btn-primary",
		confirmButtonText: "Done",
		closeOnClickOutside: false,
		}, function() {
		window.location.href = "login";
	});
}
</script>
</head>

<body>
	<?php
	include_once '../dbCon.php';
	$conn= connect();
	if (isset($_POST['submit'])){
	  function generateRandomString()  {
	     $characters = '0123456789';
	     $length = 6;
	     $charactersLength = strlen($characters);
	     $randomString = '';
	     for ($i = 0; $i < $length; $i++) {
	         $randomString .= $characters[rand(0, $charactersLength - 1)];
	     }
	     return $randomString;
	                                     }
	  $cus_id = generateRandomString();
	  $name   = $_POST['name'];
	  $email  = $_POST['email'];
	  $phone  = $_POST['phone'];
	  $address = $_POST['address'];
	  $password = md5($_POST['password']);

	  $sql = "INSERT INTO `user_details`(`cus_id`, `name`, `email`, `phone`, `address`, `password`)
	          VALUES ('$cus_id','$name','$email','$phone','$address','$password')";
	        //  echo $sql;exit;
	  if ($conn->query($sql)){
		echo "<script>salert();</script>";
	  }else{
	    echo "<script>window.location.href='404.php'</script>";
	      }

	}
	 ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-20 text-center">
						Registration
					</span>

					<span class="txt1 p-b-11">
						Name
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" name="name" type="text" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "email is required">
						<input class="input100" name="email" type="text" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Phone
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Phone is required">
						<input class="input100" name="phone" type="text"  >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Address
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Address is required">
						<input class="input100" name="address" type="text" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" name="password" type="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-32">
						<div>
							<a href="login" class="txt3">
								Already a member!Login now!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="btn btn-info btn-block" name="submit" value="Register">
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
