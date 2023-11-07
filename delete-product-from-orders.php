<?php 
require_once "app/classes/User.php";
require_once "app/classes/Product.php";
require_once "app/config/config.php";
$user = new User();
$product = new Product();
 if($user->isLogged()){
    $product->deleteOrder($_GET['id']);
    echo '<script type="text/javascript">window.location = "orders.php"</script>';
    exit();

 
 }

 ?>