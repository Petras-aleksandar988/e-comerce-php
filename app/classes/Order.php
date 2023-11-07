<?php  

class Order extends Cart {

    protected $connection;

    public function __construct()
    {
      global $conn;
      $this->connection = $conn;
    }


    public function create($delivery_address){
    $sql =  "INSERT INTO orders (user_id, delivery_address) VALUES (?,?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("is", $_SESSION['user_id'], $delivery_address );

    $stmt->execute();
  
     $order_id =  $this->connection->insert_id;
     $cart_items = $this->get_cart_items();

     $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?,?,?)";

     $run = $this->connection->prepare($sql);
     
     foreach($cart_items as $item){
      $run->bind_param("iii", $order_id, $item['product_id'], $item['quantity']);

      $run->execute();
     }
    }


     public function get_orders(){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT 
    orders.order_id, 
    orders.delivery_address , 
    orders.created_at,
    order_items.quantity, 
    order_items.order_items_id, 
    products.name,
    products.price,
    products.size, 
     products.image
     


        
    from orders

    INNER JOIN order_items on orders.order_id = order_items.order_id
    INNER JOIN products on order_items.product_id = products.product_id
    
     WHERE orders.user_id = ?
     ORDER BY orders.created_at DESC";

$stmt = $this->connection->prepare($sql);

$stmt->bind_param("i", $user_id);

$stmt->execute();

$result = $stmt->get_result();
// $this->destroyCart();

return $result->fetch_all(MYSQLI_ASSOC);


     }


public function destryOrder(){

     $stmt = $this->connection->prepare("DELETE FROM orders WHERE user_id = ?");
     $stmt->bind_param("i", $_SESSION['user_id']);
     $stmt->execute();
}



    


}