<?php
if(!(isset($_SESSION['userid']) && $_SESSION['userid']==1)){
    header("Location: adminaAuth.php");
}
?>