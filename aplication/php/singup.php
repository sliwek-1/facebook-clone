<?php 
session_start();
require_once("connection.php");

$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$passwd = mysqli_real_escape_string($conn,$_POST['passwd']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($passwd)){
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0){
        echo "$email this email already exist";
    }else{
        if(isset($_FILES['file'])){
            $img_name = $_FILES['file']['name'];
            $img_type = $_FILES['file']['type'];
            $img_temp = $_FILES['file']['tmp_name'];

            $img_extract = explode('.',$img_name);
            $img_ext = end($img_extract);
            $extensions = ['png','jpg','jpeg'];
            if(in_array($img_ext,$extensions) == true){
                $time = time();

                $new_name_img = $time.$img_name;
                if(move_uploaded_file($img_temp,'img/'.$new_name_img)){
                    $random_id = rand(0,100000);

                    $sql2 = "INSERT INTO users(unique_id,fname,lname,email,passwd,img)
                            VALUES ($random_id,'{$fname}' ,'{$lname}' ,'{$email}' ,'{$passwd}' ,'{$new_name_img}')";

                    $query = mysqli_query($conn,$sql2);
                    if($sql2){
                        $sql3 = "SELECT * FROM users WHERE email = '$email'";
                        $query3 = mysqli_query($conn,$sql3);
                        if(mysqli_num_rows($query3) > 0){
                            $row = mysqli_fetch_assoc($query3);

                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo "success";
                        } 
                    }
                }else{
                    echo "Something is wrong";
                }
            }else{
                echo "Please Select the right extenstion";
            }
        }else{
            echo "Please Select the image";
        }
    }

}else{
    echo "All input are required";
}
