
 
<?php 
 
 require_once("control/loginVerify.php");
 $verify=new Verify();
//  if (isset($_SESSION['userEmail']) and $_SESSION['userEmail'] !=null) {
//     header('Location:index.php');
//     exit;
//  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/other.css">
</head>
<body>
    <div class="login">
        <div class="box1">
            <div class="bord  ">
            <h4  >Login</h4>
            <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class=" fgroup ">
                    <label for="userEmail">Email  :</label>
                    <input type="email" class=" " placeholder="Enter email" name="userEmail" id="" required>
                </div>
                    <div class="fgroup">
                    <label for="userPassword">password:</label>
  
                    <input type="password" class=" " placeholder="Enter password" name="userPassword" id="passw" required>
                </div>
                

                <div class="sub">
                     <button class="" id="log" type="submit">login</button>
                     
                    </div>
                    <a href="register.php"> register new acount</a>
            </form>
           <?php

            if (isset($_POST['userEmail']) and $_POST['userEmail'] !=null and
              isset($_POST['userPassword']) and $_POST['userPassword'] !=null )
              {
                $useremail= stripslashes($_POST['userEmail']);
                  $pass=stripslashes($_POST['userPassword']);
                   

                if($res=$verify->verifyUser($pdo,$useremail,$pass)){
                  
                  echo "<h6 style='color:#3626cd;font-size:25px;text-align:center;'>loging successfullly... </h6>";
                    
                    $_SESSION['userEmail']=$useremail;
                    $_SESSION['userPassword']=$pass;
                   

                  echo' 
                  <script type="text/javascript">
                    setTimeout(function(){
                        window.location.href="index.php";
                    },2000);
                  </script> ';
                  
                } else{
                echo "<h6 style='color:red';text-align:center;> login faild </h6>   ";
               }
          } 
          ?>
        </div>
        </div>
    
 
</div>
</body>
</html>