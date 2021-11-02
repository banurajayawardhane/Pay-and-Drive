<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require '../config.php';


?>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");
        .success-container {
            width:50%;
            position:absolute;
            top:30%;
            left:50%;
            transform:translate(-50%,-50%);
            color:#bdc3c7;
            font-weight:bold;
            font-family: "Poppins", sans-serif;
        }
    </style>


      <div class="success-container">
        <?php
           if(isset($_GET["amount"]) && !empty($_GET["amount"])){
               ?>
            <h3>Your Transaction has been Successfully Completed</h3>
          <?php
           }
        ?>
      </div>  
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
