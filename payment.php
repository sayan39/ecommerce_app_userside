<?php
    include("mymethods.php");
    session_start();
    $email = $_SESSION['email'];
    $amount = $_POST['amount'];
    $transiction_id = $_POST['transactionid'];
    $response = payment($email,$amount,$transiction_id);
    echo $response;
?>