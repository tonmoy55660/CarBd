<?php
session_start();
include_once '../dbCon.php';
$conn= connect();
if(isset($_POST['cardetails'])){
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
$car_id = generateRandomString();
$car_name =$_POST['car_name'];
$price =$_POST['price'];
$car_details =$_POST['carinfo'];
$class =$_POST['class'];
$fuel =$_POST['fuel'];
$door =$_POST['doors'];
$gearbox =$_POST['gearbox'];
$driver_name =$_POST['drivername'];
$driver_phone =$_POST['driverphone'];
$r_id = $_SESSION['renter_id'];

/* 1st Image upload  */
if(isset($_FILES["imageup1"]["name"]) && $_FILES["imageup1"]["name"] != ''){
  $target_dir = "../img/";
  $img1 = date('YmdHis_');
  $img1 .= basename($_FILES["imageup1"]["name"]);
  $target_file = $target_dir . $img1;
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["imageup1"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  if (file_exists($target_file)) {
    $uploadOk = 0;
  }
  if ($_FILES["imageup1"]["size"] > 5000000) {
    $uploadOk = 0;
  }
  if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    $okFlag = FALSE;
  } else {
    if(move_uploaded_file($_FILES["imageup1"]["tmp_name"], $target_file)) {
    } else {
      $okFlag = FALSE;
    }
  }
}else{
  $img1 = $_POST['image1'];
}

$sql = "INSERT INTO `car_details`(`car_id`, `car_name`,`price`, `car_details`, `class`, `fuel`,
                                    `door`, `gearbox`, `driver_name`,`driver_phone`, `img1`,`renter_id`)
                                    VALUES ('$car_id','$car_name','$price','$car_details','$class','$fuel','$door',
                                      '$gearbox','$driver_name','$driver_phone','$img1','$r_id')";


if ($conn->query($sql)){
  echo "<script>window.location.href='viewRent'</script>";
}else{
  echo "<script>window.location.href='404.php'</script>";
}
}
 ?>
