<?php


session_start();

if (!isset($_SESSION['license_number'])) {
    header("Location: ..\index.php");
}

?>
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-car"></i>
  </div>
  <div class="sidebar-brand-text mx-3">PAY & DRIVE<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>User Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->




<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-stream"></i>
    <span>View Fines</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="view_fines.php">Ongoing Fine</a>
      <a class="collapse-item" href="fine_history.php">Fine History</a>
      
      
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="court_date.php">
    <i class="fas fa-fw fa-balance-scale"></i>
    <span>Court Dates</span></a>
</li>

 <!-- Heading 
<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-map"></i>
    <span>View Maps</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="map.php">Payment & Police Centers</a> 
      
    </div>
  </div>
</li>
-->

<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link" href="map.php">
    <i class="fas fa-fw fa-map"></i>
    <span>View Map</span></a>
</li>



<li class="nav-item">
  <a class="nav-link" href="make_complaint.php">
    <i class="fas fa-fw fa-hand-paper"></i>
    <span>Complaints</span></a>
</li>




<!-- Nav Item - Pages Collapse Menu 
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li>
-->





<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

       
          <ul class="navbar-nav ml-auto">

          
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>

                <?php

                include '../config.php';
                $query = "SELECT * FROM fines where license_number='$_SESSION[license_number]' AND `status`='license Confiscated' order by date_of_offence DESC limit 2";
                $query_run = mysqli_query($conn, $query);
                $check_db = mysqli_num_rows($query_run) > 0 ;
                $count = mysqli_num_rows($query_run);
                ?>
                
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo $count; ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>

                <?php
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
                
                
               
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Due Payment Alert</div>
                    Your payment for Fine number  <?php echo $row ['fine_number']; ?> is due in <?php echo $displaycount ?> days,
                    Please settle the due amount Rs.<?php echo $row ['amount']; ?>.
                  </div>
                </a>

                <?php        
                  }
                }
                else
                {

                }
                ?>
              </div>
            </li>

            

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <?php
                include '../config.php';                
                $today_date = date('Y/m/d');
                $query = "SELECT * FROM complaints where (`status`='responded' AND license_number='$_SESSION[license_number]') AND date_timeout>='$today_date' order by date_res DESC limit 2";
                $query_run = mysqli_query($conn, $query);
                $count = mysqli_num_rows($query_run);
                
                ?>

                <span class="badge badge-danger badge-counter"><?php echo $count; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                
                <?php

                
                if($query_run)
                {
                 foreach($query_run as $row)
                {
                ?>
               
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="../Resources/message.png" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Complaint ID:  <?php echo $row['id'];?></div>
                    <div class="text"><?php echo $row['response'];?></div>
                    <div class="small text-gray-500">Admin <?php echo $row['date_res'];?></div>
                  </div>

                </a>

                <?php

                  }
                }
               ?>

   
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
                <?php echo " " . $_SESSION['license_number'] . ""; ?>
                  
                </span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

              
                <a class="dropdown-item" href="Edit_profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                
                
                
                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure that you want to logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below to end the current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="../logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>