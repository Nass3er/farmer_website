<?php
require_once("control/order.php");
 
 
$id=$_GET['id'] ?? null;

if (!$id) {
    header('Location:showUserOrders.php');
    exit; 
}

Order::delete_product($pdo, $id);
header('Location:showUserOrders.php');
exit;
?>