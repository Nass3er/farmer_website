<?php
$totalcard=0.0;
session_start();
?>

<?php include_once("includes/header.php"); ?>
</div class="back">
<div style="margin:8px;margin-left:15px;">
     <span  style="font-size:20px; font-weight:bold;">total : </span>
     <span style="font-size:15px; font-weight:bold;" id="sum"></span>
     <span >$</span>
     
</div>
    <div class="card">
        <div class="container">
        <?php if( isset($_SESSION['cart'])): ?>
          <?php  foreach ($_SESSION['cart'] as $item ):  ?> 
           <div class="row">
              <img src="<?php echo $item['photo'] ?>" width="100px" height="100px" alt=""/>
              <h4 class="total"><?php echo $item['pprice'] ?></h4>
              <div class="groupbtn">
                <button onclick="minusfunc2(<?php echo $item['pprice'] ?>);">-</button>
                <button id="quant"><?php echo $item['quantity'] ?></button>
                <button onclick="plusfunc2(<?php echo $item['pprice'] ?>);">+</button>
              </div>
             
              <a class="confirm" href="UserOrders.php?id=<?php echo $item['id'] ?>">Order</a>
              <a class="cancel" href="cancelCart.php?id=<?php echo $item['id'] ?>">X</a>
              
           </div>
           <?php $totalcard +=$item['pprice'] * $item['quantity']; ?>
            <script>
                document.getElementById('sum').innerHTML= <?php echo $totalcard?> ;
            </script>
           <hr>
           <?php endforeach; ?>
           <?php endif; ?>   
        </div>
    </div>
     
</body>
</html>