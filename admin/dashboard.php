<?php include_once('includes/header.php');?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawDualX);
function drawDualX() {
  var data = google.visualization.arrayToDataTable([
     ['Company', 'Total Rent'],
      <?php
      include_once '../dbCon.php';
      $conn= connect();
      $sql1="SELECT sum(`total_bill`) as sam, company_name FROM booking_details as b , car_details as c, renter_details as r WHERE b.car_id = c.car_id AND c.renter_id = r.renter_id AND isCancel = 0";
      $results = $conn->query($sql1);
      while($row=mysqli_fetch_array($results))
      {
        echo "['".$row["company_name"]."',".$row["sam"]."],";
      }
  ?>
  ]);
  var materialOptions = {
    chart: {
      title: 'Total Renters Income'
    },
    hAxis: {
      title: 'Company'
    },
    vAxis: {
      title: 'City'
    },
    bars: 'vartical',
    series: {
      0: {axis: '2010'},
      1: {axis: '2000'}
    },
    axes: {
      x: {
        2010: {label: '2010 Population (in millions)', side: 'top'},
        2000: {label: '2000 Population'}
      }
    }
  };
  var materialChart = new google.charts.Bar(document.getElementById('chart'));
  materialChart.draw(data, materialOptions);
}
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Car Class', 'Total Booking'],
          <?php
          include_once '../dbCon.php';
          $conn= connect();
          $sql1="SELECT DISTINCT class , count(`booking_id`) as sam FROM booking_details";
          $results = $conn->query($sql1);
          while($row=mysqli_fetch_array($results))
          {
            echo "['".$row["class"]."',".$row["sam"]."],";
          }
      ?>
        ]);

        var options = {
          title: 'Total Booking by each car class'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<?php include_once('includes/navbar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->

    <section class="content">
      <!-- Info boxes -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Booking</span>
              <span class="info-box-number">5<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sale Car Ad</span>
              <span class="info-box-number">2</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Booking</span>
              <span class="info-box-number">3</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Company</span>
              <span class="info-box-number">2</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      <!-- /.row -->



    </section>






    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Booking Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                                <div id="chart" style="height:300px;width:300px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Booking Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                            <div id="piechart" style="height:300px;width:500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
      <!-- /.row -->
    </section>

    <!-- /.content -->
  </div>
  <?php include_once('includes/footer.php');?>
