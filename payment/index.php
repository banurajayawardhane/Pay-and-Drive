<?php
  if(isset($_GET)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pay & Drive | Payment portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
</head>
<body>

          <div class="container">
               
               <form autocomplete="off" action="checkout-charge.php" method="POST" class="login-email">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Payment Portal</p>

                    <div class="input-group">
                         <input type="text" placeholder="Enter License Number Or ID Number" name="email" value="Fine Number: <?php echo $_GET["item_name"]?>" required>
                    </div>
                    <div class="input-group">
                         <input type="text" placeholder="Enter Password" name="password" value="Amount: Rs.<?php echo $_GET["price"]?>" required>
                    </div>
                    <div class="input-group">
                         <input type="text" placeholder="Enter Password" name="password" value="License Number:  <?php echo $_GET["license_number"]?>" required>
                    </div>

                    <input type="hidden" name="amount" value="<?php echo $_GET["price"]?>">
                    <input type="hidden" name="product_name" value="<?php echo $_GET["item_name"]?>">
                    <center>
                    <script
                         src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                         data-key="pk_test_51JZWusSAdEoZD4vdLrkyX2MeRRcvm99ePS4UKjpToZk3No6Ew3AlcYqLF806HHhpF7ElwPxli1K25ldc6lboZZqv00OYsPVzSG"
                         data-amount=<?php echo str_replace(",","",$_GET["price"]) * 100?>
                         data-name="Fine Number: <?php echo $_GET["item_name"]?>"
                         data-description="License Number: <?php echo $_GET["license_number"]?>"
                         data-currency="lkr"
                         data-locale="auto">
                    </script>
                    </center>
                    
               </form>
          </div>
 <?php
  }
?>
</body>
</html>
