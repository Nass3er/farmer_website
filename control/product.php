

<?php
/**  @var   $pdo \PDO */
require_once("./DB/database.php");
 
  class Products  {
 
public $name=null;
public $locality;
public $photo;
public $price;
public $quantity;
public $category;
public $shcharge;
public $user_id;

public static function create_product($pdo,Products $p){
    $st= $pdo->prepare("INSERT INTO products(pname,pprice,locality,quantity,category,shippingcharge,userid,photo)
    VALUES(:na, :pr, :loc, :qua, :cat, :shch,:usid ,:pho)");
   $st->bindValue(':na',$p->name);
   $st->bindValue(':pr', $p->price);
   $st->bindValue(':loc',$p->locality);
   $st->bindValue(':qua',$p->quantity);
   $st->bindValue(':cat',$p->category);
   $st->bindValue(':shch',$p->shcharge);
   $st->bindValue(':usid',$p->user_id);
   $st->bindValue(':pho',$p->photo);
   
   $st->execute();
  
  return "insert successfully..";

}

public static function get_product($pdo, $id)
{
  $statement= $pdo->prepare("SELECT * FROM products WHERE id = :id");
$statement->bindValue(':id',$id);
$statement->execute();
$product =$statement->fetch(PDO::FETCH_ASSOC);
 
  return $product;
}

public static function update_product_saleState($pdo, $id){
  
    $statement= $pdo->prepare("UPDATE products SET salestate = :sals WHERE id = :id");
  
    $statement->bindValue(':sals',1);
    $statement->bindValue(':id',$id);
    $statement->execute();
     
      return  "update successfully..";
}
public static function update_product($pdo,$p, $id){
  
  $st= $pdo->prepare("UPDATE products SET pname =:nam, pprice= :ppric,locality =:loc,
  quantity=:quan ,category=:cat, shippingcharge =:shch, photo= :pho WHERE id = :id");

   $st->bindValue(':nam',$p->name);
   $st->bindValue(':ppric', $p->price);
   $st->bindValue(':loc',$p->locality);
   $st->bindValue(':quan',$p->quantity);
   $st->bindValue(':cat',$p->category);
   $st->bindValue(':shch',$p->shcharge);
   $st->bindValue(':pho',$p->photo);
   $st->bindValue(':id',$id);
   
   $st->execute();
   
    return  "update successfully..";
}

public static function delete_product($pdo,$id){
  $statement= $pdo->prepare('DELETE FROM products WHERE id = :id');
  $statement->bindValue(':id',$id);
  $statement->execute();
 }
}
?>