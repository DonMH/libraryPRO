<?php 
    require_once 'db/conn.php';
    //Get values from post operation
    if(isset($_POST['submitC'])){
        //extract values from the $_POST array
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $pubData = $_POST['pubData'];
        $lang = $_POST['lang'];
        $author = $_POST['author'];
        $cat = $_POST['cat'];
        //Call function to insert and track if success or not
        $isSuccess = $book->editBook($isbn,$title, $pubData, $lang, $author, $cat);
        // Redirect to index.php
        if($isSuccess){
            header("Location: admin.php");
        }
        else{
        echo 'ERROE';
        }
    }
    else{
        echo 'ERROE';
    }

    

?>