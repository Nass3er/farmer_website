<?php
 session_start();
/**  @var   $pdo \PDO */
require_once("./DB/database.php");

class Verify{

    public function verifyUser($pdo,$uemail,$pas){
     
        $query1="SELECT * FROM users WHERE email= ?";

        $stmtVerify=$pdo->prepare($query1);
        $stmtVerify->bindParam(1,$uemail);
        $stmtVerify->execute();
       $res1= $stmtVerify->fetch();
       if ($res1) {
         
        
           if (password_verify($pas,$res1['password'])) {
            $_SESSION['user_id']=$res1['id'];
            $_SESSION['userName']=$res1['name'];
             return true;  // DECODE THE HASH PASSWORD THAT GET FROM DB
           }else {
             return null;
           }
          }
        }
     
        }  
    ?>

