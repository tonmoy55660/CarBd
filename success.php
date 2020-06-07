<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrental</title>
	<link rel="stylesheet" href="pace/themes/red/pace-theme-flash.css" />
	<script src="pace/pace.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<?php
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("abc5dca8eaadf0ce");
$store_passwd=urlencode("abc5dca8eaadf0ce@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;
  include_once 'dbCon.php';
  $conn= connect();
  $b_id = $_SESSION['booking_id'];
  $sql = "INSERT INTO transaction_record (status,transaction_date,transaction_id,amount,booking_id)
          VALUE('$status','$tran_date','$tran_id','$amount','$b_id')";
  $conn->query($sql);

  $ssql = "Update booking_details set advance_payment = '$amount', payment_status = '$status' WHERE booking_id = '$b_id'";

          if($conn->query($ssql)){
  			//	echo '<script>myAlert('.$amount.');</script>';
         echo '<script>window.location.href="mail";</script>';
  			  }

} else {

	echo "Failed to connect with SSLCOMMERZ";
}
 ?>

 </body>
</html>
