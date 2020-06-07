<?php include_once('includes/header.php');?>
	<?php include_once('includes/navbar.php');?>
  <div class="content-wrapper">
	<section class="content-header">
      <a class="btn btn-info"  href="rentcar" role="button" ><i class="fa fa-plus" aria-hidden="true"></i> Add New Renting Car Info </a>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Cars</li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-danger">
					<div class="box-header with-border">
					  <h4 class=" text-center"><b>View All Renting Cars Information</b></h4>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					<?php if (isset($_SESSION['msg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['msg']?></p></div>
					<?php unset ($_SESSION['msg']);} ?>
						<table id="example1" class="table table-bordered table-hover ">
							<thead>
								<tr>
								  <th class="nosort">No.</th>
								  <th>Car Name</th>
								  <th>Price Per Day</th>
								  <th>Class</th>
								  <th>Fuel</th>
								  <th>Door</th>
								  <th>Gear Box</th>
								  <th>Driver Name</th>
								  <th>Driver Phone</th>
								  <th>Image</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include_once("../dbCon.php");
								$conn =connect();
								$id = $_SESSION['renter_id'];
								$sql="SELECT * FROM car_details WHERE renter_id = '$id'";
								$result= $conn->query($sql);
								foreach($result as $key=>$value){
								?>
								<tr>
								  <td><?php echo $key+1;?></td>
								  <td><?=$value['car_name']?></td>
								  <td><?=$value['price']?></td>
								  <td><?=$value['class']?></td>
								  <td><?=$value['fuel']?></td>
								  <td><?=$value['door']?></td>
								  <td><?=$value['gearbox']?></td>
								  <td><?=$value['driver_name']?></td>
								  <td><?=$value['driver_phone']?></td>
								  <td> <img src="../img/<?=$value['img1']?>" alt="" height="80px" width = "100px"> </td>
								</tr>
							<?php } ?>


							</tbody>
							<tfoot>
								<tr>
									<th class="nosort">No.</th>
								  <th>Car Name</th>
								  <th>Price Per Day</th>
								  <th>Class</th>
								  <th>Fuel</th>
								  <th>Door</th>
								  <th>Gear Box</th>
								  <th>Driver Name</th>
								  <th>Driver Phone</th>
								  <th>Image</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
    </section>

<?php
include_once 'includes/footer.php';
?>
