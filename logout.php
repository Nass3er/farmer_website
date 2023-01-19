<?php
   session_start();
   if (isset($_SESSION['user_id']) and isset($_COOKIE['userId'])) {
       setcookie("userId","",time()-3600,"/");
       setcookie("userName","",time()-3600,"/");
       session_unset();
       session_destroy();
       header('Location:index.php');
       exit;
   }
?>
