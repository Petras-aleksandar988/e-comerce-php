<?php 
session_start();
require_once "app/classes/User.php";
require_once "app/classes/Product.php";
require_once "app/config/config.php";
$user = new User();
$product = new Product();
if($user->isLogged() && $_SERVER['REQUEST_METHOD'] == "POST"){

   $order_id = $_POST['order_items_id'];
   $product->deleteOrder($order_id);
    echo '<script type="text/javascript">window.location = "orders.php"</script>';
    exit();

 
 }

 ?>