<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';

if (isset($_POST['submit'])) {
	$subject = $_POST['subject'];
    $complaint = $_POST['complaint'];
    $date = date('Y-m-d');
	

			$sql = "INSERT INTO complaints (`license_number`, `complaint`, `subject`,`date`,`status`) VALUES ('$_SESSION[license_number]', '$complaint', '$subject', '$date','Pending')";
			$result = mysqli_query($conn, $sql);
			if ($result)
            {
                ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Complaint added successfully. You will be contacted shortly.";?></div><?php
				
			} 
            else
            {
				?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
			}
	
}

?>


<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Complaints</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Complaints</li> 
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
                <label for="product_name">Subject</label>
                <input type="text" placeholder="Please enter subject" name="subject" value="" required  class="form-control">
            </div>

            <div class="form-group">
                <label for="product_name">Complaint</label>
                <textarea name="complaint" placeholder="Please enter complaint"  class="form-control" id="complaint"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary float-right" name="submit">Make Complaint</button>
            </div><br>

          </div>
        </form>
      </div>
   </div>
</div>
</div>
</section><br>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>