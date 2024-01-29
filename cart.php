<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";

if (!$user->isLogged()) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}

$cart = new Cart();
$cartCount = $cart->get_cart_items();
$products = $cart->get_cart_items();
if (empty($cartCount)) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}
?>
<div class=" mx-3">
<div class="">

   <div class="col-md-12 border border-secondary mx-auto">
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

<img   class='cart-img'   src="public/product_images/<?php echo $product['image']; ?>">  


            <?php } else {
echo " <img  width ='60'  width='60'    src='public/product_images/no_image.png'>";
}
?></td>
               <td> <form action="delete-product-from-cart.php" method="POST">
                  <input type="hidden" name="cart_id" value="<?php echo $product['cart_id']; ?>">
               <button class="btn btn-danger">Delete</button>

               </form> 
            
            </td>

            </tr>
            <?php  endforeach ?>

      </tbody>
      </table>
      <?php
if (!empty($products)) {
    echo '<a href="checkout.php" class="btn btn-success mb-2">Checkout</a>';
}
?>
   </div>
</div>
</div>


<style>
   .cart-img{
      max-width: 60px;
      max-height: 60px;
   }
</style>


<?php require_once "inc/footer.php"; ?>