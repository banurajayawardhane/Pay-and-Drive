<?php

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('../admin/UIDContainer.php',$Write);

include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 


error_reporting(0);

session_start();





if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $police_id = $_POST['police_id'];
  $login_id = $_POST['login_id'];
  $address = $_POST['address'];
  $card_id = $_POST['card_id'];
  $number = $_POST['number'];
  $pass = md5($_POST['pass']);
  $con_pass = md5($_POST['con_pass']);

$sql = "SELECT * FROM police WHERE id='$login_id'";
 $result3 = mysqli_query($conn, $sql);
if (!$result3->num_rows > 0){

$sql = "SELECT * FROM police WHERE rfid='$card_id'";
$result2 = mysqli_query($conn, $sql);
if (!$result2->num_rows > 0)
{
	if ($pass == $con_pass) {
		$sql = "SELECT * FROM police WHERE police_id='$police_id'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO police (`address`, `contact_number`, `id`, `name`, `password`, `police_id`, `admin_id`, `rfid`)
					VALUES ('$address', '$number', '$login_id', '$name', '$pass', '$police_id', '$police_id', '$card_id')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Registration Completed.";?></div><?php
        $name = "";
        $police_id = "";
        $login_id = "";
        $address = "";
        $number = "";
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
}else{
  ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Card already exist.";?></div><?php
}
}else{
  ?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Login ID already exist.";?></div><?php
} 
}

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

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Police Officer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</a></li>
                        <li class="breadcrumb-item active">Police</li>
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
                  <label for="product_category">Police ID Number</label>
                  <input type="text" name="police_id" class="form-control" id="police_id" placeholder="Enter id number" value="<?php echo $police_id; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="product_name">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?php echo $address; ?>" require>
              </div>

              <div class="col-md-6">
                  <label for="product_category">Contact Number</label>
                  <input type="text" name="number" class="form-control" id="number" placeholder="Enter mobile number" value="<?php echo $number; ?>">
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

            <div class="col-md-4">
                  <label for="product_condition">Login Id</label>
                  <input type="text" name="login_id" class="form-control" id="Login_id" placeholder="Enter Login Id" value="<?php echo $login_id; ?>">
              </div>

            <div class="col-md-4">
                  <label for="product_condition">Password</label>
                  <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password" value="<?php echo $_POST['pass']; ?>">
              </div>

              <div class="col-md-4">
                  <label for="product_category">Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" id="con_pass" placeholder="Confirm password" value="<?php echo $_POST['con_pass']; ?>" >
              </div>

            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

            <div class="col-md-4">
              <h5>Assign User access Card</h5> 
              <label>Scan the RFID card to display the Card ID</label>
              <textarea name="card_id" class="form-control" id="getUID" placeholder="Card ID" rows="1" cols="1" required></textarea>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add Police</button>
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