<?php 
 require_once "admin_header.php";

 $user = new User();
 if($user->isLogged() && $user->isAdmin()){

  $product_obj = new Product();
  $product = $product_obj->read($_GET['id']);
    // echo '<script type="text/javascript">window.location = "index.php"</script>';
    // exit();
    $product_id = $_GET['id'];
 }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['update_info'])) {

$name = $_POST['name'];
$price = $_POST['price'];
$size = $_POST['size'];
$image = $_POST['photo'];

  $product_obj->update($product_id,$name,$price,$size,$image);
  $_SESSION['message']['type'] = 'success';
    $_SESSION['message']['text'] = 'Product edited successfully!';
 echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();
    
        }
    if (isset($_POST['delete_picture'])) {
     

      $sql  ="UPDATE products
      SET image = ''
      WHERE product_id = ?";
    $run = $conn->prepare($sql);
    $run->bind_param('i', $product_id);
    if($run->execute()){
    
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Picture deleted successfully!';
        echo '<script type="text/javascript">window.location = "index.php"</script>';
        exit();

    }
 }
}
?>

 

<div class="container my-5 mx-auto">


<div class="border border-secondary p-5 m-auto ">
                <h2>Edit product</h2>
                <form  method='post'>
                    <input type="hidden" name="product_id" value="<?php echo $_GET['id']?>">
                    Name: <input required type="text" class='form-control' name='name' value="<?php echo $product['name']?>"><br>
                    price: <input required type="text" class='form-control' name='price' value="<?php echo $product['price']?>"><br>
                    size: <input type="text" class='form-control' name='size' value="<?= $product['size']?>"><br>
                 <td>  <input type="hidden" name='photo' id='photoPathInput' value="<?php echo $product['image']; ?>"> </td>
                    <label for=>Upload Photo</label>
                    <div id='dropzone-upload' class='dropzone'></div>
                   

                    <input type="submit" name="update_info" class='btn btn-primary mt-3' value='Edit product'>
                </form>
                <?php if ( $product['image']): ?>
            <form  method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="alert alert-danger alert-dismissible fade show d-inline-flex p-2  mt-1" role="alert">

                <td>  <img width="160"  height="160" src="../public/product_images/<?php echo $product['image'] ?>" > </td>
    
            </div>
<button type="submit"  name="delete_picture" class="btn-close position-absolute"></button>

</form>
<?php endif ?>

        </div>
            
    </div>


   