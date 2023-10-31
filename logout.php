<?php  require_once 'inc/header.php' ;
 require_once 'app/classes/User.php' ;


 $user->logout();

 echo '<script type="text/javascript">window.location = "login.php"</script>';
 exit();