<?php
    class Favorite{
        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        public static function addToFavorite($conn, $userID, $productID){
            $stmt = $conn->prepare("INSERT into favorites(userID, productID) values (?, ?)");
            $stmt->bind_param('ii', $userID, $productID);
            $stmt->execute();
            if($stmt->affected_rows == 1) return true;
            else return false;
        }
        
        public static function getFavoriteProduct($conn, $userID, $productID){
            $stmt = $conn->prepare("SELECT * from favorites where userID = ? and productID = ?");
            $stmt->bind_param('ii', $userID, $productID);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows != 0) return true;
            else return false;
        }

        public static function removeFavorite($conn, $userID, $productID){
            $stmt = $conn->prepare("DELETE from favorites where userID = ? and productID = ?");
            $stmt->bind_param('ii', $userID, $productID);
            $stmt->execute();
            if($stmt->affected_rows == 1) return true;
            else return false;
        }
    }
?>