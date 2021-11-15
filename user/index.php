<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';
include '../check_date.php';


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="edit_profile.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-user-circle fa-sm text-white-50"></i>  Edit Profile</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Imposed fines</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
              $query = "SELECT license_number FROM fines where license_number='$_SESSION[license_number]' ORDER BY license_number";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Fines: <?php echo $row; ?></div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hand-paper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Due Amount</div>
              <?php
             # fetch data
             $sql = "SELECT * FROM fines where license_number='$_SESSION[license_number]' AND `status`='license Confiscated' order by date_of_offence DESC limit 1";
             if($result1 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result1) > 0){
             $row = mysqli_fetch_array($result1);
              $amount = $row['amount'];
              $place = $row['place'];
            }
            else
            {
              $amount=0;
            }
             }
            
             ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo $amount; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   

    <!-- Pending Requests Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">

            <?php    
             # fetch data
             $sql = "SELECT * FROM users where license_number='$_SESSION[license_number]'";
             if($result2 = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($result2) > 0){
             $row = mysqli_fetch_array($result2);
             $name = $row['name'];
             }
             }

             ?>

              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Full Name:  <?php echo $name; ?></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Driver Rating    :
            <?php
            
            $star_1="<i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>";
            
            $star_2="<i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>";

            $star_3="<i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>";

            $star_4="<i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#808080;'></i>";

            $star_5="<i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>
            <i class='fas fa-star' style='color:#FFA500;'></i>";
            $query_star="SELECT license_number FROM fines where license_number='$_SESSION[license_number]'";
            $query_run = mysqli_query($conn, $query_star);
            if(mysqli_num_rows($query_run) > 0)
            {
              $count = mysqli_num_rows($query_run);
            }
            else{
              $count=0;
            }
            switch ($count) {
              case $count<-1:
                echo($star_5);
                break;
              case $count<5:
                echo($star_4);
                break;
              case $count<10:
                echo($star_3);
                break;
              case $count<15:
                  echo($star_2);
                  break; 
              default:
              echo($star_1);
            }
            ?>
              
              
              
              

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Recent Fines</h1>
  </div>

  <div class="row">

  <?php


 $query = "SELECT * FROM fines where license_number='$_SESSION[license_number]' AND `status`='license Confiscated' order by date_of_offence DESC limit 1";
 $query_run = mysqli_query($conn, $query);
 $check_db = mysqli_num_rows($query_run) > 0 ;

 if($check_db)
 {
   while($row = mysqli_fetch_array($query_run))
   {


     ?>

  <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            

           

            <div class="text font-weight-bold text-primary text-uppercase mb-1">Most Recent Fine for license number:<?php echo " " . $_SESSION['license_number'] . ""; ?></div>

            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Fine Number   :  <?php echo $row ['fine_number']; ?></h6></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Place of Offence   :  <?php echo $row ['place']; ?></h6></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Amount to be payed   :  <?php echo $row ['amount']; ?> </h6></div>
            <input type="hidden" name="price" id="price" value="<?php echo $row ['amount']; ?>"/>
            <input type="hidden" name="item_name" id="item_name" value="<?php echo $row ['fine_number']; ?>"/>
            <input type="hidden" name="license_number" id="license_number" value="<?php echo $row ['license_number']; ?>"/>
            </div>

            <div class="col-auto">
             <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm buy_now"><i
              class="fas fa-user-pay fa-sm text-white-50 buy_now"></i>  Pay Fine</a>

              <a href="view_fines.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-user-more fa-sm text-white-50"></i>  View Fine</a>
            </div>

            

          </div>
        </div>
      </div>

     
  </div>
  <?php        
            }
          }
          else
          {
            ?>

<div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-1">
                <h5><?php echo "No Recent Fines" ?></h5>
              </div>
          </div>
        </div>
      </div>
  </div>

            <?php
            
          }

   ?>
  </div>

<!-- payment due in.. -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Payment Due </h1>
  </div>

  <div class="row">

  <?php


 $query = "SELECT * FROM fines where license_number='$_SESSION[license_number]' AND `status`='license Confiscated' order by date_of_offence DESC limit 2";
 $query_run = mysqli_query($conn, $query);
 $check_db = mysqli_num_rows($query_run) > 0 ;

 if($check_db)
 {
   while($row = mysqli_fetch_array($query_run))
   {
    $expire_date = $row ['date_expire'];
    $today_date = date('Y/m/d');
    $exp=strtotime($expire_date);
    $td=strtotime($today_date);
    $diff=$td-$exp;
    $displaycount=abs(floor($diff / (60 * 60 * 24)));


     ?>

  <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text font-weight-bold text-primary text-uppercase mb-1">Your payment for Fine number  <?php echo $row ['fine_number']; ?> is due in</div>
                <h2><?php echo $displaycount ?> DAYS</h2>
                <div class="h5 mb-0 font-weight-bold text-gray-800"> <h6>Expire Date :  <?php echo $row ['date_expire']; ?> </h6></div>
                <h5>Please settle the due amount Rs.<?php echo $row ['amount']; ?> to avoid further penalties. </h5>
              </div>
          </div>
        </div>
      </div>
  </div>

  <?php        
            }
          }
          else
          {
            ?>

<div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-1">
                <h5><?php echo "No Payments Due" ?></h5>
              </div>
          </div>
        </div>
      </div>
  </div>

            <?php
            
          }

   ?>
  </div>
  
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

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>