<?php

session_start();

if (!isset($_SESSION['id'])) {
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
    <span>Admin Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading 
<div class="sidebar-heading">
  Interface
</div>
-->



<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-car"></i>
    <span>Motorists</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <a class="collapse-item" href="view_motorist_profile.php">View Profile</a>
    <a class="collapse-item" href="view_motorist_history.php">Fine History</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-user-secret"></i>
    <span>Police Officer</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="view_police_profile.php">View Profile</a>
      <a class="collapse-item" href="view_police_history.php">Fine History</a>
    </div>
  </div>
</li>
 
<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-users"></i>
    <span>Add Users</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      
      <a class="collapse-item" href="add_motorist.php">Motorist</a>
      <a class="collapse-item" href="add_police.php">Police</a>
      <a class="collapse-item" href="add_payment_center.php">Payment Center</a>
      <a class="collapse-item" href="add_admin.php">Admin</a>
      
    </div>
  </div>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link" href="release_license.php">
    <i class="fas fa-fw fa-handshake"></i>
    <span>Release License</span></a>
</li>



<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link" href="attendance.php">
    <i class="fas fa-fw fa-calendar"></i>
    <span>Attendance</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="user_complaints.php">
    <i class="fas fa-fw fa-clipboard-list"></i>
    <span>User Complaints</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
  <a class="nav-link" href="add_map_points.php">
    <i class="fas fa-fw fa-map"></i>
    <span>Manage Map</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="cli.php">
    <i class="fas fa-fw fa-terminal"></i>
    <span>CLI</span></a>
</li>




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
                $query = "SELECT * FROM fines where `status`='court' order by date_of_offence DESC limit 2";
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

                ?>
                
               
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Court date: <?php echo $row ['court_date']; ?></div>
                    The license card<b> '<?php echo $row ['license_number']; ?>'</b> is in the court for violating traffic rule <b>'<?php echo $row ['nature']; ?>'</b> on <b><?php echo $row ['date_of_offence']; ?></b><br>
                    Fine Number: <b><?php echo $row ['court_date']; ?></b>
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

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
                <?php echo " " . $_SESSION['id'] . ""; ?>
                  
                </span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

              <!--
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                -->
                
                
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