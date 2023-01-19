<?php
session_start();
/**  @var $pdo \PDO */
require_once("./DB/database.php");
 $qup=0;
$id=$_GET['id'];
 
if($id !=null){ // this for retry 
    foreach ($_SESSION['cart'] as $key =>$val) {  
        if ($val['id']==$id) {
            // $quant=$val1['quantity']; // to do retryet it to the product
            unset($_SESSION['cart'][$key]);
             
        }
    }


header('Location:cart.php');
exit;
}
?>
  
