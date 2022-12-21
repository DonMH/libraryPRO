<?php
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        echo "ERROR";
        header("Location: admin.php");
    }else{
        // Get ID values
        $id = $_GET['id'];

        //Call Delete function
        $result = $crud->deleteUser($id);
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