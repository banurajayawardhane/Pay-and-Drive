<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';

?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Court Dates</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">court dates</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <div class="container-fluid">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">

        <?php
          $query = "SELECT * from fines WHERE status='Court' AND license_number='$_SESSION[license_number]'";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Fine Number</th>
            <th scope="col">License Number</th>
            <th scope="col">Status</th>
            <th scope="col">Court</th>
            <th scope="col">Court Date</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
        
          <tbody>
            <td><?php echo $row['fine_number'];?></td>
            <td><?php echo $row['license_number'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['court'];?></td>
            <td><?php echo $row['court_date'];?></td>
          </tbody>


        <?php

            }
          }
          else
          {
            echo "No Records";
          }

        ?>
        </table>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>