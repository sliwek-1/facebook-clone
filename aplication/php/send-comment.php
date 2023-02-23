<?php 

session_start();
include_once("connection.php");

if(isset($_SESSION['unique_id'])){
    $value = mysqli_real_escape_string($conn,$_POST['comment']);
    $postID = mysqli_real_escape_string($conn, $_POST['post_id']);
    $userID = $_SESSION['unique_id'];

    $sql = "INSERT INTO comments(comment_user_id, comment_text, post_id) VALUES ($userID,'$value',$postID);";
    $query = mysqli_query($conn,$sql);
}


?>