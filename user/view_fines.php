<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ongoing Fine</h1>
                    
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ongoing Fine</li> 
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
<div class="row">


<?php
$id = $_SESSION['license_number'];
$sql = "SELECT * FROM users where license_number= '$id'";
    if($result1 = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result1) > 0){
        $rowr = mysqli_fetch_array($result1);
        $name = $rowr['name'];
        $address = $rowr['address'];
        $vtype = $rowr['vehicle_type'];

    }
    }


$query = "SELECT * FROM fines where license_number='$_SESSION[license_number]' AND `status`='license Confiscated' order by date_of_offence DESC limit 1";
$query_run = mysqli_query($conn, $query);
$check_db = mysqli_num_rows($query_run) > 0 ;

if($check_db)
{
  while($row = mysqli_fetch_array($query_run))
  {


    ?>

   <div class="col-md-12 m-auto">
     <div class="card border-left-primary shadow h-100 py-2">
       <form action="" method="POST" class="login-email">
          <div class="card-body">

          <div class="form-group">
            <button class="btn btn-primary float-right" name="submit">Download</button>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-5">
                  <label>Full Name</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $name; ?></div>
              </div>
              <div class="col-md-7">
                  <label>Address</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $address; ?></div>              
              </div>
              
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-3">
                  <label>Fine Number</label> 
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['fine_number']; ?></div>   
              </div>
            <div class="col-md-3">
                  <label>Vehicle Number</label> 
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['vehicle_number']; ?></div>   
              </div>
              <div class="col-md-3">
                  <label>Date of Offence</label>   
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['date_of_offence']; ?></div>
              </div>
              <div class="col-md-3">
                  <label>Time</label> 
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['time']; ?></div>               
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-4">
                  <label>Amount</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['amount']; ?></div>               
              </div>
              <div class="col-md-4">
                  <label>Place</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['place']; ?></div>               
              </div>
              <div class="col-md-4">
                  <label>Nature of offence</label>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['nature']; ?></div>   
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-3">
                  <label>License Number</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['license_number']; ?></div>  
              </div>
              <div class="col-md-3">
                  <label>Vehicle Type</label>   
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vtype; ?></div>
              </div>
              <div class="col-md-3">
                  <label>Valid from</label>    
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['date_issue']; ?></div>            
              </div>
              <div class="col-md-3">
                  <label>Valid To</label>   
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['date_expire']; ?></div>   
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
                  <label>Court</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['court']; ?></div>  
              </div>
              <div class="col-md-6">
                  <label>Court Date</label>   
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['court_date']; ?></div>
              </div>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
                  <label>Police Station</label>   
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['police_station']; ?></div> 
              </div>
              <div class="col-md-6">
                  <label>Police Officer</label>  
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ['police_id']; ?></div> 
              </div>
            </div>
          </div>

          <input type="hidden" name="price" id="price" value="<?php echo $row ['amount']; ?>"/>
            <input type="hidden" name="item_name" id="item_name" value="<?php echo $row ['fine_number']; ?>"/>
            <input type="hidden" name="license_number" id="license_number" value="<?php echo $row ['license_number']; ?>"/>

          <hr>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            
              </div>
              <div class="col-md-6">
              <button class="btn btn-primary float-right buy_now" name="submit">Pay Fine</button>
              
              
              </div>
            </div>
          </div>


          </div>
        </form>
      </div>
   </div>
   <?php        
            }
            
          }else{

            echo"<div class='content-header'>
            <div class='container-fluid'>
                <div class='row mb-0'>
                    <div class='col-sm-0'>
                        <h5 class='m-10'>No Ongoing Fines</h5>
                        
                    </div>
                    
                </div>
            </div>
        </div>";
            

          }

   ?>



</div>
</div>
</section>

<script>
        $(document).ready(function(){
           $(".buy_now").on('click',function(e){
                e.preventDefault();
                    var item_name = $(this).closest(".card-body").find("#item_name").attr("value");
                    var price = $(this).closest(".card-body").find("#price").attr("value");
                    var license_number = $(this).closest(".card-body").find("#license_number").attr("value");
                    var dt = '&item_name='+item_name+'&price='+price+'&license_number='+license_number;
                    var url = '../payment/index.php?'+dt; 
                    
                    
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>