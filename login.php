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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body>
  <div class="hero_area">

  <?php
    include('header.php');
  ?>
</div>

    <div class="center">
         <input type="checkbox" id="show">
         
         <div class="container1">
            
            <div class="text">
               Login Form
            </div>
            <form action="" method="post">
               <div class="data">
                  <label>Email</label>
                  <input type="text" name="email" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" name="password" required>
               </div>
               <div class="forgot-pass">
                  <a href="#">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" name="submit">login</button>
               </div>
               <div class="signup-link">
                  Not a member? <a href="registration.php">Signup now</a>
               </div>
            </form>
         </div>
      </div>

      <?php
         if(isset($_POST['submit']))
         {
            $response = login_user($_POST);
            $records = mysqli_num_rows($response);
            
            if($records == 1)
            {
              
               //session
               $_SESSION['email'] = $_POST['email'];
               header('location: index.php');
            }
            else{
               echo "login Failed";
            }
         }                    
      ?>


<div style="margin-top:600px"></div>
 <?php
    include('footer.php');
  ?>


<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

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