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
    <a href="edit_profile.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-user-circle fa-sm text-white-50"></i> Edit Profile</a>
  </div>

  <!-- Content Row -->
  <div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">

            <?php    
             # fetch data
             $sql = "SELECT * FROM police where id='$_SESSION[id]'";
             if($result2 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result2) > 0){
             $row = mysqli_fetch_array($result2);
             $name = $row['name'];
             }
             }

             ?>
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $name; ?></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <div class="h5 mb-0 font-weight-bold text-gray-800">ID Number: <?php echo $row['police_id']; ?></div>
               

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
            <?php
              # get police id from login id
              $sql = "SELECT * FROM police where id= '$_SESSION[id]'";
              if($result1 = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result1) > 0){
                  $row = mysqli_fetch_array($result1);
                  $police_id = $row['police_id'];
              }
             }
              $query = "SELECT license_number FROM fines where police_id='$police_id' ORDER BY license_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              ?>
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Imposed Fines</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Total:  <?php echo $row; ?> </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hand-paper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <?php
              # get police id from login id
              $sql = "SELECT * FROM police where id= '$_SESSION[id]'";
              if($result1 = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result1) > 0){
                  $row = mysqli_fetch_array($result1);
                  $police_id = $row['police_id'];
              }
             }
              $query = "SELECT license_number FROM fines where police_id='$police_id' AND `status`='license confiscated' ORDER BY license_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              ?>
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Confiscated License</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">In hand:  <?php echo $row; ?> </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <?php
              # get police id from login id
              $sql = "SELECT * FROM police where id= '$_SESSION[id]'";
              if($result1 = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result1) > 0){
                  $row = mysqli_fetch_array($result1);
                  $police_id = $row['police_id'];
              }
             }
              $today_date = date('Y/m/d');
              $query = "SELECT license_number FROM fines where police_id='$police_id' AND `date_of_offence`='$today_date' ORDER BY license_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              ?>
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Daily Imposed Fines</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Total:  <?php echo $row; ?> </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>