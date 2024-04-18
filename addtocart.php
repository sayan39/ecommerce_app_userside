<?php
    include("mymethods.php");
    session_start();
    $product_id = $_POST['product_id'];
    $pprice = $_POST['pprice'];

    $email = $_SESSION['email'];
    $response=check_cart_by_product_id($product_id);

   if ($response == 1)
    {
        $response1 = update_cart($product_id);
        echo "product added into cart again";
    }
    else{
        $response2 = addToCart($product_id, $pprice, $email);
        
        echo $response2;
    }
?>