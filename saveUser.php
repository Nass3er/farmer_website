
<?php



require_once("control/users.php");
         
$u =new Users();

if (isset($_POST['userPassword'])&& isset($_POST['userName']) && isset($_POST['password2'])) {
  
  if ($_POST['userPassword'] === $_POST['password2']) {
    $name=$_POST['userName'];
    $place=$_POST['place'];
    $mobile=$_POST['mobile'];
    $email=$_POST['userEmail'];
  
    if($res=$u->create_user($pdo,$name,$email, $_POST['userPassword'],$place,$mobile, $_POST['userType'])){
        echo "<h2 style='color:green;'> $res </h2>";
        echo' 
                  <script type="text/javascript">
                    setTimeout(function(){
                        window.location.href="index.php";
                    },2000);
                  </script> ';

    } else{
        echo "</h2 style='color:red;'> not added ..?? </h2>";
    }
  } else{
      echo '<h2 style="color:red;">uncorrect password ... </h2>';
  }
}


?>

 