<?php
include 'config.php';
$exp_qur="UPDATE fines SET `status`='Court' WHERE date_expire<now() AND `status`='license Confiscated';";
mysqli_query($conn,$exp_qur);
?>