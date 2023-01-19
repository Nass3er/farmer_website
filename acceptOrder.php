<?php
require_once("control/order.php");
require_once("control/product.php");
$id=$_GET['id'] ?? null;
$orderState=$_GET['id'] ;
$product_id=$_GET['product_id'];
if (!$id) {
    header('Location:showUserOrders.php');
    exit; 
}
Order::update_order($pdo, $id);
Products::update_product_saleState($pdo,$product_id);
header('Location:showUserOrders.php');
exit;
?>

