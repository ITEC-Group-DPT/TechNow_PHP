<?php 
    class DeliveryInfo {
        private $conn;
        public $user_id;

        function __construct($conn){
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

        function updateDeliveryInfo($deliID,$name,$address, $phone){
            $sql = 'update deliveryinfo set address = ?, name = ?, phone = ? where deliveryID = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssss', $address,$name,$phone,$deliID);
            $stmt->execute();
        }
        
        function createDeliveryInfo($name,$address, $phone,$userid){
            $sql = 'insert into deliveryinfo (address,name,phone,userid) values (?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('sssi', $address,$name,$phone,$userid);
            $stmt->execute();
        }
    
        function deleteDelivery($deliID){
            $sql = 'delete from deliveryinfo where deliveryID = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i', $deliID);
            $stmt->execute();
        }
}


?>