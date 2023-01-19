 
<?php
require_once("control/order.php");
 
 
session_start();
$orders=Order::get_user_orders($pdo,$_SESSION['user_id']);
      
?>

<?php include_once("includes/header.php"); ?>

    <div class="card">
        <div class="container">
            <h4 >Your Orders</h4>
        <?php if(!empty($orders)): ?>
          <?php  foreach ($orders as $ord ):  ?> 
           <div class="row">
              <img src="<?php echo $ord['photo'] ?>" width="100px" height="100px" alt=""/>
              <h4 class="total"><?php echo $ord['quantity'] ?></h4>
               <div>
               <span data-state="<?php 
                echo $ord['orderState'] = ($ord['orderState']) ? '(Yes)' : '(No)' ;
               ?>">order State</span>
               </div>
               <?php  if(isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['user_id']== $ord['farmer_id']): ?>
                        <a class="confirm" href="acceptOrder.php?id=<?php echo $ord['id'] ?>&product_id=<?php echo $ord['product_id'] ?> ">acccept</a>
                    <?php endif;?>
               <?php endif;?>
              
              <a class="cancel" href="deleteUserOrder.php?id=<?php echo $ord['id'] ?>">X</a>
           </div>
           <hr>
           <?php endforeach; ?>
           <?php endif; ?>   
        </div>
    </div>
    <?php include_once("includes/footer.php"); ?>
</body>
</html>