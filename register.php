<?php 

include 'config.php';

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
			$sql = "INSERT INTO users (`address`, `blood_group`, `contact_number`, `date_expire`, `date_issue`, `dob`, `license_number`, `name`, `nic`, `password`, `vehicle_type`)
					VALUES ('$address', '$bloodg', '$number', '$ex_date', '$iss_date', '$dob', '$lnumber', '$name', '$nic', '$pass', '$vtype')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert" id="display_error"><strong>Success !</strong> <?php echo "Admin Registration Completed.";?></div><?php
        
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
        
		
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
        
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Email already exist.";?></div><?php
      
		}
		
	} else {
		?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Password Not Matched.";?></div><?php
    
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="admin\css\sb-admin-2.min.css">


	<title>Register Form - Pure Coding</title>
</head>
<body>

              

<div class="row">
   <div class="col-md-12 m-auto">
     <div class="card card-primary">

	 
         <center><h1 class="m-0">Registration</h1></center>
      
       <form action="" method="POST" class="login-email">
          <div class="card-body">

		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_name">Full Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name"  value="<?php echo $name; ?>" require>
              </div>

              <div class="col-md-6">
			  <label for="product_name">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?php echo $address; ?>" require>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Date of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter birthday" value="<?php echo $dob; ?>">
              </div>

              <div class="col-md-6">
                  <label for="product_category">NIC Number</label>
                  <input type="text" name="nic" class="form-control" id="nic" placeholder="Enter NIC number" value="<?php echo $nic; ?>">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="product_condition">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" value="<?php echo $email; ?>">
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
                  <label for="product_condition">License Number</label>
                  <input type="text" name="lnumber" class="form-control" id="lnumber" placeholder="Enter license number" value="<?php echo $lnumber; ?>">
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
                   <input type="text" name="bloodg" class="form-control" id="bloodg" placeholder="Enter blood group" value="<?php echo $bloodg; ?>">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                  <label for="product_condition">Expire Date</label>
                  <input type="date" name="ex_date" class="form-control" id="ex_date" placeholder="" value="<?php echo $ex_date; ?>">
              </div>

              <div class="col-md-6">
                  <label for="product_category">Date Of Issue</label>
                  <input type="date" name="iss_date" class="form-control" id="iss_date" placeholder="" value="<?php echo $iss_date; ?>">
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
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
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


	
	<br><br>
</body>
</html>