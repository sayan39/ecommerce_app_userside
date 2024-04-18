<?php 
  include("mymethods.php");
 $cart_id = $_GET['cart_id'];

 $response =  subtractQuantity($cart_id);
 
 return $response;
?>
