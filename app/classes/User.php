<?php

class User
{
  protected $connection;

  public function __construct()
  {
    global $conn;
    $this->connection = $conn;
  }

  public function create($name, $usernamame, $email, $password)
  {



    $hased_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name,username,email,password)
        VALUES (?,?,?,?)";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("ssss", $name, $usernamame, $email, $hased_password);

    $result = $stmt->execute();

    if ($result) {
      $_SESSION['user_id'] = $this->connection->insert_id;
      return true;
    } else {
      return false;
    }
  }

  public function login($username, $password)
  {
    $sql = "SELECT user_id, password FROM users WHERE username  = ?";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['user_id'];
        return true;
      }
    }
    return false;
  }

  public function isLogged(){
    if(isset($_SESSION['user_id'])){
      return true;
    }else{
      return false;
    }
  }

  public function isAdmin(){
      
    $sql = "SELECT * from users where user_id = ? and is_admin = 1";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("s", $_SESSION['user_id']);

    $stmt->execute();

    $result = $stmt->get_result();
    if($result-> num_rows > 0){
      return true;
    }
    return false;
  }

  public function logout(){
    unset($_SESSION['user_id']);
  }

}
