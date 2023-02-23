<?php 

include_once("connection.php");

if(isset($_POST['post_id'])){
    session_start();
    $user_id = $_SESSION['unique_id'];
    $action = $_POST['action'];
    $postID = $_POST['post_id'];
    $sql = "";
    switch($action){
        case 'like':
            $sql = "INSERT INTO ratio_post(post_id,user_id,ratio) VALUES ($postID,$user_id,'$action')";
            break;
        case 'dislike':
            $sql = "INSERT INTO ratio_post(post_id,user_id,ratio) VALUES ($postID,$user_id,'$action')";
            break;
    }
    checkUserOpinion($user_id,$postID,$action,$sql);
}

function checkUserOpinion($userID,$postID,$action,$sqlAction){

    global $conn;

    $sql = "SELECT * FROM ratio_post WHERE user_id = $userID and post_id = $postID";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0){
        echo "you can vote only one time";
        $row = mysqli_fetch_assoc($query);
        if($row['ratio'] != $action){
            $sql2 = "UPDATE ratio_post SET ratio = '$action' WHERE user_id = {$userID} and post_id = {$postID}";
            mysqli_query($conn,$sql2);
        }
    }else{
        $query = mysqli_query($conn,$sqlAction);
    }
}

function getLikes($postID){
    global $conn;

    $likes_query = "SELECT COUNT(*) FROM ratio_post WHERE post_id = {$postID} and ratio = 'like'";
    $likes = mysqli_query($conn,$likes_query);
    $likes_arr = mysqli_fetch_array($likes);

    return $likes_arr[0];
}

function getDislikes($postID){
    global $conn;

    $dislikes_query = "SELECT COUNT(*) FROM ratio_post WHERE post_id = {$postID} and ratio = 'dislike'";
    $dislikes = mysqli_query($conn,$dislikes_query);
    $dislikes_arr = mysqli_fetch_array($dislikes);

    return $dislikes_arr[0];
}

