<?php
 session_start();

 /**  @var $pdo \PDO */

 require_once("./DB/database.php");
 
 $id=$_POST['id'] ?? null;
 $count=$_POST['count'] ?? null;
if (!$count) {
    $count="1";
}
if (!$id) {
    if(!$count || $count<1){
     
    header('Location:products.php');
    exit;
    }
}
 
 $stmtquant=$pdo->prepare('SELECT * from products where id=:id');
 $stmtquant->bindValue(':id',$id);
 $stmtquant->execute();
 $prodQ=$stmtquant->fetch(PDO::FETCH_ASSOC);
  
  if ($prodQ['quantity']<= 0 || $count > $prodQ['quantity']) {
    
    header('Location:products.php');
    exit;
  } else{
       
       $prodQ['quantity']=$count; 
      /// THIS CODE VERY GOOD WORK I LOVE IT , its very very very very gooooood
      if (!isset($_SESSION['cart'])) { 
        $_SESSION['cart']=Array(); 
        array_push($_SESSION['cart'], $prodQ);
       }else{
        foreach ($_SESSION['cart'] as &$item){// this condition if customer select the same item two times
            if($item['id'] ==$id){
              $item['quantity']+=$count;
            
              header('Location:products.php');
              exit;
            }
        }
        array_push($_SESSION['cart'], $prodQ);
       }
    
       header('Location:products.php');
       exit;
     }
?>


