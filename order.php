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
                    <th>order id</th>
                    <th>email</th>
                    <th>total amount</th>
                    <th>total product</th>
                    <th>date</th>
                </tr>
                <?php
          $response = display_order();

          $records = mysqli_num_rows($response);  //count no. of records

          if($records > 0)
          {
              while($data = mysqli_fetch_assoc($response))   //One By One records insert into data
              {
                echo'
                
                    <tr>
                    <th>'. $data["order_id"] .'</th>
                    <th>'. $data['email'].'</th>
                    <th id="totalamount">'. $data["total_amount"] .'</th>
                    <th>
                        
                           <span>'.$data["total_product"].'</span>
            
                     </th>
                     <th>'. $data['order_date'].'</th>
                     </tr>
                     ';  
                    }
                  }
                ?>
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
   </script>
   </body>
   </html>