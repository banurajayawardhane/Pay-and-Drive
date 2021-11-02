<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 


error_reporting(0);

session_start();
#update license inventory
if (isset($_POST['submit'])) {
  $l_number = $_POST['l_number'];
  $id = $_SESSION['id'];

  # get police id from login id
  $sql = "SELECT * FROM police where id= '$id'";
    if($result1 = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result1) > 0){
        $row = mysqli_fetch_array($result1);
        $police_id = $row['police_id'];
    }
    }

   $sql = "INSERT INTO license_inventory (`license_number`,`police_id`) VALUES ('$l_number','$police_id') ";
   $result = mysqli_query($conn, $sql);


}
# Update fines table
if (isset($_POST['submit'])) {
	$l_number = $_POST['l_number'];
    $fine_number = $_POST['fine_number'];
    $amount = $_POST['amount'];
    $court = $_POST['court'];
    $court_date = $_POST['court_date'];
    $o_date = $_POST['o_date'];
    $o_time = $_POST['o_time'];
    $v_number = $_POST['v_number'];
    $status = $_POST['status'];
    $police_station = $_POST['police_station'];
    $place = $_POST['place'];
    $nature = $_POST['nature'];
    $valid_to = $_POST['valid_to'];
    $valid_from = $_POST['valid_from'];
    
    $id = $_SESSION['id'];
    
    # get police id from login id
    $sql = "SELECT * FROM police where id= '$id'";
    if($result1 = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result1) > 0){
        $row = mysqli_fetch_array($result1);
        $police_id = $row['police_id'];
    }
    }

		$sql = "SELECT * FROM fines WHERE fine_number='$fine_number'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO fines (`license_number`, `fine_number`,`police_id`,`amount`,`court`,`date_of_offence`,`time`,`vehicle_number`,`status`,`place`,`nature`,`date_expire`,`date_issue`,`court_date`,`police_station`)
					VALUES ('$l_number', '$fine_number','$police_id','$amount','$court','$o_date','$o_time','$v_number','license Confiscated','$place','$nature','$valid_to','$valid_from','$court_date','$police_station')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
        ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		} else {
			?><div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Warning !</strong> <?php echo "Fine number already exist.";?></div><?php
		}
		
	}
                                
?>



<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Make Fine</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Make Fine</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-1">
     <div class="card card-primary"> 

     <form action="" method="POST" class="login-email">
     <div class="card-body">

<div class="form-group">
  <div class="form-row">
  <div class="col-md-4">
  <input type="text" placeholder="Enter License Number" name="license_number" value="<?php if(isset($_POST['license_number'])) echo $license_number; ?>" required  class="form-control">
    </div>
    <div class="col-md-0">
    <button class="btn btn-primary float-right" name="load">Load Info</button>
    </div>
  </div>
</div>
</div>
</form>

<?php 
# load info from user details
     if(isset($_POST['license_number']))
         {
            $license_number = $_POST['license_number'];
            $query = "SELECT * FROM users WHERE license_number='$license_number' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
?>

               

       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="product_name">Name</label>
            <input type="text" placeholder="" name="" value="<?= $row['name']; ?>" required  class="form-control">
              </div>
              <div class="col-md-6">
              <label for="product_name">Competent to Drive</label>
            <input type="text" placeholder="" name="" value="<?= $row['vehicle_type']; ?>" required  class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="product_name">Address</label>
            <input type="text" placeholder="" name="" value="<?= $row['address']; ?>" required  class="form-control">
              </div>
              <div class="col-md-6">
              <label for="product_name">License Number</label>
            <input type="text" placeholder="" name="l_number" value="<?= $row['license_number']; ?>" required  class="form-control">
              </div>
            </div>
          </div>

          
          

<?php
          }
             }
                else
                    {
                       echo "<h6>No Record Found</h6>";
                  }
          }
                                   
 ?>
        </div>
                </div>
                </div>
                </div>
                </section>


<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-12 m-1">
     <div class="card card-primary">

       <form action="" method="POST" class="login-email">
          <div class="card-body">
          <label for="product_name"><h4>Fill out the below informaton</h4></label>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="product_name">Fine Number</label>
            <input type="number" placeholder="Fine number" name="fine_number" value="<?php echo $fine_number; ?>"   class="form-control" required>
              </div>
              <div class="col-md-6">
              <label for="product_name">Vehicle Number</label>
            <input type="text" placeholder="Vehicle number" name="v_number" value=""   class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-4">
            <label for="product_name">Date of offence</label>
            <input type="date" placeholder="" name="o_date" value=""   class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Time of offence</label>
            <input type="time" placeholder="" name="o_time" value=""   class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Place of offence</label>
            <input type="text" placeholder="Place of offence" name="place" value=""   class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="product_name">Nature of offence</label>
            <input type="text" placeholder="Nature of offence" name="nature" value=""   class="form-control" required>
          </div>

          <hr> 

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-4">
            <label for="product_name">Valid from</label>
            <input type="date" placeholder="" name="valid_from" value=""   class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Valid To</label>
            <input type="date" placeholder="" name="valid_to" value=""  class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Amount</label>
            <input type="number" placeholder="Amount" name="amount" value=""  class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-4">
            <label for="product_name">Court</label>
            <input type="text" placeholder="Court" name="court" value=""   class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Court date</label>
            <input type="date" placeholder="" name="court_date" value=""   class="form-control" required>
              </div>
              <div class="col-md-4">
              <label for="product_name">Police Station</label>
            <input type="text" placeholder="Police station" name="police_station" value=""   class="form-control" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
           
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Make Fine</button>
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