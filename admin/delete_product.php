<?php 
 require "admin_header.php";


 $user = new User();
 if($user->isLogged() && $user->isAdmin()){
    $product = new Product();
    
    $product->delete($_GET['id']);
    $_SESSION['message']['type'] = 'success';
    $_SESSION['message']['text'] = 'Product deleted successfully!';

    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();

 
 }else{
   echo '<script type="text/javascript">window.location = "../index.php"</script>';
 }

 ?>