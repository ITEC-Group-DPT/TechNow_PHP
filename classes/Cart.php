<?php
  include 'includes/config.php';
  class Cart{
    private $conn;
    private $userID;
    private $cartID;
    private $cartArr = [];

    public function __construct($conn){
      $this->conn = $conn;
      if (isset($_SESSION['user_id']))  $this->userID = $_SESSION['user_id'];
      else $this->userID = 0;
      $this->cartID = $this->userID;
    }

    private function addItemToCart($itemID, $price){
      if (checkCart('count') >= 10) $itemOrder = "Item";
      else $itemOrder = "Item0";
      
      $cartArr[$itemOrder] = ["ID"=>$itemID, "price"=>$value, "quantity"=>1];
      $stmt = $conn->prepare("INSERT into cartdetails values (?, ?, ?)");
      $stmt->bind_param("iii",$this->cartID, $itemID, 1);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->affected_rows == 1) return true;
      else return false;
    }

    private function checkCart($case){
      $total = 0;
      foreach ($cartArr as $item) {
        if ($case == 'price') $total .= $item['price'];
        elseif ($case == 'count') $total .= $item['quantity'];
      }
      return $total;
    }

    public function getCartArr(){
      return $cartArr;
    }
  }
?>
