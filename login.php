<?php  require_once 'inc/header.php' ;
 require_once 'app/classes/User.php' ;

 if($user->isLogged()){
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();

 }

if($_SERVER['REQUEST_METHOD'] == "POST"){

  
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $login = $user->login($user_name, $password);

    if(!$login){
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'Incorect username or password';
        echo '<script type="text/javascript">window.location = "login.php"</script>';
        exit();
    }
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit();
}

?>




<div class="container my-5 mx-auto">


<div class=" row border justify-content-center ">
    <div class="col-lg-12 m-3">


    
                <h2>Login User</h2>
                <form action="" method='post'>
                   
                    User name: <input required type="text" class='form-control' name='user_name'><br>
                  
                   password: <input type="password" class='form-control' name='password'><br>
                   

                    <input type="submit" class='btn btn-primary mt-3' value='Login'>
                </form>
                
            </div>
        </div>
        <a href="register.php">REGISTER</a>
    </div>







<?php  require_once 'inc/footer.php' ?>