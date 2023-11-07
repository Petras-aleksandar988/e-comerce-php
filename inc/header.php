<?php 
session_start();
 require_once 'app/config/config.php';
  require_once 'app/classes/User.php';
  require_once 'app/classes/Cart.php';
$user = new User();
$cart = new Cart();    
$cartCount = $cart->get_cart_items();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">

<div class="container">
 <div href="#" class="nabar-brand  h4">E-commerce</div>
<div class=" collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a href="index.php" class="nav-link">Home</a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">

   <?php if (!$user->isLogged()) : ?>

        <li class="nav-item ">
            <a href="register.php" class="nav-link">Register</a>
        </li>
        <li class="nav-item ">
            <a href="login.php" class="nav-link">Login</a>
        </li>
        <?php else: ?>

            <li class="nav-item ">
            <a href="cart.php" class="nav-link cart  <?php echo (count($cartCount) === 0) ? 'empty' : ''; ?>">  <img src="public/product_images/cart.png"> Cart</a>
        </li>
            <li class="nav-item ">
            <a href="orders.php" class="nav-link">My Orders</a>
        </li>
        <li class="nav-item ">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>

        <?php endif ?>
    </ul>

</div>

</div>




</nav>



<?php if (isset($_SESSION['message'])) : ?>

<div class="alert alert-<?= $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">

    <?php echo $_SESSION['message']['text'];
    unset($_SESSION['message']);
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
<?php endif; ?>

<style>

a.cart {
    position: relative; /* Set the position to relative */

   
}
    a.cart::before {
        content: "<?= count($cartCount) ?>";
        position: absolute;
        top: -6px;
        left: -9px;
        background-color: #74c273;
        color: #1a1717;
        padding: 1px 5px;
        border-radius: 5px;
    }
    a.cart.empty::before {
    display: none; /* Hide the ::before pseudo-element when the cart is empty */
}



</style>