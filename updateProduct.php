<?php
require_once("control/product.php");
$p =new Products();
$imagePath='';
$errors=[];
 session_start();
if (isset($_POST['pname'])) {

    
  
    $file_name= $_FILES['photo']['name'] ;    
    $file_size=$_FILES['photo']['size'] ;
     $file_tmp=$_FILES['photo']['tmp_name'];

    $exten=strtolower(end(explode(".",$file_name)));
    
    $extentions=array("png","jpg","jpeg");
    if ($file_size>2*1024*1024)  
        $errors[]="file more than 2mb not allowd";
    if(!in_array($exten,$extentions))
    $errors[]=" this file extention not allowd";
 
    if (empty($errors)) {
      $imagePath="uploadimages/".$file_name;
      move_uploaded_file($file_tmp,$imagePath);
          }
    $id=$_POST['id'];
    $p->name=$_POST['pname'];
    $p->locality=stripslashes($_POST['locality']);
    $p->photo=$imagePath;
    $p->price=stripslashes($_POST['price']);
    $p->quantity=stripslashes($_POST['quantity']);
    $p->category=stripslashes($_POST['category']);
    $p->shcharge=stripslashes($_POST['shcharge']);
    
 
    if($res=Products::update_product($pdo,$p,$id)){
        echo "<h2 style='color:green;'> $res </h2>";
        header('Location:products.php');;
        exit;
    } else{
        echo "</h2 style='color:red;'> not added ..?? </h2>";
    }


}  else{
    echo "<h3>there are property not has value </h3> ";
}

?>