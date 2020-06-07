	<?php include_once('includes/header.php');?> 
	<?php include_once('includes/navbar.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add your selling car details here :</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="insert_carsale.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Car Brand & Model No :</label>
                  <input type="text" class="form-control" name = "car_name" id="car_name" placeholder="Enter here" placeholder=" car name and model" required autofocus>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Price :</label>
                  <input type="text" class="form-control" id="price" name="price"  placeholder=" ৳ price in taka" required autofocus>
                </div>
				<div class="form-group col-md-10">
					<label for="inputAddress">Additional Info :</label>
					<textarea class="form-control" id="carinfo" name="carinfo" placeholder=" car details"required autofocus></textarea>
				 </div>
				<div class="form-group col-md-3">
				  <label for="inputState">Class :</label>
				  <select id="class" name="class" class="form-control">
					<option>Compact</option>
					<option>Supermini</option>
					<option>Sedan</option>
					<option>Minivan</option>
				  </select>
				</div>
				<div class="form-group col-md-3">
				  <label for="inputState">Fuel type :</label>
				  <select id="fuel" name="fuel" class="form-control">
					<option>Petrol</option>
					<option>Diesel</option>
					<option>CNG</option>
				  </select>
				</div>
				  <div class="form-group col-md-3">
					  <label for="inputState">Doors :</label>
					  <select id="doors" name="doors" class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					  </select>
					</div>
					<div class="form-group col-md-3">
					  <label for="inputState">Gearbox :</label>
					  <select id="gearbox" name="gearbox" class="form-control">
						<option>Automatic</option>
						<option>Manual</option>
					  </select>
					</div>
				<div class="form-group col-md-4">
				  <label for="inputEmail4">Kilometers Run :</label>
				  <input type="text" class="form-control" id="drivername" name="kilo"  placeholder="000" required autofocus>
				</div>
				<div class="form-group col-md-4">
				  <label for="inputEmail4">Registration Year :</label>
				  <input type="date" class="form-control" id="driverphone" name="reg" required autofocus >
				</div>
                <div class="form-group col-md-4">
                  <label for="exampleInputFile">Image upload</label>
                  <input type="file"  name="imageup1" id="exampleInputFile">
				</div>
             
              </div>
              <!-- /.box-body -->

              <div class="box-footer ">
                <button type="submit" name="cardetails" class="btn btn-primary col-md-4">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

	<?php include_once('includes/footer.php');?> 