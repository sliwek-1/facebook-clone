<?php require_once("header.php") ?>
<body>
    <div class="wrapper">
        <form action="#" class="form">
            <h1>Zaloguj się</h1>
            <div class="input email">
                <input type="email" name="email" class="email input" placeholder="Email" required>
            </div>
            <div class="input passwd">
                <input type="password" name="passwd" id="password" placeholder="Hasło" required>
                <a href="#" class="show">
                    <span class="show-eye active">
                        <ion-icon name="eye-outline"></ion-icon>
                    </span>
                    <span class="hide-eye">
                        <ion-icon name="eye-off-outline"></ion-icon>
                    </span>
                </a>
            </div>
            <div class="input submit">
                <input type="submit" name="submit" class="submit-btn submit" value="Zaloguj">
            </div>
            <span>
                Nie masz już konta? 
                <a href="index.php">Zarejestruj się</a>
            </span>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/show.js"></script>
    <script src="js/login.js"></script>
</body>
</html>