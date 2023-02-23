<?php 
    session_start();
    include_once("./php/connection.php");

    if(!isset($_SESSION['unique_id'])){
        header('location:login.php');
    }

?>

<?php require_once("header.php") ?>
<body>
    <?php
        $id = mysqli_real_escape_string($conn,$_GET['user_id']);
        $sql = "SELECT * FROM users WHERE unique_id = {$id}";

        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($query);
        
    ?>
    <div class="main-chat">
        <header class="header">
            <div class="info-chat-user">
                <img src="./php/img/<?php echo $row['img'] ?>" alt="user-acc-img" class="img-acc">
                <span class="name-user"><?php echo $row['fname']." ".$row['lname']; ?></span>
            </div>
            <a href="main.php">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
        </header>

        <div class="chat-content">
            <div class="chat-area">
                    
            </div>
            <div class="chat-write">
                <form action="#" class="chat">
                    <input type="text" name="outgoing" id="outgoing" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                    <input type="text" name="incoming" id="incoming" value="<?php echo $_GET['user_id'] ?>" hidden>
                    <input type="text" name="message" id="msg" class="message">
                    <button class="submit">
                        <ion-icon name="send-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./js/chat.js"></script>
</body>
</html>