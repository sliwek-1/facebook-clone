<?php

session_start();
include_once("connection.php");

$postID = $_POST['post_id'];
$output = '';
$sql = "SELECT * FROM comments WHERE post_id = $postID";
$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($query)){

    $sql2 = "SELECT * FROM users WHERE unique_id = {$row['comment_user_id']}";
    $query2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($query2);

    $output .= '
            <div class="comment-item">
            <div class="header-comment">
                <img src="./php/img/'.$row2['img'].'" alt="#" class="img-user">
            </div>
            <div class="text">'.$row['comment_text'].'</div>
            </div>';
}

echo $output;

?>