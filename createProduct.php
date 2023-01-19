<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
    <link rel="stylesheet" href="css/other.css">
</head>
<body>
    <div class="login">
        <div class="box1">
            <div class="bord  ">
            <h4  >Add new Product</h4>
            <form class="form" action="saveProduct.php" method="post"   enctype="multipart/form-data">
                <div class=" fgroup ">
                    <label for="pname">product name  :</label>
                    <input type="name"   placeholder="Enter name " name="pname" id="" required>
                </div>
                
                <div class="fgroup">
                    <label for="userPassword">product locality:</label> 
                    <input type="text"   placeholder="Enter locality" name="locality" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product  quantity:</label> 
                    <input type="text"  placeholder="Enter quantity" name="quantity" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product  image:</label> 
                    <input type="file"  name="photo" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product price:</label> 
                    <input type="text"   placeholder="Enter price" name="price" id="nam" required>
                </div>
                 
                <div class="fgroup">
                    <label for="category">choose category of product:</label> 
                    <select name="category" id=""  >
                        <option value="vegtables">vegtables</option>
                        <option value="tomato"> tomato</option>
                        <option value="tomato1"> tomato1</option>
                    </select>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product shipping sharge:</label> 
                    <input type="text"   placeholder="Enter locality shipping charge" name="shcharge" id="nam" required>
                </div>
                <div class="sub">
                     <button class="" id="log" type="submit">Add</button>
                    </div>
                   
            </form>
          
        </div>
        </div>
    
 
</div>
</body>
</html>