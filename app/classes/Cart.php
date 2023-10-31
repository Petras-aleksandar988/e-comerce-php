<?php  

class Cart {

    protected $connection;

    public function __construct()
    {
      global $conn;
      $this->connection = $conn;
    }
  
    public function add_to_cart ($product_id, $user_id)
    {
        $sql = "INSERT INTO cart (user_id, product_id)
        VALUES (?,?)";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("ii", $product_id, $user_id);

   $stmt->execute();


    }


}









?>