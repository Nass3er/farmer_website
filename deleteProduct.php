
<?php

require_once("control/product.php");
 
$id=$_GET['id'] ?? null;

if (!$id) {
    header('Location:products.php');
    exit; 
}
Products::delete_product($pdo,$id);
header('Location:products.php');
exit;
?>