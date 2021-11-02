<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
?>


<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Motorist Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ongoing Fines</li> 
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

        <form action="" method="post">
            <div class="form-row">
            <div class="col-md-5">
            <input type="text" placeholder="Enter License Number" name="license_number" class="form-control" required>
              </div>
              <div class="col-md-1">
              <input type="submit" name="search" value="Search" class="btn btn-primary float-right">
              </div>
            </div>
        </form>
<br>
        <?php
          require '../config.php';

          if(isset($_POST['search']))
          {

            $license_number = $_POST['license_number'];

            $query = "SELECT * FROM users where license_number = '$license_number'";
            $query_run = mysqli_query($conn, $query);

        

          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_array($query_run))
            {

          ?>
            

          <div class="form-group">
            <label for="product_name">Full Name</label>
            <input type="text" value="<?php echo $row['name'];?>" class="form-control">
          </div>

          <div class="form-group">
            <label for="product_name">Address</label>
            <input type="text" value="<?php echo $row['address'];?>" class="form-control">
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Date of Birth</label>
                  <input type="text" value="<?php echo $row['dob'];?>" class="form-control">
              </div>

              <div class="col-md-6">
                  <label for="product_category">NIC Number</label>
                  <input type="text" value="<?php echo $row['nic'];?>" class="form-control">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Email</label>
                  <input type="text" value="<?php echo $row['email'];?>" class="form-control">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Contact Number</label>
                  <input type="text" value="<?php echo $row['contact_number'];?>" class="form-control">
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-4">
                  <label for="product_condition">License Number</label>
                  <input type="text" value="<?php echo $row['license_number'];?>" class="form-control">
              </div>

              <div class="col-md-4">
                  <label for="product_category">Vehicle Type</label>
                  <input type="text" value="<?php echo $row['vehicle_type'];?>" class="form-control">
              </div>

              <div class="col-md-4">
                  <label for="product_category">Blood Group</label>
                   <input type="text" value="<?php echo $row['blood_group'];?>" class="form-control">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                  <label for="product_condition">Expire Date</label>
                  <input type="text" value="<?php echo $row['date_expire'];?>" class="form-control">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Date Of Issue</label>
                  <input type="text" value="<?php echo $row['date_issue'];?>" class="form-control">
              </div>

            </div>
          </div>

            

              <?php

                }

                }
                else
                {
                  ?>

                  <tr>
                    <td colspan="6">No Motorist Found</td>
                  </tr>

                  <?php
                }

              ?>

  
        </table>

        <?php
          }       
        ?>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>