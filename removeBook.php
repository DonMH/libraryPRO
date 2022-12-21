<?php
    require_once 'db/conn.php';
    if(!isset($_GET['isbn'])){
        echo "ERROR";
        header("Location: admin.php");
    }else{
        // Get ID values
        $isbn = $_GET['isbn'];

        //Call Delete function
        $result = $book->deleteBook($isbn);
        //Redirect to list
        if($result)
        {
            header("Location: admin.php");
        }
        else{
            echo "ERROR";        
        }
    }

?>