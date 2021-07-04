<?php
  class Cart{
    private $conn;
    private $userID;

    public function __construct($conn, $userID){
      $this->conn = $conn;
      $this->userID = $userID;
    }

    public function addItemToCart($itemID){
      $stmt1 = $this->conn->prepare("SELECT * from cartdetails where cartID = ? and productID = ?");
      $stmt1->bind_param("ii", $this->userID, $itemID);
      $stmt1->execute();
      $result1 = $stmt1->get_result();
      if ($result1->num_rows == 0) {
        $quantity = 1;
        $stmt2 = $this->conn->prepare("INSERT into cartdetails (cartID, productID, quantity) values (?, ?, ?)");
        $stmt2->bind_param("iii", $this->userID, $itemID, $quantity);
        $stmt2->execute();
        if ($stmt2->affected_rows == 1) return true;
        else return false;
      }
      else return $this->increaseQuantity($itemID);
    }

    public function getCartList(){
      $stmt = $this->conn->prepare
        ("SELECT pri.img1, p.name, p.sold, p.productID, cd.quantity, p.price
        from cartdetails cd, carts c, products p, productimage pri
        where cd.cartID = c.cartID and c.userID = ? and cd.productID = p.productID and p.productID = pri.productID");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function printCartList(){
      $output = '';
      $cardList = $this->getCartList();
      foreach ($cardList as $item) {
        $output .=
        "<li class='product-wrapper container card shadow p-2 m-3 d-flex align-items-center justify-content-center'>
          <div class='product d-flex h-100'>
            <div class='product-img-wrapper'>
              <img class='product-img' src='". $item['img1'] ."' alt='product-img'>
            </div>
            <div class='product-info ml-2 d-flex align-items-center'>
              <div class='product-info-wrapper'>
                <div class='product-name-wrapper'>
                  <p class='product-name'>". $item['name'] ."</p>
                </div>
                <div class='product-rating-wrapper'>
                  <div class='product-rating'>
                    <span class='fa fa-star text-warning'></span>
                    <span class='fa fa-star text-warning'></span>
                    <span class='fa fa-star text-warning'></span>
                    <span class='fa fa-star text-warning'></span>
                    <span class='fa fa-star'></span>
                    <span>(". $item['sold'] .")</span>
                  </div>
                </div>
              </div>
            </div>
            <div class='quantity-price-wrapper d-flex align-items-center'>
              <div class='quantity-price w-100'>
                <div class='quantity-control rounded'>
                  <button class='quantity-btn quantity-btn-minus' data-id='". $item['productID'] ."' data-toggle='tooltip' data-placement='right' title='Decrease Quantity'>
                    <i class='bi bi-dash'></i>
                  </button>
                  <input type='number' class='quantity-input' data-id='". $item['productID'] ."' value='". $item['quantity'] ."' step='1' min='1'  name='quantity' readonly>
                  <button class='quantity-btn quantity-btn-plus' data-id='". $item['productID'] ."' data-toggle='tooltip' data-placement='right' title='Increase Quantity'>
                    <i class='bi bi-plus'></i>
                  </button>
                </div>
                <div class='product-price-wrapper d-flex align-items-center'>
                  <p class='product-price m-0'>". number_format($item['price']) ."₫</p>
                </div>
              </div>
            </div>
            <button type='button' class='btn btn-light remove-btn' data-id='". $item['productID'] ."' data-toggle='tooltip' data-placement='right' title='Remove Item'>
              <i class='bi bi-x fa-lg'></i>
            </button>
          </div>
        </li>";
       }
       return $output;
    }

    public function increaseQuantity($itemID){
      $quantity = $this->getQuantity($itemID) + 1;
      $stmt = $this->conn->prepare("UPDATE cartdetails
                                  set quantity = ?
                                  where cartID = ? and productID = ?");
      $stmt->bind_param("iii", $quantity, $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function decreaseQuantity($itemID){
      if ($this->getQuantity($itemID) ==1) return false;
      $quantity = $this->getQuantity($itemID) - 1;
      $stmt = $this->conn->prepare("UPDATE cartdetails
                                  set quantity = ?
                                  where cartID = ? and productID = ?");
      $stmt->bind_param("iii", $quantity, $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function getQuantity($itemID){
      $stmt = $this->conn->prepare("SELECT *
                                  from cartdetails
                                  where cartID = ? and productID = ?");
      $stmt->bind_param("ii", $this->userID, $itemID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();
      return $result['quantity'];
    }

    public function removeItem($itemID){
      $stmt = $this->conn->prepare
        ("DELETE
        from cartdetails
        where cartID = ? and productID = ?");
      $stmt->bind_param("ii", $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function removeAll(){
      $stmt = $this->conn->prepare
        ("DELETE
        from cartdetails
        where cartID = ?");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function getTotalQuantity(){
      $stmt = $this->conn->prepare
        ("SELECT sum(quantity) as 'totalQuantity'
        from cartdetails
        where cartID = ?");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();
      return $result['totalQuantity'];
    }

    public function getTotalPrice(){
      $stmt = $this->conn->prepare
        ("SELECT SUM(p.price*cd.quantity) as 'totalPrice'
        from cartdetails cd, products p
        where cd.cartID = ? and cd.productID = p.productID");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();
      return (number_format($result['totalPrice']) . '₫');
    }
  }
?>
