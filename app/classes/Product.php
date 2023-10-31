<?php 
class Product {
   
    protected $connection;

    public function __construct()
    {
      global $conn;
      $this->connection = $conn;
    }

   public function fetch_all(){

    $sql = 'SELECT * FROM products';
    $results = $this->connection->query($sql);
    return $results->fetch_all(MYSQLI_ASSOC);
   }



   public function read($product_id){
   
    $sql = "SELECT *  FROM products WHERE product_id = ?";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_assoc();


   }


}




?>