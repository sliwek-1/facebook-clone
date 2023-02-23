<?php 

session_start();
include_once("connection.php");

if(isset($_SESSION['unique_id'])){
    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming']);
    $msg = mysqli_real_escape_string($conn,$_POST['message']);


    $sql =  "INSERT INTO msg(outgoing_msg_id,incoming_msg_id,msg) VALUES ($outgoing_id,$incoming_id,'$msg')";
    if(!empty($msg)){
        $sql = mysqli_query($conn,$sql) or die();
    }   
}

