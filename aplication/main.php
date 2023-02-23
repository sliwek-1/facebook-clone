<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location:index.php");
    }

?>

<?php require_once("header.php") ?>
<body>
    <?php 
        if(isset($_SESSION['unique_id'])){
            include_once("./php/connection.php");
            $unique_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM users WHERE unique_id = $unique_id";
            $query = mysqli_query($conn,$sql);

            $row = mysqli_fetch_assoc($query);
        }
    ?>
    <main class="main">
        <div class="side">
            <header class="header">
                <div class="info-user">
                    <img src="./php/img/<?php echo $row['img'];?>" alt="user-acc-img" class="img-acc">
                </div>
                <span class="name-user"><?php echo $row['fname']." ".$row['lname']; ?></span>
                <form action="#" class="logout-form">
                    <div class="input logout">
                        <a href="./php/logout.php?logout=<?php echo $row['unique_id'] ;?>" class="logout">Wyloguj</a>
                    </div>
                </form>
                <span class="hide-btn"><ion-icon name="apps-outline"></ion-icon></span>
            </header>
            <h2>Znajomi</h2>
            <div class="search">
                    <form action="#" class="find">
                        <input type="search" placeholder="wyszukaj" class="search-input">
                    </form>
            </div>
            <section class="user-list">
                <?php include_once("./php/data.php"); ?>
            </section>
    </div>
        <div class="content">
            <div class="header">
                    <h3>Dodaj coś na tablice</h3>
                    <form action="#" class="add-post">
                        <input type="text" placeholder="tytuł" name="title" class="title" required>
                        <input type="file" name="img" required>
                        <input type="submit" value="Dodaj" name="submit" class="submit-post">
                    </form>
            </div>
            
            <div class="post-area">
                <?php include_once('./php/post-data.php') ?>
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/main.js"></script>
    <script src="js/show-comment.js"></script>
    <script src="js/social.js"></script>
    <script src="js/hide-header.js"></script>
    <script src="js/post.js"></script>
    <script src="js/comment.js"></script>
</body>
</html>