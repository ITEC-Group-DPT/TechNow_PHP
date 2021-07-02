<?php
  class Cart{
    private $conn;
    private $userID;
    private $cartID;
    private $cartArr = [];

    public function __construct($conn,$id){
      $this->conn = $conn;
      $this->userID = $id;
      $this->cartID =$id;
    }

    
    public function getCartList(){
      $stmt = $this->conn->prepare
        ("SELECT pri.img1, p.name, p.sold, p.productID, cd.quantity, p.price
        from cartdetails cd, carts c, products p, productimage pri
        where cd.cartID = ? and cd.cartID = c.cartID and c.userID = ? and cd.productID = p.productID and p.productID = pri.productID");
      $stmt->bind_param("ii", $this->cartID, $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }
  }

if (isset($_POST['getcartlist'])) {
  include '../db.php';
  $cart = new Cart($conn,1);
  $list = $cart->getCartList();
  echo json_encode($list);
}
