<?php 
  include("mymethods.php");
 $cart_id = $_GET['cart_id'];

 $response =  addQuantity($cart_id);
 
 return $response;
?>
