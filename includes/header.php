 <?php
$items_in_cart=0;
if (isset($_SESSION['cart'])) {
  $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ;
}
 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farming</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/other.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    
    
  </head>
  <body>
     <!-- Start Header -->
     <div class="header" id="header">
      <div class="container">
        <a href="index.php" class="logo">FarmLogo</a>
        <ul class="main-nav">
          <li>
            <a class="" data-cart="" href="cart.php"><i class="car fa fa-shopping-cart" ></i></a>
            <span class="noti-acount"><?php echo $items_in_cart ?></span>
          </li>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Farming</a></li>
          <li><a href="products.php">Store</a></li>
          <li id="mega">
            <a href="#">MoreLinks</a>
            <!-- Start Megamenu -->
            <div class="mega-menu" id="menu">
               
              <ul class="links">
                <li>
                  <a href="#testimonials"><i class="far fa-comments fa-fw"></i> visit</a>
                </li>
                <li>
                  <a href="products.php"><i class="fa fa-shopping-bag"></i> shopping </a>
                </li>
                <?php if(!isset($_COOKIE['userId'])): ?>
                    <li>
                    <a href="login.php"><i class="fa fa-joint fa-fw"></i> login</a>
                </li>
                <?php endif;?>
                <?php if(!isset($_COOKIE['userId'])): ?>
                <li>
                  <a href="register.php"><i class="fa fa-cash-register"></i> register</a>
                </li>

                <?php endif;?>
                <li>
                  <a href="userAcount.php"><i class="far fa-user fa-fw"></i>My Acount</a>
                </li>

                <?php if(isset($_COOKIE['userId'])): ?>
                <li>
                  <a href="showUserOrders.php"><i class="fa fa-clipboard-list"></i>orders</a>
                </li>
                <?php endif;?>
                <?php if(isset($_COOKIE['userId'])): ?>
                <li>
                  <a href="farmerSales.php"><i class="fa-salesforce fa-fw"></i>my sales</a>
                </li>
                <?php endif;?>
                
              </ul>
            </div>
            <!-- End Megamenu -->
          </li>
        </ul>
      </div>
    </div>
    
    <!-- End Header -->
 
