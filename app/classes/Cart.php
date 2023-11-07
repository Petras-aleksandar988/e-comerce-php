<?php  

class Cart {

    protected $connection;

    public function __construct()
    {
      global $conn;
      $this->connection = $conn;
    }
  
    public function add_to_cart ($product_id, $user_id,$quantity)
    {
        $sql = "INSERT INTO cart (product_id,user_id,quantity)
        VALUES (?,?,?)";

    $stmt = $this->connection->prepare($sql);

    $stmt->bind_param("iii", $product_id, $user_id,$quantity );

   $stmt->execute();


    }
    public function get_cart_items() {

     $sql = "SELECT products.product_id, products.name , products.price, products.size, products.image, cart.product_id, cart.quantity, cart.cart_id
        
        from cart 
        LEFT JOIN products on products.product_id = cart.product_id WHERE cart.user_id = ?";
         $run = $this->connection->prepare($sql);
         $run->bind_param("i", $_SESSION['user_id']);
         $run->execute();
         $result = $run->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

      public function destroyCart(){
        
        $stmt = $this->connection->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();

      }
      public function deleteProductFromCart($cart_id){
        
        $stmt = $this->connection->prepare("DELETE FROM cart WHERE cart_id = ?");
        $stmt->bind_param("i",$cart_id);
        $stmt->execute();

      }

}









?>