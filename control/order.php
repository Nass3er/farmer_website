
<?php
/**  @var   $pdo \PDO */
require_once("./DB/database.php");
  
class Order  {
 
public $user_id=null;
public $product_id;
public $farmer_id;
public $date;
public $quantity;
public $photo;
 
public static function create_order($pdo,Order $or){
  
    $st= $pdo->prepare("INSERT INTO orders(user_id,product_id,farmer_id,quantity,photo,date)
    VALUES(:userid, :pd, :fd, :quant, :pho,:dat)");

   $st->bindValue(':userid',$or->user_id);
   $st->bindValue(':pd', $or->product_id);
   $st->bindValue(':fd', $or->farmer_id);
   $st->bindValue(':quant',$or->quantity);
   $st->bindValue(':pho',$or->photo);
   $st->bindValue(':dat',$or->date);
   $st->execute(); 

  return "insert successfully..";

}
 
public static function update_order($pdo, $id ){
    $statement= $pdo->prepare("UPDATE orders SET orderState = :ors  WHERE id = :id");
  
    $statement->bindValue(':ors',1);
    $statement->bindValue(':id',$id);
    $statement->execute();
    
      return  "accepted successfully..";
 
}
public static function get_user_orders($pdo ,$user_id){
    $statement= $pdo->prepare("SELECT * FROM orders WHERE user_id = :id OR farmer_id= :id");
    $statement->bindValue(':id',$user_id);
    $statement->execute();
    $orders =$statement->fetchAll(PDO::FETCH_ASSOC);
     return $orders;
    }
    public static function delete_product($pdo, $id){
        $statement= $pdo->prepare('DELETE FROM orders WHERE id = :id');
        $statement->bindValue(':id',$id);
        $statement->execute();
        return true;
    }
}

?>
