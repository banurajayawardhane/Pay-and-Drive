<?php
    require_once "../payment/stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51JZWusSAdEoZD4vdKGczSvGX892cJWcZcOqB3oxtIihwRlzWfcfZ1bEdLtAyXiAyzWHzaYHjGtGfjur45cJmpLXv00dsWLvkdB",
        "publishableKey" => "pk_test_51JZWusSAdEoZD4vdLrkyX2MeRRcvm99ePS4UKjpToZk3No6Ew3AlcYqLF806HHhpF7ElwPxli1K25ldc6lboZZqv00OYsPVzSG"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>