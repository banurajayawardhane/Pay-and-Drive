<?php


session_start();

if (!isset($_SESSION['id'])) {
  header("Location: ..\index.php");
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

<!-- partial:index.partial.html -->
<main>

  <section id="home">
    <h2>CLI - Command Line Interface </h2>
    <h2>INITIALIZING..... </h2>
    <p><span>Server name: <kbd><?php  echo $_SERVER['HTTP_HOST'];?></kbd>  Server protocol: <kbd><?php  echo $_SERVER['SERVER_PROTOCOL'];?></kbd>  Server path: <kbd><?php  echo $_SERVER['PHP_SELF'];?></kbd></span></p>
    <p><span>Type 'help' + <kbd>Enter</kbd> -- for available commands.</span></p>

  </section>

  <section id="fines-all">
    <h2><span>&raquo;Fines</span></h2>  
      <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                <?php
                  include('config.php'); 
                  $query = "SELECT * FROM fines";
                  $query_run = mysqli_query($conn, $query);
                      
                ?>
                <table class="table table-hover">
                  <thead>
                    <th scope="col">Fine Number</th>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </thead>

                <?php
                  if($query_run)
                  {
                    foreach($query_run as $row)
                    {
                ?>
                
                  <tbody>
                    <td><?php echo $row['fine_number'];?></td>
                    <td><?php echo $row['vehicle_number'];?></td>
                    <td><?php echo $row['date_of_offence'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                  </tbody>


                <?php

                    }
                  }
                  else
                  {
                    echo "no fines";
                  }

                ?>
                </table>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>

  </section>

  <section id="fines-payment-pending">
    <h2><span>&raquo;Payment Pending fines</span></h2>  
      <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                <?php
                  include('config.php'); 
                  $query = "SELECT * FROM fines where `status`='License confiscated'";
                  $query_run = mysqli_query($conn, $query);
                      
                ?>
                <table class="table table-hover">
                  <thead>
                    <th scope="col">Fine Number</th>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </thead>

                <?php
                  if($query_run)
                  {
                    foreach($query_run as $row)
                    {
                ?>
                
                  <tbody>
                    <td><?php echo $row['fine_number'];?></td>
                    <td><?php echo $row['vehicle_number'];?></td>
                    <td><?php echo $row['date_of_offence'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                  </tbody>


                <?php

                    }
                  }
                  else
                  {
                    echo "no fines";
                  }

                ?>
                </table>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>

  </section>

  <section id="fines-paid">
    <h2><span>&raquo;Paid fines</span></h2>  
      <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                <?php
                  include('config.php'); 
                  $query = "SELECT * FROM fines where `status`='payed'";
                  $query_run = mysqli_query($conn, $query);
                      
                ?>
                <table class="table table-hover">
                  <thead>
                    <th scope="col">Fine Number</th>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </thead>

                <?php
                  if($query_run)
                  {
                    foreach($query_run as $row)
                    {
                ?>
                
                  <tbody>
                    <td><?php echo $row['fine_number'];?></td>
                    <td><?php echo $row['vehicle_number'];?></td>
                    <td><?php echo $row['date_of_offence'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                  </tbody>


                <?php

                    }
                  }
                  else
                  {
                    echo "no fines";
                  }

                ?>
                </table>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>

  </section>

  <section id="fines-court">
    <h2><span>&raquo;Court assigned fines</span></h2>  
      <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                <?php
                  include('config.php'); 
                  $query = "SELECT * FROM fines where `status`='court'";
                  $query_run = mysqli_query($conn, $query);
                      
                ?>
                <table class="table table-hover">
                  <thead>
                    <th scope="col">Fine Number</th>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </thead>

                <?php
                  if($query_run)
                  {
                    foreach($query_run as $row)
                    {
                ?>
                
                  <tbody>
                    <td><?php echo $row['fine_number'];?></td>
                    <td><?php echo $row['vehicle_number'];?></td>
                    <td><?php echo $row['date_of_offence'];?></td>
                    <td><?php echo $row['status'];?></td>
                    
                  </tbody>


                <?php

                    }
                  }
                  else
                  {
                    echo "no fines";
                  }

                ?>
                </table>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>

  </section>

  <section id="error">
    <p>Command not found!<p> 
    <p><span>Type 'help' + <kbd>Enter</kbd> -- for available commands.</span></p>
  </section>

  <section id="help">
    <h2><span>&raquo;Help?</span></h2>
      <ul>
        <li>'home' -- Thats obvious!</li>
        <li>'fine-all' -- View all imposed fines</li>
        <li>'fines-payment-pending' -- View all pending payment fines</li>
        <li>'fines-paid' -- View all paid fines</li>
        <li>'fines-court' -- View all court assigned fines</li>
        <li>'help' -- displays this list</li>
        
      </ul>
  </section>

  <span class="command">Pay&Drive/<?php echo $_SESSION['id']; ?>:/$<input type="text"></span>
</main>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

