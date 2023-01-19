<?php
    session_start();
    if (!isset($_COOKIE['userId'])) {
      header('Location:login.php');
      exit;
    }
?>


<?php include_once("includes/header.php"); ?>

    <div class="features" id="features">
      <?php if(isset($_COOKIE['userId'])) :?>
        <h2 class="main-title">My Acount</h2>
        <div class="container">
          <div class="box quality">
            <div class="img-holder"><img src="imgs/img.png" alt="" /></div>
            <h2><?php echo $_COOKIE['userName']?></h2>
            <h5> Email: <?php echo $_COOKIE['userEmail']?></h5>
            <a href="showUserOrders.php">My Orders</a>
            <a href="farmerSales.php">My Sales</a>
            <a href="logout.php">logout</a>

          </div>
        </div>
        <?php endif;?>
    </div>
    <?php include_once("includes/footer.php"); ?>
</body>
</html>