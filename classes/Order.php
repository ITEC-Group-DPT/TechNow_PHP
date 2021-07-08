<?php
class Order
{
    private $conn;
    private $name;
    private $id;
    private $address;
    private $phone;
    private $user;
    private $datecreated;
    private $products = [];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getOrder($id)
    {
        $this->id = $id;
        $sql = "SELECT ord.*,ord.name as 'customer',ordz.quantity,p.productID,p.price, p.name, p.rating,p.sold, pimg.img1 FROM orderdetails ordz, orders ord, products p, productimage pimg WHERE ord.orderID = ? and ord.orderID = ordz.orderID and ordz.productID = p.productID and p.productID = pimg.productID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $ord = $result->fetch_all(MYSQLI_ASSOC);

            $this->name = $ord[0]['customer'];
            $this->address = $ord[0]['address'];
            $this->phone = $ord[0]['phone'];
            $this->datecreated = $ord[0]['dateCreated'];

            $this->products = $ord;
        }
        return $this->products;
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
        $stmt->bind_param('sssi', $this->address, $this->user, $this->phone, $this->user);
        $stmt->execute();
        $row = $this->conn->insert_id;

        foreach ($this->products as $product) {
            $sql = 'insert into orderdetails (orderID,productID,quantity) values (?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('sss', $row, $product[0], $product[1]);
            $stmt->execute();
            $row = $this->conn->insert_id;

            foreach ($productlist as $product) {
                $sql = 'insert into orderdetails (orderID,productID,quantity) values (?,?,?)';
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param('sss', $row, $product[0],$product[1]);
                $stmt->execute();
            }
        }
        //delete
    }

    //getter
    public function getName()
    {
        return $this->name;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getDate()
    {
        return $this->datecreated;
    }
    public function getProducts()
    {
        return $this->products;
    }
    //static
    public static function getUserOrders(&$conn, $userid)
    {
        $sql = "SELECT ord.orderID,ordz.quantity, p.*,pimg.img1 FROM orders ord, orderdetails ordz,products p, productimage pimg WHERE ord.userID = ? and ord.orderID = ordz.orderID and p.productID = pimg.productID and p.productID = ordz.productID ORDER BY ord.orderID desc";
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
                "img1" => $item['img1'],
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


if (isset($_POST['order'])) {
    $arr = json_decode($_POST['list']);
    $order = new Order($conn);
    $order->createOrder($_POST['name'], $_POST['address'], $_POST['phone'], $_POST['userid'], $arr);
}
