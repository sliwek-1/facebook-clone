<?php 

session_start();
require_once("connection.php");

$email = mysqli_real_escape_string($conn,$_POST['email']);
$passwd = mysqli_real_escape_string($conn,$_POST['passwd']);


if(!empty($email) && !empty($passwd)){
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$sql = "SELECT * FROM users WHERE email = '$email' and passwd = '$passwd'";
		$query = mysqli_query($conn,$sql);
		if(mysqli_num_rows($query) > 0){
			echo "success";
			$row = mysqli_fetch_assoc($query);
			$_SESSION['unique_id'] = $row['unique_id'];
		}else{
			echo "Email or Password is wrong";
		}
	}
}else{
	echo "All inputs are required";
}