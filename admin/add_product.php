<?php 
require_once "admin_header.php";
$user = new User();
if($user->isLogged() && $user->isAdmin()){
  
 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name = $_POST['name'];
      $price = $_POST['price'];
      $size = $_POST['size'];
      $image = $_POST['photo_path'];
    $product = new Product();
    
    $product->create($name,$price,$size,$image);
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();
    };


}else{
  echo '<script type="text/javascript">window.location = "../login.php"</script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>
<body>

<div class="container my-5 mx-auto">


<div class="border border-secondary p-5 m-auto ">
                <h2>Add product</h2>
                <form action="" method='post'>
                    Name: <input required type="text" class='form-control' name='name'><br>
                    price: <input required type="text" class='form-control' name='price'><br>
                    size: <input type="text" class='form-control' name='size'><br>
                  <input type="hidden" class='form-control' name='photo_path' id="photoPathInput"><br>
                  <div id="dropzone-upload" class="dropzone"></div>
                   

                    <input type="submit" class='btn btn-primary mt-3' value='Add product'>
                </form>

        </div>
            
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</body>
   </html>