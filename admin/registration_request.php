<?php include_once('includes/header.php');?>
	<?php include_once('includes/navbar.php');?>
  <!-- Content Wrapper. Contains page content -->
	<?php
	include_once '../dbCon.php';
	$conn= connect();
	if(isset($_POST['accept'])){
	$id = $_POST['r_id'];
	$sql = "UPDATE renter_details SET isAccepted = 1 WHERE renter_id = '$id' ";
	$conn->query($sql);
}

if(isset($_POST['decline'])){
$id = $_POST['r_id'];
$sql = "UPDATE renter_details SET isAccepted = 2 WHERE renter_id = '$id' ";
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
                    <th>Company Name</th>
                    <th>Owner</th>
                    <th>TIIN number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $sql = "SELECT * FROM renter_details WHERE isAccepted = 0";
                    $resultData=$conn->query($sql);
                  	foreach($resultData as $view){
                  ?>
                  <tr>
                    <td><?=$view['company_name']?></td>
                    <td><?=$view['name']?></td>
                    <td><?=$view['tin']?></td>
                    <td><?=$view['email']?></td>
                    <td><?=$view['phone']?></td>
                    <td>
											<form action="" method="post">
												<input type="hidden" name="r_id" value="<?=$view['renter_id']?>">
												<button type="submit" class="btn btn-success pull-left "  name="accept"> Accept </button>
												<button type="submit" class="btn btn-danger pull-right "  name="decline"> Decline </button>
											</form>
										</td>
                  </tr>
                <?php } ?>
				                <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Owner</th>
                    <th>TIIN number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
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
