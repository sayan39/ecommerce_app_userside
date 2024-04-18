
<?php
  session_start();
  ob_start();
?>
<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo1.jpg" alt="" /> 
            <span>
              ShopCart
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="container">
              <div class=" mr-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav justify-content-between ">
                  <div class="d-none d-lg-flex">
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="fruit.html">
                        Customer Number : 01234567890</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="service.html">
                        Demo@gmail.com
                      </a>
                    </li> -->
                  </div>
                  <div class=" d-none d-lg-flex">
                    <li class="nav-item">
                      <?php
                        if(isset($_SESSION['email']))
                        {
                            echo '
                                <a href="logout.php">
                                  Logout
                                </a>
                            ';
                        }
                        else{
                            echo '
                                <a href="login.php">
                                  Login / Register
                                </a>
                            ';
                        }
                      ?>
                    </li>
                    <form class="form-inline my-2 ml-5 mb-3 mb-lg-0">
                      <?php
                        if(isset($_SESSION['email']))
                        { 
                          $email=$_SESSION['email'];
                          $count=count_cart_by_email($email);
                          echo '
                          <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                          <div>
                          <a href="checkout.php" class="my-2 my-sm-0"><img src="images/shopping-cart-icon.svg" alt="" width="25px"><sup>'.$count.'</sup></a>
                          </div>
                          ';
                        }
                        else{
                          
                          echo '<button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>';
                        }
                      ?>
                    </form>
                  </div>
                </ul>
              </div>
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()"></button>
            </div>
            <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="overlay-content">
                
                <?php
                        if(isset($_SESSION['email']))
                        {
                            echo '
                            <a href="index.php">HOME</a>
                            <a href="product.html">PRODUCTS</a>
                            <a href="profile.html">PROFILE</a>
                            <a href="order.php">ORDERS</a>
                            ';
                        }
                        else{
                            echo '
                            <a href="index.html">HOME</a>
                            <a href="product.html">PRODUCTS</a>
                                </a>
                            ';
                        }
                      ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>