<?php

session_start();
include_once("connection.php");
$outgoing_id = $_SESSION['unique_id'];

$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
$output = "";

if(!empty($searchTerm)){
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%' ";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0){
        include_once("data.php");
    }else{
        echo "No users found";
    }
}


