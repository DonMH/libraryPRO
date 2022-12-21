<?php
require_once 'db/conn.php';

    if (isset($_POST['submit'])) {
        //extract values from the $_POST array
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $mob = $_POST['mob'];
        $yob = $_POST['yob'];
        $gender = $_POST['gender'];
        //Call function to insert and track if success or not
        $isSuccess = $crud->editUser($id,$name, $email, $dob, $mob, $yob, $gender);
        if($isSuccess){
            header("Location: admin.php");
        }
        else{
            echo "ERROR";
        }
    }
    else{
        echo "ERROR";

    }

?>