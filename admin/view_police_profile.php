<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('../admin/UIDContainer.php',$Write);

?>

<script src="js/jquery.min.js"></script>
  <script>
			$(document).ready(function(){
				 $("#getUID").load("../admin/UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("../admin/UIDContainer.php");
				}, 500);
			});
</script>

<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Police Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Police</li> 
                        <li class="breadcrumb-item active">User Profile</li> 
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
            <input type="text" placeholder="Enter Police ID" name="police_id" class="form-control">
              </div>
              <div class="col-md-2">
              <textarea name="card_id" class="form-control" id="getUID" placeholder="scan user card" rows="1" cols="1"></textarea>
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

            $police_id = $_POST['police_id'];
            $card_id = $_POST['card_id'];
            

            $query = "SELECT * FROM police where police_id = '$police_id' OR rfid='$card_id'";
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
                  <label for="product_condition">Contact Number</label>
                  <input type="text" value="<?php echo $row['contact_number'];?>" class="form-control">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Login Id</label>
                  <input type="text" value="<?php echo $row['id'];?>" class="form-control">
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
                    <td colspan="6">No Police officer Found</td>
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>