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
        public function __construct($conn)
        {
            $this->conn = $conn;
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
    }
