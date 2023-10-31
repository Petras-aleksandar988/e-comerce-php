
<?php 
require_once "app/classes/User.php";
require_once "inc/header.php";

if($user->isLogged()){
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();

 }

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $created = $user->create($name, $user_name, $email, $password);

    if($created){
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'User Created succesfully!';
        echo '<script type="text/javascript">window.location = "index.php"</script>';
        exit();
    }else{
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'User is not createrd!';
        echo '<script type="text/javascript">window.location = "register.php"</script>';
        exit();

    }
}


?>
  
<div class="container my-5 mx-auto">


<div class="border border-secondary p-5 m-auto ">
                <h2>Register User</h2>
                <form action="" method='post'>
                    Name: <input required type="text" class='form-control' name='name'><br>
                    User name: <input required type="text" class='form-control' name='user_name'><br>
                    email name: <input type="text" class='form-control' name='email'><br>
                   password: <input type="password" class='form-control' name='password'><br>
                   

                    <input type="submit" class='btn btn-primary mt-3' value='Register'>
                </form>

        </div>
            
    </div>


            <?php require_once "inc/footer.php";?>

