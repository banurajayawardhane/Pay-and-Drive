<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';

# get  details from login id
$sql = "SELECT * FROM payment_center where id='$_SESSION[id]'";
if($result1 = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result1) > 0){
    $row = mysqli_fetch_array($result1);
    $pc_name = $row['name'];
}
}
?>

<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Get Payment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Get payment</a></li>
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
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-5">
                             <input type="text" placeholder="Enter Fine number" name="fine_number" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <input type="submit" name="search" value="Load Data" class="btn btn-primary float-right">
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</section>

                            <?php
                                if(isset($_POST['search']))
                                {
                                    $today_date = date('Y/m/d');
                                    $fine_number = $_POST['fine_number'];

                                    $query = "SELECT * FROM fines where fine_number='$fine_number' AND `status`='license confiscated'";
                                    $query_run = mysqli_query($conn, $query);
                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($row = mysqli_fetch_array($query_run))
                                        {

                                    $license_number = $row['license_number'];

                                    $query1 = "SELECT * FROM users where license_number='$license_number'";
                                    $query_run = mysqli_query($conn, $query1);
                                    $row1 = mysqli_fetch_array($query_run);
                                
                                    
                            ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-1">
                <div class="card card-primary">
                    <form action="payment.php" method="POST" class="login-email">
                        <div class="card-body">

                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="product_name">Name: <?php echo $row1['name'];?></label><br>
                                    <label for="product_name">Address: <?php echo $row1['address'];?></label><br>
                                    <label for="product_name">Phone Number: <?php echo $row1['contact_number'];?></label>
                                </div>

                                <div class="col-md-6">
                                    <label for="product_name">Date: <?php echo $today_date;?></label><br>
                                    <label for="product_name">License Number: <?php echo $row['license_number'];?></label>
                                </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-3">
                                    <label for="product_name">Vehicle number: <?php echo $row['vehicle_number'];?></label><br>
                                </div>

                                <div class="col-md-3">
                                    <label for="product_name">Date of offence: <?php echo $row['date_of_offence'];?></label><br>
                                </div>

                                <div class="col-md-3">
                                    
                                    <label for="product_name">Time of offence: <?php echo $row['time'];?></label><br>
                                </div>

                                <div class="col-md-3">
                                    <label for="product_name">Status: <?php echo $row['status'];?></label><br>
                                </div>
                                </div>
                            </div>

                            <table class="table table">
                                <thead>
                                    <th>#</th>
                                    <th>Fine Number</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    <th>01</th>
                                    <th><?php echo $row['fine_number'];?></th>
                                    <th>Rs.<?php echo $row['amount'];?>.00</th>
                                </tbody>
                            </table>
                            
                            <br>

                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="product_name">Payment center id: <?php echo $_SESSION['id'];?></label><br>
                                    <label for="product_name">Cashier name: <?php echo $pc_name;?></label><br>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-12">
                                <a href="payment.php?fine_number=<?php echo $row['fine_number']; ?>&payment_center=<?php echo  $_SESSION['id']; ?>">Check Out</a>
                                </div>
                                </div>
                            </div>

                            <?php
                                    }
                                }else{
                                    ?>
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12 m-1">
                                                    <div class="card card-primary">
                                                    <div class="card-body">
                                                        <h5><?php echo "Invalid Fine Number";?></h5>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                                    

                                    <?php
                                }
                            }
                        
                            ?>

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