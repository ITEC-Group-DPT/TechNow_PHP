<?php
    class User {
        private $conn;
        private $userID;
        private $email;
        private $username;
        private $password;
        public $errors = [];

        # constructor
        public function __construct($conn) {
            $this->conn = $conn;
        }

        # helper functions
        private function getUser($type, $data) {
            $sql = "SELECT * FROM users WHERE $type = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $data);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            }
            else return false;
        }
        private function checkValidUsername($username) {
            if (mb_strlen($username, "utf-8") < 5 || mb_strlen($username, "utf-8") > 20)
                $this->errors["username"] = "Username must be between 5 and 20 characters";
        }
        private function checkValidEmail($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $this->errors["email"] = "Email is invalid";
        }
        private function checkValidPasswords($password1, $password2) {
            if (mb_strlen($password1, "utf-8") < 6)
                $this->errors["password1"] = "Password must be atleast 6 characters";
            else if ($password1 != $password2)
                $this->errors["password2"] = "Passwords don't match";
        }

        # main functions
        public function checkCreate($email, $username, $password1, $password2) {
            $this->checkValidEmail($email);
            if ($this->getUser("email", $email) != false)
                $this->errors["email"] = "Email is already taken";
            $this->checkValidUsername($username);
            $this->checkValidPasswords($password1, $password2);
            if(empty($this->errors)) {
                $this->email = $email;
                $this->username = $username;
                $this->password = password_hash($password1, PASSWORD_DEFAULT);
                $this->createUser();
            }
        }
        private function createUser() {
            $sql = "INSERT INTO users (email, username, password) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sss", $this->email, $this->username, $this->password);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $this->userID = $stmt->insert_id;
                $this->logIn();
            }
            else $this->errors["database"] = "Database error";
        }
        public function checkSignIn($email, $password) {
            $this->checkValidEmail($email);
            if(empty($this->errors)) {
                if ($this->getUser("email", $email) != false) {
                    $row = $this->getUser("email", $email);
                    if (password_verify($password, $row['password'])) {
                        $this->userID = $row['userID'];
                        $this->email = $row['email'];
                        $this->username = $row['username'];
                        $this->logIn();
                    }
                    else $this->errors["password"] = "Password is incorrect";
                }
                else $this->errors["email"] = "Email not found";
            }
        }
        private function logIn() {
            $_SESSION['signedIn'] = true;
            $_SESSION['userID'] = $this->userID;
            $_SESSION['email'] = $this->email;
            $_SESSION['username'] = $this->username;
            header("Location: index.php");
            exit();
        }

        public static function signOut() {
            $_SESSION = [];
            session_destroy();
            header("Location: index.php");
            exit();
        }
    }
?>