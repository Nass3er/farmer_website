
<?php
// require_once("../tables/allproducts.php");
session_start();
require_once("./DB/database.php");
$search=$_GET['search'] ?? '';

if ($search) {
    $statement=$pdo->prepare('SELECT * FROM products WHERE pname LIKE :nam OR locality LIKE :nam OR category LIKE :nam');
    $statement->bindValue(':nam', "%$search%" );
}else {
$statement=$pdo->prepare('SELECT * FROM products ');
}  
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);
 
 
?>

<?php include_once("includes/header.php"); ?>
    <div class="articles" id="articles">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                       <div class="fsearch">
                           <input type="text" name="search" placeholder="search about product(name-category-locality)" class="">
                           <a href="createProduct.php"> create productd</a>
                  
                          </div>
      </form>
        <h2 class="main-title">All Products</h2>
        <div class="container"> 
           <?php foreach($products as $product) :?>
           <?php // if($product['category']=='vegtables') : ?>
            <div class="box">
              <img src="<?php echo $product['photo'] ?> " height="300px" alt="" data-cat="<?php echo $product['category'] ?>" />
              <div class="content">
                <p><?php echo $product['pname'] ?></p>
              <?php if(isset($_COOKIE['userId'])):  ?>
                <?php if($_COOKIE['userId']==$product['userid']): ?>
                  <a href="editProduct.php?id=<?php echo $product['id'] ?>" style="margin-right:3px;"><i  class="fa fa-edit"></i></a>
                  <a href="deleteProduct.php?id=<?php echo $product['id'] ?>" style="margin-left:3px"><i  class="fa fa-trash-alt"></i></a>
                <?php endif; ?>
              <?php endif; ?>
              </div>
              <div class="info">
                  <a href="showDetails.php?id=<?php echo $product['id'] ?>" class="addcart">add to cart</a>
                  <?php if($product['salestate']): ?>
                    <span> </span>
                  <?php  endif;?>
                <a href="showDetails.php?id=<?php echo $product['id'] ?>">Read details</a>
                <i class="fas fa-long-arrow-alt-right"></i>
              </div>
            </div>
            <?php// endif;?>
            <?php endforeach;?>

            
          
       
        </div>
      </div>
      <div class="spikes"></div>
      <!-- End Articles -->
      <?php include_once("includes/footer.php"); ?>
</body>
</html>