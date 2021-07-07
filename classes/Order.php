<?php
class Order
{
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    function createOrder($name, $address, $phone, $userid, $productlist)
    {
        $sql = 'insert into orders (address,name,phone,userid) values (?,?,?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssi', $address,$name,$phone,$userid);
        $stmt->execute();
        $row = $this->conn->insert_id;

        foreach ($productlist as $product) {
            $sql = 'insert into orderdetails (orderID,productID,quantity) values (?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('sss', $row, $product[0],$product[1]);
            $stmt->execute();
        }
        echo 'success';
    }
    //delete
}


include '../includes/db.php';
if (isset($_POST['order'])){
    $arr = json_decode($_POST['list']);
    $order = new Order($conn);
    $order->createOrder($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['userid'],$arr);
    
}