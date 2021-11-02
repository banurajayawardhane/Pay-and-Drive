<?php

require '../config.php';

if(isset($_GET))
{
    $payment_id = $_GET['payment_center'];
    $fine_number = $_GET['fine_number'];

    $sql = "UPDATE fines SET `status`='payed', pc_id='$payment_id' WHERE fine_number=$fine_number";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>
                    alert('Payment successful');
                    window.location.href='get_payment.php';
              </script>";
    
                
    } 
        else
    {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }

?>

<?php
}
?>
