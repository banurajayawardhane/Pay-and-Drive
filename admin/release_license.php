<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h1 class="m-0">Release License</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Release license</li> 
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
          $query = "SELECT * from fines WHERE `status`='Court'";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Fine Number</th>
            <th scope="col">License Number</th>
            <th scope="col">Court date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
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
            <td><?php echo $row['court_date'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a href="handover_license.php?fine_number=<?php echo $row['fine_number']; ?>">Handover license</a></td>
          </tbody>


        <?php

            }
          }
          else
          {
            ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "No License Confiscated by the courts.";?></div><?php
            
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