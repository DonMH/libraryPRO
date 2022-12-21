<?php 
    class admin{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        
        // function to insert a new record into the attendee database
        public function insertAdmin($name, $email,$password){
            try {
                $new_password = md5($password);
                // define sql statement to be executed
                $sql = "INSERT INTO admin (adminName,email,password) VALUES (:name,:email,:password)";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':name', $name);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $new_password);

                // execute statement
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAdmin($email,$password){
            try{
                $sql = "select * from admin where email = :email AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>