
<?php
include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$name = $_POST['name'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $nic = $_POST['nic'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $lnumber = $_POST['lnumber'];
  $vtype = $_POST['vtype'];
  $bloodg = $_POST['bloodg'];
  $ex_date = $_POST['ex_date'];
  $iss_date = $_POST['iss_date'];
	$pass = md5($_POST['pass']);
	$con_pass = md5($_POST['con_pass']);

	if ($pass == $con_pass) {
		$sql = "SELECT * FROM users WHERE license_number='$lnumber'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (`address`, `blood_group`, `contact_number`, `date_expire`, `date_issue`, `dob`, `license_number`, `name`, `nic`, `password`, `vehicle_type`, `email`)
					VALUES ('$address', '$bloodg', '$number', '$ex_date', '$iss_date', '$dob', '$lnumber', '$name', '$nic', '$pass', '$vtype', '$email')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Motorist Registration Completed.";?></div><?php
        $name =   "";
        $address = "";
        $dob = "";
        $nic = "";
        $email = "";
        $number = "";
        $lnumber = "";
        $vtype = "";
        $bloodg = "";
        $ex_date = "";
        $iss_date = "";
        $pass = "";
	$con_pass = "";
		
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
        
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "License number already exist.";?></div><?php
      
		}
		
	} else {
		?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Password Not Matched.";?></div><?php
    
	}
}

?>

<html>
  <body>

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
                        <li class="breadcrumb-item active">Users</a></li>
                        <li class="breadcrumb-item active">Motorist</li>
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
            <label for="product_name">Full Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name"  value="<?php echo $name; ?>" required>
          </div>

          <div class="form-group">
            <label for="product_name">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?php echo $address; ?>" required>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter birthday" value="<?php echo $dob; ?>" required>
              </div>

              <div class="col-md-6">
                  <label for="product_category">NIC Number</label>
                  <input type="text" name="nic" class="form-control" id="nic" placeholder="Enter NIC number" value="<?php echo $nic; ?>" required>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" value="<?php echo $email; ?>" required>
              </div>

              <div class="col-md-6">
                  <label for="product_category">Contact Number</label>
                  <input type="text" name="number" class="form-control" id="number" placeholder="Enter mobile number" value="<?php echo $number; ?>" required>
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-4">
                  <label for="product_condition">License Number</label>
                  <input type="text" name="lnumber" class="form-control" id="lnumber" placeholder="Enter license number" value="<?php echo $lnumber; ?>" required>
              </div>

              <div class="col-md-4">
                  <label for="product_category">Vehicle Type</label>
                  <select class="form-control" id="vtype" name="vtype" value="<?php echo $vtype; ?>">
                    <option value="light_vehicle">Light vehicle</option>
                    <option value="heavy_vehicle">Heavy vehicle</option>
                   </select>
              </div>

              <div class="col-md-4">
                  <label for="product_category">Blood Group</label>
                   <input type="text" name="bloodg" class="form-control" id="bloodg" placeholder="Enter blood group" value="<?php echo $bloodg; ?>" required>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                  <label for="product_condition">Expire Date</label>
                  <input type="date" name="ex_date" class="form-control" id="ex_date" placeholder="" value="<?php echo $ex_date; ?>" required>
              </div>

              <div class="col-md-6">
                  <label for="product_category">Date Of Issue</label>
                  <input type="date" name="iss_date" class="form-control" id="iss_date" placeholder="" value="<?php echo $iss_date; ?>" required>
              </div>

            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                  <label for="product_condition">Password</label>
                  <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter password" value="<?php echo $_POST['pass']; ?>" required>
              </div>

              <div class="col-md-6">
                  <label for="product_category">Confirm Password</label>
                  <input type="password" name="con_pass" class="form-control" id="con_pass" placeholder="Confirm password" value="<?php echo $_POST['con_pass']; ?>" required>
              </div>

            </div>
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

  </body>
</html>

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>