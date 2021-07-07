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

        public static function removeFavorite($conn, $userID, $productID){
            $stmt = $conn->prepare("DELETE from favorites where userID = ? and productID = ?");
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

        public static function getFavoriteList($conn, $userID){
            $stmt = $conn->prepare("SELECT p.productID, p.name, p.price, pimg.img1, p.rating, p.sold
                                    from favorites f, products p, productimage pimg
                                    where f.userID = ? and f.productID = p.productID and p.productID = pimg.productID");
            $stmt->bind_param('i', $userID);
            $stmt->execute();
            $results = $stmt->get_result();
            if ($results->num_rows != 0)    return $results->fetch_all(MYSQLI_ASSOC);
            else return false;
        }
    }
?>