<?php
include '../config.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">attendance</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
        <form action="" method="POST" class="login-email">
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <lable>Filter by police id</lable>
                  <input type="text" name="id" class="form-control" id="name" placeholder="Enter ID" value="">
              </div>

              <div class="col-md-3">
              <lable>Filter by status</lable>
                <select class="form-control" name="status">
                    <option value=''></option>
                    <option value='present'>Present</option>
                    <option value='late'>Late</option>
                </select>
              </div>

              <div class="col-md-3">
                  <lable>Filter by date</lable>
                  <input type="date" name="date" class="form-control" id="date" placeholder="Select date" value="">
              </div>

              <div class="col-md-2">
              <lable>Action</lable>
                  <button name="submit" class="btn btn-primary">Filter Table Data</button>
              </div>
              
            </div>
            
              
            
          </div>
          </form>

        <?php
        if (isset($_POST['submit']))
        {

          $fid = $_POST['id'];
          $fstatus = $_POST['status'];
          $fdate = $_POST['date'];
          if($fid !="" && $fstatus !="" && $fdate !="")
          {
            $query = "SELECT * FROM attendance where `status`='$fstatus' AND police_id='$fid' AND `date`='$fdate' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fid !="" && $fstatus !="")
          {
            $query = "SELECT * FROM attendance where `status`='$fstatus' AND police_id='$fid' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fdate !="" && $fstatus !="")
          {
            $query = "SELECT * FROM attendance where `status`='$fstatus' AND `date`='$fdate' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fid != "")
          {
            $query = "SELECT * FROM attendance where police_id='$fid' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fstatus !="")
          {
            $query = "SELECT * FROM attendance where `status`='$fstatus' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          elseif($fdate !="")
          {
            $query = "SELECT * FROM attendance where `date`='$fdate' order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
          else
          {
            $query = "SELECT * FROM attendance order by `date` DESC";
            $query_run = mysqli_query($conn, $query);
          }
        } 
        else
        {
          $query = "SELECT * FROM attendance order by `date` DESC";
          $query_run = mysqli_query($conn, $query);
        }
              
        ?>
        <br>
        <div  id="table">
        <table class="table">
          <thead>
            <th scope="col">Police ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time In</th>
            <th scope="col">Time Out</th>
          </thead>

        <?php
          if($query_run)
          {
            foreach($query_run as $row)
            {
                $status = $row['status'];
                if($status == 'late'){
                    $stlate = "<span class='badge badge-warning badge-counter'>Late</span>";
                }
                else
                {
                    $stlate = "<span class='badge badge-success badge-counter'>Present</span>";
                }

                # get name from  id
                $sql = "SELECT * FROM police where police_id= '$row[police_id]'";
                if($result1 = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result1) > 0){
                    $row1 = mysqli_fetch_array($result1);
                    $name = $row1['name'];
                }
                }
                
       
        ?>
        
          <tbody>
            <td><?php echo $row['police_id'];?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['time_in'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stlate;?></td>
            <td><?php echo $row['time_out'];?></td>
          </tbody>


        <?php

            }
          }
          else
          {
            echo "No data";
          }

        ?>
        </table>
        </div>

        <button name="submit" class="btn btn-primary print">Print</button>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script src="js/jquery.min.js"></script>
<script>
  $('.print').click(function(){
        var date = new Date().toJSON().slice(0,10).replace(/-/g,'/');
        var hedding = "<center><h3 style='color:#4e73df;'>Pay and Drive</h3></center>";
        var topic = "<h5>Attendance Report "+  date  +"</h5>";
        var bottom = "Report generated by: <?php echo $_SESSION['id']; ?>"
        var divElements = document.getElementById("table").innerHTML;
        var oldPage = document.body.innerHTML;
        document.body.innerHTML = hedding + topic + divElements + bottom;
        window.print();
        document.body.innerHTML = oldPage;
  })
</script>
 



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>