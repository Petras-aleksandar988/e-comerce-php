<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";

if (!$user->isLogged()) {
   echo '<script type="text/javascript">window.location = "index.php"</script>';
   exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $delivery_address = $_POST['country'] . ', ' . ', zip: '.  $_POST['zip'] . ' '  . $_POST['city'] . ', '. $_POST['address'];

$order = new Order();
 $order->create($delivery_address);
 $order->destroyCart();

$_SESSION['message']['type'] = 'success';
$_SESSION['message']['text'] = 'Order sent succesfully';
echo '<script type="text/javascript">window.location = "orders.php"</script>';
exit();


}


?>

<div class="col-md-11 border border-secondary p-5 m-auto ">
                <h2>Order Form</h2>
                <form  method='post'>
                  
                    Country: <input type="text" class='form-control' name='country' required><br>
                    City: <input type="text" class='form-control' name='city' required><br>
                    Zip code: <input type="text" class='form-control' name='zip' required><br>
                    Address: <input type="text" class='form-control' name='address' required><br>
                    <button  class="btn btn-primary">Order</button>
           
                </form>

            </div>



<?php require_once "inc/footer.php"; ?>