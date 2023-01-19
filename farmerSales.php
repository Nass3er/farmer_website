<?php
require_once("DB/database.php");
session_start();
if(isset($_SESSION['user_id'])){

        $query='SELECT u.name ,u.place,u.mobile,p.pname,p.pprice,p.photo,o.quantity,o.date FROM users u
        JOIN orders o ON u.id= :farm_id
        JOIN products p ON o.product_id=p.id and o.orderState=p.saleState and p.userid=:farm_id';
        $statement=$pdo->prepare($query);
        $statement->bindValue(':farm_id',$_SESSION['user_id']);
        $statement->execute();
        $sallesbills=$statement->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // var_dump($sallesbills);
        // echo "</pre>";
        // exit;
  } else{
     header('Location:login.php');
     exit;
  }
  
?>
<?php include_once("includes/header.php"); ?>
 
    <div class="card">
        <div class="container">
        <h4 >My sales</h4>
        <?php  if(empty($sallesbills)): ?>
            <h4 class="text-center" >your sales is empty .....</h4>
        <?php endif; ?>
          <?php  foreach ($sallesbills as $sal ):  ?> 
           <div class="row">
              <img src="<?php echo $sal['photo'] ?>" width="100px" height="100px" alt=""/>
              <h6 class="total">PLACE : <?php echo $sal['place'] ?></h6>
              <h6 class=" "> MOBILE : <?php echo $sal['mobile'] ?></h6>
              <h6 class="">PRODUCT NAME : <?php echo $sal['pname'] ?></h6>
              <h6 class="">PRICE  :<?php echo $sal['pprice'] ?></h6>
              <h6 class="">QUANTITY : <?php echo $sal['quantity'] ?></h6>
              <h6 class=""> DATE :<?php echo $sal['date'] ?></h6>
           </div>
            
           <hr>
           <?php endforeach; ?>
     
        </div>
    </div>
    <?php include_once("includes/footer.php"); ?>
</body>
</html>
