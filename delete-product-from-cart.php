<?php 
require_once "app/config/config.php";
require_once "app/classes/User.php";
require_once "app/classes/Cart.php";
$user = new User();
$cart = new Cart();
 if($user->isLogged()){
    $cart->deleteProductFromCart($_GET['id']);
    echo '<script type="text/javascript">window.location = "cart.php"</script>';
    exit();

 
 }

 ?>