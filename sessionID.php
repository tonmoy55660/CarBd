<?php
session_start();
if(isset($_POST['search'])){
  $_SESSION['pick'] = $_POST['pick_date'];
  $_SESSION['return'] = $_POST['return_date'];
  $_SESSION['class'] = $_POST['class'];
  $_SESSION['zone'] = $_POST['zone'];
  header('Location:cars?SEARCH_BOX');
}

if(isset($_GET['id'])){
  $_SESSION['booking_id'] = $_GET['id'];
  header('Location:mail');
}

 ?>
