<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';


if (isset($_POST['submit'])) 
{
	$pass = md5($_POST['pass']);
	$new_pass = md5($_POST['new_pass']);
    $new_com_pass = md5($_POST['new_com_pass']);

    if($new_com_pass == $new_pass)
    {
        $affected = mysqli_query($conn, "UPDATE police SET `password` ='$new_com_pass' WHERE password = '$pass' AND id='$_SESSION[id]'")or die(mysqli_error());
        if($affected){
          ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
        }
        else {
          ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
          }
    }
    else{ 
      ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Password Not Matched.";?></div><?php
    }
}

?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li> 
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

          $query = "SELECT * FROM police where id='$_SESSION[id]'";
          $query_run = mysqli_query($conn, $query);
              
        
          if($query_run)
          {
            foreach($query_run as $row)
            {
        ?>
    

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <label for="product_name">Full Name</label>
            <input type="text" value="<?php echo $row['name'];?>" class="form-control">
              </div>

              <div class="col-md-6">
              <label for="product_condition">address</label>
                  <input type="text" value="<?php echo $row['address'];?>" class="form-control">
              
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
              <label for="product_name">Police ID</label>
            <input type="text" value="<?php echo $row['police_id'];?>" class="form-control">
              </div>

              <div class="col-md-4">
                  <label for="product_category">Contact Number</label>
                  <input type="text" value="<?php echo $row['contact_number'];?>" class="form-control">
              </div>

              <div class="col-md-4">
              <label for="product_condition">Login ID</label>
                  <input type="text" value="<?php echo $row['id'];?>" class="form-control">
              </div>

            </div>
          </div>

        <?php

            }
          }
          else
          {
            echo "no fines";
          }

        ?>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">

        <form action="" method="POST" class="login-email">

        <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
              <label for="product_name">Password</label>
            <input type="text" name="pass" value="" class="form-control" require>
              </div>

              <div class="col-md-4">
              <label for="product_name">New Password</label>
            <input type="password" name="new_pass" value="" class="form-control" require>
              </div>

              <div class="col-md-4">
              <label for="product_name">Confirm Password</label>
            <input type="Password" name="new_com_pass" value="" class="form-control" require>
              </div>

            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
              </div>

              <div class="col-md-4">
              <button class="btn btn-warning float-right" name="submit">Change Password</button>
              </div>

            </div>
          </div>

        </form>

        
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