<?php   
  
  require_once "app/classes/Cart.php";

 if(!$user->isLogged()){
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();
 }




?>