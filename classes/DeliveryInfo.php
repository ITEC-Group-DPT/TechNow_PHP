<?php 
class DeliveryInfo {
    private $conn;
    public $user_id;
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    function getDeliveryInfo($user_id){
        $this->user_id = $user_id;
        $sql = 'select * from deliveryinfo where userID = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) return 'No rows';
        $delivery = [];
        while ($row = $result->fetch_assoc()) {
            array_push($delivery,$row);
        }
        return $delivery;
    }

}

include '../db.php';
if (isset($_POST['getdelivery'])){
    $book = new DeliveryInfo($conn);
    $array = $book->getDeliveryInfo($_POST['user_id']);
    echo json_encode($array);
}
if (isset($_POST['orderinfo'])){
    print(1);
}
?>