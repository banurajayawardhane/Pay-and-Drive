<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

include '../check_date.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">

            <?php    
             # fetch data
             $sql = "SELECT * FROM payment_center where id='$_SESSION[id]'";
             if($result2 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result2) > 0){
             $row = mysqli_fetch_array($result2);
             $name = $row['name'];
             }
             }

             ?>
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $name; ?></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <div class="h5 mb-0 font-weight-bold text-gray-800">ID Number: <?php echo $_SESSION['id']; ?></div>
               

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Jobs</div>

              <?php
              $query = "SELECT fine_number FROM fines where pc_id='$_SESSION[id]' ORDER BY fine_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Total: <?php echo $row; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
  <?php
include('includes/scripts.php');

?>