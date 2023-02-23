<?php 

    session_start();

    $logout_id = $_SESSION['unique_id'];
    
    if(isset($logout_id)){
        session_unset();
        session_destroy();
        header('location:../login.php');
    }

?>