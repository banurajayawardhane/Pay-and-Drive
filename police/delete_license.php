<?php

include "../config.php"; // Using database connection file here

$id = $_GET['id'];
$fine_number = $_GET['fine_number']; // get id through query string

$del = mysqli_query($conn,"delete from license_inventory where id = '$id'"); // delete query
$update = mysqli_query($conn,"UPDATE fines SET `status`='Completed' WHERE fine_number='$fine_number'");

if($del && $update)
{
    
   mysqli_close($conn); // Close connection
   header("location:license_inventory.php"); // redirects to all records page
   exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>