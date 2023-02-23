<?php 

    include_once("connection.php");
    $outgoing_id = $_SESSION['unique_id'];

    $sql = "SELECT * FROM  users WHERE NOT unique_id = {$outgoing_id}";   
    $query = mysqli_query($conn,$sql);
    $output = "";
    $msg = "";

    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM msg
        WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) 
        AND (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id desc limit 1";
    
    
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
 
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No messages";
        }

        if($outgoing_id == $row2['outgoing_msg_id']){
            $msg = 'Ty: '.$result;
        }else{
            $msg = $result;
        }

        $output .= '
                    <a href="chat.php?user_id='.$row['unique_id'].'" class="link-user">
                        <div class="user">
                            <img src="./php/img/'.$row['img'].'" alt="user-acc-img"  class="img-acc">
                            <div class="info-user">
                                <span class="name-user">'.$row['fname']." ".$row['lname'].'</span>
                                <div class="msg">'.$msg.'</div>
                            </div>
                        </div>
                    </a>';
    }

    echo $output;



?>