

<?php include_once("includes/header.php"); ?>

    <div class="login">
        <div class="box1">
            <div class="bord  ">
            <h4  >register</h4>
            <form class="form" action="saveUser.php" method="post">
                <div class=" fgroup ">
                    <label for="userEmail">Email  :</label>
                    <input type="email" class=" " placeholder="Enter email" name="userEmail" id="" required>
                </div>
                
                <div class="fgroup">
                    <label for="userPassword">name:</label> 
                    <input type="text" class=" " placeholder="Enter name" name="userName" id=" " required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">mobile:</label> 
                    <input type="text" class=" " placeholder="Enter phone" name="mobile" id=" " required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">place:</label> 
                    <input type="text" class=" " placeholder="Enter place" name="place" id=" " required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">password:</label> 
                    <input type="password" class=" " placeholder="Enter password" name="userPassword" id="passw" required>
                </div>
            
                    <div class="fgroup">
                        <label for="userPassword">password:</label> 
                        <input type="password" class="" placeholder="confirm password" name="password2" id="passw" required>
                    </div>
                    <div class="fgroup">
                        <label for="userType">farmer/own resturant:</label> 
                        <select name="userType" id=""  >
                            <option value="farmer">farmer</option>
                            <option value="user">user/own resturant</option>
                        </select>
                    </div>

                <div class="sub">
                     <button class="" id="log" type="submit">Next</button>
                     
                    </div>
                   
            </form>
          
        </div>
        </div>
    
 
</div>
<?php include_once("includes/footer.php"); ?>
</body>
</html>