<?php 
    class book{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        
       // function to insert a new record into the book database
        public function insertUsers($title, $pubData, $lang, $author, $cat,$image_path){
            try {
                $result = $this->getBookbyName($title);
                if($result['num'] > 0){
                    return false;
            } else {
                // define sql statement to be executed
                $sql = "INSERT INTO book (Book_Title,Publication_year,language,author_id,category_id,image_path) VALUES (:title,:pubData,:lang,:author,:cat,:image_path)";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':title', $title);
                $stmt->bindparam(':pubData', $pubData);
                $stmt->bindparam(':lang', $lang);
                $stmt->bindparam(':author', $author);
                $stmt->bindparam(':cat', $cat);
                $stmt->bindparam(':image_path', $image_path);
                // execute statement
                $stmt->execute();
                return true;
            }
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // public function getUser($email,$password){
        //     try{
        //         $sql = "select * from users where email = :email AND password = :password";
        //         $stmt = $this->db->prepare($sql);
        //         $stmt->bindparam(':email', $email);
        //         $stmt->bindparam(':password', $password);
        //         $stmt->execute();
        //         $result = $stmt->fetch();
        //         return $result;
        //    }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
        // }

        public function getBookbyName($title){
            try{
                $sql = "select count(*) as num from book where Book_title = :title";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':title',$title);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getBooks(){
            try{
                $sql = "SELECT * FROM `book` a inner join author b on a.author_id = b.author_id 
                                               inner join category c on a.category_id = c.category_id";
                $resultB = $this->db->query($sql);
                return $resultB;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
        }
        public function getCategory(){
                    try{
                        $sql = "SELECT * FROM `category`";
                        $resultC = $this->db->query($sql);
                        return $resultC;
                    }catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                }
                
        }
        public function getAuthor(){
            try{
                $sql = "SELECT * FROM `author`";
                $resultA = $this->db->query($sql);
                return $resultA;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        
        }
        public function getBookDetails($isbn){
            try{
                 $sql = "select * from book where ISBN = :isbn";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':isbn', $isbn);
                 $stmt->execute();
                 $result = $stmt->fetch();
                 return $result;
            }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

         public function editBook($isbn,$title, $pubData, $lang, $author, $cat){
            try{ 
                $sql = "UPDATE `book` SET `Book_Title`=:title,`Publication_year`=:pubData,`language`=:lang,`author_id`=:author,`category_id`=:cat WHERE ISBN = :isbn";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':isbn', $isbn);
                 $stmt->bindparam(':title', $title);
                 $stmt->bindparam(':pubData', $pubData);
                 $stmt->bindparam(':lang', $lang);
                 $stmt->bindparam(':author', $author);
                 $stmt->bindparam(':cat', $cat);
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

         public function deleteBook($isbn){
            try{
                 $sql = "delete from book where ISBN = :isbn";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':isbn', $isbn);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

    }
?>