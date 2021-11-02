<?php
include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 



error_reporting(0);

session_start();


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $id = $_POST['id'];
  $pass = md5($_POST['pass']);
  $con_pass = md5($_POST['con_pass']);

	if ($pass == $con_pass) {
		$sql = "SELECT * FROM payment_center WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO payment_center (`admin_id`, `id`, `name`, `password`)
					VALUES ('$id', '$id', '$name', '$pass')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Registration Completed.";?></div><?php
        $name = "";
        $id = "";
        $pass = "";
        $con_pass = "";
        
		
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
        
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "ID already exist.";?></div><?php
      
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
                    <h1 class="m-0">Add Payemnt Center</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</a></li>
                        <li class="breadcrumb-item active">Payment Center</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-auto">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <label for="product_name">Full Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name"  value="<?php echo $name; ?>" require>
              </div>

              <div class="col-md-6">
                  <label for="product_category">ID Number</label>
                  <input type="text" name="id" class="form-control" id="id" placeholder="Enter id number" value="<?php echo $number; ?>">
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

            <div class="col-md-6">
                  <label for="product_condition">Password</label>
                  <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password" value="<?php echo $_POST['pass']; ?>">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" id="con_pass" placeholder="Confirm password" value="<?php echo $_POST['con_pass']; ?>" >
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add Payment Center</button>
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