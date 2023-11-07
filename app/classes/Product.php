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

   public function create($name, $price,$size, $image){
  $sql = "INSERT into products (name,price,size,image) values (?,?,?,?)";
  $stmt = $this->connection->prepare($sql);
  $stmt->bind_param("ssss", $name, $price,$size, $image);
  $stmt->execute();
   }

   public function read($product_id){
   
    $sql = "SELECT *  FROM products WHERE product_id = ?";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_assoc();


   }
   public function update($product_id, $name,$price,$size,$image){
      $sql = "UPDATE products SET name = ?, price = ?, size = ?, image = ? WHERE product_id = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->bind_param("ssssi", $name, $price,$size, $image,$product_id);
      $stmt->execute();
   }


   public function delete($product_id){
    $stmt = $this->connection->prepare("DELETE from products where product_id = ?"); 
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
   }
   public function deleteOrder($product_id){
    $stmt = $this->connection->prepare("DELETE from order_items where order_items_id = ?"); 
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
   }


}




?>