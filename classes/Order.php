<?php
class Order
{
    private $conn;
    private $name;
    private $id;
    private $address;
    private $phone;
    private $user;
    private $products = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function createOrder($name, $address, $phone, $userid, $productlist)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->user = $userid;
        $this->products = $productlist;

        $sql = 'insert into orders (address,name,phone,userid) values (?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssi', $this->address,$this->user,$this->phone,$this->user);
        $stmt->execute();
        $row = $this->conn->insert_id;

        foreach ($this->products as $product) {
            $sql = 'insert into orderdetails (orderID,productID,quantity) values (?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('sss', $row, $product[0],$product[1]);
            $stmt->execute();
        }
    }
    public static function getUserOrders(&$conn,$userid)
    {
        $sql = "SELECT ord.orderID,ordz.quantity, p.*,pimg.img1 FROM orders ord, orderdetails ordz,products p, productimage pimg WHERE ord.userID = ? and ord.orderID = ordz.orderID and p.productID = pimg.productID and p.productID = ordz.productID";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $userid);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);

        $ords = [];
        foreach ($row as $item) {
            $ID = $item['orderID'];

            $obj = [
                "productID" => $item['productID'], 
                "name" => $item['name'], 
                "img1" =>$item['img1'],
                "price" => $item['price'],
                'quantity' => $item['quantity'],
                "rating" => $item['rating'],
                "sold" => $item['sold'],
            ];
            if (!isset($ords[$ID])) 
                $ords[$ID] = [];
            array_push($ords[$ID], $obj);
        }
        return $ords;
    }
    //delete
}


if (isset($_POST['order'])){
    $arr = json_decode($_POST['list']);
    $order = new Order($conn);
    $order->createOrder($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['userid'],$arr);
}