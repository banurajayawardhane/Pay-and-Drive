<?php
require '../config.php';

$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('../admin/UIDContainer.php',$Write);

if (isset($_POST['submit']))
{
    date_default_timezone_set('Asia/Colombo');
    $rfid = $_POST['card_id'];
    $today_date = date('Y/m/d');
    $status = $_POST['status'];
    $time_now = date("H:i:s");

    $sql = "SELECT * FROM police WHERE rfid= '$rfid'";
	$query = $conn->query($sql);

	if($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();
		$police_id = $row['police_id'];

        if($status == 'Time_in')
        {
            if($time_now > 11)
            {
                $sql = "SELECT * FROM attendance WHERE police_id = '$police_id' AND `date` = '$today_date' AND time_in IS NOT NULL";
                $query = $conn->query($sql);
                if($query->num_rows > 0)
                {
                    ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "You have already timed in today.";?></div><?php
                }
                else
                {
                    ?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Your attendance is marked as 'LATE'";?></div><?php
                    $sql = "INSERT INTO attendance (`police_id`,`status`,`time_in`,`date`) VALUES ('$police_id', 'late', NOW(), '$today_date')";
                    $result = mysqli_query($conn, $sql);
                }
            }
            else
            {
                $sql = "SELECT * FROM attendance WHERE police_id = '$police_id' AND `date` = '$today_date' AND time_in IS NOT NULL";
                $query = $conn->query($sql);
                if($query->num_rows > 0)
                {
                    ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "You have already timed in today.";?></div><?php
                }
                else
                {
                    $sql = "INSERT INTO attendance (`police_id`,`status`,`time_in`,`date`) VALUES ('$police_id', 'present', NOW(), '$today_date')";
                    $result = mysqli_query($conn, $sql);
                    if ($result)
                    {
                        ?><div class="alert alert-success alert-dismissible fade show" role="alert" id="display_error"><strong>Success !</strong> <?php echo "You have successfully timed in today.";?></div><?php
                    }
                    else
                    {
                        ?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Something went wrong please try again.";?></div><?php
                
                    }
                }
            }
            
        }
        else
        {
            $sql = "SELECT * FROM attendance WHERE police_id = '$police_id' AND `date` = '$today_date' AND time_out IS NOT NULL";
			$query = $conn->query($sql);
			if($query->num_rows > 0)
            {
                ?><div class="alert alert-danger alert-dismissible fade show" role="alert" id="display_error"><strong>Error !</strong> <?php echo "You have already timed out today.";?></div><?php
            }
            else
            {
                $sql = "UPDATE attendance SET time_out= '$time_now' WHERE police_id='$police_id' AND `date`='$today_date'";
			    $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    ?><div class="alert alert-success alert-dismissible fade show" role="alert" id="display_error"><strong>Success !</strong> <?php echo "You have successfully timed out today.";?></div><?php
                }
                else
                {
                    ?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Something went wrong please try again.";?></div><?php
                }
            }

        } 

    }
    else
    {
        ?><div class="alert alert-warning alert-dismissible fade show" role="alert" id="display_error"><strong>Warning !</strong> <?php echo "Invalid Card.";?></div><?php
    }

}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../style.css">

	<title>Mark attendance - Pay & Drive</title>
</head>

<div class="container">

    <p class="login-text" style="font-size: 2rem; font-weight: 800;">MARK ATTENDANCE </p>

    <form action="" method="POST" class="login-email">

            <div class="login-logo">
                <p class="login-text" id="date" name="date"></p>
                <p class="login-text" id="time" name="time"></p>
            </div>

            <div class="form-group">
            <select class="form-control" name="status">
                <option value='Time_in'>Time In</option>
                <option value='Time_out'>Time Out</option>
            </select>
            </div>

            <div class="form-group">
                <textarea name="card_id" class="form-control" id="getUID" placeholder="Scan ID Card" rows="1" cols="1" required></textarea>
      		</div>

            <div class="input-group">
				<button name="submit" class="btn">Attend Work</button>
			</div>

	</form>
</div>

	
<script src="moment.js"></script>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);
});
</script>
<script src="../admin/js/jquery.min.js"></script>
<script>
			$(document).ready(function(){
				 $("#getUID").load("../admin/UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("../admin/UIDContainer.php");
				}, 500);
			});
</script>
</body>