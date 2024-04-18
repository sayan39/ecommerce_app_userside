<?php
    include('mymethods.php');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Zezmon</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="hero_area">

        <?php
    include('header.php');
  ?>
    </div>
    <h2>checkout box</h2>
    <div>
        <div>
            <table style='width:90%; margin:5%'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Total</th>
                </tr>
                <?php
          $email = $_SESSION['email'];
          $response = display_cart_by_email($email);

          $records = mysqli_num_rows($response);  //count no. of records

          $sum = 0;

          if($records > 0)
          {
              while($data = mysqli_fetch_assoc($response))   //One By One records insert into data
              {

                $pid = $data["product_id"];

                $res1 = display_product_by_product_id($pid);

                $details = mysqli_fetch_assoc($res1);

                $total = $data["price"] * $data["quantity"];

                $sum = $sum + $total;
                echo'
                
                    <tr>
                    <th>'. $data["product_id"] .'</th>
                    <th>'.$details["pname"].'</th>
                    <th>Rs. '.$data["price"].'</th>
                    <th><img src="../admin/'.$details["pimage"].'" width="10%"></th>
                    <th>
                        <button  onclick="subtractQuantity('.$data["cart_id"].')"><b>-</b></button>
                           <span>'.$data["quantity"].'</span>
                        <button  onclick="addQuantity('.$data["cart_id"].')"><b>+</b></button>
                     </th>
                     <th>Rs.'.$total.'</th>
                     </tr>
                     ';  
                    }
                  }
                ?>
                <tr>
                    <th colspan="5" style="text-align: right;padding-right: 30px;">Total Amount : </th>
                    <th id="totalamount">Rs.<?php echo $sum; ?></th>
                    <th> <button  onclick="paynow(<?php echo $sum; ?>)">Pay Now</button></th>
                </tr>
            </table>




        </div>
    </div>

    <div style="margin-top:600px"></div>
    <?php
    include('footer.php');
  ?>


    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    function addQuantity(cart_id) {
        // alert(cart_id);
        $.ajax({
            url: "addQuantity.php",
            method: "get",
            data: {"cart_id": cart_id},
            success: function(response) {
                window.location.reload();
            }
        })
    }

    function subtractQuantity(cart_id) {
        // alert(cart_id);
        $.ajax({
            url: "subtractQuantity.php",
            method: "get",
            data: {"cart_id": cart_id},
            success: function(response) {
                window.location.reload();
            }
        })
    }
    function paynow(sum)
        {
            alert(sum)
            var options = {
                "key": "rzp_test_ND81BEh4gRO77Q", // Enter the Key ID generated from the Dashboard
                "amount": sum*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "total amount", //your business name
                "description": "Payment testing",
                "image": "https://imgs.search.brave.com/QOCDNOKicSZZ2BGsrqTQ_qyLNCKiyfrXgQp4kN2Qxr0/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9zZWVr/bG9nby5jb20vaW1h/Z2VzL04vbmF0aW9u/YWwtaW5zdXJhbmNl/LWNvbXBhbnktaW5k/aWEtbG9nby01MjE5/MkU4ODdELXNlZWts/b2dvLmNvbS5wbmc",
                "handler": function (response){
                    //alert("payment successful. "+response.razorpay_payment_id);
                    $.ajax({
							url: 'payment.php',
							method: 'post',
							data: {
									 "transactionid" : response.razorpay_payment_id,
                                     "amount": sum
								  }, 
							success: function (response1) 
							{
								alert(response1);
								
								window.location.reload()
								
							}
					     });
                },
            };

          

            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    </script>
</body>

</html>