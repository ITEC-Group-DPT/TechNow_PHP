<?php
    class Favorite{
        private $conn;
        private $userID;

        public function __construct($conn, $userID){
            $this->conn = $conn;
            $this->userID = $_SESSION['userID'];
        }

        public function addToFavorite($productID){
            $stmt = $this->conn->prepare("INSERT into favorites(userID, productID) values (?, ?)");
            $stmt->bind_param('ii', $this->userID, $productID);
            $stmt->execute();
            if($stmt->affected_rows == 1) return true;
            else return false;
        }

        public function removeFavorite($productID){
            $stmt = $this->conn->prepare("DELETE from favorites where userID = ? and productID = ?");
            $stmt->bind_param('ii', $this->userID, $productID);
            $stmt->execute();
            if($stmt->affected_rows == 1) return true;
            else return false;
        }
        
        public function getFavoriteProduct($productID){
            $stmt = $this->conn->prepare("SELECT * from favorites where userID = ? and productID = ?");
            $stmt->bind_param('ii', $this->userID, $productID);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows != 0) return true;
            else return false;
        }

        public function getFavoriteList(){
            $stmt = $this->conn->prepare("SELECT p.productID, p.name, p.price, pimg.img1, p.rating, p.sold
                                    from favorites f, products p, productimage pimg
                                    where f.userID = ? and f.productID = p.productID and p.productID = pimg.productID");
            $stmt->bind_param('i', $this->userID);
            $stmt->execute();
            $results = $stmt->get_result();
            if ($results->num_rows != 0)    return $results->fetch_all(MYSQLI_ASSOC);
            else return false;
        }
    }
?>