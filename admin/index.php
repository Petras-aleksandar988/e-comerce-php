<?php 
  

  require  "admin_header.php";

  $user = new User();
  if($user->isLogged() && $user->isAdmin()){
    
     
     $products  = new Product();
     $allProducts = $products->fetch_all();
}else{
   echo '<script type="text/javascript">window.location = "../login.php"</script>';
}


?>



<div class=" mx-3">
<div class="">

   <div class="col-md-12 border border-secondary mx-auto">
    
         <h2>Products List</h2>
         <a href="add_product.php" class="btn btn-success my-1">Add Product</a>
      <table class="table table-striped">
         <thead>
            <tr>
               <th>Product ID</th>
               <th>Name</th>
               <th>Size</th>
               <th>Price</th>
               <th>image</th>
               <th>Created At</th>

            </tr>

            <thead>
      <tbody>
         <?php  foreach ($allProducts  as $product) : ?>
            <tr>
               <td><?= $product['product_id']  ?></td>
               <td><?= $product['name']  ?></td>
               <td><?= $product['size']  ?></td>
               <td><?= $product['price']  ?></td>
               <td> <?php if($product['image']) {?>

<img width="60" height='60'  src="../public/product_images/<?php echo $product['image']; ?>">  


            <?php } else {
echo " <img width ='60' height='60' src='../public/product_images/no_image.png'>";
}
?></td>
               <td>
                <a href="edit_product.php?id=<?=$product['product_id']?>" class="btn btn-primary">Edit</a>
                <a href="delete_product.php?id=<?=$product['product_id']  ?>" class="btn btn-danger">Delete</a>
                
            
            </td>

            </tr>
            <?php  endforeach ?>

      </tbody>
      </table>
 
   </div>
</div>
</div>


<?php require_once "admin_footer.php";?>
