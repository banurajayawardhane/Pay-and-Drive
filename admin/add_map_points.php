<?php 
include '../config.php';

include('includes/header.php'); 
include('includes/navbar.php'); 



error_reporting(0);

session_start();

if (isset($_POST['psubmit'])) {
	$plat = $_POST['platitude'];
    $plong = $_POST['plongitude'];
    $pname = $_POST['pname'];
    $pinfo = $_POST['paddress'];
	

			$sql = "INSERT INTO locations (`latitude`, `longitude`, `name`,`info`,`icon`)
					VALUES ('$plat', '$plong','$pname','$pinfo','../Resources/pmarker.png')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		
}

if (isset($_POST['submit'])) {
	$lat = $_POST['latitude'];
    $long = $_POST['longitude'];
    $name = $_POST['name'];
    $info = $_POST['address'];
	

			$sql = "INSERT INTO locations (`latitude`, `longitude`, `name`,`info`,`icon`)
					VALUES ('$lat', '$long','$name','$info','../Resources/marker.png')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Completed.";?></div><?php
			} else {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
		
}

?>


<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add centers to Maps</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add maps</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-6 m-0">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

		  <div class="form-group">
            <label for="product_name">Payemnt Center Name</label>
            <input type="text" placeholder="Payemnt Center Name" name="name" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">Address</label>
            <input type="text" placeholder="Address" name="address" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">latitude</label>
            <input type="text" placeholder="latitude" name="latitude" value="<?php echo $_POST['cpassword']; ?>" required  class="form-control">
          </div>

          <div class="form-group">
            <label for="product_name">longitude</label>
            <input type="text" placeholder="longitude" name="longitude" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="submit">Add Point to Map</button>
              </div>

            </div>
          </div>


		  
          </div>
        </form>
      </div>
   </div>


   <div class="col-md-6 m-0">
     <div class="card card-primary">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <label for="product_name">Police Station Name</label>
            <input type="text" placeholder="Police station Name" name="pname" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">Address</label>
            <input type="text" placeholder="Address" name="paddress" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <label for="product_name">latitude</label>
            <input type="text" placeholder="latitude" name="platitude" value="<?php echo $_POST['cpassword']; ?>" required  class="form-control">
          </div>

          <div class="form-group">
            <label for="product_name">longitude</label>
            <input type="text" placeholder="longitude" name="plongitude" value="" required  class="form-control">
          </div>

		  <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
              
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right" name="psubmit">Add Point to Map</button>
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
<br>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 m-0">
     <div class="card card-primary">
       <iframe frameborder="0" style="height: 65%; overflow:scroll; width: 100%" src="https://www.latlong.net/"></iframe>
    </div> 
</div>
</div>
</div>
</section>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>