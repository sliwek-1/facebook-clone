<?php 
include_once("connection.php");
include_once("updateOpinions.php");
$sql = "SELECT * FROM posts ORDER BY post_id desc";

$query = mysqli_query($conn,$sql);
$output = "";

while($row = mysqli_fetch_assoc($query)){
    if(isset($row['unique_post_id'])){
        $sql2 = "SELECT * FROM users WHERE unique_id = {$row['user_post_id']}";
        $query2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($query2);
    
        $sql3 = "SELECT * FROM ratio_post where user_id = {$_SESSION['unique_id']} and post_id = {$row['unique_post_id']}";
        $query3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($query3);
    
        $output .= '
                <div class="post">
                    <div class="post-desc">
                        <img src="./php/img/'.$row2['img'].'" alt="#" class="img-user">
                        <h6>'.$row2['fname'].'  '.$row2['lname'].'</h6>
                        <div class="title">'.$row['title'].'</div>
                    </div>
                    <img src="./php/postImg/'.$row['post_img'].'" alt="#" class="main-img">
                    <div class="post-mark">
                    <a href="#" class="like '.(($row3['ratio'] == 'like')? 'active' : '').'"><ion-icon name="thumbs-up-outline"></ion-icon><span class="like-counter counter">'.getLikes($row['unique_post_id']).'</span></a>
                    <a href="#" class="dislike '.(($row3['ratio'] == 'dislike')? 'active' : '').'"><ion-icon name="thumbs-down-outline"></ion-icon><span class="dis-counter counter">'.getDislikes($row['unique_post_id']).'</span></a>
                        <form action="#" class="get-comments">
                            <input type="text" value="'.$row['unique_post_id'].'" class="post_id" name="post_id" hidden>
                            <button href="#" class="comment-btn"><ion-icon name="chatbubble-outline"></ion-icon></button>
                        </form>
                    </div>
                    
                    <div class="comment-area">
                        
                    </div>
                    <form action="#" class="comment">
                            <input type="text" value="'.$row['unique_post_id'].'" class="post_id" name="post_id" hidden>
                            <input type="text" name="comment" class="comment-text" name="value">
                            <input type="submit" value="Comment" class="submit-comment">
                    </form>
                </div>';
    }
}

echo $output;
?>