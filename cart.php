<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";

if (!$user->isLogged()) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}

$cart = new Cart();
$products = $cart->get_cart_items();
?>
<div class="container my-auto">
<div class="row">

   <div class="col-md-11 border border-secondary mx-auto">
      <!-- <a href="export.php?what=members" class="btn btn-success btn-md mt-3">Export</a> -->

      <h2>Products List</h2>
      <table class="table table-striped">
         <thead>
            <tr>
               <th>Product Name</th>
               <th>Size</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Image</th>

            </tr>

            <thead>
      <tbody>
         <?php  foreach ($products  as $product) :  ?>

            <tr>
               <td><?= $product['name']  ?></td>
               <td><?= $product['size']  ?></td>
               <td><?= $product['price']  ?></td>
               <td><?= $product['quantity']  ?></td>
               <td> <?php if($product['image']) {?>

<img  height='60' width="60"     src="public/product_images/<?php echo $product['image']; ?>">  


            <?php } else {
echo " <img  width ='60'  width='60'   src='public/product_images/no_image.png'>";
}
?></td>
               <td>   <a href="delete-product-from-cart.php?id=<?=$product['cart_id']  ?>" class="btn btn-danger">Delete</a></td>

            </tr>
            <?php  endforeach ?>

      </tbody>
      </table>
      <a href="checkout.php" class="btn btn-success mb-2">Checkout</a>
   </div>
</div>
</div>





<?php require_once "inc/footer.php"; ?>