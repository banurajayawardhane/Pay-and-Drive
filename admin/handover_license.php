<?php

include "../config.php"; // Using database connection file here

$fine_number = $_GET['fine_number'];

$update = mysqli_query($conn,"UPDATE fines SET `status`='Completed' WHERE fine_number='$fine_number'");

if($update)
{
    
   mysqli_close($conn); // Close connection
   header("location:release_license.php"); // redirects to all records page
   exit;	
}
else
{
    ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error !</strong> <?php echo "Something went wrong.";?></div><?php
}
?>