<?php 
    class crud{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        
        // function to insert a new record into the attendee database
        public function insertUsers($name, $email, $dob, $mob, $yob, $gender, $password){
            try {
                $result = $this->getUserbyEmail($email);
                if($result['num'] > 0){
                    return false;
            } else {
                $new_password = md5($password);
                // define sql statement to be executed
                $sql = "INSERT INTO users (name,email,dob,mob,yob,gender,password) VALUES (:name,:email,:dob,:mob,:yob,:gender,:password)";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':name', $name);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':mob', $mob);
                $stmt->bindparam(':yob', $yob);
                $stmt->bindparam(':gender', $gender);
                $stmt->bindparam(':password', $new_password);

                // execute statement
                $stmt->execute();
                return true;
            }
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($email,$password){
            try{
                $sql = "select * from users where email = :email AND password = :password";
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

        public function getUserbyEmail($email){
            try{
                $sql = "select count(*) as num from users where email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getUsers(){
            try{
                $sql = "SELECT * FROM `users`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }

        public function getUserDetails($id){
            try{
                 $sql = "select * from users where user_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 $result = $stmt->fetch();
                 return $result;
            }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

         public function editUser($id,$name, $email, $dob, $mob, $yob, $gender){
            try{ 
                 $sql = "UPDATE `users` SET `name`=:name,`email`=:email,`dob`=:dob,`mob`=:mob,`yob`=:yob,`gender`=:gender WHERE user_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id', $id);
                 $stmt->bindparam(':name', $name);
                 $stmt->bindparam(':email', $email);
                 $stmt->bindparam(':dob', $dob);
                 $stmt->bindparam(':mob', $mob);
                 $stmt->bindparam(':yob', $yob);
                 $stmt->bindparam(':gender', $gender);
 
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

         public function deleteUser($id){
            try{
                 $sql = "delete from users where user_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

    }
?>