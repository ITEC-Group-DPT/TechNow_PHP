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
        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getProductByID($id) {
            $sql = "SELECT FROM products WHERE productID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            else return false;
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
    }
