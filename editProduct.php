<?php
     /**  @var   $pdo \PDO */
     require_once("control/product.php");
      
    $id=$_GET['id'] ?? null;
     $product=null;
    if($id){
       
       $product=Products::get_product($pdo,$id);
    }
   
?>

<?php include_once("includes/header.php"); ?>
    <div class="login">
        <div class="box1">
            <div class="bord  ">
            <h4  >Update Product <span style="color:red;"><?php echo $product['pname'] ?> </span></h4>
            <form class="form" action="updateProduct.php" method="post"   enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                <div class=" fgroup ">
                    <label for="pname">product name  :</label>
                    <input type="name"   placeholder="Enter name " value="<?php echo $product['pname'] ?>" name="pname" id="" required>
                </div>
                
                <div class="fgroup">
                    <label for=" localityord">product locality:</label> 
                    <input type="text"   placeholder="Enter locality" value="<?php echo $product['locality'] ?>" name="locality" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product  quantity:</label> 
                    <input type="text"  placeholder="Enter quantity" value="<?php echo $product['quantity'] ?>" name="quantity" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product  image:</label> 
                    <input type="file"  name="photo" value="<?php echo $product['photo'] ?>" id="nam" required>
                </div>
                <div class="fgroup">
                    <label for="userPassword">product price:</label> 
                    <input type="text"   placeholder="Enter price"  value="<?php echo $product['pprice'] ?>" name="price" id="nam" required>
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
                    <input type="text"   placeholder="Enter locality shipping charge"  value="<?php echo $product['shippingcharge'] ?>" name="shcharge" id="nam" required>
                </div>
                <div class="sub">
                     <button class="" id="log" type="submit">Add</button>
                    </div>
                   
            </form>
          
        </div>
        </div>
</div>
<?php include_once("includes/footer.php"); ?>
</body>
</html>

