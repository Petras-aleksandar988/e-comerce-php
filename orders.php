<?php

require_once 'inc/header.php';
require_once 'app/classes/Cart.php';
require_once 'app/classes/Order.php';

if (!$user->isLogged()) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}

$order = new Order();
$orders = $order->get_orders();

if (empty($orders)) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

   $order->destryOrder();
   echo '<script type="text/javascript">window.location = "index.php"</script>';

   exit();
}


?>
<div class=" mx-3">
<div class="">

   <div class="col-md-12 border border-secondary mx-auto">
         <!-- <a href="export.php?what=members" class="btn btn-success btn-md mt-3">Export</a> -->

         <h2>MY Orders</h2>
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Order ID</th>
                  <th>order name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>size</th>
                  <th>Image</th>
                  <th>Delivery Address</th>
                  <th>Order Date</th>

               </tr>

               <thead>
               <tbody>
                  <?php foreach ($orders  as $order) : ?>
                     <tr>
                        <td><?= $order['order_id']  ?></td>
                        <td><?= $order['name']  ?></td>
                        <td><?= $order['quantity']  ?></td>
                        <td><?= $order['price']  ?></td>
                        <td><?= $order['size']  ?></td>
                        <td><?php if ($order['image']) { ?>

                              <img height='60' width="60" src="public/product_images/<?php echo $order['image']; ?>">


                           <?php } else {
                                 echo " <img  width ='60'  width='60'   src='public/product_images/no_image.png'>";
                              }
                           ?>
                        </td>
                        <td><?= $order['delivery_address']  ?></td>
                        <td><?= $order['created_at']  ?></td>
                        <td>
                           <form action="delete-product-from-orders.php" method="POST">
                              <input type="hidden" name="order_items_id" value="<?php echo $order['order_items_id']; ?>">
                              <button class="btn btn-danger">Delete</button>

                           </form>
                        </td>

                     </tr>
                  <?php endforeach ?>

               </tbody>
         </table>
         <div class="d-flex justify-content-between">
            <!-- <a href="#" class="btn btn-success mb-2">Checkout</a> -->


            <?php
            if (!empty($orders)) {
               echo '<form method="POST">';
               echo '<button class="btn btn-primary mb-2">Clear Order</button>';
               echo '</form>';
            }
            ?>

         </div>
      </div>
   </div>
</div>



<?php require_once 'inc/footer.php' ?>