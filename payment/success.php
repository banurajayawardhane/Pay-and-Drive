<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
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
</head>
<body>
      <div class="success-container">
        <?php

        $fine_number = $_GET["fine_number"];

           if(isset($_GET["fine_number"]) && !empty($_GET["fine_number"]))
           {
               ?>
               
               <center>
                    <h3>Your Transaction has been Successfully Completed</h3>
                    <h3>Fine Number:  <?php echo $_GET["fine_number"]?> </h3>
                    <h3>Redirecting ... Please wait! </h3>
           </center>
                    
               

               <?php
           }
        ?>
        <?php 

            include("../config.php");

            $sql = "UPDATE fines SET `status`='payed' WHERE fine_number='$fine_number'";

            if ($conn->query($sql) === TRUE) {
            
            }
        ?>

        <script>

            setTimeout(function () {    
                window.location.href = '../user/index.php'; 
           },5000); // 5 seconds

        </script>


        
      </div>  
</body>
</html>