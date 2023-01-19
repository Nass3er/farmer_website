 
<?php
require_once("control/order.php");
$order =new Order();
 
session_start();
   $pro_id=$_GET['id'] ?? null;
   $res="";
  $product=null;
  
 if(isset($_SESSION['user_id'])){
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $key =>$val) {  
            if ($val['id']==$pro_id) {
               $order->user_id=$_SESSION['user_id'];
               $order->product_id=$val['id'];
               $order->farmer_id=$val['userid'];// id of farmer
               $order->photo=$val['photo'];
               $order->quantity=$val['quantity'];
               $order->date= date('Y-m-d H:i:s');
              $res= Order::create_order($pdo,$order);
            }
        }
        header('Location:showUserOrders.php');
        exit;
    }  
   }else{
    header('Location:login.php');
    exit;
 } 

 header('Location:showUserOrders.php');
    exit;
?>
 