<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';

 # get police id from login id
 $id = $_SESSION['id'];
 $sql = "SELECT * FROM police where id= '$id'";
 if($result1 = mysqli_query($conn, $sql)){
     if(mysqli_num_rows($result1) > 0){
     $row = mysqli_fetch_array($result1);
     $police_id = $row['police_id'];
 }
 }

?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">license inventory - Payed Fines</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">license inventory</li> 
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
          $query = "SELECT * from license_inventory inner join fines on license_inventory.license_number=fines.license_number WHERE fines.status='payed' AND license_inventory.police_id='$police_id'";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Id</th>
            <th scope="col">Fine Number</th>
            <th scope="col">License Number</th>
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
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fine_number'];?></td>
            <td><?php echo $row['license_number'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a href="delete_license.php?id=<?php echo $row['id']; ?>&fine_number=<?php echo $row['fine_number']; ?>">Handover license</a></td>
          </tbody>


        <?php

            }
          }
          else
          {
            echo "No License in the inventory";
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


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">license inventory - Pending Payemnt Fines</h3>
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
          $query = "SELECT * from license_inventory inner join fines on license_inventory.license_number=fines.license_number WHERE fines.status='license confiscated' AND license_inventory.police_id='$police_id'";
          $query_run = mysqli_query($conn, $query);
              
        ?>
        <table class="table table-hover">
          <thead>
            <th scope="col">Id</th>
            <th scope="col">Fine Number</th>
            <th scope="col">License Number</th>
            <th scope="col">Status</th>
            <th scope="col">Payment due on</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
        
          <tbody>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fine_number'];?></td>
            <td><?php echo $row['license_number'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['date_expire'];?></td>

          </tbody>


        <?php

            }
          }
          else
          {
            echo "No License in the inventory";
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