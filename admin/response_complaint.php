<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
if(isset($_GET)){

    if (isset($_POST['submit'])) {
        $res = $_POST['res'];
        $id = $_GET['id'];
        $today_date = date('Y/m/d');
        $datex = strtotime($today_date." + 7 days");
        $datey = date('Y/m/d',$datex);
        
        
    
                $sql = "UPDATE complaints SET response='$res', `status`='responded', date_res='$today_date', date_timeout='$datey' WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    ?><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success !</strong> <?php echo "Responded successfully.";?></div><?php
                    
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
                
            </div>

            <?php 

            if(isset($_GET['id']))
             {
            $id = $_GET['id'];
            $query = "SELECT * FROM complaints WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                {
            ?>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                <label for="product_name">Complaint ID</label>
                <input type="text" value="<?= $row['id']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">License Number</label>
                    <input type="text" value="<?= $row['license_number']; ?>"class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Date</label>
                    <input type="text" value="<?= $row['date']; ?>"class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-8">
                <label for="product_name">Subject</label>
                  <input type="text" value="<?= $row['subject']; ?>" required  class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="product_category">Status</label>
                    <input type="text" value="<?= $row['status']; ?>"class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="product_name">Complaint</label>
                <input type="text" placeholder="" name="" value="<?= $row['complaint']; ?>" required  class="form-control">
            </div>

            <hr>
            
            <div class="form-group">
                <label for="product_name">Response</label>
                <input type="text" placeholder="" name="res" value="<?= $row['response']; ?>" required  class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-primary float-right" name="submit">Response to Complaint no <?php echo $_GET["id"]?> </button>
            </div><br>

            <?php
                }
                }
        
              }
                                   
            ?>

          </div>
        </form>
      </div>
   </div>
</div>
</div>
</section><br>

<?php
 }
include('includes/scripts.php');
include('includes/footer.php');
?>