<?php 
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);
//error_reporting(-1);
session_start();
include_once("connection.php");

$user_id = $_SESSION['unique_id'];

$title = trim($_POST['title']);

if(!empty($title)){
    if(isset($_FILES['img'])){
        $img_name = $_FILES['img']['name'];
        $img_ext = $_FILES['img']['type'];
        $img_temp = $_FILES['img']['tmp_name'];

        $img_explode = explode('.',$img_name);
        $img_extension = end($img_explode);

        $img_extensions = ['jpg','png','jpeg'];

        if(in_array($img_extension,$img_extensions) == true){
            $time = time();

            $new_img_name = $time.$img_name;
            if(move_uploaded_file($img_temp,'./postImg/'.$new_img_name)){
                $sql = "INSERT INTO posts(user_post_id,title,post_img,unique_post_id) VALUES ($user_id,'$title','$new_img_name',$time)";

                $query = mysqli_query($conn,$sql);

                echo "succes";
            }else{
                echo "Something went wrong";
            }
        }else{  
            echo "Please select one of this extensions: jpg, jpeg, png.";
        }
    }
}

echo $title;