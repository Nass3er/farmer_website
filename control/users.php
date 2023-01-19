<?php
 
/**  @var   $pdo \PDO */
require_once("./DB/database.php");
 class  Users  {
public $user_id;
public $user_name;
public $user_email;
public $user_role;
public $user_password;

public function create_user($pdo,$name,$email,$pass,$place,$mob,$utype){
    $st= $pdo->prepare("INSERT INTO users(name,email,password,place,mobile,usertype)
    VALUES(:uname, :uemail, :upass, :uplace ,:mob ,:utype)");
   
   $passHashed=password_hash($pass,PASSWORD_DEFAULT);
   $st->bindValue(':uname', $name);
   $st->bindValue(':uemail',$email);
   $st->bindValue(':upass',$passHashed);
   $st->bindValue(':uplace',$place);
   $st->bindValue(':mob',$mob);
   $st->bindValue(':utype',$utype);
   $st->execute();
  
  return "insert successfully..";

}
public static function insertUser($pdo,Users $u){
  $st= $pdo->prepare("INSERT INTO users(user_name,user_email,user_password,user_role)
  VALUES(:uname, :uemail, :upass, :urole)");
 
 $passHashed=password_hash($u->user_password,PASSWORD_DEFAULT);
 $st->bindValue(':uname', $u->user_name);
 $st->bindValue(':uemail',$u->user_email);
 $st->bindValue(':upass',$passHashed);
 $st->bindValue(':urole',$u->user_role);
 $st->execute();

return "insert successfully..";
}

public static function isAdmin($pdo){
if(isset($_SESSION['userEmail'])){
  $query1="SELECT * FROM users WHERE user_email= ?";
  $stmtVerify=$pdo->prepare($query1);
  $stmtVerify->bindParam(1,$_SESSION['userEmail']);
  $stmtVerify->execute();
 $res1= $stmtVerify->fetch();

     if ($res1['user_role']=='admin') {
       return true;  
     }else {
       return false;
     }
    }else{
      return false;
    }
}
}

