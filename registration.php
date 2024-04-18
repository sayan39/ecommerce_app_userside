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
  <link rel="stylesheet" href="registration.css">
</head>

<body>
  <div class="hero_area">

  <?php
    include('header.php');
  ?>
</div>
<center>
<div style="margin: 50px;">
<div class="wrapper">
    <h2>Registration</h2>
    <form action="" method="post">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter password" name="password" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder=" Enter your contact" name="contact" required>
      </div>
      <div class="input-box">
        <textarea style="width: 350px;" name="address" id="" placeholder="Enter your address" cols="30" rows="3"></textarea>
      </div>
      <br>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</div>
</center>

<?php
   if(isset($_POST['submit']))
   {
       $response = insert_user($_POST);
       echo "Response ".$response;
   }                    
?>


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