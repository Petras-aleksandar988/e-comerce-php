<?php require_once "inc/header.php";
require_once 'app/classes/Product.php';
require_once 'app/classes/Cart.php';
$products = new Product();

$productsList = $products->fetch_all();

if(!$user->isLogged()){
    echo '<script type="text/javascript">window.location = "login.php"</script>';
    exit();
}
if($user->isAdmin()){
    echo '<script type="text/javascript">window.location = "admin/index.php"</script>';
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $product_id = $_POST['product_id'];
    //  $product = $products->read($product_id);
     $user_id = $_SESSION['user_id'];
     $quantity = $_POST['quantity'];
     $cart = new Cart();
     $cart->add_to_cart($product_id, $user_id, $quantity);
     echo '<script type="text/javascript">window.location = "index.php"</script>';

     exit();

  }
?>

<div class="container">
    <div class="row">
    <?php  foreach($productsList as $product):  ?>

   <div class="col-md-2">
    <div class="card my-1">
        <!-- <img src="public/product_images/<?= $product['image'] ?>"  class="card-img-top"> -->
        <?php if($product['image']) {?>

<img width="160" height='160'  class="card-img-top"  src="public/product_images/<?php echo $product['image']; ?>">  


            <?php } else {
echo " <img width ='160' height='160'  class='card-img-top' height='60' src='public/product_images/no_image.png'>";
}
?>
        <div class="card-body">
            <h5 class="card-title"> <?= $product['name'] ?></h5>
            <p class="card-text">Size: <?= $product['size'] ?></p>
            <p class="card-text">Price: <?= $product['price'] ?></p>
            <form action="" method="POST">
                
                Quantity: <input class="col-sm-5" required  min="1" type="number" name="quantity"><br>
                <input type="hidden" name="product_id"  value="<?= $product['product_id'] ?>">
                <button type="submit" class="btn btn-primary my-2 w-100">Add to Cart</button>
                
            </form>
            <a  href="product.php?product_id=<?= $product['product_id']?>"  class="btn btn-primary mt-2 w-100">View Product</a>
        </div>
    </div>
   </div>



    <?php  endforeach   ?>

    </div>
</div>

 


 <?php require_once "inc/footer.php";?>