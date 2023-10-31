<?php 
  require_once  'inc/header.php';
  require_once  'app/classes/Product.php';
  require_once  'app/classes/Cart.php';

  $product = new Product();
  $product = $product->read($_GET['product_id']);


  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $product_id = $product['product_id'];
     $user_id = $_SESSION['user_id'];
    echo $product_id , $user_id;
     $cart = new Cart();
     $cart->add_to_cart($product_id,$user_id);
     echo '<script type="text/javascript">window.location = "cart.php"</script>';
     exit();

  }


?>
<div class="container">
    <div class="row">
 

   <div class="col-lg-6">
   
        <img src="product_images/<?= $product['image'] ?>"  class="card-img-top">
       
    </div>
    <div class="col-lg-6">
       
            <h6 class="card-title"> <?= $product['name'] ?></h6>
            <p class="card-text">Size: <?= $product['size'] ?></p>
            <p class="card-text">Price: $<?= $product['price'] ?></p>

       <form action="" method="POST">

       <input type="hidden" class="product_id" value="<?= $product['product_id'] ?>">
       <button type="submit" class="btn btn-primary">Add to Cart</button>

       </form>
        </div>
   





    </div>
</div>



<?php  require_once  'inc/footer.php';?>