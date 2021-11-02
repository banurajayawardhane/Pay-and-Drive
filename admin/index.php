<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include '../check_date.php';
$year = date('Y');
if(isset($_GET['year'])){
  $year = $_GET['year'];
}


?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="../attendance/index.php"  target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-calendar fa-sm text-white-50"></i> Attendance UI</a>
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- tot motorist -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Motorists</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT license_number FROM users ORDER BY license_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Motorists: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-car fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- tot police -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Police Officers</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM police ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h4> Police officers: ' .$row. '</h4>';

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-secret fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">License in Court</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT fine_number FROM fines where `status`='court' ORDER BY fine_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              if($row > 0)
              {
                echo '<h4> Total: ' .$row. '</h4>';

              }
              else
              {
                echo '<h4>No License</h4>';
              }
              

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-id-card fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    

    

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Complaints</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              require '../config.php';

              $query = "SELECT id FROM complaints where `status`='pending' ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              if($row > 0)
              {
                echo '<h4> Pending: ' .$row. '</h4>';

              }
              else
              {
                echo '<h4>No Complaints</h4>';
              }
              

              ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
              require '../config.php';

              $today_date = date('Y/m/d');

              $query = "SELECT fine_number FROM fines where `status`='license confiscated'AND date_of_offence='$today_date' ORDER BY fine_number";
              $query_run = mysqli_query($conn, $query);
              $imposed_fines = mysqli_num_rows($query_run);

              $query2 = "SELECT fine_number FROM fines where (`status`='payed' OR `status`='completed') AND date_of_offence='$today_date' ORDER BY fine_number";
              $query_run = mysqli_query($conn, $query2);
              $payed_fines = mysqli_num_rows($query_run);

              $query3 = "SELECT fine_number FROM fines where date_of_offence='$today_date' ORDER BY fine_number";
              $query_run = mysqli_query($conn, $query3);
              $tot = mysqli_num_rows($query_run);
             
              $query4 = "SELECT police_id FROM attendance where `status`='late' AND date='$today_date' ORDER BY police_id";
              $query_run = mysqli_query($conn, $query4);
              $late_att = mysqli_num_rows($query_run);

              $query5 = "SELECT police_id FROM attendance where `status`='present' AND date='$today_date' ORDER BY police_id";
              $query_run = mysqli_query($conn, $query5);
              $ontime_att = mysqli_num_rows($query_run);
  ?>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'fines per Day'],
          ['Imposed Fines',     <?php echo $imposed_fines; ?>],
          ['Paid Fines',      <?php echo $payed_fines; ?>],
          
        ]);

        var options = {
          title: 'Daily Imposed Fine Activities | Total Fines: <?php echo $tot; ?> ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'fines per Day'],
          ['Late Attended',     <?php echo $late_att; ?>],
          ['On Time Attended',      <?php echo $ontime_att; ?>],
          
        ]);

        var options = {
          title: 'Daily Atendance Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }
    </script>

    <div class="row">
        <div class="col-xl-6 col-md-1 mb-1">
          <div class="card border-left-primary shadow h-100 py-1">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div id="donutchart" style="width: 600px; height: 400px;"></div>
                </div>
              </div>
          </div>
        </div>

        <div class="col-xl-6 col-md-1 mb-1">
          <div class="card border-left-primary shadow h-100 py-1">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div id="donutchart2" style="width: 600px; height: 400px;"></div>
                </div>
              </div>
          </div>
        </div>
    </div>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>