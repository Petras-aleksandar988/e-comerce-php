<?php 
session_start();
require_once "app/config/config.php";
require_once "app/classes/User.php";
require_once "app/classes/Cart.php";
$user = new User();
$cart = new Cart();
 if($user->isLogged() && $_SERVER['REQUEST_METHOD'] == "POST"){

   $cart_id = $_POST['cart_id'];
    $cart->deleteProductFromCart($cart_id);
    echo '<script type="text/javascript">window.location = "cart.php"</script>';
    exit();

 
 }

 ?>