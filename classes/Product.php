<?php
    class Product {
        private $id;
        private $type;
        private $name;
        private $description;
        private $spec;
        private $price;
        private $rating;
        private $sold;
        private $conn;

        //constructor
        public function __construct($conn){
            $this->conn = $conn;
        }

        public function getProduct() {
            if(isset($_GET['id'])) {
                $sql = "SELECT * FROM products p, productimage i WHERE p.productID = ? AND p.productID = i.productID";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    return $result->fetch_assoc();
                }
                else return false;
            }
            else {
                return false;
            }
        }

        //static
        public static function getProductsByCategory($type,&$conn,$limit = 20, $offset = 0) {
            $sql = "SELECT * FROM products p, productimage pimg
            WHERE p.type = ? and p.productID = pimg.productID LIMIT ?,?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sii", $type,$offset,$limit);
            $stmt->execute();
            $results = $stmt->get_result();
            return $results->fetch_all(MYSQLI_ASSOC);
        }

        public static function getTopRating(&$conn, $limit = 20) {
            $sql = "SELECT * FROM products p, productimage pimg WHERE p.productID = pimg.productID ORDER BY p.sold desc LIMIT ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$limit);
            $stmt->execute();
            $results = $stmt->get_result();
            return $results->fetch_all(MYSQLI_ASSOC);
        }

        public static function getProducts(&$conn, $value, $limit){
          $value = "%". $value ."%";
          $sql = "SELECT p.name, p.price, pimg.img1, p.rating, p.sold
                  FROM products p, productimage pimg
                  WHERE p.productID = pimg.productID and p.name like ?
                  limit ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("si", $value, $limit);
          $stmt->execute();
          $results = $stmt->get_result();
          if ($results->num_rows != 0)
            return $results->fetch_all(MYSQLI_ASSOC);
          else return false;
        }
    }
?>