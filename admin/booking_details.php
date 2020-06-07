<?php include_once('includes/header.php');?>
	<?php include_once('includes/navbar.php');?>
  <!-- Content Wrapper. Contains page content -->
	<?php
	include_once '../dbCon.php';
	$conn= connect();
	if(isset($_POST['button'])){
	$ad = $_POST['ad_pay'];
	$b_id = $_POST['b_id'];
	$sql = "UPDATE booking_details SET advance_payment = '$ad' WHERE booking_id = '$b_id' ";
	//echo $sql;exit;
	$conn->query($sql);
}
	 ?>
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Car Name</th>
                    <th>Pick Date</th>
                    <th>Return Date</th>
                    <th>Total day</th>
                    <th>booking Date</th>
                    <th>total bill</th>
                    <th> Payment</th>
                    <th>Due</th>
                    <th>Due Cleared</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  if($_SESSION['role']==1){
                    $id=$_SESSION['renter_id'];
                    $sql = "SELECT * FROM `booking_details` as b , car_details as c WHERE b.car_id=c.car_id AND renter_id='$id'";
					//echo $sql;exit;
                    $resultData=$conn->query($sql);
                  }else{
                    $sql = "SELECT * FROM `booking_details` as b , car_details as c WHERE b.car_id=c.car_id";

                    $resultData=$conn->query($sql);
                  }

                  	foreach($resultData as $view){
                  ?>
                  <tr>
                    <td><?=$view['car_name']?></td>
                    <td><?=$view['pick_date']?></td>
                    <td><?=$view['return_date']?></td>
                    <td><?=$view['total_day']?></td>
                    <td><?=$view['booking_date']?></td>
                    <td style="color:blue;"><b><?=$view['total_bill']?></b>/-</td>
                    <td><b><?=$view['advance_payment']?></b>/-</td>
                    <td><b><?php $a = (($view['total_bill'])-($view['advance_payment'])); if($a == 0){ echo 'Due Cleared'; }else{echo  $a;};?></b> </td>
                    <td>
											<?php if($a == 0){

												echo 'cleared';

											}else{?>
											<form action="" method="post">
												<input type="hidden" name="b_id" value="<?=$view['booking_id']?>">
												<input type="hidden" name="ad_pay" value="<?=$view['total_bill']?>">
												<button type="submit" class="btn btn-info btn-block"  name="button"> Yes </button>
											</form>
										<?php } ?>
										</td>
                  </tr>
                <?php } ?>
				                <thead>
                  <tr>
										<th>Car Name</th>
                    <th>Pick Date</th>
                    <th>Return Date</th>
                    <th>Total day</th>
                    <th>booking Date</th>
                    <th>total bill</th>
                    <th> Payment</th>
                    <th>Due</th>
                    <th>Due Cleared</th>
                  </tr>
                </thead>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include_once('includes/footer.php');?>
