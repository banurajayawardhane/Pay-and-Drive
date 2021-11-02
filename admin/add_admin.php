<?php 
include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 



error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admin WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admin (`id`, `password`)
					VALUES ('$id', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {

        ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Admin Registration Completed.";?></div><?php

				$id = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Email already exist.";?></div><?php
		}
		
	} else {
    ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Password Not Matched.";?></div><?php
		
	}
}

?>


<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Motorist</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-4 m-1">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

		  <div class="form-group">
            <label for="product_name">Admin ID</label>
            <input type="text" placeholder="Username" name="id" value="<?php echo $username; ?>" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">Password</label>
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required  class="form-control">
          </div>

		  <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add Motorist</button>
              </div>

            </div>
          </div>


		  
          </div>
        </form>
      </div>
   </div>
</div>
</div>
</section>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>