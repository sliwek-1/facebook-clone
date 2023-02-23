<?php

session_start();
include_once("connection.php");

if(isset($_SESSION['unique_id'])){
    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming']);
    $output = "";
    $sql = "SELECT * FROM msg WHERE (outgoing_msg_id = $outgoing_id and incoming_msg_id = $incoming_id) or (outgoing_msg_id = $incoming_id and incoming_msg_id = $outgoing_id) ORDER BY msg_id asc";

    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] == $outgoing_id){
                $output .= '
                        <div class="outgoing-msg">
                            <span class="outgoing">
                                '.$row['msg'].' 
                            </span>
                        </div>';
            }else{
                $output .= '
                            <div class="incoming-msg">
                                <img src="test.png" alt="#" class="incoming-img">
                                <span class="incoming">
                                    '.$row['msg'].' 
                                </span>
                            </div>';
            }
        }
    }
    echo $output;
}else{
    echo "error";
}


